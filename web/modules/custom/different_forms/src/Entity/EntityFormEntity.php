<?php

namespace Drupal\different_forms\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Entity form entity entity.
 *
 * @ingroup different_forms
 *
 * @ContentEntityType(
 *   id = "entity_form_entity",
 *   label = @Translation("Entity form entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\different_forms\EntityFormEntityListBuilder",
 *     "views_data" = "Drupal\different_forms\Entity\EntityFormEntityViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\different_forms\Form\EntityFormEntityForm",
 *       "add" = "Drupal\different_forms\Form\EntityFormEntityForm",
 *       "edit" = "Drupal\different_forms\Form\EntityFormEntityForm",
 *       "delete" = "Drupal\different_forms\Form\EntityFormEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\different_forms\EntityFormEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\different_forms\EntityFormEntityAccessControlHandler",
 *   },
 *   base_table = "entity_form_entity",
 *   translatable = FALSE,
 *   admin_permission = "administer entity form entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/entity_form_entity/{entity_form_entity}",
 *     "add-form" = "/admin/structure/entity_form_entity/add",
 *     "edit-form" = "/admin/structure/entity_form_entity/{entity_form_entity}/edit",
 *     "delete-form" = "/admin/structure/entity_form_entity/{entity_form_entity}/delete",
 *     "collection" = "/admin/structure/entity_form_entity",
 *   },
 *   field_ui_base_route = "entity_form_entity.settings"
 * )
 */
class EntityFormEntity extends ContentEntityBase implements EntityFormEntityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Entity form entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    return $fields;
  }

}
