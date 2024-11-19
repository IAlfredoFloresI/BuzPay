document.addEventListener("DOMContentLoaded", async () => {
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
    loadFaceModels();
});
