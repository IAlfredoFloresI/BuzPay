let elementoHTMLTPAYBUS = document.getElementById('TPAYBUS');

let elementoDeTypewriter = new Typewriter(elementoHTMLTPAYBUS, {
    loop: true
});

elementoDeTypewriter.typeString('Bienvenido a PAYBUS')
    .pauseFor(3500)
    .deleteAll()
    .typeString('Recarga fácil,')
    .pauseFor(1500)
    .deleteAll()
    .typeString('Viaja sin complicaciones.')
    .pauseFor(1500)
    .deleteAll()
    .typeString('¡Tu movilidad en tus manos!')
    .pauseFor(2500)
    .start();