<?php

/**
 * @file
 * Contains entity_form_entity.page.inc.
 *
 * Page callback for Entity form entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Entity form entity templates.
 *
 * Default template: entity_form_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_entity_form_entity(array &$variables) {
  // Fetch EntityFormEntity Entity Object.
  $entity_form_entity = $variables['elements']['#entity_form_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
