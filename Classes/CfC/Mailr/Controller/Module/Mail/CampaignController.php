<?php
namespace CfC\Mailr\Controller\Module\Mail;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Neos\Domain\Service\ContentContext;

/**
 * The Campaign module controller
 *
 * @Flow\Scope("singleton")
 */
class CampaignController extends \TYPO3\Neos\Controller\Module\AbstractModuleController {

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foo', array(
			'bar', 'baz'
		));
	}

	/**
	 * @return void
	 */
	public function newAction() {
		$path = '/sites/neosdemotypo3org/features/imagetext';
		$nodeConverter = new \TYPO3\Neos\TypeConverter\NodeConverter();
		$propertyMapperConfiguration = new \TYPO3\Flow\Property\PropertyMappingConfiguration();
		$node = $nodeConverter->convertFrom($path, NULL, array(), $propertyMapperConfiguration);

		$view = $this->objectManager->get('\TYPO3\Neos\View\TypoScriptView'); /* @var $view \TYPO3\Neos\View\TypoScriptView */

		#$typoScriptPath = 'page<TYPO3.Neos:Page>/body<TYPO3.TypoScript:Template>/sections/main<TYPO3.Neos:Section>/default<TYPO3.TypoScript:Matcher>/element<TYPO3.Neos.NodeTypes:Section.Default>/itemRenderer<TYPO3.TypoScript:Case>/default<TYPO3.TypoScript:Matcher>/element<TYPO3.Neos.NodeTypes:Text>';
		#$typoScriptPath = 'page<TYPO3.Neos:Page>/body<TYPO3.TypoScript:Template>/sections/main<TYPO3.Neos:Section>/default<TYPO3.TypoScript:Matcher>/element<TYPO3.Neos.NodeTypes:Section.Default>';
		#$typoScriptPath = 'page<TYPO3.Neos:Page>/body<TYPO3.TypoScript:Template>/sections/main<TYPO3.Neos:Section>';

		$view->assign('value', $node);
		$output = $view->render();

		echo $output;
		exit;
	}
}