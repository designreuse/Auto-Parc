<?php

class ctrl {
	
	public static function vide ($sValue) {
		if (!isset ($sValue) || empty ($sValue)) 
		{
		return true;
		}
		else 
		{
		return false;
		}
	}
		public static function no_vide ($sValue) 
			{
			
			if (!isset ($sValue) || empty ($sValue)) 
				{
					return false;
				}
			else 
					{
						return true;
					}
			}
	
	public static function isEmail ($email) {
		if (preg_match("#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#", $email)) 
			{ 
				return true;
			}
			
	}

	public static function no_Email ($email) {
		if (!preg_match("#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#", $email)) 
			{ 
				return true;
			}
			
	}
	
	public static function isAlpha ($sValue) {
		if (preg_match ('#([^a-z])#i', $sValue) == 0) 
		{
		return false;
		}
	}

	
	public static function isAlphanumeric ($sValue) {
		return (preg_match ('#([^a-z0-9])#i', $sValue) == 0) ? true : false;
	}

	
	public static function isNumeric ($sValue) {
		 if(preg_match ('#([^0-9])#', $sValue) == 0) {
		return true;
	}}

	public static function maxLength ($mValue, $iLength) {
		if (is_int ($mValue))
			return ($mValue > $iLength) ? false : true;
		else if (is_string ($mValue))
			return (strlen($mValue) > $iLength) ? false : true;
	}

	
	public static function minLength ($mValue, $iLength) {
		if (is_int ($mValue))
			return ($mValue < $iLength) ? false : true;
		else if (is_string ($mValue))
			return (strlen($mValue) < $iLength) ? false : true;
	}
	
	public function noNCIN($value)
	{
		$x = strlen($value);
		if(( $x!=8) || (preg_match ('#([^0-9])#', $value) != 0) )
		{
			return true;
		}
		 
	}
	
	
	public function noTEL($value)
	{
		$x = strlen($value);
		if(( $x!=8) || (preg_match ('#([^0-9])#', $value) != 0) )
		{
			return true;
		}
		 
	}
	
	public static function rangeLength ($mValue, $aLengths) {
		if (is_int ($mValue))
			return ($mValue < $aLengths[0] || $mValue > $aLengths[1]) ? false : true;
		else if (is_string ($mValue))
			return (strlen($mValue) < $aLengths[0] || strlen($mValue) > $aLengths[1]) ? false : true;
	}

	
	public static function regex ($sValue, $sRegex) {
		return (preg_match ($sRegex, $sValue) != 0) ? false : true;
	}

	
	public static function callback ($sValue, $mCallback) {
		if (is_array ($mCallback)) {
			if (method_exists ($mCallback[0], $mCallback[1])) {
				return call_user_func ($mCallback, $sValue);
			}
			else
				return false;
		}
		else
			return $mCallback ($sValue);
	}

	public static function isEqual ($sValue, $mTest) {
		return ($sValue == $mTest) ? true : false;
	}

	
	public static function isNotEqual ($sValue, $mTest) {
		return ($sValue !== $mTest) ? true : false;
	}

	
	public static function hasExtension ($sValue, $mExtension) {
		$sExt = preg_replace ('`.*\.([^\.]*)$`', '$1', $sValue);
		if (is_string ($mExtension))
			$mExtension = array ($mExtension);

		return (in_array ($sExt, $mExtension)) ? true : false;
	}

	
	public static function isUrl ($sValue) {
		return (preg_match ('#^http[s]?://[a-z0-9./-]*[.]{1}[a-z0-9./-]*[/]{0,1}.*$#i', $sValue) == 0) ? false : true;
	}
}



?>
