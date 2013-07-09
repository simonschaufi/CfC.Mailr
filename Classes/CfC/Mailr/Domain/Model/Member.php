<?php
namespace CfC\Mailr\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Member of a Recipient List
 *
 * @Flow\Entity
 */
class Member extends \TYPO3\Party\Domain\Model\AbstractParty {

	/**
	 * @var string
	 */
	protected $email;

	/**
	 * @var integer
	 * @ORM\Column(type="smallint")
	 */
	protected $rating;

	/**
	 * @var \DateTime
	 */
	protected $optinTime;

	/**
	 * @var \DateTime
	 */
	protected $lastUpdateTime;

	/**
	 * @var string
	 */
	protected $language;

	/**
	 * @var \CfC\Mailr\Domain\Model\RecipientList
	 * @ORM\ManyToOne(inversedBy="members")
	 */
	protected $recipientList;

	/**
	 * @var \CfC\Mailr\Domain\Model\Campaign
	 * @ORM\ManyToOne
	 */
	protected $unsubCampaign;

	/**
	 * @var \DateTime
	 */
	protected $unsubTime;

	/**
	 * @var string
	 */
	protected $unsubReason;

	/**
	 * @var string
	 */
	protected $unsubReasonText;

	/**
	 * @var \CfC\Mailr\Domain\Model\Campaign
	 * @ORM\ManyToOne
	 */
	protected $bounceCampaign;

	/**
	 * @var \DateTime
	 */
	protected $bounceTime;

	/**
	 * @var string
	 */
	protected $active;

	/**
	 * @var string
	 */
	protected $firstName;

	/**
	 * @var string
	 */
	protected $lastName;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Group>
	 * @ORM\ManyToMany(inversedBy="members")
	 */
	protected $groups;

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}


	/**
	 * Setter for firstName
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Getter for firstName
	 *
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}


	/**
	 * Setter for lastName
	 *
	 * @param string $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * Getter for lastName
	 *
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Getter for full name
	 *
	 * @return string
	 */
	public function getName() {
		//TODO switch in english?
		return $this->firstName.' '.$this->lastName;
	}


	/**
	 * @return integer
	 */
	public function getRating() {
		return $this->rating;
	}

	/**
	 * @param integer $rating
	 * @return void
	 */
	public function setRating($rating) {
		$this->rating = $rating;
	}

	/**
	 * @param string $active
	 */
	public function setActive($active) {
		$this->active = $active;
	}

	/**
	 * @return string
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * @param \CfC\Mailr\Domain\Model\Campaign $bounceCampaign
	 */
	public function setBounceCampaign($bounceCampaign) {
		$this->bounceCampaign = $bounceCampaign;
	}

	/**
	 * @return \CfC\Mailr\Domain\Model\Campaign
	 */
	public function getBounceCampaign() {
		return $this->bounceCampaign;
	}

	/**
	 * @param \DateTime $bounceTime
	 */
	public function setBounceTime($bounceTime) {
		$this->bounceTime = $bounceTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getBounceTime() {
		return $this->bounceTime;
	}

	/**
	 * @param string $language
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}

	/**
	 * @return string
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * @param \DateTime $lastUpdateTime
	 */
	public function setLastUpdateTime($lastUpdateTime) {
		$this->lastUpdateTime = $lastUpdateTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getLastUpdateTime() {
		return $this->lastUpdateTime;
	}

	/**
	 * @param \DateTime $optinTime
	 */
	public function setOptinTime($optinTime) {
		$this->optinTime = $optinTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getOptinTime() {
		return $this->optinTime;
	}

	/**
	 * @param \CfC\Mailr\Domain\Model\Campaign $unsubCampaign
	 */
	public function setUnsubCampaign($unsubCampaign) {
		$this->unsubCampaign = $unsubCampaign;
	}

	/**
	 * @return \CfC\Mailr\Domain\Model\Campaign
	 */
	public function getUnsubCampaign() {
		return $this->unsubCampaign;
	}

	/**
	 * @param string $unsubReason
	 */
	public function setUnsubReason($unsubReason) {
		$this->unsubReason = $unsubReason;
	}

	/**
	 * @return string
	 */
	public function getUnsubReason() {
		return $this->unsubReason;
	}

	/**
	 * @param string $unsubReasonText
	 */
	public function setUnsubReasonText($unsubReasonText) {
		$this->unsubReasonText = $unsubReasonText;
	}

	/**
	 * @return string
	 */
	public function getUnsubReasonText() {
		return $this->unsubReasonText;
	}

	/**
	 * @param \DateTime $unsubTime
	 */
	public function setUnsubTime($unsubTime) {
		$this->unsubTime = $unsubTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getUnsubTime() {
		return $this->unsubTime;
	}

	/**
	 * @param \CfC\Mailr\Domain\Model\RecipientList $recipientList
	 */
	public function setRecipientList($recipientList) {
		$this->recipientList = $recipientList;
	}

	/**
	 * @return \CfC\Mailr\Domain\Model\RecipientList
	 */
	public function getRecipientList() {
		return $this->recipientList;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Group> $groups
	 */
	public function setGroups($groups) {
		$this->groups = $groups;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Group>
	 */
	public function getGroups() {
		$groups = array();
		foreach ($this->groups as $group) {
			$groups[\TYPO3\Flow\Reflection\ObjectAccess::getProperty($group, 'Persistence_Object_Identifier', TRUE)] = $group;
		}
		return $groups;
	}

}
?>