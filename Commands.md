# Commands

## symfony
cache clear
```
bin/console cache:clear --no-warmup
```

## doctrine

```
bin/console doctrine:database:drop --force
bin/console doctrine:database:create
bin/console doctrine:schema:create

```

## testing
### phpunit
```
./vendor/bin/phpunit -c phpunit.xml.dist tests/
./vendor/bin/phpunit -c phpunit.xml.dist --testsuite Functional
./vendor/bin/phpunit -c phpunit.xml.dist --testsuite Unit
```

### phpspec

```
./vendor/bin/phpspec describe 'AppBundle\Entity\Dummy'
./vendor/bin/phpspec run

```

### humbug

```
./vendor/bin/humbug
``` 

### Static analyser
phpstan (static analysis)
```
./vendor/bin/phpstan analyse src --level 7
```