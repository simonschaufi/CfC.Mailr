<?php
namespace CfC\Mailr\Controller\Module\Mail;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * The Recipient List module controller
 *
 * @Flow\Scope("singleton")
 */
class RecipientListController extends \TYPO3\Neos\Controller\Module\AbstractModuleController {

	/**
	 * @Flow\Inject
	 * @var \CfC\Mailr\Domain\Repository\RecipientListRepository
	 */
	protected $recipientListRepository;

	/**
	 * @Flow\Inject
	 * @var \CfC\Mailr\Domain\Repository\MemberRepository
	 */
	protected $memberRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('recipientLists', $this->recipientListRepository->findAll());
	}

	/**
	 * @param \CfC\Mailr\Domain\Model\RecipientList $recipientList Recipient List
	 * @Flow\IgnoreValidation("$recipientList")
	 * @return void
	 */
	public function newAction(\CfC\Mailr\Domain\Model\RecipientList $recipientList = NULL) {
		$this->view->assign('recipientList', $recipientList);
		$this->setTitle($this->moduleConfiguration['label'] . ' :: ' . ucfirst($this->request->getControllerActionName()));
	}

	/**
	 * @param \CfC\Mailr\Domain\Model\RecipientList $recipientList
	 */
	public function createAction(\CfC\Mailr\Domain\Model\RecipientList $recipientList) {
		$recipientList->setRating(0);
		$recipientList->setCreated(new \DateTime());

		$this->recipientListRepository->add($recipientList);
		$this->addFlashMessage('The recipient list has been created.');
		$this->redirect('index');
	}

	/**
	 * List members of a recipient list
	 * @param \CfC\Mailr\Domain\Model\RecipientList $recipientList
	 */
	public function membersAction(\CfC\Mailr\Domain\Model\RecipientList $recipientList) {
		$this->view->assignMultiple(
			array (
				'members' => $this->memberRepository->findAll(),
				'recipientList' => $recipientList
			)
		);
	}

	/**
	 * @param array $recipientListKeys
	 * @param string $action
	 */
	public function batchRecipientListsAction(array $recipientListKeys, $action) {
		switch ($action) {

		}
	}

	/**
	 * @param array $recipientListKeys
	 * @param string $action
	 */
	public function batchMembersAction(array $recipientListKeys, $action) {
		switch ($action) {

		}
	}

	/**
	 * @param \CfC\Mailr\Domain\Model\RecipientList $recipientList
	 * @param string $email
	 * @param string $firstName
	 * @param string $lastName
	 */
	public function addMemberAction(\CfC\Mailr\Domain\Model\RecipientList $recipientList, $email, $firstName, $lastName) {
		$member = new \CfC\Mailr\Domain\Model\Member();
		$member->setEmail($email);
		$member->setFirstName($firstName);
		$member->setLastName($lastName);
		$member->setRecipientList($recipientList);

		$this->memberRepository->add($member);
		$this->addFlashMessage('Member "'.$email.'" added.');
		$this->redirect('members', NULL, NULL, array('recipientList' => $recipientList));
	}


	/**
	 * @param \CfC\Mailr\Domain\Model\RecipientList $recipientList
	 * @return void
	 */
	public function deleteAction(\CfC\Mailr\Domain\Model\RecipientList $recipientList) {
		$this->recipientListRepository->remove($recipientList);
		$this->persistenceManager->persistAll();
		$this->addFlashMessage('The recipient list has been deleted.');
		$this->redirect('index');
	}

}