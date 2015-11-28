<?php
namespace CfC\Mailr\Command;

use TYPO3\Flow\Annotations as Flow;

/**
 * Command controller for mailr
 *
 * @Flow\Scope("singleton")
 */
class MailrCommandController extends \TYPO3\Flow\Cli\CommandController
{

    /**
     * Send mails
     *
     * Sending all mails in the queue
     *
     * @return void
     */
    public function sendCommand()
    {
        $this->outputLine('Mails sent.');
    }
}
