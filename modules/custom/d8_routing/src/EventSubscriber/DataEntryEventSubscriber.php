<?php

namespace Drupal\d8_routing\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\dblog\Logger\DbLog;
/**
 * Class DataEntryEventSubscriber.
 */
class DataEntryEventSubscriber implements EventSubscriberInterface {


	/**
	 * Psr\Log\LoggerInterface definition.
	 *
	 * @var \Psr\Log\LoggerInterface
	 */
	protected $logger;
	/**
	 * Constructs a new DataEntryEventSubscriber object.
	 */
	public function __construct(DbLog $logger) {
		$this->logger = $logger;
	}

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events['d8_routing.data.insert'] = ['logFirstLastName'];

    return $events;
  }

  /**
   * This method is called whenever the d8_routing.data.insert event is
   * dispatched.
   *
   * @param GetResponseEvent $event
   */
  public function logFirstLastName(Event $event) {
  	\Drupal::logger('system')->info($event->firstName .''.$event->lastName);
  	drupal_set_message('Event d8_routing.data.insert thrown by Subscriber in module d8_routing.', 'status', TRUE);
  }

}
