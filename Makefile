
.PHONY: tests

## Colors
COLOR_RESET			= \033[0m
COLOR_ERROR			= \033[31m
COLOR_INFO			= \033[32m
COLOR_COMMENT		= \033[33m
COLOR_TITLE_BLOCK	= \033[0;44m\033[37m

## Help
help:
	@printf "${COLOR_TITLE_BLOCK}TEST  Makefile${COLOR_RESET}\n"
	@printf "\n"
	@printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	@printf " make [target]\n\n"
	@printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	@awk '/^[a-zA-Z\-\_0-9\@]+:/ { \
		helpLine = match(lastLine, /^## (.*)/); \
		helpCommand = substr($$1, 0, index($$1, ":")); \
		helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
		printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

CONTAINER_ID_PHP = $$(docker container ls -f "name=calc" -q)
PHP = docker exec -ti $(CONTAINER_ID_PHP)

######### DOCKER COMPOSE COMMANDS #########

DOCKER_COMPOSE = docker-compose -p test -f docker-compose.yaml

## launch docker containers, no rebuild
start:
	@$(DOCKER_COMPOSE) up -d

## stop docker containers
stop:
	@$(DOCKER_COMPOSE) stop

## install and 
composer-install:
	$(PHP) composer install

## start docker and install dependancies, tests
run-project: start composer-install tests

######### CONNECT TO CONTAINERS #########
## Connect to the container
shell-app:
	$(PHP) bash
 
## run tests phpunit
tests: 
	$(PHP)  ./vendor/bin/phpunit tests/ --color=always


 