<?php

if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Cext.' . $_EXTKEY,
	'Pages',
	[
		'Page' => 'index',
	],
	[
		'Page' => '',
	]
);