<?php
namespace StockInfoFetcher\Model;

/**
 * Abstrakcyjna klasa dla modeli aplikacji
 * Class ModelAbstract
 * @package StockInfoFetcher\Model
 */
abstract class ModelAbstract {

	/**
	 * Ustawia pola odpowiadające obiektowi z przekazanej tablicy
	 * @param array $options tablica postaci pole_obiektu => wartość_pola
	 * @return $this
	 */
	public function setOptions($options)
	{
		foreach ($options as $key => $value) {
			if(property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
		return $this;
	}

}