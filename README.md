<p align="center"><h1>Mini-forum</h1></p>

> ### Example Laravel forum (CRUD, auth and more) with mysql.


## Getting Started
## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone https://github.com/Nurasyl-Absamat/mini-forum.git

Switch to the repo folder
    
    cd mini-forum

Install all the dependencies using composer
    
    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve
    
You can now access the server at http://localhost:8000


**Command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
# Code overview

## Dependencies

- [toastr-yoeunes](https://github.com/yoeunes/toastr) - For notifications

## What's in the Forum

You navigate in forum with channels. As you are the admin you can add, edit or delete channels. 

<img src="https://github.com/Nurasyl-Absamat/mini-forum/blob/second/screenshots/ChannelsBar.png" /> 
<img src="https://github.com/Nurasyl-Absamat/mini-forum/blob/second/screenshots/ChannelsCrud.png" />

Forum page

<img src="https://github.com/Nurasyl-Absamat/mini-forum/blob/second/screenshots/Forum.png" />

You can watch discussion. This means if someone will add reply to discussion, message will be received to your email. I trap messages with mailtrap.io, but you can do it on your own and if you want to, see the website https://mailtrap.io/. Also you can leave a reply and like replies

<img src="https://github.com/Nurasyl-Absamat/mini-forum/blob/second/screenshots/Discussion.png" />
<img src="https://github.com/Nurasyl-Absamat/mini-forum/blob/second/screenshots/LikeAndReplies.png" />

You can see only your discussions by this url http://mini-forum.test/forum?filter=me or click My discussions on panel.

<img src="https://github.com/Nurasyl-Absamat/mini-forum/blob/second/screenshots/MyDiscussion.png" />














