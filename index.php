<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual.is Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid p-4">
        <nav class="navbar mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4>Visual.is</h4>
                </a>
            </div>
        </nav>

        <div class="row">
            <!-- Gráfico de Barras -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistics</h5>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grid de Gráficos Circulares -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h5>Beautiful Graphics Every Time</h5>
                    </div>
                    <?php
                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 
                              'July', 'August', 'September', 'October', 'November', 'December'];
                    
                    foreach ($months as $month) {
                        $chartId = strtolower($month) . 'Chart';
                        echo <<<HTML
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="{$chartId}"></canvas>
                                    <div class="text-center mt-2">{$month}</div>
                                </div>
                            </div>
                        </div>
                        HTML;
                    }
                    ?>
                </div>
            </div>

            <!-- Gráfico de Linha -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html> 