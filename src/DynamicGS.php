<?php
/**
 * PHP version 7.X
 * PACKAGE: DynamicGS
 * VERSION: 1.0
 * LICENSE: Apache License 2.
 * Usage: extends to this class your Getter & Setter class
 * @author     Marco iosif Constantinescu <info@widevel.com>
*/
namespace Widevel\DynamicGS;

class DynamicGS {
	
	public function __call(string $name, array $arguments = []) {
		$property_name = self::parsePropertyName($name);
		
		if(!property_exists($this, $property_name)) {
			return null;
		}
		
		if(substr($name,0,3) == 'get') return $this->{$property_name};
		if(substr($name,0,3) == 'set' && count($arguments) > 0) $this->{$property_name} = $arguments[0];
		
		return $this;
	}
	
	private static function parsePropertyName(string $name) {
		
		/*
		input name:
		
		getTitle
		getLastName
		getLastNAME
		
		output property:
		
		title
		last_name
		last_n_a_m_e
		
		*/
		
		return ltrim(strtolower(preg_replace("/[A-Z]/",'_$0',substr($name,3))), '_');
	}
	
}