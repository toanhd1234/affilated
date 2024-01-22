#Information
 - php 8.2
 - Laravel 10.x

// If you use to docker
#DOCKER
 - docker-compose up
 - Go to php-app and run command 
 + php artisan migrate
 + php artisan jwt:secret

// If you don't use docker
#BUILDING
 - composer i
 - cd .env.example .env
 - php artisan key:generate
 - php artisan migrate
 - php artisan jwt:secret
 - php artisan ser
