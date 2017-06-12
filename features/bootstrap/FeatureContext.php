<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use \Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    const TAYLOR_AVATAR_URL = 'https://avatars3.githubusercontent.com/u/463230';
    const GRAHAM_AVATAR_URL = 'https://avatars0.githubusercontent.com/u/2829600';

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    
    /**
     * @Then I should see :fullName's avatar, :login and :numberOfContributions contributions in one row
     */
    public function iShouldSeeContributorsAvatarNameAndNumberOfContributionsInOneRow($fullName, $login, $numberOfContributions)
    {
        if ($fullName == 'Taylor Otwell') {
            $avatarUrl = self::TAYLOR_AVATAR_URL;
        } else if ($fullName == 'Graham Campbell') {
            $avatarUrl = self::GRAHAM_AVATAR_URL;
        } else {
            throw new PendingException();
        }

        $rows = $this->getSession()->getPage()->findAll('css', 'table#contributors tr.contributor-row');

        foreach ($rows as $row) {
            $cells = $row->findAll('css', 'td');
            list($avatarCell, $nameCell, $contributionsCell) = $cells;
            if ($nameCell->getText() == $login) {
                PHPUnit_Framework_Assert::assertEquals($avatarCell->find('css', 'img')->getAttribute('src'), $avatarUrl);
                PHPUnit_Framework_Assert::assertEquals($contributionsCell->getText(), $numberOfContributions);
                return true;
            }
        }
        return false;
    }
}
