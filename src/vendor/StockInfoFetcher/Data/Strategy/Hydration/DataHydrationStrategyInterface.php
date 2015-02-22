<?php
    namespace StockInfoFetcher\Data\Strategy\Hydration;

    /**
     * Interfejs klas które na podstawie danych zwróconych przez processor
     * potrafią zwrócić obiekty
     * Interface DataHydrationStrategyInterface
     * @package StockInfoFetcher\Data\Strategy\Hydration
     */
    interface DataHydrationStrategyInterface
    {

        /**
         * Ustawia config obiektu
         * @param $config
         * @return mixed
         */
        public function setConfig($config);

        /**
         * Przyjmuje rzetwarzone dane o akcjach wypełnia nimi obiekty
         * @return array|mixed
         */
        public function hydrate($data);
    }