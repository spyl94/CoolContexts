
```gherkin
Given I run "instance:create coucou coucou.fr"
Then the command exit code should be 0
And I should see "Instance coucou has been created !"
```
