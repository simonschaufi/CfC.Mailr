<?php
namespace CfC\Mailr;

use TYPO3\Flow\Core\RequestHandlerInterface;

class MyRequestHandler implements RequestHandlerInterface
{

    /**
     * Handles a raw request
     *
     * @return void
     * @api
     */
    public function handleRequest()
    {
        echo 42;
    }

    /**
     * Checks if the request handler can handle the current request.
     *
     * @return mixed TRUE or an integer > 0 if it can handle the request, otherwise FALSE or an integer < 0
     * @api
     */
    public function canHandleRequest()
    {
        return isset($_GET['eId']);
    }

    /**
     * Returns the priority - how eager the handler is to actually handle the
     * request. An integer > 0 means "I want to handle this request" where
     * "100" is default. "0" means "I am a fallback solution".
     *
     * @return integer The priority of the request handler
     * @api
     */
    public function getPriority()
    {
        return 150;
    }
}
