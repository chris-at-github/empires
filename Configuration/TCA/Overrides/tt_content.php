<?php

// // Adds the content element to the "Type" dropdown
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
//    array(
//       'LLL:EXT:datamints_play/Resources/Private/Language/locallang_tca.xlf:pageheader.title',
//       'datamintsplay_pageheader',
//       'EXT:datamints_play/Resources/Public/Icons/ContentElements/yourextensionkey_newcontentelement.gif'
//    ),
//    'CType',
//    'datamints_play'
// );

// // Configure the default backend fields for the content element
// $GLOBALS['TCA']['tt_content']['types']['datamintsplay_pageheader'] = array(
//    'showitem' => '
//          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
//          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,bodytext,assets,
//       --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
//          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
//       --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
//          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
//          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
//       --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
// ');

// $GLOBALS['TCA']['tt_content']['types']['datamintsplay_pageheader']['columnsOverrides']['bodytext']['config'] = [
// 'enableRichtext' => 1,
// 'richtextConfiguration' => 'default'
// ];

// $GLOBALS['TCA']['tt_content']['types']['datamintsplay_pageheader']['columnsOverrides']['assets']['config'] = [
// 'maxitems' => 1,
// ];
