<?php

// ---------------------------------------------------------------------------------------------------------------------
// Erweiterungen von TtContent
$tmpPlayTtContentColumns = array(
	'tx_play_html' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:play/Resources/Private/Language/locallang_db.xlf:tx_play_ttcontent.html',
		'config' => array(
			'type' => 'select',
			'size' => 1,
			'renderType' => 'selectSingle',
			'items' => array(
				array('', ''),
			),
			'maxitems' => 1,
			'eval' => ''
		)
	),

	'tx_play_background' => [
		'exclude' => true,
		'label' => 'LLL:EXT:play/Resources/Private/Language/locallang_tca.xlf:tx_play_tt_content.background',
		'config' =>
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'tx_play_background',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
					],
					'foreign_types' => [
						'0' => [
							'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
							'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
							'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
							'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
							'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
						]
					],
					'maxitems' => 2
				],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),

	],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tmpPlayTtContentColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_play_background', '', 'after:space_after_class');

// ---------------------------------------------------------------------------------------------------------------------
// Einfache Erweiterung, um die Moeglichkeiten von FSCE auszuprobieren
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		'Play Example',
		'play_example',
		'play-extension'

	),
	'CType',
	'play_example'
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

// ---------------------------------------------------------------------------------------------------------------------
// Auslesen von HTML-Dateien und Ausgabe auf der Webseite
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		'Play HTML',
		'play_html',
		'play-extension'

	),
	'CType',
	'play_html'
);

$GLOBALS['TCA']['tt_content']['types']['play_html'] = [
	'showitem' => '
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,assets,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
	',
	'columnsOverrides' => [
		'assets' => [
			'config' => [
				'maxitems' => 1,
				'foreign_selector_fieldTcaOverride' => [
					'config' => [
						'appearance' => [
							'elementBrowserAllowed' => 'html'
						]
					]
				]
			]
		],
	]
];