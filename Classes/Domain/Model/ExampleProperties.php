<?php

namespace Cext\Play\Domain\Model;

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

/**
 * ExampleProperties
 */
class ExampleProperties extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * value
	 *
	 * @var string
	 */
	protected $value = '';

	/**
	 * example
	 *
	 * @var \Cext\Play\Domain\Model\Example
	 */
	protected $example = null;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the value
	 *
	 * @return string $value
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Sets the value
	 *
	 * @param string $value
	 * @return void
	 */
	public function setValue($value) {
		$this->value = $value;
	}
}
