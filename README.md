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

After that install and configure [NodeJS](https://nodejs.org/en). You can use the [NVM](https://github.com/nvm-sh/nvm to install and configure NodeJs. 

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

 and `cd /covid-vaccine-registration-app` then build the docker using `docker compose up -d` command. It will take some time based on your internet connection to complete. After building the Docker there will be 

**Four Containers ( Running on ports )**

1. covid-vaccine-backend (http://localhost:8000)
2. covid-vaccine-frontend (http://localhost:5173)
3. covid-vaccine-database-server (http://localhost:3306)
4. covid-vaccine-database-admin-panel (http://localhost:8080)

**Important Note**
If mysql server is already running on your system at `3306` port then it will conflict with the docker mysql server. Because mysql server docker container also configured to run on port `3306`. So you need to stop the local mysql server by using `sudo systemctl stop mysql` and `sudo systemctl disable mysql`. After that run `docker compose down` and `docker compose up -d`. It should all be running fine in your system. So all your docker containers are running fine.

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

Here are some of the screenshots of the app. Screenshots are given to get a glimpse of the overall app.

![image info](https://i.postimg.cc/mc13498p/Screenshot-from-2024-10-12-04-58-37.png)

![image info](https://i.postimg.cc/qhfsv7FJ/Screenshot-from-2024-10-12-04-59-06.png)

![image info](https://i.postimg.cc/0MppMsgp/Screenshot-from-2024-10-12-04-59-25.png)

![image info](https://i.postimg.cc/wRgDDGHn/Screenshot-from-2024-10-12-05-10-39.png)

![image info](https://i.postimg.cc/1VBwBr3X/Screenshot-from-2024-10-12-05-12-17.png)

![image info](https://i.postimg.cc/RqBYPC0x/Screenshot-from-2024-10-12-05-12-27.png)

![image info](https://i.postimg.cc/6TfmFs72/Screenshot-from-2024-10-12-05-13-25.png)

![image info](https://i.postimg.cc/KRcH29L9/Screenshot-from-2024-10-12-05-16-26.png)

![image info](https://i.postimg.cc/GHMShkxb/Screenshot-from-2024-10-12-05-17-03.png)

![image info](https://i.postimg.cc/ZWCs9Cwp/Screenshot-from-2024-10-12-05-20-06.png)






