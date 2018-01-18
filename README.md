# PHP C Phalcon Scaffold

It is basically a fresh setup of web application based on C Phalcon PHP framework.
It provides multi-module configuration, all the features which are part of the framework and Docker setup for both: dev and prod environments.

## Technologies
* PHP 7.2 with **composer**
* C Phalcon PHP framework 3.3.0
* NGINX 1.13 web server

## Requirements

### with Docker
* Make >= 4.1
* Docker >= 17.05 with **compose** >= 1.18

### without Docker
* Make >= 4.1
* PHP >= 7.2 with **composer**
* C Phalcon PHP framework ^3.3
* NGINX or Apache web server

## Installation
Just clone the repository and customize the application to yourself.

You might want to use my Docker setup as well.
You will find all the important commands in Makefile (development) and Makefile.prod files.

In other case you have to setup the environment by yourself. You can find the requirements above.

## License

[MIT License](./LICENSE)
