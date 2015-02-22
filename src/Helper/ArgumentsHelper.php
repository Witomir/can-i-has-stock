<?php

namespace Gpw\Helper;

/**
 * Helper filtrujący argumenty z którymi została wywołana aplikacja
 * Class ArgumentsHelper
 * @package Gpw\Helper
 */
class ArgumentsHelper {

	/**
	 * Filtruje argumenty skryptu, pobiera tylko unikalne
	 * @param $phpArgs
	 * @return array
	 */
	public function getUniqueArguments(array $phpArgs){
		if(count($phpArgs) <= 1) {
			return [];
		} else {
			unset($phpArgs[0]);
			$phpArgs = array_unique($phpArgs);
			return $phpArgs;
		}
	}
}