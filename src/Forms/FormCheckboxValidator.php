<?php

namespace Sioweb\CheckboxValidator\Forms;
use Contao;

class FormCheckboxValidator extends \FormCheckBox
{

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_checkbox_checkbox_validator';

	protected $strPrefix = 'widget widget-checkbox widget-accept-checkbox_validator';

	protected function getModalTitle() {
		return $this->checkbox_validator_title;
	}
	protected function getModalContent() {
		return $this->checkbox_validator_content;
	}
	protected function getModalAccept() {
		return $this->checkbox_validator_accept_button;
	}
	protected function getModalAbort() {
		return $this->checkbox_validator_abort_button;
	}
}