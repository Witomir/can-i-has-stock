<?php

    namespace StockInfoFetcher\Data\Strategy\Hydration;

    /**
     * Class GpwStrategy
     * @package StockInfoFetcher\Data\Strategy\Hydration
     */
    class GpwStrategy implements DataHydrationStrategyInterface
    {

        /**
         * Config hydratora
         * @var array
         */
        protected $config;

        /**
         * Metoda ma za zadanie stworzyć pełne obiekty z tablicy tablic informacji o nich
         * @param array $data
         * @return \StockInfoFetcher\Model\Stock[]
         */
        public function hydrate($data)
        {
            $models = [];
            $factory = $this->getFactory();
            foreach ($data as $stockAsArray) {
                $models[] = $factory->createFromArray($stockAsArray);
            }
            return $models;
        }

        /**
         * @param $config
         * @return $this
         */
        public function setConfig($config)
        {
            $this->config = $config;
            return $this;
        }

        /**
         * Powołuje do życia fabrykę obiektów
         * @return \StockInfoFetcher\Model\Factory\GpwStockFactory
         */
        protected function getFactory()
        {
            $factoryClass = $this->config['data_hydration']['factory'];
            /** @var \StockInfoFetcher\Model\Factory\GpwStockFactory $factory */
            $factory = new $factoryClass();
            $factory->setModelClass($this->config['data_hydration']['model']);
            return $factory;
        }
    }