<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "play"
 ***************************************************************/
$EM_CONF[$_EXTKEY] = [
	'title' => 'Play',
	'description' => '',
	'category' => 'plugin',
	'author' => 'Christian Pschorr',
	'author_email' => 'pschorr.christian@gmail.com',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.0.1',
	'constraints' => [
		'depends' => [
			'typo3' => '8.7.0-8.7.99',
		],
		'conflicts' => [],
		'suggests' => [],
	],
	'autoload' => [
		'psr-4' => [
			'Cext\\Play\\' => 'Classes',
		],
	],
];
