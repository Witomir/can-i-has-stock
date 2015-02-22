<?php
    namespace StockInfoFetcher\Model\Factory;

    /**
     * Fabryka obiektów Stock
     * Class GpwStockFactory
     * @package StockInfoFetcher\Model\Factory
     */
    class GpwStockFactory extends FactoryAbstract
    {

        protected $modelClass = '\StockInfoFetcher\Model\Stock';

        /**
         * Nie tłumaczyłem wszyskich pól...
         * @var array
         */
        protected $fieldMapping = [
            0 => '',
            1 => '',
            2 => 'name',
            3 => 'abbreviation',
            4 => 'currency',
            5 => 'lastTranasactionTime',
            6 => 'referencedPrice',
            7 => 'tko',
            8 => 'openingRate',
            9 => 'minimalRate',
            10 => 'maximalRate',
            11 => 'lastTransactionPrice',
            12 => 'zmDoKonca',
            13 => 'kupnoLiczbaZlecen',
            14 => 'kupnoVolumen',
            15 => 'kupnoLimit',
            16 => 'sprzedazLimit',
            17 => 'sprzedazVolumen',
            18 => 'sprzedazLiczbaZlecen',
            19 => 'lastTransactionPrice',
            20 => 'transationNumber',
            21 => 'cumulativeTradingVolume',
            22 => 'cumulativeTradingValue',
        ];

        /**
         * @param $arrayModel
         * @return \StockInfoFetcher\Model\Stock
         */
        public function createFromArray($arrayModel)
        {
            $mappedArray = $this->remapArray($arrayModel);
            $stockModel = new $this->modelClass();
            return $stockModel->setOptions($mappedArray);
        }

        /**
         * @param string $modelClass
         * @return GpwStockFactory
         */
        public function setModelClass($modelClass)
        {
            $this->modelClass = $modelClass;
            return $this;
        }

    }