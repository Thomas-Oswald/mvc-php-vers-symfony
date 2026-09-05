<?php

declare(strict_types=1);

class HomeController
{
    public function index(): void
    {
        require dirname(__DIR__, 2) . '/templates/home/index.php';

    }
}