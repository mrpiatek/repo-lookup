Feature: Repository contributors sorting
	In order to sort repository contributors by name or by number of contributions
	As a website visitor
	I need to click on a corresponding table header

	Background:
		Given I am on "/"
		And I fill in "search" with "laravel/laravel"
		And I press "submit"
	
	Scenario: Sorting by ascending contributor name
		Given I press "name"
		Then I should see repository contributors sorted by name in ascending order

	Scenario: Sorting by descending contributor name
		Given I press "name"
		Given I press "name"
		Then I should see repository contributors sorted by name in descending order
		
	Scenario: Disabling name sorting
		Given I press "name"
		Given I press "name"
		Given I press "name"
		Then I should see repository contributors sorted by name in default order

	Scenario: Sorting by ascending number of contributions
		Given I press "number of contributions"
		Then I should see repository contributors sorted by number of contributions in ascending order

	Scenario: Sorting by descending number of contributions
		Given I press "number of contributions"
		Given I press "number of contributions"
		Then I should see repository contributors sorted by number of contributions in descending order
		
	Scenario: Disabling "number of contributions" sorting
		Given I press "number of contributions"
		Given I press "number of contributions"
		Given I press "number of contributions"
		Then I should see repository contributors sorted by number of contributions in default order
