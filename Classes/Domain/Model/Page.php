<?php

namespace Cext\Play\Domain\Model;

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
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Page
 */
class Page extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * Keyword
	 *
	 * @var string
	 */
	protected $keyword = '';

	/**
	 * Abstract
	 *
	 * @var string
	 */
	protected $abstract = '';

	/**
	 * Media
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $media = null;

	/**
	 * createDate
	 *
	 * @var \DateTime
	 */
	protected $createDate = null;

	/**
	 * updatedAt
	 *
	 * @var \DateTime
	 */
	protected $updatedAt = null;

	/**
	 * Tags
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
	 */
	protected $tags;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
//		$this->initStorageObjects();
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
		$this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string title
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
	 * Returns the title
	 *
	 * @return string keyword
	 */
	public function getKeyword() {
		return $this->keyword;
	}

	/**
	 * Sets the keyword
	 *
	 * @param string $keyword
	 * @return void
	 */
	public function setKeyword($keyword) {
		$this->keyword = $keyword;
	}

	/**
	 * Returns the Abstract
	 *
	 * @return string Abstract
	 */
	public function getAbstract() {
		return $this->abstract;
	}

	/**
	 * Sets the Abstract
	 *
	 * @param string $abstract
	 * @return void
	 */
	public function setAbstract($abstract) {
		$this->abstract = $abstract;
	}

	/**
	 * Returns the Media
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the Media
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
	 * @return void
	 */
	public function setMedia(\TYPO3\CMS\Extbase\Domain\Model\FileReference $media) {
		$this->media = $media;
	}

	/**
	 * Returns the createDate
	 *
	 * @return \DateTime createDate
	 */
	public function getCreateDate() {
		return $this->createDate;
	}

	/**
	 * Sets the createDate
	 *
	 * @param string $createDate
	 * @return \DateTime
	 */
	public function setCreateDate($createDate) {
		$this->createDate = $createDate;
	}

	/**
	 * Returns the UpdatedAt
	 *
	 * @return \DateTime $updatedAt
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * Sets the UpdatedAt
	 *
	 * @param \DateTime $updatedAt
	 * @return void
	 */
	public function setUpdatedAt(\DateTime $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * Adds a Category
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $tag
	 * @return void
	 */
	public function addTag(\TYPO3\CMS\Extbase\Domain\Model\Category $tag) {
		$this->tags->attach($tag);
	}

	/**
	 * Removes a Category
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $tag The Category to be removed
	 * @return void
	 */
	public function removeTag(\TYPO3\CMS\Extbase\Domain\Model\Category $tag) {
		$this->tags->detach($tag);
	}

	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $tags
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $tags
	 * @return void
	 */
	public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags) {
		$this->tags = $tags;
	}
}