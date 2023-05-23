# My personal blog

This project is created as part of my training on OpenClassrooms. It's about my personal blog.

## Features
- Home page
- Portfolio page
- About page
- Blog
- Contact page 

## Technologies Used
- HTML
- CSS
- JavaScript

## Installation

1. Clone this repository : https://github.com/ntimba/blog.git

To install this project, make sure you have the following packages installed:
- sass
- composer

Once the packages are installed, you can proceed with the installation by following these steps:

1. Install with npm: `npm install`
2. Install with composer: `composer install`


If you are using Docker, you can install the project with the following commands:
`docker build`
`docker-compose up -d --build`


docker-compose exec php composer install
docker-compose exec php bin/console doctrine:database:create
docker-compose exec php bin/console doctrine:migrations:migrate
docker-compose exec php bin/console doctrine:fixtures:load

## Author
Chancy Ntimba

## License

This project is licensed under the MIT License. See the `LICENSE` file for more information.