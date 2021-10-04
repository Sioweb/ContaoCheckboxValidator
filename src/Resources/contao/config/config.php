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

$GLOBALS['TL_CSS'][] = 'bundles/siowebcheckboxValidator/css/jquery.confirm.css|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebcheckboxValidator/js/jquery.confirm.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebcheckboxValidator/js/checkboxValidator.confirm.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebcheckboxValidator/js/loadCheckboxValidator.js|static';

$GLOBALS['EFG']['storable_fields'][] = 'checkboxValidator';
