<?php
/**
 * Light wrapper around {@link PHPUnit_Framework_TestSuite}
 * which allows to have {@link setUp()} and {@link tearDown()}
 * methods which are called just once per suite, not once per
 * test method in each suite/case.
 * 
 * @package sapphire
 * @subpackage testing
 */
class SapphireTestSuite extends PHPUnit_Framework_TestSuite {
	function setUp() {
		foreach($this->groups as $group) {
			if($group[0] instanceof SapphireTest) $group[0]->setUpOnce();
		}
	}
	
	function tearDown() {
		foreach($this->groups as $group) {
			if($group[0] instanceof SapphireTest) $group[0]->tearDownOnce();
		}
	}
}
?>