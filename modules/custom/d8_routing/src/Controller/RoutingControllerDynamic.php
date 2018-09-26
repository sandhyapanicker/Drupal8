<?php
namespace Drupal\d8_routing\Controller;
use  \Drupal\user\UserInterface;
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
public function EntityUrlDynamic(UserInterface $user){
	ksm($user);
	return [
			'#type' => '#markup',
			'#markup' => 'Hello '. $user->getUsername()
	];
}


public function EntityUrlDynamicTitleCallback(UserInterface $user) {
	return t('Welcome '). $user->getUsername();
	
	
}
}