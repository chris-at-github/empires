<?php

if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Cext.' . $_EXTKEY,
	'Pages',
	'LLL:EXT:play/Resources/Private/Language/locallang_db.xlf:plugin.pages.title'
);

$TCA['tt_content']['types']['list']['subtypes_addlist']['play_pages'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('play_pages', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/PluginPages.xml');