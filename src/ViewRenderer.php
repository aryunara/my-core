<?php

namespace src;

class ViewRenderer
{
    public function render(string $view, array $params, bool $isLayout) : string
    {
        ob_start();

        extract($params);

        require_once "./../View/$view";

        $content = ob_get_clean();

        if ($isLayout) {
            $layout = file_get_contents('./../View/layouts/navigation.phtml');

            return str_replace("{{content}}", $content, $layout);
        }
        
        return $content;
    }

}