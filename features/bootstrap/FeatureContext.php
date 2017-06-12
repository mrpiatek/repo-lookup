<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
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
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I fill :arg1 with :arg2
     */
    public function iFillWith($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given I press :arg1
     */
    public function iPress($arg1)
    {
        throw new PendingException();
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
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see Taylor Otwell's avatar, :arg1 and :arg2 in one row
     */
    public function iShouldSeeTaylorOtwellsAvatarAndInOneRow($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see Graham Campbell's avatar, :arg1 and :arg2 in one row
     */
    public function iShouldSeeGrahamCampbellsAvatarAndInOneRow($arg1, $arg2)
    {
        throw new PendingException();
    }
}
