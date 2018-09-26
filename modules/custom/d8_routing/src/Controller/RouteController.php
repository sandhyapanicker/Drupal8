<?php
namespace Drupal\d8_routing\Controller;
class RouteController {
public function hello_url() {
  return [
  '#type' => '#markup',
   '#markup' => 'Hello World!'
  ];
}
}