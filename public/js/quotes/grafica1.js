document.addEventListener('DOMContentLoaded', () => {

    // ------------------------------
    // 1️⃣ Recibimos los datos desde Laravel
    // ------------------------------
    // La variable $retorno viene del controlador con formato JSON
    // Ejemplo:
    // {
    //   "1": {"KW": 2676, "COP": 2171129.79, "RETORNO": 67969430.21},
    //   "2": {"KW": 5352, "COP": 4342259.58, "RETORNO": 65798300.42}
    // }

    // ------------------------------
    // 2️⃣ Preparamos los datos para Chart.js
    // ------------------------------
    // Extraemos las claves (1, 2, 3, ...) que representan los meses
    const labels = Object.keys(data);

    // Creamos arrays con los valores de KW y COP
    const kwh = labels.map(key => data[key].kw);
    const cop = labels.map(key => data[key].cop);
    const retorno = labels.map(key => data[key].retorno);

    // ------------------------------
    // 3️⃣ Obtenemos el contexto del canvas
    // ------------------------------
    const ctx = document.getElementById('grafica').getContext('2d');
    const ctz = document.getElementById('grafica2').getContext('2d');

    // ------------------------------
    // 4️⃣ Creamos la gráfica combinada (Barras + Línea)
    // ------------------------------
    const chartCOP = new Chart(ctx, {
        type: 'bar', // tipo base del gráfico

        data: {
            // Etiquetas del eje X (meses)
            labels: labels.map(mes => `Mes ${mes}`),

            // Datasets = grupos de datos
            datasets: [
                {
                    // --- Dataset 1: KW/H (Barras) ---
                    label: 'KW/H Mensual Acumulado',
                    data: kwh, // valores de KW
                    backgroundColor: 'rgba(192, 57, 43, 0.7)', // color de relleno (rojo)
                    borderColor: '#c0392b', // borde
                    borderWidth: 1,
                    yAxisID: 'y1', // se asocia al eje izquierdo (KW)
                },
                {
                    // --- Dataset 2: COP (Línea) ---
                    label: 'COP Mensual Acumulado',
                    data: cop, // valores de COP
                    type: 'line', // tipo de gráfico: línea
                    borderColor: '#27ae60', // verde
                    backgroundColor: 'rgba(39, 174, 96, 0.2)', // relleno transparente
                    tension: 0.3, // suaviza la curva
                    fill: false, // sin relleno debajo de la línea
                    yAxisID: 'y2', // eje derecho (COP)
                }
            ]
        },

        // ------------------------------
        // 5️⃣ Configuración general
        // ------------------------------
        options: {
            responsive: true, // ajusta a la pantalla
            interaction: {
                mode: 'index', // muestra tooltip para todos los datasets
                intersect: false,
            },
            plugins: {
                // --- Título del gráfico ---
                title: {
                    display: true,
                    text: 'KW/H y COP Mensual Acumulado',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                },

                // --- Tooltip personalizado ---
                tooltip: {
                    callbacks: {
                        // Formateamos el texto del tooltip
                        label: function (context) {
                            // Si el dataset es COP, mostramos con formato de moneda
                            if (context.dataset.label.includes('COP')) {
                                return context.dataset.label + ': $' + context.parsed.y.toLocaleString('es-CO');
                            }
                            // Si es KW/H, mostramos número normal
                            return context.dataset.label + ': ' + context.parsed.y.toLocaleString('es-CO');
                        }
                    }
                },

                // --- Leyenda (parte inferior) ---
                legend: {
                    position: 'bottom'
                }
            },

            // --- Configuración de los ejes ---
            scales: {
                // Eje X (Meses)
                x: {
                    title: {
                        display: true,
                        text: 'MESES'
                    }
                },

                // Eje Y izquierdo (KW/H)
                y1: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'KW/H'
                    },
                    ticks: {
                        // Formateo del eje Y (izquierdo)
                        callback: function (value) {
                            return value.toLocaleString('es-CO');
                        }
                    }
                },

                // Eje Y derecho (COP)
                y2: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'PESOS COP'
                    },
                    ticks: {
                        // Formateo del eje Y (derecho)
                        callback: function (value) {
                            return '$' + value.toLocaleString('es-CO');
                        }
                    },
                    grid: {
                        drawOnChartArea: false, // evita que el grid se duplique
                    }
                }
            }
        }
    });
    const chartRetorno = new Chart(ctz, {
        type: 'bar', // tipo base del gráfico

        data: {
            // Etiquetas del eje X (meses)
            labels: labels.map(mes => `Mes ${mes}`),

            // Datasets = grupos de datos
            datasets: [
                {
                    // --- Dataset 1: KW/H (Barras) ---
                    label: 'Retorno Inversión',
                    data: retorno, // valores de KW
                    backgroundColor: 'rgba(192, 57, 43, 0.7)', // color de relleno (rojo)
                    borderColor: '#c0392b', // borde
                    borderWidth: 1,
                    yAxisID: 'y1', // se asocia al eje izquierdo (KW)
                },
                {
                    // --- Dataset 2: COP (Línea) ---
                    label: 'COP Mensual Acumulado',
                    data: cop, // valores de COP
                    backgroundColor: 'rgba(155, 187, 89, 0.7)', // color de relleno (rojo)
                    borderColor: '#9BBB59', // borde
                    borderWidth: 1,
                    yAxisID: 'y1', // eje derecho (COP)
                }
            ]
        },

        // ------------------------------
        // 5️⃣ Configuración general
        // ------------------------------
        options: {
            responsive: true, // ajusta a la pantalla
            interaction: {
                mode: 'index', // muestra tooltip para todos los datasets
                intersect: false,
            },
            plugins: {
                // --- Título del gráfico ---
                title: {
                    display: true,
                    text: 'RETORNO DE LA INVERSION SIN INCENTIVOS UPME VS COP MENSUAL ACUMULADO',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                },

                // --- Tooltip personalizado ---
                tooltip: {
                    callbacks: {
                        // Formateamos el texto del tooltip
                        label: function (context) {
                            // Si el dataset es COP, mostramos con formato de moneda
                            if (context.dataset.label.includes('COP')) {
                                return context.dataset.label + ': $' + context.parsed.y.toLocaleString('es-CO');
                            }
                            // Si es KW/H, mostramos número normal
                            return context.dataset.label + ': ' + context.parsed.y.toLocaleString('es-CO');
                        }
                    }
                },

                // --- Leyenda (parte inferior) ---
                legend: {
                    position: 'bottom'
                }
            },

            // --- Configuración de los ejes ---
            scales: {
                // Eje X (Meses)
                x: {
                    title: {
                        display: true,
                        text: 'MESES'
                    }
                },

                // Eje Y izquierdo (KW/H)
                y1: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'KW/H'
                    },
                    ticks: {
                        // Formateo del eje Y (izquierdo)
                        callback: function (value) {
                            return value.toLocaleString('es-CO');
                        }
                    }
                },
            }
        }
    });
    
    document.getElementById('approveForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const chart1Image = document.getElementById('grafica').toDataURL('image/png');
        const chart2Image = document.getElementById('grafica2').toDataURL('image/png');

        document.getElementById('chart1').value = chart1Image;
        document.getElementById('chart2').value = chart2Image;

        e.target.submit();
    });


});
