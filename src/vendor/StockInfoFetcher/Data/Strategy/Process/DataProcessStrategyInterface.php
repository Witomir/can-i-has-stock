<?php
    namespace StockInfoFetcher\Data\Strategy\Process;

    /**
     * Klasa używana do przetworzenia danych ze źródła danych dla hydratora
     * Interface DataProcessStrategyInterface
     * @package StockInfoFetcher\Data\Strategy\Process
     */
    interface DataProcessStrategyInterface
    {

        /**
         * Ustawia config obiektu
         * @param $config
         * @return mixed
         */
        public function setConfig($config);

        /**
         * Przetwarza dane o akcjach i zwraca je w postaci zjadliwej dla DataHydrationStrategyInterface::hydrate()
         * @return array|mixed
         */
        public function processData($data);
    }