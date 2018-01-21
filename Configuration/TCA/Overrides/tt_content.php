<?php

 // Adds the content element to the "Type" dropdown
 \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
       'Play Example',
       'play_example',
       'EXT:datamints_play/Resources/Public/Icons/ContentElements/yourextensionkey_newcontentelement.gif'
    ),
    'CType',
    'datamints_play'
 );

	$GLOBALS['TCA']['tt_content']['types']['play_example'] = [
		'showitem' => '
				--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
				--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,bodytext,image,
			--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
				--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
			--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
				--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
				--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
			--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
	 ',
		'columnsOverrides' => [
			'image' => [
				'config' => [
					'maxitems' => 1,
				]
			],

			'bodytext' => [
				'config' => [
					'enableRichtext' => 1,
					'richtextConfiguration' => 'default'
				]
			]
		]
	];