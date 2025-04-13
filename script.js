document.addEventListener('DOMContentLoaded', function () {
    // Carregar dados do gráfico de barras
    fetch('get_data.php?action=product_stats')
        .then(response => response.json())
        .then(data => {
            new Chart(document.getElementById('barChart'), {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            stacked: true
                        },
                        x: {
                            stacked: true
                        }
                    }
                }
            });
        });

    // Função para criar gráficos circulares
    function createDoughnutChart(elementId, percentage) {
        return new Chart(document.getElementById(elementId), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#ffc107', '#f8f9fa'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%',
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });
    }

    // Carregar dados dos gráficos circulares
    fetch('get_data.php?action=monthly_stats')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const chartId = item.month.toLowerCase() + 'Chart';
                createDoughnutChart(chartId, item.percentage);
            });
        });

    // Carregar dados do gráfico de linha
    fetch('get_data.php?action=customer_stats')
        .then(response => response.json())
        .then(data => {
            new Chart(document.getElementById('lineChart'), {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });
        });
}); 