<?php

namespace App\Helpers;

use Carbon\Carbon;

trait Formater
{
	/**
	* Take a timestamp string and return carbon instance
	*
	* @param string $timestamp
	* @return Carbon\Carbon
	*/
	public function timestamp($timestamp = null)
	{
		// Check if null, if so return null
		if ( is_null($timestamp) ) {
			return null;
		}

		return Carbon::parse( $timestamp );
	}

	public function timestampInput($timestamp = null)
	{
		// Check if null, if so return null
		if ( is_null($timestamp) ) {
			return null;
		}

		return $timestamp->format( 'm/d/Y H:i' );
	}
}