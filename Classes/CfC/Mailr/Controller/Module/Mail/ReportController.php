<?php
namespace CfC\Mailr\Controller\Module\Mail;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * The Report module controller
 *
 * @Flow\Scope("singleton")
 */
class ReportController extends \TYPO3\Neos\Controller\Module\StandardController {

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

}

?>