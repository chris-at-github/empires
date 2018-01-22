<?php

 // Adds the content element to the "Type" dropdown
 \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
       'Play Example',
       'play_example',
			'play-extension'

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

// @see: https://www.clickstorm.de/blog/crop-funktion-fuer-bilder-in-typo3-8-7/
$GLOBALS['TCA']['tt_content']['types']['play_example']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
	'desktop' => [
		'title' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:imageManipulation.desktop',
		'allowedAspectRatios' => [
			'4:3' => [
				'title' => '4:3',
				'value' => 4 / 3
			],
			'16:9' => [
				'title' => '16:9',
				'value' => 16 / 9
			]
		],
	],
	'mobile' => [
		'title' => 'LLL:EXT:extkey/Resources/Private/Language/locallang_db.xlf:imageManipulation.mobile',
		'allowedAspectRatios' => [
			'16:9' => [
				'title' => '16:9',
				'value' => 16 / 9
			]
		]
	]
];