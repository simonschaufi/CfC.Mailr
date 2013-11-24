<?php
namespace CfC\Mailr\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Group {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Member>
	 * @ORM\ManyToMany(mappedBy="groups")
	 */
	protected $members;


	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Member> $members
	 */
	public function setMembers($members) {
		$this->members = $members;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Member>
	 */
	public function getMembers() {
		return $this->members;
	}

}
?>