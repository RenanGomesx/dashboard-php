<?php
require_once 'config.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

switch($action) {
    case 'product_stats':
        $stmt = $pdo->query("SELECT year, product_name, value FROM product_stats ORDER BY year, product_name");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $formatted_data = [
            'labels' => array_values(array_unique(array_column($data, 'year'))),
            'datasets' => []
        ];
        
        foreach(['Product A', 'Product B', 'Product C'] as $product) {
            $product_data = array_filter($data, function($row) use ($product) {
                return $row['product_name'] === $product;
            });
            
            $formatted_data['datasets'][] = [
                'label' => $product,
                'data' => array_column($product_data, 'value'),
                'backgroundColor' => $product === 'Product A' ? '#ffc107' : 
                                   ($product === 'Product B' ? '#dc3545' : '#0d6efd')
            ];
        }
        
        echo json_encode($formatted_data);
        break;

    case 'monthly_stats':
        $stmt = $pdo->query("SELECT month, percentage FROM monthly_stats ORDER BY id");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        break;

    case 'customer_stats':
        $stmt = $pdo->query("SELECT year, month, total_customers FROM customer_stats ORDER BY year, id");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $formatted_data = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => []
        ];
        
        foreach([2013, 2014] as $year) {
            $year_data = array_filter($data, function($row) use ($year) {
                return $row['year'] === $year;
            });
            
            $formatted_data['datasets'][] = [
                'label' => (string)$year,
                'data' => array_column($year_data, 'total_customers'),
                'borderColor' => $year === 2014 ? '#ffc107' : '#dc3545',
                'tension' => 0.4
            ];
        }
        
        echo json_encode($formatted_data);
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
}
?> 