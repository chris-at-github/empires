<?php

namespace Cext\Play\Service;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Json Service Class
 */
class JsonService {

	/**
	 * toJson
	 *
	 * @param mixed $value
	 * @param array $options
	 * @return string
	 */
	public function toJson($value, $options = []) {
		if($value instanceof \TYPO3\CMS\Extbase\DomainObject\AbstractEntity) {
			$value = $this->domainObjectToArray($value, $options);
		}

//		DebuggerUtility::var_dump($value);

		return json_encode($value);
	}

	/**
	 * toJson -> DomainObject
	 *
	 * @param \TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject $object
	 * @param array $options
	 * @return array
	 */
	public function domainObjectToArray(\TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject $object, $options) {
		$data = [];
		$properties = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getGettablePropertyNames($object);

		foreach($properties as $propertyName => $propertyOptions) {

			// keine Optionen angegeben
			if(gettype($propertyOptions) === 'string') {
				$propertyName = $propertyOptions;
			}

			if(empty($options) === true || in_array($propertyName, $options) === true) {
				$propertyValue = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getProperty($object, $propertyName);

				if(gettype($propertyValue) === 'array' || gettype($propertyValue) === 'object') {

					if($propertyValue instanceof \TYPO3\CMS\Extbase\DomainObject\AbstractEntity) {
						if(gettype($propertyOptions) === 'array') {
							$propertyValue = $this->toJson($propertyValue, $propertyOptions);

						} else {
							$propertyValue = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getProperty($propertyValue, 'uid');
						}
					}
				}

				$data[$propertyName] = $propertyValue;
			}
//			if(isset($configuration['_only']) && is_array($configuration['_only']) && !in_array($propertyName, $configuration['_only'])) {
//				continue;
//			}
//			if(isset($configuration['_exclude']) && is_array($configuration['_exclude']) && in_array($propertyName, $configuration['_exclude'])) {
//				continue;
//			}
//
//			$propertyValue = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getProperty($object, $propertyName);
//
//			if(!is_array($propertyValue) && !is_object($propertyValue)) {
//				$propertiesToRender[$propertyName] = $propertyValue;
//			} elseif(isset($configuration['_descend']) && array_key_exists($propertyName, $configuration['_descend'])) {
//				$propertiesToRender[$propertyName] = $this->transformValue($propertyValue, $configuration['_descend'][$propertyName]);
//			}
		}

		return $data;
	}
}