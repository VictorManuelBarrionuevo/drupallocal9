<?php

namespace Drupal\different_forms\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Entity form entity entities.
 *
 * @ingroup different_forms
 */
interface EntityFormEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Entity form entity name.
   *
   * @return string
   *   Name of the Entity form entity.
   */
  public function getName();

  /**
   * Sets the Entity form entity name.
   *
   * @param string $name
   *   The Entity form entity name.
   *
   * @return \Drupal\different_forms\Entity\EntityFormEntityInterface
   *   The called Entity form entity entity.
   */
  public function setName($name);

  /**
   * Gets the Entity form entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Entity form entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Entity form entity creation timestamp.
   *
   * @param int $timestamp
   *   The Entity form entity creation timestamp.
   *
   * @return \Drupal\different_forms\Entity\EntityFormEntityInterface
   *   The called Entity form entity entity.
   */
  public function setCreatedTime($timestamp);

}
