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
class Example extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
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
     * type
     * 
     * @var \Cext\Play\Domain\Model\ExampleType
     */
    protected $type = null;

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the state
     * 
     * @return int $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the state
     * 
     * @param int $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Returns the type
     * 
     * @return \Cext\Play\Domain\Model\ExampleType $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     * 
     * @param \Cext\Play\Domain\Model\ExampleType $type
     * @return void
     */
    public function setType(\Cext\Play\Domain\Model\ExampleType $type)
    {
        $this->type = $type;
    }
}
