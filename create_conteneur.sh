#!/bin/bash

docker run -d --name panier_php_conteneur -p 127.0.0.1:86:80 -v 
$(pwd)/app:/app panier_php_lamp:latest

exit 0
