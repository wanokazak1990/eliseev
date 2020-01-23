docker-up:
	sudo docker-compose up -d

docker-build:
	sudo docker-compose up --build -d

docker-down:
	sudo docker-compose down

docker-all-stop:
	sudo docker stop $(sudo docker ps -a -q)

docker-all-destroy:
	sudo docker rm $(sudo docker ps -a -q)