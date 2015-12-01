<?php
namespace CfC\Mailr\Controller\Module\Mail;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "CfC.Mailr".             *
 *                                                                        *
 *                                                                        */

use CfC\Mailr\Domain\Model\Member;
use TYPO3\Flow\Annotations as Flow;

/**
 * The Member module controller
 *
 * @Flow\Scope("singleton")
 */
class MemberController extends \TYPO3\Neos\Controller\Module\AbstractModuleController
{

    /**
     * @Flow\Inject
     * @var \CfC\Mailr\Domain\Repository\MemberRepository
     */
    protected $memberRepository;

    /**
     * @Flow\Inject
     * @var \CfC\Mailr\Domain\Repository\GroupRepository
     */
    protected $groupRepository;


    public function indexAction()
    {
        $this->view->assign('members', $this->memberRepository->findAll());
    }

    /**
     * @param \CfC\Mailr\Domain\Model\Member $member
     * @Flow\IgnoreValidation("$member")
     */
    public function addAction(Member $member = null)
    {
        $this->view->assign('member', $member);
    }

    /**
     * @param \CfC\Mailr\Domain\Model\Member $member
     */
    public function createAction(Member $member)
    {
        $this->memberRepository->add($member);
        $this->addFlashMessage('The member has been added.');
        $this->redirect('index');
    }

    /**
     * @param \CfC\Mailr\Domain\Model\Member $member
     * @return string
     */
    public function showAction(Member $member)
    {
        return 'rating: ' . $member->getRating();
    }


    /**
     * @param \CfC\Mailr\Domain\Model\Member $member
     */
    public function viewAction(Member $member)
    {
        // TODO: filter by list
        $groups = $this->groupRepository->findAll();

        $this->view->assign('member', $member);
        $this->view->assign('groupList', $groups);
    }

    /**
     * @param \CfC\Mailr\Domain\Model\Member $member
     * @param array $groups
     */
    public function editGroupsAction(Member $member, array $groups)
    {
    }
}
