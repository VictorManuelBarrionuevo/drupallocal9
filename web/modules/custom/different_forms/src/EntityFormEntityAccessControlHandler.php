<?php

namespace Drupal\different_forms;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Entity form entity entity.
 *
 * @see \Drupal\different_forms\Entity\EntityFormEntity.
 */
class EntityFormEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\different_forms\Entity\EntityFormEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished entity form entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published entity form entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit entity form entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete entity form entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add entity form entity entities');
  }


}
