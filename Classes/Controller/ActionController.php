<?php

namespace Cext\Play\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Christian Pschorr <pschorr.christian@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Action controller
 *
 * @package play
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ActionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Liefert die aktuelle Seiten UID zurueck
	 *
	 * @return int
	 */
	protected function getCurrentUid() {
		if(empty($GLOBALS['TSFE']->id) === true) {
			return (int) \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
		}

		return (int) $GLOBALS['TSFE']->id;
	}

	/**
	 * Liesst die Start PIDs fuer die Seitenabfrage aus
	 *
	 * @return array
	 */
	protected function getStoragePids() {
		$storage = [];
		$cObject = $this->configurationManager->getContentObject();

		// if storage pid is set in plugin settings
		if(empty($cObject->data['pages']) === false) {
			$storage = GeneralUtility::intExplode(',', $cObject->data['pages']);

			// if recursive settings is set in plugin settings
			if((int) $cObject->data['recursive'] !== 0) {
				$queryGenerator = $this->objectManager->get('TYPO3\CMS\Core\Database\QueryGenerator');

				foreach($storage as $pid) {
					$storage = array_merge(
						$storage,
						GeneralUtility::intExplode(',', $queryGenerator->getTreeList($pid, (int) $cObject->data['recursive'], 0, 1))
					);
				}
			}
		}

		// if no storage pid is set, use current page uid
		if(empty($storage) === true) {
			$storage[] = $this->getCurrentUid();
		}

		return array_unique($storage);
	}
}