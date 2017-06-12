Feature: Recent searches
	In order to see recent searches
	As a website visitor
	I need to visit "recent searches" page
	
	Scenario: Seeing recent searches after looking up few repositories
		Given I lookup "laravel/laravel" repository
		And I lookup "phalcon/cphalcon" repository
		And I lookup "mrpiatek/repo-lookup" repository
		When I am on "/recent-searches"
		Then I should see "laravel/laravel"
		And I should see "phalcon/cphalcon"
		And I should see "mrpiatek/repo-lookup"
		
	Scenario: Seeing recent searches after not looking up any repository
		Given I am on "/recent-searches"
		Then I should see "no recent searches"
