// Variables globales
const video = document.getElementById("video");
const canvas = document.getElementById("overlay");
let displaySize = { width: 0, height: 0 }; // Dimensiones iniciales vacías
let detectionInterval; // Intervalo de detección global

// Cargar modelos de Face API
const loadFaceModels = async () => {
    try {
        const modelPath = "/models";
        await faceapi.nets.tinyFaceDetector.loadFromUri(modelPath);
        await faceapi.nets.faceLandmark68Net.loadFromUri(modelPath);
        await faceapi.nets.faceRecognitionNet.loadFromUri(modelPath);
        await faceapi.nets.faceExpressionNet.loadFromUri(modelPath);
        await faceapi.nets.ageGenderNet.loadFromUri(modelPath);

        console.log("Modelos cargados exitosamente.");
    } catch (err) {
        console.error("Error al cargar los modelos:", err);
    }
};

// Iniciar el video
const startVideo = async () => {
    try {
        await loadFaceModels(); // Cargar los modelos primero

        const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
        video.srcObject = stream;

        video.onloadedmetadata = () => {
            // Ajustar el tamaño del canvas al video
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            // Actualizar las dimensiones de displaySize
            displaySize = { width: video.videoWidth, height: video.videoHeight };

            detectFace(); // Iniciar detección
        };
    } catch (err) {
        console.error("Error al acceder a la cámara:", err);
    }
};

// Detección de rostro en tiempo real
const detectFace = async () => {
    const ctx = canvas.getContext("2d");

    detectionInterval = setInterval(async () => {
        try {
            const detections = await faceapi
                .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceExpressions()
                .withAgeAndGender();

            const resizedDetections = faceapi.resizeResults(detections, displaySize);

            // Limpiar canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Dibujar detecciones
            faceapi.draw.drawDetections(canvas, resizedDetections);
            faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);

            resizedDetections.forEach((detection) => {
                const { age, gender, expressions } = detection;
                const maxExpression = Object.entries(expressions).reduce((a, b) =>
                    a[1] > b[1] ? a : b
                );

                const box = detection.detection.box;
                const info = `${gender}, ${Math.round(age)} años, ${maxExpression[0]}`;
                ctx.fillStyle = "white";
                ctx.font = "16px Arial";
                ctx.fillText(info, box.x, box.y - 10);
            });

            // Activar/desactivar botón según detección
            const captureFaceButton = document.getElementById("captureFace");
            captureFaceButton.disabled = detections.length !== 1;

        } catch (err) {
            console.error("Error en detección:", err);
        }
    }, 100);
};

// Detener el video
const stopVideo = () => {
    if (detectionInterval) clearInterval(detectionInterval);

    const stream = video.srcObject;
    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach((track) => track.stop());
    }
    video.srcObject = null;
};

// Guardar descriptor facial
const saveDescriptor = (descriptor) => {
    const descriptorInput = document.createElement("input");
    descriptorInput.type = "hidden";
    descriptorInput.name = "face_descriptor";
    descriptorInput.value = JSON.stringify(descriptor);
    document.getElementById("registerForm").appendChild(descriptorInput);

    const validationMessage = document.getElementById("facialMessage");
    validationMessage.innerHTML =
        '<span class="text-success">FaceID capturado con éxito.</span>';

    const faceIDModal = bootstrap.Modal.getInstance(document.getElementById("faceIDModal"));
    if (faceIDModal) faceIDModal.hide();

    stopVideo();
};

// Asociar eventos a botones
document.querySelectorAll('[id="openFaceIDModalCapture"], [id="openFaceIDModalLogin"]').forEach(button => {
    button.addEventListener("click", (event) => {
        const action = event.target.dataset.action;
        const loginModal = bootstrap.Modal.getInstance(document.getElementById("loginModal"));
        const faceIDModal = new bootstrap.Modal(document.getElementById("faceIDModal"));

        if (loginModal) loginModal.hide(); // Cerrar modal de login si está abierto
        faceIDModal.show(); // Abrir FaceID

        startVideo(); // Iniciar cámara
        document.getElementById("captureFace").dataset.action = action;
    });
});

// Evento al hacer clic en "Guardar FacialID"
document.getElementById("captureFace").addEventListener("click", async () => {
    const action = document.getElementById("captureFace").dataset.action;
    const faceIDModal = bootstrap.Modal.getInstance(document.getElementById("faceIDModal"));

    try {
        const detections = await faceapi
            .detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceDescriptor();

        if (!detections) throw new Error("No se detectó ningún rostro.");

        const descriptor = detections.descriptor;

        // Validar que el descriptor no esté vacío
        if (!descriptor || descriptor.length === 0) {
            throw new Error("No se pudo capturar un descriptor facial válido.");
        }

        if (action === "capture") {
            saveDescriptor(descriptor);
        } else if (action === "login") {
            const response = await fetch('/face-authenticate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ descriptor }),
            });

            if (!response.ok) {
                throw new Error("Error al enviar la solicitud al servidor.");
            }

            const result = await response.json();

            if (result.status === 'success') {
                faceIDModal.hide(); // Cerrar modal FaceID
                window.location.href = result.redirect;
            } else {
                throw new Error(result.message || "No pudimos autenticarlo.");
            }
        }
    } catch (err) {
        console.error("Error en FaceID:", err);
        const validationMessage = document.getElementById("facialMessage");
        validationMessage.innerHTML = `
            <span class="text-danger">
                ${action === "capture" ? 
                    "No pudimos capturar su FaceID. Asegúrese de que su rostro esté bien alineado con la cámara." : 
                    "No pudimos autenticarlo. Inténtelo nuevamente."
                } 
                <br><small>${err.message}</small>
            </span>
        `;
    }
});

// Evento al cerrar el modal
// Manejar el cierre del modal de FaceID y asegurar el foco
document.getElementById("faceIDModal").addEventListener("hidden.bs.modal", () => {
    const validationMessage = document.getElementById("facialMessage");
    if (!document.querySelector("[name='face_descriptor']")) {
        validationMessage.innerHTML =
            '<span class="text-danger">No pudimos capturar su FaceID.</span>';
    }
    stopVideo(); // Detener la cámara
});