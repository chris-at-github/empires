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
	 * Get the TypoScriptFrontendController
	 *
	 * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
	 */
	protected function getFrontendController() {
		return $GLOBALS['TSFE'];
	}

	/**
	 * Set response headers
	 *
	 * @see: \TYPO3\CMS\Extbase\Mvc\View\JsonView::render
	 * @return void
	 */
	protected function setResponseHeader() {

		$frontendController = $this->getFrontendController();
		$response = $this->controllerContext->getResponse();

		if($response instanceof \TYPO3\CMS\Extbase\Mvc\Web\Response) {

			if($frontendController instanceof \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController) {
				if(empty($frontendController->config['config']['disableCharsetHeader'])) {

					// If the charset header is *not* disabled in configuration,
					// TypoScriptFrontendController will send the header later with the Content-Type which we set here.
					$frontendController->setContentType('application/json');
				} else {

					// Although the charset header is disabled in configuration, we *must* send a Content-Type header here.
					// Content-Type headers optionally carry charset information at the same time.
					// Since we have the information about the charset, there is no reason to not include the charset information although disabled in TypoScript.
					$response->setHeader('Content-Type', 'application/json; charset=' . trim($frontendController->metaCharset));
				}
			} else {
				$response->setHeader('Content-Type', 'application/json');
			}
		}
	}

	/**
	 * Handles a request. The result output is returned by altering the given response.
	 *
	 * @param \TYPO3\CMS\Extbase\Mvc\RequestInterface $request The request object
	 * @param \TYPO3\CMS\Extbase\Mvc\ResponseInterface $response The response, modified by this handler
	 *
	 * @throws \TYPO3\CMS\Extbase\Mvc\Controller\Exception\RequiredArgumentMissingException
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentTypeException
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
	 */
	public function processRequest(\TYPO3\CMS\Extbase\Mvc\RequestInterface $request, \TYPO3\CMS\Extbase\Mvc\ResponseInterface $response) {
		if(!$this->canProcessRequest($request)) {
			throw new \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException(get_class($this) . ' does not support requests of type "' . get_class($request) . '". Supported types are: ' . implode(' ', $this->supportedRequestTypes), 1187701131);
		}

		if($response instanceof \TYPO3\CMS\Extbase\Mvc\Web\Response && $request instanceof WebRequest) {
			$response->setRequest($request);
		}

		$this->response = $response;
		$this->request = $request;
		$this->request->setDispatched(true);

		$this->uriBuilder = $this->objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class);
		$this->uriBuilder->setRequest($request);

		$this->actionMethodName = $this->resolveActionMethodName();
		$this->initializeActionMethodArguments();
		$this->initializeActionMethodValidators();

		$this->mvcPropertyMappingConfigurationService->initializePropertyMappingConfigurationFromRequest($request, $this->arguments);
		$this->initializeAction();

		$actionInitializationMethodName = 'initialize' . ucfirst($this->actionMethodName);
		if(method_exists($this, $actionInitializationMethodName)) {
			call_user_func([$this, $actionInitializationMethodName]);
		}

		$this->mapRequestArgumentsToControllerArguments();
		$this->controllerContext = $this->buildControllerContext();
		$this->callActionMethod();

		$this->setResponseHeader();
	}

	/**
	 * Properties Action
	 *
	 * @param \Cext\Play\Domain\Model\Example $example
	 * @return string
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
	 */
	public function getAction(\Cext\Play\Domain\Model\Example $example = null) {

		// @todo: in Methode auslagern
		// @todo: \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException abfangen und auswerten
		if($example === null) {
			$response = $this->controllerContext->getResponse();
			$response->setStatus(404, '\Cext\Play\Domain\Model\Example [' . $this->request->getArgument('example') . '] not found');
		}

		// DomainObject -> toJson
		return $this->objectManager->get(\Cext\Play\Service\JsonService::class)->toJson($example, [
			'uid',
			'state',
			'type' => ['uid', 'title'],
			'properties' => ['uid', 'title', 'value'],
			'date'
		]);
	}
}
