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
 * @param array $form
 * @param array $form_state
 *
 * @return array Output of the system_settings_form()
 */
function reevoomark_admin_settings($form, &$form_state) {
  $form['reevoomark_retailer'] = array(
    '#type' => 'textfield',
    '#title' => t('Retailer Id'),
    '#description' => t('The Retailer Id associated with your <a href="@reevoo">Reevoo</a> account.', array('@reevoo' => 'http://www.reevoo.com')),
    '#default_value' => variable_get('reevoomark_retailer', ''),
    '#required' => TRUE,
  );
  $form['reevoomark_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Service Url'),
    '#description' => t('The endpoint for the ReevooMark service.'),
    '#default_value' => variable_get('reevoomark_url', 'http://mark.reevoo.com/reevoomark/first_two_reviews.html'),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}
