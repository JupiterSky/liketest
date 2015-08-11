Feature: Like in the Post
  In order to expose API to Like a post
  As a user software
  I need to create an API to .

  @createSchema

  Scenario: Get a resource already
    And I send a "GET" request to "/api/v1/users"
    Given A default User Created and Post
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    Then the response status code should be 200


  Scenario: Like a Post
    Given A default User Created and Post
    And the header "Content-Type" should be equal to "application/json"
    And I send a "POST" request to "/api/v1/users/1/likes" with body:
    """
    {
      "post_id":1
    }
    """
    Then the JSON should be equal to:
    """
      {"message":"OK LIKED"}
    """
    Then print last JSON response
    And the response status code should be 200
    And the user "1" should have "1" like
