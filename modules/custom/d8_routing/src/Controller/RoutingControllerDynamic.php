<?php
namespace Drupal\d8_routing\Controller;
class RoutingControllerDynamic {
public function helloUrlDynamic($name) {
	return [
			'#type' => '#markup',
			'#markup' => 'Hello'. $name
	];

}

public function helloUrlDynamicTitleCallback($name) {
	return t('Welcome'). $name;
	
	
}

}