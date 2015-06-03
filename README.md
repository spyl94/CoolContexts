Since I use these contexts in every projects, I thought it would be nice to have them in a separate repo...

Here they are : **CoolContexts** !

They are highly coupled to my projects, but you can find some inspiration there.
Be nice with them and create cool things ;-)

## Installation

```
composer require 'spyl/cool-contexts:dev-master'
```

## Content

+ DefaultContext : avoid redundancy
+ WebApiContext : to test your APIs
+ CommandContext : to test commands ;)

## Usage example

```
default:
    formatters:
        pretty:
            verbose:  true
            paths:    false
            snippets: false
    extensions:
           Behat\Symfony2Extension: ~
    suites:
        api:
            paths: [ %paths.base%/features/api ]
            contexts:
                - Spyl\CoolContexts\WebApiContext
        commands:
            paths: [ %paths.base%/features/commands ]
            contexts:
                - Spyl\CoolContexts\CommandContext
```

```
# features/api/login.features

Feature: Login Restful Api
  As an API client
  I want to be able to login
  So I can access the application

Scenario: Anonymous API client wants to login
    Given I send a POST request to "/login_check" with body:
"""
{
  "username": "user",
  "password": "userpass"
}
"""
    Then the JSON response should match:
"""
{
    "token": @string@,
    "user": {
      "username": "user"
    }
}
"""
```

```
# features/commands/instances.feature

@database
Scenario: Anonymous user wants to create an instance coucou.fr
    Given I run "instance:create coucou coucou.fr"
    Then the command exit code should be 0
    And I should see "Instance coucou has been created !"
```

If you need to add custom steps, you can easily extends them, feel free to send me a PR if you think your changes could be useful to everyone !

Build with love by @spyl94.
