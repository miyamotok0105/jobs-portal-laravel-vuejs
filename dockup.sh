#!/usr/bin/env bash

DIRNAME=$PWD

echo $DIRNAME

pushd laradock

docker-compose up -d nginx mysql workspace