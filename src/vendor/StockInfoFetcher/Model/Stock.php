<?php

namespace StockInfoFetcher\Model;

/**
 * Class Stock
 * @package StockInfoFetcher\Model
 */
class Stock extends ModelAbstract{

	protected $abbreviation;
	protected $name;
	protected $lastTransactionPrice;
	protected $minimalRate;
	protected $maximalRate;
	protected $referencedPrice;
	protected $lastTranasactionTime;
	protected $transationNumber;
	protected $cumulativeTradingVolume;
	protected $cumulativeTradingValue;

	/**
	 * @return mixed
	 */
	public function getAbbreviation()
	{
		return $this->abbreviation;
	}

	/**
	 * @param mixed $abbreviation
	 * @return Stock
	 */
	public function setAbbreviation($abbreviation)
	{
		$this->abbreviation = $abbreviation;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCumulativeTradingValue()
	{
		return $this->cumulativeTradingValue;
	}

	/**
	 * @param mixed $cumulativeTradingValue
	 * @return Stock
	 */
	public function setCumulativeTradingValue($cumulativeTradingValue)
	{
		$this->cumulativeTradingValue = $cumulativeTradingValue;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCumulativeTradingVolume()
	{
		return $this->cumulativeTradingVolume;
	}

	/**
	 * @param mixed $cumulativeTradingVolume
	 * @return Stock
	 */
	public function setCumulativeTradingVolume($cumulativeTradingVolume)
	{
		$this->cumulativeTradingVolume = $cumulativeTradingVolume;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastTranasactionTime()
	{
		return $this->lastTranasactionTime;
	}

	/**
	 * @param mixed $lastTranasactionTime
	 * @return Stock
	 */
	public function setLastTranasactionTime($lastTranasactionTime)
	{
		$this->lastTranasactionTime = $lastTranasactionTime;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastTransactionPrice()
	{
		return $this->lastTransactionPrice;
	}

	/**
	 * @param mixed $lastTransactionPrice
	 * @return Stock
	 */
	public function setLastTransactionPrice($lastTransactionPrice)
	{
		$this->lastTransactionPrice = $lastTransactionPrice;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMaximalRate()
	{
		return $this->maximalRate;
	}

	/**
	 * @param mixed $maximalRate
	 * @return Stock
	 */
	public function setMaximalRate($maximalRate)
	{
		$this->maximalRate = $maximalRate;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMinimalRate()
	{
		return $this->minimalRate;
	}

	/**
	 * @param mixed $minimalRate
	 * @return Stock
	 */
	public function setMinimalRate($minimalRate)
	{
		$this->minimalRate = $minimalRate;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return Stock
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getReferencedPrice()
	{
		return $this->referencedPrice;
	}

	/**
	 * @param mixed $referencedPrice
	 * @return Stock
	 */
	public function setReferencedPrice($referencedPrice)
	{
		$this->referencedPrice = $referencedPrice;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTransationNumber()
	{
		return $this->transationNumber;
	}

	/**
	 * @param mixed $transationNumber
	 * @return Stock
	 */
	public function setTransationNumber($transationNumber)
	{
		$this->transationNumber = $transationNumber;
		return $this;
	}

    /**
     * Pobiera dane o spółce w formacie do eksportu CSV
     * @return array
     */
    public function getCsvData(){
        $csv = [
            $this->abbreviation,
            $this->name,
            $this->lastTransactionPrice,
            $this->minimalRate,
            $this->maximalRate,
            $this->referencedPrice,
            $this->lastTranasactionTime,
            $this->transationNumber,
            $this->cumulativeTradingVolume,
            $this->cumulativeTradingValue,
        ];
        return $csv;
    }

}