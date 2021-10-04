<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file tl_form_field.php
 * @author Sascha Weidner
 * @package sioweb.checkboxValidator
 * @copyright Sioweb, Sascha Weidner
 */
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array(
	'checkboxValidator_form_field','setFieldName'
);
$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array(
	'checkboxValidator_form_field','adjustDcaByType'
);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkboxValidator'] = '{type_legend},type,name,label;{checkboxValidator_legend},checkboxValidator_title,checkboxValidator_content,checkboxValidator_accept_button,checkboxValidator_abort_button;{fconfig_legend},mandatory;{options_legend},options;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';


$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkboxValidator_title'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkboxValidator_title'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkboxValidator_content'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkboxValidator_content'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'allowHtml'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkboxValidator_accept_button'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkboxValidator_accept_button'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkboxValidator_abort_button'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkboxValidator_abort_button'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);


class checkboxValidator_form_field extends tl_form_field {

	/**
	 * Adjust the DCA by type
	 *
	 * @param object
	 */
	public function adjustDcaByType($dc)
	{
		$objField = FormFieldModel::findByPk($dc->id);
		if ($objField->type === 'checkboxValidator') {
			$GLOBALS['TL_DCA']['tl_form_field']['fields']['name']['eval']['readonly'] = true;
			$GLOBALS['TL_DCA']['tl_form_field']['fields']['name']['eval']['mandatory'] = false;
		}
	}

	public function setFieldName($dc) {

		$objField = FormFieldModel::findByPk($dc->id);
		// Front end call
		if (!$dc instanceof DataContainer || $objField->type !== 'checkboxValidator') {
			return;
		}

		// Fallback solution for existing accounts
		if ($dc->activeRecord->lastLogin > 0) {
			$time = $dc->activeRecord->lastLogin;
		} else {
			$time = time();
		}

		$this->Database->prepare("UPDATE tl_form_field SET name=? WHERE id=?")
					   ->execute('checkboxValidator', $dc->id);
	}
}