document.addEventListener('DOMContentLoaded', function() {
// Datos ficticios para el gráfico de línea
const data = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
    datasets: [
      {
        label: 'Entrantes',
        borderColor: '#27ae60',
        data: [10, 15, 20, 18, 25, 30],
      },
      {
        label: 'Salientes',
        borderColor: '#e74c3c',
        data: [8, 12, 14, 10, 15, 18],
      },
      {
        label: 'Solicitudes',
        borderColor: '#3498db',
        data: [5, 8, 12, 9, 10, 7],
      },
    ],
  };
  
  // Configuración del gráfico
  const config = {
    type: 'line',
    data: data,
    options: {
      scales: {
        x: {
          type: 'category',
          labels: data.labels,
        },
        y: {
          beginAtZero: true,
        },
      },
    },
  };
  
  // Crear el gráfico de línea
  const ctx = document.getElementById('line-chart').getContext('2d');
  new Chart(ctx, config);
});



