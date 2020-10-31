# Sample Application
=====================

This repository intends to be a sample of application using the Harpya Identity Provider (HIP). 

## Setup

1. Clone this repository

    git clone https://github.com/Harpya/sample-application-ip.git

2. Rename the environment configuration files

    cp ip.env.sample ip.env
    cp app.env.sample app.env
    cp .env.sample .env

3. Configure the configuration

Edit the files ``.env``, ``ip.env`` and ``app.env`` according to your environment.


4. Start the containers

    docker-compose up -d

Double check if everything is up and running

    docker-compose ps


5. Create an App entry on Identity Provider instance

To access the Identity Provider, is necessary register each application which will make calls to it there.    

    docker-compose exec app_identity_provider bin/harpya app add demo --name="My 1st application"

The output should be something like:

user$ docker-compose exec app_identity_provider bin/harpya app add demo --name="My 1st application"

Success!
Your secret token is 3170b820f961ac3721cc62388e4f2396be90f9abf5b00784426f1d762747ca43 . Copy it and keep it safe, since will not be possible recover later.



Now you have your application 'demo' created. Copy the secret token in a safe place.

6. Configure your application's ``.env`` file

Inside your application's folder, should have a file ``.env``, with some configuration it uses. 

```
    ~\
      + docker-compose.yaml
      + app.env
      + ip.env
      .
      .
      .
      + <app>
          + .env      <---- your internal application's configuration

```

Edit this file and add these entries:



```
HSDK_IP_INTERNAL_URL=<URL for IP's webserver>
HSDK_IP_EXTERNAL_URL=<external URL (with port) of IP>

HSDK_APP_ID=<application id - informed when in it's creation>
HSDK_APP_SECRET=<secret token>

HSDK_APP_BASE_URL=<URL from default application >
HSDK_APP_AUTH_PATH=<Application's route which IP uses to interact with it >

```

For example:
```
HSDK_IP_INTERNAL_URL=http://web_identity_provider
HSDK_IP_EXTERNAL_URL=http://localhost:3883

HSDK_APP_ID=demo
HSDK_APP_SECRET=3170b820f961ac3721cc62388e4f2396be90f9abf5b00784426f1d762747ca43

HSDK_APP_BASE_URL=http://web
HSDK_APP_AUTH_PATH=/authorize/

```





## Configuration

### .env

#### NETWORK_SUBNET

#### IP_WEB_EXPOSED_PORT

#### APP_WEB_EXPOSED_PORT

### ip.env

#### PROJECT_SOURCE_PATH

#### IDENTITY_PROVIDER_EMAIL_ADMIN

#### IDENTITY_PROVIDER_HOST

#### IDENTITY_PROVIDER_DOMAIN
 
#### WEB_USER
#### WEB_GROUP
 
#### APACHE_ROOT_DIR
 
#### PHP_APP_DIR
#### PHP_ROOT_DIR
#### PHP_LOG_DIR
 
#### NETWORK_SUBNET


#### WEBSERVER_EXPOSED_PORT
#### WEBSERVER_SSL_EXPOSED_PORT


#### DB_ADAPTER
#### DB_HOST
#### DB_USERNAME
#### DB_PASSWORD
#### DB_DBNAME
#### DB_CHARSET


#### TIMESCALEDB_TELEMETRY
#### TS_TUNE_NUM_CPUS
#### TS_TUNE_MEMORY

#### POSTGRES_PASSWORD
#### POSTGRES_USER
#### POSTGRES_DB
#### PGDATA


#### VIEWS_DIR
#### BASE_URI



#### HSDK_PREFIX_TOKEN

#### HIP_DEFAULT_URL_AFTER_LOGIN

#### HIP_HOSTNAME
#### HIP_DEFAULT_URL


#### HSDK_DATETIME_FORMAT
#### HSDK_SESSION_TTL


#### MAIL_HOST
#### MAIL_PORT
#### MAIL_FROM_EMAIL
#### MAIL_FROM_NAME

#### APP_SITE_NAME
#### APP_SITE_URL
#### APP_CUSTOMER_SERVICE_EMAIL


## Usage