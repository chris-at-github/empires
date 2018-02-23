<?php

namespace Cext\Play\Validation\Validator;

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
 * A generic object validator which allows for specifying property validators
 */
class GenericObjectValidator extends \TYPO3\CMS\Extbase\Validation\Validator\GenericObjectValidator {

	/**
	 * Checks if the given value is valid according to the validator, and returns
	 * the Error Messages object which occurred.
	 *
	 * @param mixed $value The value that should be validated
	 * @return \TYPO3\CMS\Extbase\Error\Result
	 * @api
	 */
	public function validate($value) {
		if(($this->result instanceof \TYPO3\CMS\Extbase\Error\Result) === false) {
			$this->result = new \TYPO3\CMS\Extbase\Error\Result();
		}

		if($this->acceptsEmptyValues === false || $this->isEmpty($value) === false) {
			if(!is_object($value)) {
				$this->addError('Object expected, %1$s given.', 1241099149, [gettype($value)]);
			} elseif($this->isValidatedAlready($value) === false) {
				$this->isValid($value);
			}
		}

		return $this->result;
	}
}
