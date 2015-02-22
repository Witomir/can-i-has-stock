<?php

    namespace Gpw\View;

    /**
     * Renderuje widoki aplikacji
     * Class Renderer
     * @package Gpw\View
     */
    class Renderer
    {

        /**
         * Renderuje widok
         * @param Model $view
         * @return string
         */
        public function render(\Gpw\View\Model $view)
        {
            @ob_clean();
            extract($view->getVariables());
            ob_start();
            require_once($this->getTemplatePath($view->getTemplateName()));
            $output = ob_get_contents();
            ob_clean();
            return $output;
        }

        /**
         * Pobiera ścieżkę do templatki widoku
         * @param $templateName
         * @return string
         */
        private function getTemplatePath($templateName)
        {
            return APP_PATH . $templateName;
        }
    }