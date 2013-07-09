<?php
namespace CfC\Mailr\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

/**
 * A view helper to display a Gravatar
 *
 * = Examples =
 *
 * <code title="Simple">
 * <mailr:gravatar email="{emailAddress}" default="http://domain.com/gravatar_default.gif" class="gravatar" />
 * </code>
 *
 * Output:
 * <img class="gravatar" src="http://www.gravatar.com/avatar/<hash>?d=http%3A%2F%2Fdomain.com%2Fgravatar_default.gif" />
 *
 */
class GravatarViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'img';

	/**
	 * Initialize arguments
	 *
	 * @return void
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('email', 'string', 'Gravatar Email', TRUE);
		$this->registerArgument('default', 'string', 'Default URL if no gravatar was found');
		$this->registerArgument('size', 'Integer', 'Size of the gravatar');

		$this->registerUniversalTagAttributes();
	}

	/**
	 * Render the link.
	 *
	 * @return string The rendered link
	 */
	public function render() {
		$gravatarUri = 'http://www.gravatar.com/avatar/' . md5((string)$this->arguments['email']);
		$uriParts = array();
		if ($this->arguments['default']) {
			$uriParts[] = 'd=' . urlencode($this->arguments['default']);
		}
		if ($this->arguments['size']) {
			$uriParts[] = 's=' . $this->arguments['size'];
		}
		if (count($uriParts)) {
			$gravatarUri .= '?' . implode('&', $uriParts);
		}

		$this->tag->addAttribute('src', $gravatarUri);
		return $this->tag->render();
	}
}

?>