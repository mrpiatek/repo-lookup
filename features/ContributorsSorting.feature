Feature: Repository contributors sorting
	In order to sort repository contributors by name or by number of contributions
	As a website visitor
	I need to click on a corresponding table header

	Background:
		Given I am on "/"
		And I fill in "search" with "laravel/laravel"
		And I press "submit"
	
	Scenario: Sorting by ascending contributor name
		Given I follow "name-header"
		Then I should see repository contributors sorted by "name" in "ascending" order

	Scenario: Sorting by descending contributor name
		Given I follow "name-header"
		Given I follow "name-header"
		Then I should see repository contributors sorted by "name" in "descending" order
		
	Scenario: Disabling name sorting
		Given I follow "name-header"
		Given I follow "name-header"
		Given I follow "name-header"
		Then I should see repository contributors sorted by "name" in "default" order

	Scenario: Sorting by ascending number of contributions
		Given I follow "contributions-header"
		Then I should see repository contributors sorted by "contributions" in "ascending" order

	Scenario: Sorting by descending number of contributions
		Given I follow "contributions-header"
		Given I follow "contributions-header"
		Then I should see repository contributors sorted by "contributions" in "descending" order
		
	Scenario: Disabling "number of contributions" sorting
		Given I follow "contributions-header"
		Given I follow "contributions-header"
		Given I follow "contributions-header"
		Then I should see repository contributors sorted by "contributions" in "default" order
