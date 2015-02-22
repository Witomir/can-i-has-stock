<?php
    namespace StockInfoFetcher\Model\Factory;

    /**
     * Abstrakcyjna klasa fabryki
     * Class FactoryAbstract
     * @package StockInfoFetcher\Model\Factory
     */
    abstract class FactoryAbstract
    {


        /**
         * Klasa której instancję powołujemy do życia
         * @var string
         */
        protected $modelClass = '';

        /**
         * Mapowanie pól w tabeli na stronie
         * @var array
         */
        protected $fieldMapping = [];

        /**
         * Powołuje do życia model
         * @param $arrayModel
         * @return \StockInfoFetcher\Model\Stock
         */
        abstract public function createFromArray($arrayModel);

        /**
         * Mapuje tablicę o kluczach liczbowych na odpowiadające im nazwy pól w klasie modelu
         * @param $arrayModel
         * @return array
         */
        protected function remapArray($arrayModel)
        {
            $mappedArray = [];
            foreach ($arrayModel as $cellPosition => $value) {
                if (isset($this->fieldMapping[$cellPosition])) {
                    $mappedArray[$this->fieldMapping[$cellPosition]] = $value;
                }
            }
            return $mappedArray;
        }

    }