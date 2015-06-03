Since I use these contexts in every projects, I thought it would be nice to have them in a separate repo...

Here they are : **CoolContexts** !

They are highly coupled to my projects, but you can find some inspiration there.
Be nice with them and create cool things ;-)

## Quick start

Install CoolContexts with composer:
```
composer require spyl/cool-contexts
```

## Contexts

+ DefaultContext : some helpers methods in addition to KernelAwareContext
+ DoctrineFixturesContext : load your fixtures before suite and after each @database tags
+ [WebApiContext](https://github.com/spyl94/CoolContexts/blob/master/src/Spyl/CoolContexts/WebApiContext.php) : useful steps to test your (REST) APIs
+ [CommandContext](https://github.com/spyl94/CoolContexts/blob/master/src/Spyl/CoolContexts/CommandContext.php) : useful steps to test your commands ;)

## Configuration

Edit behat.yml
```yaml
default:
    # ...
    suites:
        api:
            # ...
            contexts:
                - Spyl\CoolContexts\WebApiContext
                - # ...
        commands:
            # ...
            contexts:
                - Spyl\CoolContexts\CommandContext
```

## Examples

```gherkin
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

```gherkin
# features/commands/instances.feature

@database
Scenario: Anonymous user wants to create an instance coucou.fr
    Given I run "instance:create coucou coucou.fr"
    Then the command exit code should be 0
    And I should see "Instance coucou has been created !"
```

## Information

If you need to add custom steps, you can easily extends them, feel free to send me a PR if you think your changes could be useful to everyone !

Build with love by **@spyl94**.
