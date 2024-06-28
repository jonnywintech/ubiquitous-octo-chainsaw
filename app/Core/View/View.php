<?php

declare(strict_types=1);

namespace App\Core\View;

class View
{
    public static function render(string $view, array $data = []): string
    {
        $view = str_replace('.', '/', $view);

        extract($data);

        $base_view = self::layoutContent();
        $content = self::viewOnly($view);
        $output = str_replace('{{content}}', $content, $base_view);

        return $output;
    }

    protected static function viewOnly(string $view): mixed
    {
        ob_start();
        require_once rootDir() . "/app/View/{$view}.php";
        return ob_get_clean();
    }

    protected static function layoutContent(string $layout = 'Bootstrap'): mixed
    {
        ob_start();
        require_once rootDir() . "/app/View/Template/{$layout}.php";
        return ob_get_clean();
    }
}
