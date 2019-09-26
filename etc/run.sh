#!/usr/bin/env bash

cat ./laradock/env-example ./etc/laradock.env-example > ./laradock/.env
cp ./etc/laravel.env.example ./job-portal/.env

cp ./etc/createdb.sql ./laradock/mysql/docker-entrypoint-initdb.d/

pushd ./laradock
docker-compose build --no-cache nginx mysql workspace
docker-compose up -d nginx mysql workspace

docker-compose exec -T --user=laradock workspace composer install
docker-compose exec -T --user=laradock workspace composer run initialize