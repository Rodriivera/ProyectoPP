

        //   original   / /

//     const ctx2 = document.getElementById('pie-chart').getContext('2d');         
// const myChart = new Chart(ctx2, {
//     type: 'pie',
//     data: {
//         labels: [
//             'Fragancias',
//             'Maquillaje',
//             'Faciales',
//             'Capilares',
//             'Personales',
//             'Regaleria',
//             'Hogar',
//             'Accesorios',
//         ],
//         datasets: [{
//             label: 'Ventas totales $',
//             data: [300, 50, 100,300, 50, 100,300, 50],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.4)',
//                 'rgba(255, 159, 64, 0.4)',
//                 'rgba(255, 205, 86, 0.4)',
//                 'rgba(75, 192, 192, 0.4)',
//                 'rgba(54, 162, 235, 0.4)',
//                 'rgba(153, 102, 255, 0.4)',
//                 'rgba(201, 203, 207, 0.4)',
//                 'rgba(201, 33, 807, 0.4)'
//             ],
            
//         }]
//     },
//     options: {
//         title: {
//             display: true,
//             text: "Pie chart"
//         },
//         responsive: true
//     }
// });

 

document.addEventListener('DOMContentLoaded', function() {
    const ctx2 = document.getElementById('pie-chart').getContext('2d');
    
    fetch('../admin_folder/datos_chart_pie.php') // Cambia esta ruta al archivo PHP
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const myChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Ventas totales $',
                        data: data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(255, 159, 64, 0.4)',
                            'rgba(255, 205, 86, 0.4)',
                            'rgba(75, 192, 192, 0.4)',
                            'rgba(54, 162, 235, 0.4)',
                            'rgba(153, 102, 255, 0.4)',
                            'rgba(201, 203, 207, 0.4)',
                            'rgba(201, 33, 807, 0.4)'
                        ],
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Gráfico de Pie"
                    },
                    responsive: true
                }
            });
        })
        .catch(error => console.error('Error al obtener los datos:', error));
});