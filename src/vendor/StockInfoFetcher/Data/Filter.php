<?php

    namespace StockInfoFetcher\Data;

    /**
     * Klasa wspomagająca filtrowanie zbiorów obiektów
     * Class Filter
     * @package StockInfoFetcher\Data
     */
    class Filter
    {

        /**
         * Dane które będą filtrowane
         * @var array
         */
        protected $data = [];

        /**
         * Filtruje zbiór obiektów
         * @param string $fieldName nazwa pola które będziemy porównywać
         * @param string|array $filterValues wartość filtra
         * @return array tablica obiektów spełniających kryteria
         */
        public function filterBy($fieldName, $filterValues)
        {
            $dataFiltered = [];
            foreach ($this->data as $object) {
                $method = 'get' . ucfirst($fieldName);
                if (method_exists($object, $method)) {
                    $fieldValue = $object->$method();
                    if (is_string($filterValues)) {
                        if ($fieldValue === $filterValues) {
                            $dataFiltered[] = $object;
                        }
                    } elseif (is_array($filterValues)) {
                        if (in_array($fieldValue, $filterValues)) {
                            $dataFiltered[] = $object;
                        }
                    }
                }
            }
            return $dataFiltered;
        }

        /**
         * @param array $data
         * @return Filter
         */
        public function setData($data)
        {
            $this->data = $data;
            return $this;
        }
    }