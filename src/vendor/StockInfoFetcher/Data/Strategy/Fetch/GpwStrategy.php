<?php

namespace StockInfoFetcher\Data\Strategy\Fetch;

/**
 * Class StockInfoFetcherStrategy
 * @package StockInfoFetcher\Data\Strategy\Fetch
 */
class GpwStrategy implements DataFetchingStrategyInterface{

	/**
	 * @var array
	 */
	protected $config;

	/**
	 * Pobiera całą zawartość strony CURLem
	 * @return string źródło strony, którą pobrano
	 */
	public function fetchData()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->config['url']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if(!empty($this->config['extra_curl_options'])){
			curl_setopt_array($ch, $this->config['extra_curl_options']);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
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
}