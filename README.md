# refactoring

## Set up

 ```
  composer install
 ```

## Tools

cache clear
```
bin/console cache:clear --no-warmup
```

phpunit
```
./vendor/bin/phpunit -c phpunit.xml.dist tests/
```

phpspec

```
./vendor/bin/phpspec

```

humbug mutation testing

```
./vendor/bin/humbug
``` 

phpstan (static analysis)
```
./vendor/bin/phpstan analyse src --level 7
```