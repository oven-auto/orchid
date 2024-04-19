SHELL := /bin/bash

build:
	sudo docker compose up --build -d

down:
	sudo docker compose down

stop:
	sudo docker compose stop

fphp:
	sudo docker exec -it bl-fphp bash

node: 
	sudo docker exec -it bl-node bash
	