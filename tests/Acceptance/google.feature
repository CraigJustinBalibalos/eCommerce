Feature: google
  In order to search for things in Google
  As a user
  I need to be able to write search terms and get results back

  Scenario: try googling "fish"
    Given I am on "https://google.ca"
    When I input "fish"
    And I click Search
    Then I see "fish"

  Scenario: try googling "shark"
    Given I am on "https://google.ca"
    When I input "shark"
    And I click Search
    Then I see "shark"