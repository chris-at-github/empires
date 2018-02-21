<?php
namespace Cext\Play\Controller;

/***
 *
 * This file is part of the "Play" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ExampleApiController
 */
class ExampleApiController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * exampleRepository
	 *
	 * @var \Cext\Play\Domain\Repository\ExampleRepository
	 * @inject
	 */
	protected $exampleRepository = null;

	/**
	 * Properties Action
	 *
	 * @param \Cext\Play\Domain\Model\Example $example
	 * @return boolean
	 */
	public function getAction(\Cext\Play\Domain\Model\Example $example = null) {

//		if($example === null && empty($this->settings['example']['uid']) === false) {
//			$example = $this->exampleRepository->findByUid((int) $this->settings['example']['uid']);
//		}

//		// DomainObject -> toJson
//		$this->objectManager->get(\Cext\Play\Service\JsonService::class)->toJson($example, [
//			'uid',
//			'state',
//			'type' => ['uid', 'title'],
//			'properties' => ['uid', 'title', 'value'],
//			'date'
//		]);

		return true;
	}
}
