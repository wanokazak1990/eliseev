#включть контейнеры в текущем каталоге (из фаила docker-compose.yml)
docker-up:
	sudo docker-compose up -d

#собрать/пересобрать контейнеры в текущем каталоге (из фаила docker-compose.yml)
docker-build:
	sudo docker-compose up --build -d

#остановить контейнеры в текущем каталоге (из фаила docker-compose.yml)
docker-down:
	sudo docker-compose down

#запустить тестовые тесты laravel
laravel-test:
	sudo docker exec app_php-fpm_1 vendor/bin/phpunit

#список всех контейнеров
docker-containers-list:
	sudo docker ps -a

#выключить все контейнеры, абсолютно все
docker-all-stop:
	sudo docker stop $$(sudo docker ps -a -q)

#удалить все контейнеры, абсолютно все
docker-all-destroy:
	sudo docker rm $$(sudo docker ps -a -q)

#накачать пакеты из ноды
node-install:
	sudo docker exec app_node_1 yarn run dev

#собрать пакеты под js и css без уменьшения
node-dev:
	sudo docker exec app_node_1 yarn run dev

#собрать пакеты под js и css с уменьшением
node-production:
	sudo docker exec app_node_1 yarn run production

#изменить права на каталоги
perm:
	sudo chown ${USER}:${USER} bootstrap/cache -R
	sudo chown ${USER}:${USER} storage -R
	if [ -d "node_modules" ]; then sudo chown ${USER}:${USER} node_modules -R; fi
	if [ -d "public/build" ]; then sudo chown ${USER}:${USER} public/build -R; fi

