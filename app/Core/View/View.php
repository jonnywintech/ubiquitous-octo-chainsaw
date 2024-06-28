<?php

declare(strict_types=1);

namespace App\Core\View;

class View
{
    /**
     * Render a view with optional data.
     *
     * @param string $view The view file path with . syntax if there are nested folders.
     * @param array $data Data to be extracted for the view.
     * @return string The rendered view.
     */
    public static function render(string $view, array $data = []): string
    {
        // Replace dots with slashes to support dot notation in view paths.
        $view = str_replace('.', '/', $view);

        // Extract the data array to variables.
        extract($data);

        // Get the layout content and the view content.
        $base_view = self::layoutContent();
        $content = self::viewOnly($view);

        // Replace the content placeholder in the layout with the actual content.
        $output = str_replace('{{content}}', $content, $base_view);

        return $output;
    }

    /**
     * Get the content of a view file.
     *
     * @param string $view The view file path.
     * @return string The view content.
     */
    protected static function viewOnly(string $view): string
    {
        ob_start();
        require_once rootDir() . "/app/views/{$view}.php";
        return ob_get_clean();
    }

    /**
     * Get the content of the layout file.
     *
     * @param string $layout The layout file name.
     * @return string The layout content.
     */
    protected static function layoutContent(string $layout = 'bootstrap'): string
    {
        ob_start();
        require_once rootDir() . "/app/views/template/{$layout}.php";
        return ob_get_clean();
    }
}
