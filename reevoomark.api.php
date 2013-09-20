<?php

/**
 * @file
 * Documents API functions for the ReevooMark module.
 */

/**
 * Alter the product sku before the review is requested.
 */
function hook_reevoomark_sku_alter(&$sku) {
  $menu_object = menu_get_object();
  if (!empty($menu_object->field_sku))) {
    $sku = $menu_object->field_sku;
  }
}
