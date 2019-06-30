<?php 

class Hash

{


	public static function makehash($string)

	{
		return hash('sha256', $string);
	}

}