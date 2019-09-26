#!/usr/bin/env bash

DIRNAME=$PWD

echo $DIRNAME

pushd laradock

docker-compose down

docker ps