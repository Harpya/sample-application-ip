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