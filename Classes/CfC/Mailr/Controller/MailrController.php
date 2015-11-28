<?php
namespace CfC\Mailr\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class MailrController extends \TYPO3\Flow\Mvc\Controller\ActionController
{

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('foos', array(
            'bar', 'baz'
        ));
    }
}
