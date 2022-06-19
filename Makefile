NET =	inception

all: mkdir deb up

psls:
	docker images
	docker network ls
	docker volume ls
	docker ps -a

mkdir:
	sudo mkdir -p ~/data/wp
	sudo mkdir -p ~/data/db
	sudo mkdir -p ~/data/rd
	sudo mkdir -p ~/data/ad
	sudo mkdir -p ~/data/html

deb:
	docker build -t debian:cvignar ./srcs
	
up:
	docker-compose -f ./srcs/docker-compose.yml up -d --build
	docker network ls
	docker volume ls
	docker ps -a

stop:
	docker-compose -f ./srcs/docker-compose.yml stop
	docker ps -a

rm:
	docker rm -f $$(docker ps -aq)

rmi:
	docker rmi -f $$(docker images -q)

net:
	docker network rm $(NET)

vol:
	docker volume rm $$(docker volume ls -q)

vold:
	sudo rm -fr ~/data
	
rst:
	sudo systemctl restart docker
logs:
	docker-compose -f ./srcs/docker-compose.yml logs -f
	
clean: rm net vol rst psls

fclean: clean rmi psls

.PHONY: all psls up stop rm rmi net vol rst logs clean fclean mkdir deb

