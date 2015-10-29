<?php

    namespace Gpw\View;

    /**
     * Model widoku, któremu można przypisywać zmienne i ustawić
     * templatkę która będzie renderowana
     * Class Model
     * @package Gpw\View
     */
    class Model
    {


        protected $templateName;
        protected $variables = [];

        /**
         * Ustawia wartość zmiennej widoku
         * @param $name
         * @param $value
         * @return $this
         */
        public function setVariable($name, $value)
        {
            $this->variables[$name] = $value;
            return $this;
        }

        /**
         * Pobiera wszstkie przypisane widokowi zmienne
         * @return array
         */
        public function getVariables()
        {
            return $this->variables;
        }

        /**
         * @return mixed
         */
        public function getTemplateName()
        {
            return str_replace('\\', DIRECTORY_SEPARATOR, $this->templateName);
        }

        /**
         * @param mixed $templateNeme
         * @return Model
         */
        public function setTemplateName($templateNeme)
        {
            $this->templateName = $templateNeme;
            return $this;
        }
    }