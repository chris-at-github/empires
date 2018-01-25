<?php

namespace Cext\Play\Domain\Repository;

/***
 *
 * This file is part of the "Play" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * The repository for ExampleProperties
 */
class ExamplePropertiesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @var array
	 */
	protected $defaultOrderings = [
		'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
	];

	/**
	 * @param array $options
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	public function findAll($options = []) {
		$query = $this->createQuery();
		$matches = [];

		if(isset($options['example']) === true) {
			$matches[] = $query->equals('example', 1);
		}

		if(empty($matches) === false) {
			$query->matching($query->logicalAnd($matches));
		}

		return $query->execute();
	}
}
