<?php
// $Id$

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'zen') . '/theme-settings.php';


/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */
function blice_settings($saved_settings) {

  // Get the default values from the .info file.
  $defaults = zen_theme_get_default_settings('blice');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Forms API: http://api.drupal.org/api/6
   */
  $form = array();
  $form['blice_short_url'] = array(
    '#type' => 'fieldset',
    '#title' => t('Short URLs'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['blice_short_url']['blice_short_url_enabled'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Enable short urls'),
    '#default_value' => $settings['blice_short_url_enabled'],
    '#description'   => t("Add a short url. Rewrite must be configured externaly to work"),
  );

  $form['blice_short_url']['blice_short_url_domain'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Domain for short urls'),
    '#default_value' => $settings['blice_short_url_domain'],
    '#description'   => t("The domain used for rewritin the short urls. They are called domain/$nid."),
  );

  // Add the base theme's settings.
  $form += zen_settings($saved_settings, $defaults);

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the base stylesheet.

  // Return the form
  return $form;
}
