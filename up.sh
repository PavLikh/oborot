#!/bin/bash

docker compose up
chmod 777 public
chmod 777 public/garden.txt
composer install -o

