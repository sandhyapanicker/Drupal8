<?php

namespace Drupal\d8_routes\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class RouteController.
 */
class RouteController extends ControllerBase {

  /**
   * Helloworlddynamic.
   *
   * @return string
   *   Return Hello string.
   */
  public function helloWorldDynamic($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: helloWorldDynamic with parameter(s): $name'),
    ];
  }
  
  /**
   * Helloworlddynamic.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello_world() {
  	return [
  			'#type' => 'markup',
  			'#markup' => $this->t('Implement method'),
  	];
  }
  /**
   * Helloworldname.
   *
   * @return string
   *   Return Hello string.
   */
  public function helloWorldName($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: helloWorldName with parameter(s): $name'),
    ];
  }
  /**
   * Helloworlddyn.
   *
   * @return string
   *   Return Hello string.
   */
  public function helloWorldDyn($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: helloWorldDyn with parameter(s): $name'),
    ];
  }
  /**
   * Test.
   *
   * @return string
   *   Return Hello string.
   */
  public function test() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: test')
    ];
  }

}
