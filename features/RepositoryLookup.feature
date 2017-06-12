Feature: Repository contributors lookup
	In order to lookup repository contributors
	As a website visitor
	I need to provide repository name
	
	Scenario: Searching for an existing repository
		Given I am on "/"
		When I fill in "search" with "mrpiatek/repo-lookup"
		And I press "submit"
		Then I should see "mrpiatek"
		
	Scenario: Searching for non existing repository
		Given I am on "/"
		When I fill in "search" with "mrpiatek/null"
		And I press "submit"
		Then I should see "repository does not exist"
		
	Scenario: Searching for invalid repository
		Given I am on "/"
		When I fill in "search" with "mrpiatek"
		And I press "submit"
		Then I should see "repository name invalid"
		
	Scenario: Searching for "laravel/laravel" repository
		Given I am on "/"
		When I fill in "search" with "laravel/laravel"
		And I press "submit"
		Then I should see Taylor Otwell's avatar, "taylorotwell" and "2,953 contributions" in one row
		And I should see Graham Campbell's avatar, "GrahamCampbell" and "40 contributions" in one row
