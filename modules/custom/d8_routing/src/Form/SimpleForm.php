<?php
namespace Drupal\d8_routing\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleForm extends FormBase {
	/**
	 * @inheritdoc
	 */
	public function getFormId() {
		return 'simple_form';
	}
	public function buildForm(array $form, FormStateInterface $form_state) {
		$form['demo_name'] = array(
				'#type' => 'textfield',
				'#title' => t('Enter test input:'),
				'#size' => 60,
				'#max_length' => 128,
				'#required' => TRUE,
		);
		
		$form['candidate_mail'] = array(
				'#type' => 'email',
				'#title' => t('Email ID:'),
				'#required' => TRUE,
		);
		$form['candidate_number'] = array (
				'#type' => 'tel',
				'#title' => t('Mobile no'),
		);
		$form['submit'] = array(
				'#type' => 'submit',
				'#value' => t('Submit'),
		);
		return $form;
	}
	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state) {
		if (strlen($form_state->getValue('demo_name')) < 10) {
			$form_state->setErrorByName('demo_name', $this->t('Name too short'));
		}
	}
	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state) {
		$this->messenger()->addMessage($this->t('Form submited'));
		
	}
}