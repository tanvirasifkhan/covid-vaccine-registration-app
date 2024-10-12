## About The Project  

This project is basically a Covid 19 Vaccination registration app. It contains features like poeple can register by themeselves for vaccination, can search their information using the NID, getting scheduled by the vaccination team, getting email notification before the day of vaccination. Admin can login into the admin panel, can view the registered / scheduled / vaccinated candidate list, can assign vaccination date to candidates, can view details of every candidate available.

## Tech Stack used for this project

1. PHP 8.3
2. MySQL 8.0
3. phpMyadmin 5.2
4. Laravel 11
5. Node 20 LTS
6. VueJS 3 with Composition API
7. TypeScript for VueJS
8. Pinia for VueJS state management
9. Docker 27
10. Ubuntu 24.04 LTS as OS
11. REST API using SOLID Design Pattern 

## Necessary Softwares to Download

Docker is the main backbone of this application. Without the proper installation and configuration, this application can not be run. Docker should be running in the background. You can check it by using `docker ps` and `sudo systemctl status docker` commands.You can follow the link given below to install and configure Docker.

https://docs.docker.com/engine/install/ubuntu/

We need to install and configure **PHP 8.3** and [Composer](https://getcomposer.org/download/) for PHP package management.After installation, you can check it by `composer --version` command.

After that install and configure [NodeJS](https://nodejs.org/en). You can use the [NVM](https://github.com/nvm-sh/nvm) to install and configure NodeJs. 

**Follow the commands to install NodeJS easily**

`wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.1/install.sh | bash`

Restart your terminal and run the following commands

`nvm install --lts` and `nvm current` you are done. You can check it by using `node --version` and `npm --version` commands.

After the successful installation and configuration of all the softwares, you are good to go.

## How to get the project live

To get the application up and running you need to follow couple of steps. Lets go with the steps one by one

### STEP #1:  Clone the github repository

First you need to clone the Github repository from the link given below 

https://github.com/tanvirasifkhan/covid-vaccine-registration-app

and `cd /covid-vaccine-registration-app`

**For Backend follow the commands**

1. `cd backend`
2. `touch .env` and `cp .env.example .env`
3. `composer install`
4. `php artisan key:generate`

**For Frontend follow the commands**

1. `cd frontend`
2. `touch .env` and `cp .env.example .env`
3. `npm install`

 and `cd /covid-vaccine-registration-app`
 
### STEP #2:  Building Docker Image
 
  then build the docker using `docker compose up -d` command. It will take some time based on your internet connection to complete. After building the Docker there will be 

**Four Containers ( Running on ports )**

1. covid-vaccine-backend (http://localhost:8000)
2. covid-vaccine-frontend (http://localhost:5173)
3. covid-vaccine-database-server (http://localhost:3306)
4. covid-vaccine-database-admin-panel (http://localhost:8080)

**Important Note**

If mysql server is already running on your system at `3306` port then it will conflict with the docker mysql server. Because mysql server docker container also configured to run on port `3306`. So you need to stop the local mysql server by using `sudo systemctl stop mysql` and `sudo systemctl disable mysql`. After that run `docker compose down` and `docker compose up -d`. It should all be running fine in your system. So all your docker containers are running fine.

### STEP #3:  Configure The Backend API Database

Now its time to configure backend `.env` file. Configure your database credentials like below and keep it as it is

```
DB_CONNECTION=mysql
DB_HOST=database-server
DB_PORT=3306
DB_DATABASE=covid-vaccine-registration
DB_USERNAME=root
DB_PASSWORD=
```

Now access your `phpMyadmin` panel inside your browser on port `localhost:8080` and create a database called `covid-vaccine-registration`.

Then from the root folder of your project run `docker exec covid-vaccine-backend php artisan migrate` command to create all the tables in the database. Then run `docker exec covid-vaccine-backend php artisan db:seed` to prepopulate admin login and vaccine centers data. By the way, there are 10 vaccine centers data prepopulated in the database inside `vaccine_centers` table.

**Default Admin Login Credentials**

By default, an Admin login credential will be created after running the database seed command. Keep in mind that, we do not have registration system for the Admin. So, you will have to use the below credential for login as Admin.

```
Email address: admin@gmail.com
Password: admin
```


### STEP #4:  Configure The Email Client
In this step, we will be configuring the email client at which we will be sending email notifications. In this application, I am using [Mailtrap](https://mailtrap.io) for capturing email notifications from the localhost. Create an account in this website and create an demo inbox. Nevigate to that inbox, choose **Laravel 9+** from the **Integration > SMTP > Code Samples > PHP** tab and copy your email configuration env code. Your code will look something like the below

```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<your_username>
MAIL_PASSWORD=<your_password>
```
This is a sample code block. Copy the generated code from [Mailtrap](https://mailtrap.io) inbox and paste it to your backend `.env` file. Please comment out the existing `.env` configuration

```
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
Otherwise there will be a confliction and email notifications will not be sent properly.

### STEP #5:  Running Background Queue and Schedule Work
Follow the instruction for running background workers. Check the Laravel `routes/console.php` file. Email notification sending is scheduled at `21:00` for the previous day of the scheduled date. Change status to `vaccinated` task is scheduled at `01:00` just after the day of the actual scheduled date.

**For Background Queue Work Run**

`docker exec covid-vaccine-backend php artisan queue:work`
This command will be responsible sending email in the background without hampering the user experience.

**For Background Schedule Work Run**

`docker exec covid-vaccine-backend php artisan schedule:work`
This command will be responsible for scheduling background tasks.

Now guess what, you are good to access the whole application in the browser.

1. Enter `localhost:8000` for backend
2. Enter `localhost:5173` for frontend
3. Enter `localhost:8080` for database phpMyadmin panel

You can now play around with the application.

**About Email/SMS Notification Sending Driver**

Currently, we are sending email notifications via `mail` driver. If you want to send mobile SMS, then you will have to 
use that particular server driver. For instance `slack`, `vonage`, `twillio` etc and we can send notifications through multiple routes at the same time like below.

```
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Notification;
 
Notification::route('mail', 'taylor@example.com')
            ->route('vonage', '5555555555')
            ->route('slack', '#slack-channel')
            ->route('broadcast', [new Channel('channel-name')])
            ->notify(new InvoicePaid($invoice));

```
https://laravel.com/docs/11.x/notifications#on-demand-notifications

**About Search Query Optimization**

In our app, there is a search by nid functionality by which people can search their status using their respective NID. Currently this is in a normal state. But in future we might need to optimize it. Here are some optimizing techniues I can suggest

1. Using caching service like **Redis**
2. Indexing database colums
3. Optimizing query using **Laravel** eager loading concept
4. Fetching every data from cache

These are the initial optimization techniques that can be implemented in the future if needed.

Hope, the application runs smoothly. Enjoy and thanks






