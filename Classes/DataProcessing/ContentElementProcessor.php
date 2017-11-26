<?php

namespace Chris\Play\DataProcessing;

use Doctrine\Common\Util\Debug;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Standard ContentElementProcessor fuer alle MLL Inhaltselemente
 */
class ContentElementProcessor implements DataProcessorInterface {

	/**
	 * liefert ein Array mit den CSS-Klassen die dem aueßeren DIV zugeordnet werden
	 *
	 * @param array $processorConfiguration configuration aus dem typoscript
	 * @param array $processedData Daten des Contentelements aus der Datenbank
	 * @return array
	 */
	protected function getFrameClasses(array $processorConfiguration, array $processedData) {
		$frameClasses = [];
		$frameTypeClass = $this->getFrameTypeClass($processedData);

		if(empty($frameTypeClass) === false) {
			$frameClasses[] = $frameTypeClass;
		}

//		$replaceClasses = $this->replaceClasses($processedData, $processorConfiguration);

		return $frameClasses;
	}

	/**
	 * Erstellt eine Klasse anhand des CTypes
	 *
	 * @param array $processedData
	 * @return array $processedData
	 */
	protected function getFrameTypeClass($processedData) {
		$frameType = $processedData['data']['CType'];

		// Bezeichner normalisieren
		// _ -> -
		// -- -> -
		$frameType = preg_replace(
			['/_/', '/[-]+/'],
			['-', '-'],
			strtolower($frameType)
		);

		// mit einheitlichen Prefix versehen
		$frameType = 'ce-frame--type-' . $frameType;

		return $frameType;
	}


	/**
	 * Fuer die Einstellung none in das Abstandseinstellungen wird normalerweise nicht ausgegeben. Fuer die korrekte
	 * Auswertung im CSS werden auch die space-*-none Klassen im Code benoetigt
	 *
	 * @param array $processedData
	 * @return array $processedData
	 */
	protected function normalizeSpaceClasses($processedData) {

		if(empty($processedData['data']['space_before_class']) === true) {
			$processedData['data']['space_before_class'] = 'none';
		}

		if(empty($processedData['data']['space_after_class']) === true) {
			$processedData['data']['space_after_class'] = 'none';
		}

		return $processedData;
	}

//	/**
//	 *  Get the header and or header-style class  and add class to <header> accordingly
//	 * @param array
//	 * @return  string
//	 */
//	protected function getHeaderClasses($processedData) {
////		only header [1-5] available
//		$headerAvailable = array(1, 2, 3, 4, 5);
//		$headerClasses = '';
//		if($processedData["data"]["tx_datamints_mll_header_style"]) {
//			$headerClasses .= 'header-layout-' . $processedData["data"]["tx_datamints_mll_header_style"];
//		} elseif(in_array($processedData["data"]["header_layout"], $headerAvailable)) {
//			$headerClasses .= 'header-layout-' . $processedData["data"]["header_layout"];
//		}
//
//		return $headerClasses;
//	}

	/**
	 * gibt die ersetzte classe zurück
	 * @see http://redmine/issues/17280
	 *
	 * @param array $processedData Daten des Contentelements aus der Datenbank
	 * @param array $processorConfiguration configuration aus dem typoscript
	 * @return string            gibt die ersetzte classe zurück
	 */
	protected function replaceClasses(array $processedData, array $processorConfiguration) {
		$replacement = "";

		$cType = $processedData["data"]["CType"];
		$ident = $cType;

		$fcefile = $processedData["data"]["tx_fed_fcefile"];

		$fcefile = preg_replace("<.*\:>", "", $fcefile);
		$fcefile = preg_replace("<\..*>", "", $fcefile);

		if($fcefile != '' && $cType == 'fluidcontent_content') {
			$ident .= "-" . $fcefile;
		}
		$ident = strtolower($ident);

		if(isset($processorConfiguration["frameClassReplace."]) && isset($processorConfiguration["frameClassReplace."][$ident])) {
			$replacement = $processorConfiguration["frameClassReplace."][$ident];
		}

		$replacement = strtolower($replacement);
		$replacement = preg_replace("<[ ]+>", " ", $replacement);
		$replacement = preg_replace("<\_>", "-", $replacement);

		return $replacement;
	}

	/**
	 * Parst die Inhalte aller verknupeften Inhaltselemente
	 *
	 * @param ContentObjectRenderer $cObj The data of the content element or page
	 * @param array $contentObjectConfiguration The configuration of Content Object
	 * @param array $processorConfiguration The configuration of this processor
	 * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
	 * @return array the processed data as key/value store
	 */
	public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {

		// Fuege alle Klassen zusammen -> wird nur als String im Layout ausgegeben
		$processedData['data']['frame_classes'] = implode(' ', $this->getFrameClasses($processorConfiguration, $processedData));

		// Abstandsklassen zu einem einheitlichen Zustand normalisieren
		$processedData = $this->normalizeSpaceClasses($processedData);

//		// Header Klasse
//		$processedData['data']['header_class'] = $this->getHeaderClasses($processedData);

		return $processedData;
	}
}