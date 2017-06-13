Feature: Main menu
  In order to traverse the website
  As a website user
  I need to be able to use main menu

  Scenario: Seeing main menu on the homepage
    Given I am on "/"
    Then I should see "Repository contributors lookup"
    And I should see "Recently conducted searches"

  Scenario: Seeing main menu on the recent searches page
    Given I am on "/recent-searches"
    Then I should see "Repository contributors lookup"
    And I should see "Recently conducted searches"

  Scenario: Going to recent searches from homepage
    Given I am on "/"
    Given I follow "Recently conducted searches"
    Then I should be on "/recent-searches"

  Scenario: Going to homepage from recent searches
    Given I am on "/recent-searches"
    Given I follow "Repository contributors lookup"
    Then I should be on "/"