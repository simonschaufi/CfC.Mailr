<?php
namespace CfC\Mailr\Command;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;

/**
 * Command controller for mailr
 *
 * @Flow\Scope("singleton")
 */
class MailrCommandController extends CommandController
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
