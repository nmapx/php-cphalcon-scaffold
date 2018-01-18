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

You can register new modules and DI services (global) in [./app/Kernel.php](./app/Kernel.php).
It's also possible to register DI services inside the given module. Just follow the example in [./src/App](./src/App).

You can add new parameters in `.env` and `.env.dist` files, then register them in [./app/config/parameters.php](./app/config/parameters.php).

You might want to use my Docker setup as well.
You will find all the important commands in Makefile (development) and Makefile.prod files.

In other case you have to setup the environment by yourself. You can find the requirements above.

### Quick start

1. Clone the repository and navigate to the project root
2. Create `.env` file based on `.env.dist` and fill the parameters
3. Execute `make compile` and let Docker build the images for you
4. Execute `make up` to run the containers
> Note: you may need to run `make composer` to fetch vendors in dev environment
5. Application should be accessible [here](http://127.0.0.1:9460)

## License

[MIT License](./LICENSE)
