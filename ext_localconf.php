<?php

if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

call_user_func(function() {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Cext.Play',
		'Example',
		[
			'Example' => 'listing, toJson, recordType',
			'ExampleType' => 'list, show'
		],
		// non-cacheable actions
		[
			'Example' => 'create, update, delete',
			'ExampleType' => ''
		]
	);

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					example {
						iconIdentifier = play-extension
						title = LLL:EXT:play/Resources/Private/Language/locallang_plugin.xlf:example.title
						description = LLL:EXT:play/Resources/Private/Language/locallang_plugin.xlf:example.description
						tt_content_defValues {
							CType = list
							list_type = play_example
						}
					}
				}
				show = *
			}
		 }'
	);

	// Registrierung Play Icon
	// @see: https://www.typo3lexikon.de/typo3-tutorials/core/systemextensions/core/imaging.html
	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	$iconRegistry->registerIcon(
		'play-extension',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:play/Resources/Public/Icons/play.svg']
	);
});