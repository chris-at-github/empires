<?php

if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

call_user_func(function() {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Cext.Play',
		'Example',
		'Example'
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Cext.Play',
		'Vue',
		'Vue'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_play_domain_model_example');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_play_domain_model_exampletype');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_play_domain_model_exampleproperties');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_play_domain_model_vueobject');
});

//\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
//	'Cext.' . $_EXTKEY,
//	'Pages',
//	'LLL:EXT:play/Resources/Private/Language/locallang_db.xlf:plugin.pages.title'
//);

// Play Example Flexform
$TCA['tt_content']['types']['list']['subtypes_addlist']['play_example'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('play_example', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/PluginExample.xml');

//// Play Vue Flexform
//$TCA['tt_content']['types']['list']['subtypes_addlist']['play_vue'] = 'pi_flexform';
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('play_vue', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/PluginExample.xml');