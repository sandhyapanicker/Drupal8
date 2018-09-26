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
		$form['qualification'] = array (
				'#type' => 'select',
				'#title' => ('Qualification'),
				'#options' => array(
						'UG' => t('UG'),
						'PG' => t('PG'),
						'other' => t('Other'),
				),
		);
		$form['country'] = array (
				'#type' => 'select',
				'#title' => ('Country'),
				'#options' => array(
						'india' => t('India'),
						'uk' => t('UK'),
				),
		);
		$form['india_states'] = array (
				'#type' => 'select',
				'#title' => ('State'),
				'#options' => array(
						'delhi' => t('Delhi'),
						'bangalore' => t('Bangalore'),
				),
				'#states' => array(
						'visible' => array(
								':input[name="country"]' => array('value' => 'india')
						),
						),
		);
		$form['uk_states'] = array (
				'#type' => 'select',
				'#title' => ('State'),
				'#options' => array(
						'london' => t('London'),
				),
				'#states' => array(
						'visible' => array(
								':input[name="country"]' => array('value' => 'uk')
						),
				),
		);
		$form['qualification_other'] = array(
				'#type' => 'textfield',
				'#title' => t('Qualification Other'),
				'#size' => 60,
				'#max_length' => 128,
				'#states' => array(
				  'visible' => array(
					 ':input[name="qualification"]' => array('value' => 'other')
				),
		  ),
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