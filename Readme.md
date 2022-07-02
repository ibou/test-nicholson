## Installation
```
$ docker-compose up -d
$ docker exec -it calc bash
$ cd /var/www/html/
$ composer install
$ ./vendor/bin/phpunit tests/ --color=always
```

## OR use the makefile command

> Start docker, install dependancies and run tests 
``` 
$ make run-project
```

## connect to the container
  - docker exec -it calc bash
  OR
  - make shell-app

## Run tests

```shell
$ make tests
```

## Test calculator
```shell
$ make shell-app
root@995ed69d1c28:/var/www/html# php index.php
root@995ed69d1c28:/var/www/html# enter value:  (6+3) * (5-3) 
```



