#!/bin/sh
# production enviroment setup

./bin/console assets:install
./bin/console cache:clear --env=prod --no-debug
