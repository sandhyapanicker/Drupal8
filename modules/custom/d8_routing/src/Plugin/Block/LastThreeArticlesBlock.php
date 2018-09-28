<?php

namespace Drupal\d8_routing\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Provides a 'LastThreeArticlesBlock' block.
 *
 * @Block(
 *  id = "last_three_articles_block",
 *  admin_label = @Translation("Last three articles block"),
 * )
 */
class LastThreeArticlesBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;
  /**
   * Constructs a new LastThreeArticlesBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    EntityTypeManagerInterface $entity_type_manager
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
  	$query = $this->entityTypeManager->getStorage('node')->getQuery();
  	$nids = $query->condition('type', 'article')
  	->condition('status', '1')
  	->range(0, 3)
  	->sort('created' , 'DESC')
  	->execute();
  	$nodes = $this->entityTypeManager->getStorage('node')->loadMultiple($nids);
  	$build = [];
  	$cache_tags = [];
  	foreach($nodes as $node) {
  		$node_title .= $node->getTitle(). ' >>';
  	}

    $build['last_three_articles_block']['#markup'] = $node_title;

    return $build;
  }

}
