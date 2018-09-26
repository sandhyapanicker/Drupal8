<?php
namespace Drupal\d8_routing\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class SampleConfigForm extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sample_admin_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'weather.settings',
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('weather.settings');

    $form['app_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('App Id'),
      '#default_value' => $config->get('app_id'),
    ); 

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
      // Retrieve the configuration
       $this->configFactory->getEditable('weather.settings')
      // Set the submitted configuration setting
      ->set('app_id', $form_state->getValue('app_id'))
      ->save();

    parent::submitForm($form, $form_state);
  }
  }
