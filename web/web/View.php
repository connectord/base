<?php

class View
{

    public function __construct(private Web $web)
    {

    }

    public function render(string $viewFile, array $data = []): void
    {
        // We'll use output buffering to compile the final HTML
        ob_start();
        ob_clean(); // In case anything's already been written

        $filePath = $this->web->path('views/' . $viewFile . '.view.php');

        if (!file_exists($filePath)) {
            throw new \Exception("View file '{$filePath}' not found.");
        }

        // Make these available to the view
        extract($data);

        // Include the view file
        include $filePath;

        $viewContent = ob_get_clean();
        $layout = file_get_contents($this->web->path('views/layout.view.php'));

        // Parse out the title
        $titleMatch = [];
        $pageTitle = "Untitled";

        if (preg_match('/<!--TITLE=(.+?)-->/', $viewContent, $titleMatch)) {
            $pageTitle = $matches[1];
        }

        // Merge everything
        $finalContent = $layout;
        $finalContent = str_replace("%%TITLE%%", $pageTitle, $finalContent);
        $finalContent = str_replace("%%CONTENT%%", $viewContent, $finalContent);
        $finalContent = str_replace("%%PRODUCT_NAME%%", "connectord/base", $finalContent);
        $finalContent = str_replace($titleMatch[0], "", $finalContent);
        $finalContent = str_replace($titleMatch[0], "", $finalContent);

        echo $finalContent;

        // TODO: Anything else that has to happen before the request ends, but after this view renders

    }
}