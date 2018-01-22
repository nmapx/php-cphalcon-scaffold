Feature: Basic app features

  Scenario: Hello world
    When I go to "http://server:9460/"
    Then the response status code should be 200
    And the response should contain "{\"hello\":\"world\"}"

  Scenario: 404 not found
    When I go to "http://server:9460/notfound"
    Then the response status code should be 404
    And the response should contain "Resource you're looking for doesn't exist"
