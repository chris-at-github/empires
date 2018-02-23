<?php

namespace Cext\Play\Domain\Model;

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
 * Example
 */
class Example extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * email
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $email = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * state
	 *
	 * @var int
	 */
	protected $state = 0;

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = null;

	/**
	 * type
	 *
	 * @var \Cext\Play\Domain\Model\ExampleType
	 */
	protected $type = null;

	/**
	 * properties
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cext\Play\Domain\Model\ExampleProperties>
	 * @cascade remove
	 */
	protected $properties = null;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->properties = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the state
	 *
	 * @return int $state
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Sets the state
	 *
	 * @param int $state
	 * @return void
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Returns the type
	 *
	 * @return \Cext\Play\Domain\Model\ExampleType $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param \Cext\Play\Domain\Model\ExampleType $type
	 * @return void
	 */
	public function setType(\Cext\Play\Domain\Model\ExampleType $type) {
		$this->type = $type;
	}

	/**
	 * Adds a ExampleProperties
	 *
	 * @param \Cext\Play\Domain\Model\ExampleProperties $property
	 * @return void
	 */
	public function addProperty(\Cext\Play\Domain\Model\ExampleProperties $property) {
		$this->properties->attach($property);
	}

	/**
	 * Removes a ExampleProperties
	 *
	 * @param \Cext\Play\Domain\Model\ExampleProperties $propertyToRemove The ExampleProperties to be removed
	 * @return void
	 */
	public function removeProperty(\Cext\Play\Domain\Model\ExampleProperties $propertyToRemove) {
		$this->properties->detach($propertyToRemove);
	}

	/**
	 * Returns the properties
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cext\Play\Domain\Model\ExampleProperties> $properties
	 */
	public function getProperties() {
		return $this->properties;
	}

	/**
	 * Sets the properties
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cext\Play\Domain\Model\ExampleProperties> $properties
	 * @return void
	 */
	public function setProperties(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $properties) {
		$this->properties = $properties;
	}
}
