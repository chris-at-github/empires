<?php

namespace Cext\Play\Domain\Repository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Chris <pschorr.christian@gmail.com>
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

/**
 * The repository for Pages
 */
class PageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * List of page types to exclude in list views
	 *
	 * @var array
	 */
	protected $excludePageTypes = [254];

	/**
	 * @var array
	 */
//	protected $defaultOrderings = array(
//		'tx_datamints_article_starttime' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
//	);

	function __construct(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager) {
		parent::__construct($objectManager);
//		$this->defaultQuerySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
//		$this->defaultQuerySettings->setRespectStoragePage(false);
	}

	/**
	 * Get the database connection of TYPO3.
	 *
	 * @return \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected function getDatabase() {
		return $GLOBALS['TYPO3_DB'];
	}

	public function debugQuery(\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult) {
		$GLOBALS['TYPO3_DB']->debugOuput = 2;
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;

		$queryResult->toArray();
//		$queryResult->
		print_r($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery);

		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = false;
		$GLOBALS['TYPO3_DB']->explainOutput = false;
		$GLOBALS['TYPO3_DB']->debugOuput = false;
	}

	/**
	 * Create the query object for findAll and find Method
	 *
	 * @param array $options
	 * @param array $sorting
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
	 */
	protected function getQuery($options = array(), $sorting = array()) {
		$matches = array();
		$query = $this->createQuery();

		// UID of articles
		if(isset($options['uid']) === true) {
			if(gettype($options['uid']) !== 'array') {
				$options['uid'] = [$options['uid']];
			}

			$matches[] = $query->in('uid', $options['uid']);
		}

		// Storage PID for articles
		if(isset($options['parent']) === true) {
			$query->getQuerySettings()->setRespectStoragePage(false);

			if(gettype($options['parent']) !== 'array') {
				$options['parent'] = [$options['parent']];
			}

			$matches[] = $query->in('pid', $options['parent']);
		}

//		// System Categories (= sections)
//		if(isset($options['categories']) === true) {
//			$or = [];
//
//			foreach($options['categories'] as $category) {
//				if(empty($category) === false) {
//					$or[] = $query->contains('sections', $category);
//				}
//			}
//
//			if(empty($or) === false) {
//				$matches[] = $query->logicalAnd($query->logicalOr($or));
//			}
//		}

		if(empty($matches) === false) {
			$query->matching($query->logicalAnd($matches));
		}

		if(empty($sorting) === false) {
			$query->setOrderings($sorting);
		}

		return $query;
	}

	/**
	 * Find all pages belongs to settings of $options
	 *
	 * @param array $options
	 * @param array $sorting
	 * @param int $limit
	 * @return array|object|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findAll($options = array(), $sorting = array(), $limit = null) {
		$query = $this->getQuery($options, $sorting);

		if($limit !== null) {
			$query->setLimit($limit);
		}

		return $query->execute();
	}

	/**
	 * Find one page by options
	 *
	 * @param array $options
	 * @param array $sorting
	 * @return array|object|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function find($options = array(), $sorting = array()) {
		$query = $this->getQuery($options, $sorting);
		$query->setLimit(1);

//		$rs = $query->execute();
//		$page = $rs->getFirst();
//		$this->debugQuery($rs);

		return $query->execute()->getFirst();
	}
}