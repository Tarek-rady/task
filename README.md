# Laravel Queue Job Configuration

Laravel Queue Job Configuration
This guide will help you set up and configure Laravel queues to handle background jobs such as exporting Excel files.

Prerequisites
PHP
Composer
Laravel
A web server (e.g., Apache, Nginx)
Database (e.g., MySQL, PostgreSQL)
Steps to Configure Jobs and Queues
1. Set Up the Queue Table
First, you need to create a migration for the jobs table. Run the following commands:

php artisan queue:table

php artisan migrate

2. Update .env File
Open your .env file and set the queue connection to database:

QUEUE_CONNECTION=database

3. Enable Zip Extension (Windows Only)
If you are using Windows, you need to enable the zip extension in your php.ini file:

Locate your php.ini file. You can find the location by running:
php --ini

Open the php.ini file in a text editor.

Search for the following line and remove the semicolon (;) at the beginning to uncomment it:

;extension=zip

Save the file and restart your web server.
4. Running the Queue Worker
To start processing jobs, run the following command in your terminal:

php artisan queue:work

Keep this command running to allow the queue to process jobs continuously


