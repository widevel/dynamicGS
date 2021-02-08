<?php

require_once 'vendor/autoload.php';

class Test extends \Widevel\DynamicGS\DynamicGS {
	
	protected $first_name = 'Jhon';
	protected $age = 35;
	
}

$instance = new Test;
var_dump($instance->getFirstName());
var_dump($instance->getAge());
