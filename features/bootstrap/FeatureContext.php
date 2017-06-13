<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use \Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{

    use \Laracasts\Behat\Context\Migrator;

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

        $contributors = $this->getContributorsOnPage();

        foreach ($contributors as $user) {
            if ($user['name'] == $login) {
                PHPUnit_Framework_Assert::assertEquals($avatarUrl, $user['avatar_url']);
                PHPUnit_Framework_Assert::assertEquals($numberOfContributions, $user['contributions']);
                return true;
            }
        }
        return false;
    }

    /**
     * @Then I should see repository contributors sorted by :sortBy in :sortOrder order
     */
    public function iShouldSeeRepositoryContributorsSortedByInOrder($sortBy, $sortOrder)
    {
        $contributors = $this->getContributorsOnPage();

        foreach ($contributors as $user) {
            if ($sortBy == 'contributions') {
                //parse number
                $user['contributions'] = intval(str_replace(',', '', $user['contributions']));
            } else if ($sortBy == 'name') {
                $user['name'] = strtolower($user['name']);
            }

            if (isset($lastUser)) {
                if ($sortOrder == 'ascending') {
                    PHPUnit_Framework_Assert::assertLessThanOrEqual($user[$sortBy], $lastUser[$sortBy]);
                } else if ($sortOrder == 'descending') {
                    PHPUnit_Framework_Assert::assertGreaterThanOrEqual($user[$sortBy], $lastUser[$sortBy]);
                }
            }
            $lastUser = $user;
        }
    }

    private function getContributorsOnPage()
    {
        $rows = $this->getSession()->getPage()->findAll('css', 'table#contributors tr.contributor-row');
        $contributors = [];

        foreach ($rows as $row) {
            $cells = $row->findAll('css', 'td');
            list($avatarCell, $nameCell, $contributionsCell) = $cells;
            $contributors[] = [
                'name' => $nameCell->getText(),
                'avatar_url' => $avatarCell->find('css', 'img')->getAttribute('src'),
                'contributions' => $contributionsCell->getText()
            ];
        }
        return $contributors;
    }
}
