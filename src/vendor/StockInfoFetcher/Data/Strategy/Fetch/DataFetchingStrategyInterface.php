<?php
namespace StockInfoFetcher\Data\Strategy\Fetch;

/**
 * Interfejs klasy która powinna pobrać dane z zewnętrznego źródła i
 * zwrócić w jakiejś już uproszczonej formie dla processora danych
 * Interface DataFetchingStrategyInterface
 * @package StockInfoFetcher\Data\Strategy\Fetch
 */
interface DataFetchingStrategyInterface {

	/**
	 * Ustawia config obiektu
	 * @param $config
	 * @return mixed
	 */
	public function setConfig($config);

	/**
	 * Pobiera dane o akcjach i zwraca je w postaci zjadliwej dla DataProcessStrategyInterface::processData()
	 * @return string|mixed
	 */
	public function fetchData();
} 