.PHONY: docker-run
start: ## Start;
	docker-compose up -d
	docker exec -it tt_web bash -c "composer install"

stop: ## Stop;
	docker-compose down

test: ## Run tests
	docker exec -it tt_web bash -c "./vendor/bin/phpunit tests"

lint: ## Run linter
	docker exec -it tt_web bash -c "./vendor/bin/phplint"

cs: ## Run codesniffer
	docker exec -it tt_web bash -c "./vendor/bin/phpcs app tests"