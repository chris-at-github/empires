<?php

namespace Cext\Play\Condition;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Ueberpruft ob bei einem neuen (GET:defVals) oder bestehenden TtContent-Element (Abfrage ueber UID) ob das abgefragte
 * Feld dem uebergebenen Werte(n) entspricht
 *
 * @see https://docs.typo3.org/typo3cms/TyposcriptReference/Conditions/Reference/Index.html#id53
 */
class ContentFieldCondition extends \TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition {

	/**
	 * Evaluate condition
	 *
	 * @param array $expressions
	 * @return bool
	 */
	public function matchCondition(array $expressions) {
		$parameter = $_GET;
		$parent = null;

		// Neuer Inhalt (defVals) und Auswahl defVals -> tt_content vorhanden
		if(isset($parameter['defVals']) === true && isset($parameter['defVals']['tt_content']) === true && isset($parameter['defVals']['tt_content']) === true) {
			$fields = $parameter['defVals']['tt_content'];
			// Bestehender Inhalt -> Laden anhand der UID (edit -> tt_content)
		} elseif(isset($parameter['edit']) === true && isset($parameter['edit']['tt_content']) === true) {
			$uid = key($parameter['edit']['tt_content']);

			if((int) $uid !== 0) {
				$fields = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('*', 'tt_content', 'uid = ' . (int) $uid);
			}
		}

		if(empty($fields) === true) {
			return false;
		}

		// IF $fields => tx_flux_parent = ID FCE Elternelement
		if((int) $fields['tx_flux_parent'] !== 0) {
			$parent = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('*', 'tt_content', 'uid = ' . (int) $fields['tx_flux_parent']);
		}

		foreach($expressions as $expression) {
			if(strpos($expression, '==') !== false) {
				list($name, $value) = \TYPO3\CMS\Extbase\Utility\ArrayUtility::trimExplode('==', $expression);

				// Wenn Keyword parent:* im $name vorkommt wende den Vergleich auf das Eltern-Element an
				if(strpos($name, 'parent:') !== false && $parent !== null) {
					$name = str_replace('parent:', null, $name);

					if($this->checkCondition($parent, $name, $value) === false) {
						return false;
					}
				} elseif($this->checkCondition($fields, $name, $value) === false) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * @param array $fields
	 * @param string $name
	 * @param string $value
	 * @return boolean
	 */
	protected function checkCondition($fields, $name, $value) {

		// Feld nicht vorhanden oder entspricht nicht dem Wert
		if(isset($fields[$name]) === false || $fields[$name] != $value) {
			return false;
		}

		return true;
	}
}