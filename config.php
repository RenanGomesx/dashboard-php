<?php
$host = 'localhost';
$dbname = 'dashboard';
$username = 'root';
$password = '';

try {
    // Primeiro, conecta sem selecionar o banco de dados
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Tenta criar o banco de dados se não existir
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    
    // Seleciona o banco de dados
    $pdo->exec("USE `$dbname`");
    
    // Cria as tabelas se não existirem
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS product_stats (
            id INT AUTO_INCREMENT PRIMARY KEY,
            year INT NOT NULL,
            product_name VARCHAR(50) NOT NULL,
            value DECIMAL(10,2) NOT NULL
        );

        CREATE TABLE IF NOT EXISTS monthly_stats (
            id INT AUTO_INCREMENT PRIMARY KEY,
            month VARCHAR(20) NOT NULL,
            percentage INT NOT NULL
        );

        CREATE TABLE IF NOT EXISTS customer_stats (
            id INT AUTO_INCREMENT PRIMARY KEY,
            year INT NOT NULL,
            month VARCHAR(20) NOT NULL,
            total_customers INT NOT NULL
        );
    ");

    // Verifica se as tabelas estão vazias e insere dados de exemplo
    $stmt = $pdo->query("SELECT COUNT(*) FROM product_stats");
    if ($stmt->fetchColumn() == 0) {
        // Inserir dados de exemplo para produtos
        $pdo->exec("
            INSERT INTO product_stats (year, product_name, value) VALUES 
            (2011, 'Product A', 4000),
            (2011, 'Product B', 3000),
            (2011, 'Product C', 2500),
            (2012, 'Product A', 3800),
            (2012, 'Product B', 2800),
            (2012, 'Product C', 2400),
            (2013, 'Product A', 4200),
            (2013, 'Product B', 2900),
            (2013, 'Product C', 2600),
            (2014, 'Product A', 4500),
            (2014, 'Product B', 3000),
            (2014, 'Product C', 2700)
        ");

        // Inserir dados de exemplo para estatísticas mensais
        $pdo->exec("
            INSERT INTO monthly_stats (month, percentage) VALUES 
            ('January', 69),
            ('February', 78),
            ('March', 65),
            ('April', 84),
            ('May', 39),
            ('June', 55),
            ('July', 61),
            ('August', 43),
            ('September', 81),
            ('October', 94),
            ('November', 45),
            ('December', 100)
        ");

        // Inserir dados de exemplo para clientes
        $pdo->exec("
            INSERT INTO customer_stats (year, month, total_customers) VALUES 
            (2013, 'Jan', 2400),
            (2013, 'Feb', 2500),
            (2013, 'Mar', 2700),
            (2013, 'Apr', 2800),
            (2013, 'May', 2900),
            (2013, 'Jun', 3000),
            (2013, 'Jul', 3100),
            (2013, 'Aug', 3200),
            (2013, 'Sep', 3300),
            (2013, 'Oct', 3400),
            (2013, 'Nov', 3500),
            (2013, 'Dec', 3600),
            (2014, 'Jan', 2500),
            (2014, 'Feb', 2600),
            (2014, 'Mar', 2800),
            (2014, 'Apr', 2900),
            (2014, 'May', 3000),
            (2014, 'Jun', 3100),
            (2014, 'Jul', 3200),
            (2014, 'Aug', 3300),
            (2014, 'Sep', 3400),
            (2014, 'Oct', 3500),
            (2014, 'Nov', 3600),
            (2014, 'Dec', 3750)
        ");
    }

} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    die();
}
?> 