<?php

/**
 * @file
 * ReevooMark administration pages.
 */

/**
 * Returns with the general configuration form.
 *
 * @ingroup forms
 * @see system_settings_form()
 *
 * @param array $form
 *   A Drupal form.
 * @param array $form_state
 *   The current state of the form.
 *
 * @return array
 *   Output of the system_settings_form()
 */
function reevoomark_admin_settings($form, &$form_state) {
  $form['reevoomark_retailer'] = array(
    '#type' => 'textfield',
    '#title' => t('Retailer id'),
    '#description' => t('The Retailer Id associated with your <a href="@reevoo">Reevoo</a> account.', array('@reevoo' => 'http://www.reevoo.com')),
    '#default_value' => reevoomark_variable('reevoomark_retailer'),
    '#required' => TRUE,
  );

  $form['reevoomark_currency_symbol'] = array(
    '#type' => 'textfield',
    '#title' => t('Currency symbol'),
    '#description' => t('The symbol for the Reevoo currency'),
    '#default_value' => reevoomark_variable('reevoomark_currency_symbol'),
  );

  $form['reevoomark_cache_age'] = array(
    '#type' => 'textfield',
    '#title' => t('Cache age'),
    '#description' => t('How long, in seconds, documents can be kept in cache'),
    '#default_value' => reevoomark_variable('reevoomark_cache_age'),
  );

  $form['fieldset_head'] = array(
    '#type' => 'fieldset',
    '#title' => t('Reevoo header elements; css & js files'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['fieldset_head']['reevoomark_css_best_offers'] = array(
    '#type' => 'textfield',
    '#title' => t('CSS for best offers'),
    '#description' => t('The url for the CSS for the best offers.'),
    '#default_value' => reevoomark_variable('reevoomark_css_best_offers'),
  );
  $form['fieldset_head']['reevoomark_css_embedded_reviews'] = array(
    '#type' => 'textfield',
    '#title' => t('CSS embedded reviews'),
    '#description' => t('The url for the CSS for the embedded reviews.'),
    '#default_value' => reevoomark_variable('reevoomark_css_embedded_reviews'),
  );

  $form['fieldset_url'] = array(
    '#type' => 'fieldset',
    '#title' => t('Reevoo url endpoints'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['fieldset_url']['reevoomark_url_first_two_reviews'] = array(
    '#type' => 'textfield',
    '#title' => t('First two reviews'),
    '#description' => t('The endpoint for the ReevooMark first two reviews service.'),
    '#default_value' => reevoomark_variable('reevoomark_url_first_two_reviews'),
  );
  $form['fieldset_url']['reevoomark_url_embeddable_reviews'] = array(
    '#type' => 'textfield',
    '#title' => t('Embeddable reviews'),
    '#description' => t('The endpoint for the ReevooMark embeddable reviews service.'),
    '#default_value' => reevoomark_variable('reevoomark_url_embeddable_reviews'),
  );
  $form['fieldset_url']['reevoomark_url_offers'] = array(
    '#type' => 'textfield',
    '#title' => t('Offers widget'),
    '#description' => t('The endpoint for the ReevooMark offers widget service.'),
    '#default_value' => reevoomark_variable('reevoomark_url_offers'),
  );

  return system_settings_form($form);
}
