<?php

declare(strict_types=1);

class ProductController
{
    public function index(string $sort): void
    {
        require dirname(__DIR__, 2) . '/templates/product/index.php';
    }

    public function show(int $id): void
    {
        require dirname(__DIR__, 2) . '/templates/product/show.php';
    }
}