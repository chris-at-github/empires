<?php
namespace Cext\Play\Controller;

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

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ExampleController
 */
class ExampleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	/**
	 * exampleRepository
	 *
	 * @var \Cext\Play\Domain\Repository\ExampleRepository
	 * @inject
	 */
	protected $exampleRepository = null;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listingAction() {
		$this->view->assign('examples', $this->exampleRepository->findAll());
	}

	/**
	 * Json Example Action
	 *
	 * @param \Cext\Play\Domain\Model\Example $example
	 * @return boolean
	 */
	public function toJsonAction(\Cext\Play\Domain\Model\Example $example) {
		$this->objectManager->get(\Cext\Play\Service\JsonService::class)->toJson($example, ['uid', 'state', 'type' => ['uid', 'title'], 'properties' => ['uid', 'title', 'value']]);
		$this->objectManager->get(\Cext\Play\Service\JsonService::class)->toJson($this->exampleRepository->findAll(), ['uid', 'title', 'type' => ['uid', 'title'], 'properties']);

		return true;
	}

//    /**
//     * action show
//     *
//     * @param \Cext\Play\Domain\Model\Example $example
//     * @return void
//     */
//    public function showAction(\Cext\Play\Domain\Model\Example $example)
//    {
//        $this->view->assign('example', $example);
//    }
//
//    /**
//     * action new
//     *
//     * @return void
//     */
//    public function newAction()
//    {
//
//    }
//
//    /**
//     * action create
//     *
//     * @param \Cext\Play\Domain\Model\Example $newExample
//     * @return void
//     */
//    public function createAction(\Cext\Play\Domain\Model\Example $newExample)
//    {
//        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
//        $this->exampleRepository->add($newExample);
//        $this->redirect('list');
//    }
//
//    /**
//     * action edit
//     *
//     * @param \Cext\Play\Domain\Model\Example $example
//     * @ignorevalidation $example
//     * @return void
//     */
//    public function editAction(\Cext\Play\Domain\Model\Example $example)
//    {
//        $this->view->assign('example', $example);
//    }
//
//    /**
//     * action update
//     *
//     * @param \Cext\Play\Domain\Model\Example $example
//     * @return void
//     */
//    public function updateAction(\Cext\Play\Domain\Model\Example $example)
//    {
//        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
//        $this->exampleRepository->update($example);
//        $this->redirect('list');
//    }
//
//    /**
//     * action delete
//     *
//     * @param \Cext\Play\Domain\Model\Example $example
//     * @return void
//     */
//    public function deleteAction(\Cext\Play\Domain\Model\Example $example)
//    {
//        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
//        $this->exampleRepository->remove($example);
//        $this->redirect('list');
//    }
}
