<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Controller\ProductController;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

$homeController = new HomeController();
$productController = new ProductController();

if ($method === 'GET' && $path === '/') {
    $homeController->index();
} elseif ($method === 'GET' && $path === '/products') {
    $sort = $_GET['sort'] ?? 'id';

    $productController->index($sort);
} elseif (
    $method === 'GET'
    && preg_match('#^/products/(\d+)$#', $path, $matches)
) {
    $id = (int) $matches[1];

    $productController->show($id);
} else {
    http_response_code(404);
    echo 'Page non trouvée';
}