
const ctx = document.getElementById('myChart');

fetch('../admin_folder/datos_chart_bar.php') // Cambia esta ruta al archivo PHP
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Aquí ya puedes usar 'data'
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Ventas $',
                    data: data.data, // Asegúrate de que 'data' tenga la estructura correcta
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.3)',
                        'rgba(255, 159, 64, 0.3)',
                        'rgba(255, 205, 86, 0.3)',
                        'rgba(75, 192, 192, 0.3)',
                        'rgba(54, 162, 235, 0.3)',
                        'rgba(153, 102, 255, 0.3)',
                        'rgba(201, 203, 207, 0.3)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Hubo un problema con la petición Fetch:', error);
    });


   

//   document.addEventListener('DOMContentLoaded', function() {
//     const ctx2 = document.getElementById('pie-chart').getContext('2d');
    
//     fetch('../admin_folder/datos_chart_pie.php') // Cambia esta ruta al archivo PHP
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             const myChart = new Chart(ctx2, {
//                 type: 'pie',
//                 data: {
//                     labels: data.labels,
//                     datasets: [{
//                         label: 'Ventas totales $',
//                         data: data.data,
//                         backgroundColor: [
//                             'rgba(255, 99, 132, 0.4)',
//                             'rgba(255, 159, 64, 0.4)',
//                             'rgba(255, 205, 86, 0.4)',
//                             'rgba(75, 192, 192, 0.4)',
//                             'rgba(54, 162, 235, 0.4)',
//                             'rgba(153, 102, 255, 0.4)',
//                             'rgba(201, 203, 207, 0.4)',
//                             'rgba(201, 33, 807, 0.4)'
//                         ],
//                     }]
//                 },
//                 options: {
//                     title: {
//                         display: true,
//                         text: "Gráfico de Pie"
//                     },
//                     responsive: true
//                 }
//             });
//         })
//         .catch(error => console.error('Error al obtener los datos:', error));
// });