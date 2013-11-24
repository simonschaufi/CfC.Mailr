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
class RecipientList {

	/**
	 * @var string
	 * @Flow\Validate(type="NotEmpty")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=1, "maximum"=255 })
	 */
	protected $listName;

	/**
	 * @var string
	 */
	protected $defaultFromName;

	/**
	 * @var string
	 */
	protected $defaultReplyToEmail;

	/**
	 * @var string
	 */
	protected $defaultSubject;

	/**
	 * @var string
	 * @ORM\Column(type="text", length=65532)
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $company;

	/**
	 * @var string
	 */
	protected $address;

	/**
	 * @var string
	 */
	protected $city;

	/**
	 * 10 should be enough
	 * see http://www.barnesandnoble.com/help/cds2.asp?PID=8134
	 * @var string
	 * @ORM\Column(type="string", length=10)
	 */
	protected $zip;

	/**
	 * @var string
	 */
	protected $country;

	/**
	 * @var string
	 */
	protected $phone;

	/**
	 * @var integer
	 * @ORM\Column(type="smallint")
	 */
	protected $rating;

	/**
	 * @var \DateTime
	 */
	protected $created;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\CfC\Mailr\Domain\Model\Member>
	 * @ORM\OneToMany(mappedBy="recipientList")
	 */
	protected $members;


	/**
	 * @return string
	 */
	public function getListName() {
		return $this->listName;
	}

	/**
	 * @param string $listName
	 * @return void
	 */
	public function setListName($listName) {
		$this->listName = $listName;
	}

	/**
	 * @return string
	 */
	public function getDefaultFromName() {
		return $this->defaultFromName;
	}

	/**
	 * @param string $defaultFromName
	 * @return void
	 */
	public function setDefaultFromName($defaultFromName) {
		$this->defaultFromName = $defaultFromName;
	}

	/**
	 * @return string
	 */
	public function getDefaultReplyToEmail() {
		return $this->defaultReplyToEmail;
	}

	/**
	 * @param string $defaultReplyToEmail
	 * @return void
	 */
	public function setDefaultReplyToEmail($defaultReplyToEmail) {
		$this->defaultReplyToEmail = $defaultReplyToEmail;
	}

	/**
	 * @return string
	 */
	public function getDefaultSubject() {
		return $this->defaultSubject;
	}

	/**
	 * @param string $defaultSubject
	 * @return void
	 */
	public function setDefaultSubject($defaultSubject) {
		$this->defaultSubject = $defaultSubject;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * @param string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @param int $rating
	 */
	public function setRating($rating) {
		$this->rating = $rating;
	}

	/**
	 * @return int
	 */
	public function getRating() {
		return $this->rating;
	}

	/**
	 * @param \DateTime $created
	 */
	public function setCreated($created) {
		$this->created = $created;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $members
	 */
	public function setMembers($members) {
		$this->members = $members;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getMembers() {
		return $this->members;
	}
}
?>