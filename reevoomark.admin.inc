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
  $form['reevoomark_url_first_two_reviews'] = array(
    '#type' => 'textfield',
    '#title' => t('First two reviews'),
    '#description' => t('The endpoint for the ReevooMark first two reviews service.'),
    '#default_value' => variable_get('reevoomark_url_first_two_reviews', 'http://mark.reevoo.com/reevoomark/first_two_reviews.html'),
  );
  $form['reevoomark_url_embeddable_reviews'] = array(
    '#type' => 'textfield',
    '#title' => t('Embeddable reviews'),
    '#description' => t('The endpoint for the ReevooMark embeddable reviews service.'),
    '#default_value' => variable_get('reevoomark_url_embeddable_reviews', 'http://mark.reevoo.com/reevoomark/embeddable_reviews'),
  );
  $form['reevoomark_url_embeddable_reviews_slim'] = array(
    '#type' => 'textfield',
    '#title' => t('Slim embeddable reviews'),
    '#description' => t('The endpoint for the ReevooMark slim embeddable reviews service.'),
    '#default_value' => variable_get('reevoomark_url_embeddable_reviews_slim', 'http://mark.reevoo.com/reevoomark/embeddable_reviews/slim.html'),
  );
  $form['reevoomark_url_offers'] = array(
    '#type' => 'textfield',
    '#title' => t('Offers widget'),
    '#description' => t('The endpoint for the ReevooMark offers widget service.'),
    '#default_value' => variable_get('reevoomark_url_offers', 'http://mark.reevoo.com/widgets/offers'),
  );

  return system_settings_form($form);
}
