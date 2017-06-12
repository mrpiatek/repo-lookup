<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use \Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
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
     * @Given I click on :arg1 header
     */
    public function iClickOnHeader($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see repository contributors sorted by name in ascending order
     */
    public function iShouldSeeRepositoryContributorsSortedByNameInAscendingOrder()
    {
        throw new PendingException();
    }

    /**
     * @Given I click on :arg1 header twice
     */
    public function iClickOnHeaderTwice($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see repository contributors sorted by name in descending order
     */
    public function iShouldSeeRepositoryContributorsSortedByNameInDescendingOrder()
    {
        throw new PendingException();
    }

    /**
     * @Given I click on :arg1 header three times
     */
    public function iClickOnHeaderThreeTimes($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see repository contributors sorted by name in default order
     */
    public function iShouldSeeRepositoryContributorsSortedByNameInDefaultOrder()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see repository contributors sorted by number of contributions in ascending order
     */
    public function iShouldSeeRepositoryContributorsSortedByNumberOfContributionsInAscendingOrder()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see repository contributors sorted by number of contributions in descending order
     */
    public function iShouldSeeRepositoryContributorsSortedByNumberOfContributionsInDescendingOrder()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see repository contributors sorted by number of contributions in default order
     */
    public function iShouldSeeRepositoryContributorsSortedByNumberOfContributionsInDefaultOrder()
    {
        throw new PendingException();
    }

    /**
     * @Given I lookup :arg1 repository
     */
    public function iLookupRepository($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see :fullName's avatar, :login and :numberOfContributions contributions in one row
     */
    public function iShouldSeeContributorsAvatarNameAndNumberOfContributionsInOneRow($fullName, $login, $numberOfContributions)
    {
        throw new PendingException();
    }
}
