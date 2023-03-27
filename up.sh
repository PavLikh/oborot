#!/bin/bash

docker compose build
chmod 777 public
chmod 777 public/garden.txt
composer install -o
docker compose up
