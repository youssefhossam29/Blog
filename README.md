blog is a dynamic and diverse online space where we share captivating stories, insightful articles, and valuable resources across a wide range of topics. From technology and lifestyle to travel and wellness, our blog covers it all.


Getting Started:
To get started with Blog Website , simply clone this repository to your local machine and open terminal in project folder and write the follwoing commands:

    1- Install Composer Dependencies : composer install
    2- Duplicate the .env.example: cp .env.example .env
    3- Set Up Environment File: php artisan key:generate
    4- create new data and add its name in .env file ( in line 14)
    5- run migration files: php artisan migrate
    6- run DataSeeder that contains dummy data: php artisan db:seed --class=DataSeeder 
    7- Serve Your Application: php artisan serve

    ** to login as admin use following cardinalties: 
        email: admin1@gmail.com
        password: 123456

You can also explore the codebase to learn more about how our blog website is built and configured.
Thank you for your interest in Blog Website! We look forward to building and growing our blog community together.
Happy Blogging!


