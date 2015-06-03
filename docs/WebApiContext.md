## Example for testing a CRUD

### GET

```gherkin
Scenario: Anonymous API client wants to list instances
    Given I send a GET request to "/instances"
    Then the JSON response should match:
"""
[
  {
    "id": @integer@,
    "name": @string@,
    "url": @string@,
    "enabled": @boolean@,
    "last_deploy": @string@,
    "environment_variables": [
      {
        "key": @string@,
        "value": @string@
      },
      @...@
    ]
  },
  @...@
]
"""
```

### POST

```gherkin
@database
Scenario: Anonymous API client wants to add an instance
    Given I send a POST request to "/instances" with json:
"""
{
  "name": "blabla",
  "url": "blabla.fr"
}
"""
    Then the response status code should be 201
```

### PUT

```gherkin
@database
Scenario: Anonymous API client wants to enable an instance
    Given I send a PUT request to "/instances/master" with json:
"""
{
  "enabled": true
}
"""
    Then the response status code should be 200
    Then the JSON response should match:
"""
{
  "id": @integer@,
  "name": "master",
  "url": @string@,
  "enabled": true,
  "last_deploy": @string@,
  "environment_variables": @array@
}
"""
```

### DELETE

```gherkin
Scenario: Anonymous user wants to delete an instance
    Given I send a DELETE request to "/instances/master"
    Then the response status code should be 204
```
