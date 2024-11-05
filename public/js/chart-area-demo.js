// Fetch data from the controller
fetch('estadistica_controller.php?action=get_recargas')
    .then(response => response.json())
    .then(data => {
        const fechas = data.recargas.map(item => item.fecha);
        const recargas = data.recargas.map(item => item.num_recargas);
        const maxRecarga = data.max_recarga;

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [{
                    label: "Recargas",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: recargas,
                }, {
                    label: "Día con más recargas",
                    data: recargas.map((recarga, index) => fechas[index] === maxRecarga.fecha ? recarga : null),
                    backgroundColor: "rgba(255,0,0,0.2)",
                    borderColor: "rgba(255,0,0,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255,0,0,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(255,0,0,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: Math.max(...recargas) + 1, // Ajusta el máximo según tus datos
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var dataset = chart.datasets[tooltipItem.datasetIndex];
                            var label = dataset.label || '';

                            if (label) {
                                label += ': ';
                            }
                            label += tooltipItem.yLabel;
                            if (dataset.label === "Día con más recargas") {
                                label += ' (Día con más recargas)';
                            }
                            return label;
                        }
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error:', error));
