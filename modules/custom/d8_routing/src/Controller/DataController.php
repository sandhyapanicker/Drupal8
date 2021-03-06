<?php
namespace Drupal\d8_routing\Controller;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;
use Drupal\Component\EventDispatcher\ContainerAwareEventDispatcher;

class DataController implements ContainerInjectionInterface {
	protected $db;
	protected $dispatcher;
	
	public function __construct(Connection $db, ContainerAwareEventDispatcher $dispatcher) {
		$this->db = $db;
		$this->dispatcher = $dispatcher;
	}
	
	public static function create(ContainerInterface $container) {
		return new static(
				$container->get('database'),
				$container->get('event_dispatcher')
				);
	}
	public function getResult() {
		$result = $this->db->select('d8_demo', dd)
		->fields('dd')
		->orderby('pid', 'desc')
		->range(0,1)
		->execute()->fetchAll();
		return $result[0];
	}
	
	public function InsertResult($first_name, $last_name) {
		$this->db->insert('d8_demo')
		->fields([
				'lastname' => $last_name,
				'firstname' => $first_name,
		])
		->execute();
		$this->dispatcher->dispatch(
				DataEntryEvent::DATA_INSERT,
				new DataEntryEvent($first_name, $last_name)
				);
	}
	
}

?>