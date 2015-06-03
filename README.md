Since I use these contexts in every projects, I thought it would be nice to have them in a separate repo...

Here they are : **CoolContexts** !

They are highly coupled to my projects, but you can find some inspiration there.
Be nice with them and create cool things ;-)

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

If you need to add custom steps, you can easily extends them, feel free to send me a PR if you think your changes could be useful to everyone !

Build with love by @spyl94.
