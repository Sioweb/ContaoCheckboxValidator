<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file config.php
 * @author Sascha Weidner
 * @package sioweb.checkboxValidator
 * @copyright Sioweb, Sascha Weidner
 */

$GLOBALS['TL_FFL']['checkboxValidator'] = 'Sioweb\CheckboxValidator\Forms\FormCheckboxValidator';
$GLOBALS['TL_CSS'][] = 'bundles/siowebcheckboxvalidator/css/jquery.confirm.css|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebcheckboxvalidator/js/jquery.confirm.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebcheckboxvalidator/js/checkboxValidator.confirm.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebcheckboxvalidator/js/loadCheckboxValidator.js|static';
$GLOBALS['EFG']['storable_fields'][] = 'checkboxValidator';
