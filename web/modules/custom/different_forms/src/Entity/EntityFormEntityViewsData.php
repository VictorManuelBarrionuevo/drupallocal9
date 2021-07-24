<?php

namespace Drupal\different_forms\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Entity form entity entities.
 */
class EntityFormEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
