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
		return $this->checkboxValidator_title;
	}
	protected function getModalContent() {
		return $this->checkboxValidator_content;
	}
	protected function getModalAccept() {
		return $this->checkboxValidator_accept_button;
	}
	protected function getModalAbort() {
		return $this->checkboxValidator_abort_button;
	}
}