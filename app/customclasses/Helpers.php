<?php 
class Helpers {
	public static function postWords($string, $numofwords) {
		$words = explode(' ', $string);
		if (count($words) > $numofwords) {
			$words = array_slice($words, 0, $numofwords);
			$string = implode(' ', $words);
		}
		return $string;
	}
}