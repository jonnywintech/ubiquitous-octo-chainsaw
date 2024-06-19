<?php

declare(strict_types=1);

namespace App\Core\View;

class View
{
    public static function render(string $view, array $data = []): string
    {
        $view = str_replace('.', '/', $view);

        extract($data);

        ob_start();
        require __DIR__ . '/../../View/' . $view . '.php';
        $content = ob_get_clean();

        
        ob_start();
        require __DIR__ . '/../../View/Template/Bootstrap.php';
        $base_view = ob_get_clean();

        $output = str_replace('{{content}}', $content, $base_view);

        return $output;
    }
}