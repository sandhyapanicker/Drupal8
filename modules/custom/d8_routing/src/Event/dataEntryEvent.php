<?php
namespace Drupal\d8_routing\Event;

use Symfony\Component\EventDispatcher\Event;

class DataEntryEvent extends Event {
	const DATA_INSERT = 'd8_routing.data.insert';
	public function __construct($first_name, $last_name) {
		$this->firstName = $first_name;
		$this->lastName = $last_name;
	}
}