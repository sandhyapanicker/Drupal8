<?php
namespace Drupal\d8_routing\Controller;
use  \Drupal\user\UserInterface;
use  \Drupal\node\NodeInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

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
	return [
			'#type' => '#markup',
			'#markup' => 'Hello '. $user->getUsername()
	];
}


public function EntityUrlDynamicTitleCallback(UserInterface $user) {
	return t('Welcome '). $user->getUsername();
	
	
}

public function NodeUrlDynamic(NodeInterface $node) {
	$owner = $node->getOwner()->getAccountName();
	return [
			'#type' => '#markup',
			'#markup' => $node->getTitle(). '|' . $owner
	];
	
}

public function listNodeAccess(NodeInterface $node, AccountInterface $account) {
	return AccessResult::allowedIf($node->getOwnerId() === $account->id());
	
}
}