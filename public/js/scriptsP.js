let elementoHTMLTPAYBUS = document.getElementById('TPAYBUS');

let elementoDeTypewriter = new Typewriter(elementoHTMLTPAYBUS, {
    loop: true
});

elementoDeTypewriter.typeString('Bienvenido a PAYBUS')
    .pauseFor(2500)
    .deleteAll()
    .typeString('Recarga fácil, viaja sin complicaciones.')
    .pauseFor(2500)
    .deleteAll()
    .typeString('¡Tu movilidad en tus manos!')
    .pauseFor(2500)
    .start();