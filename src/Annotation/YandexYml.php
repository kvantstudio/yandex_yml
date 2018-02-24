<?php

namespace Drupal\yandex_yml\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Annotation YandexYml.
 *
 * This annotation helps to map properties of elements to it's destination
 * xml elements to make generation more easily and transparent.
 *
 * @Annotation
 */
class YandexYml extends Plugin {

  /**
   * Type of value.
   *
   * This denotes where this value will be set.
   *
   * Allowed values:
   *  - content: Value of property will be set as content of element.
   *  - property: Value of property will be set as attribute value of element.
   *
   * @var string
   */
  public $type;

  /**
   * XML element name.
   *
   * Used for naming element for property.
   *
   * @var string
   */
  public $elementName;

  /**
   * Property name.
   *
   * If type was set to "property" you must enter property name where it goes.
   * This name will be attribute name and property will it's value.
   *
   * @var string
   */
  public $propertyName;

}