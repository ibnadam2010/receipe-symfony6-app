
* 1. [What is this app for ?](#Whatiscronify)
* 2. [How to install the app ?](#Howtoinstalltheapp)
	* 2.1. [Prerequisites](#Prerequisites)
	* 2.2. [Clone and install](#Cloneandinstall)
	* 2.3. [Create a new User](#CreateanewUser)
* 3. [How to use ?](#Howtouse)
	* 3.1. [Create a new App](#CreateanewApp)
	* 3.2. [Create a new Job](#CreateanewJob)
	* 3.3. [Get Cron Code snippet](#GetCronCodesnippet)
* 4. [How to quickly test Cronify?](#HowtoquicklytestCronify)
	* 4.1. [ Create a docker-compose.yml](#Createadocker-compose.yml)
	* 4.2. [Start containers](#Startcontainers)
	* 4.3. [Launch your browser and have fun !](#Launchyourbrowserandhavefun)
* 5. [ Build your own Docker image](#BuildyourownDockerimage)

<!-- vscode-markdown-toc-config
	numbering=true
	autoSave=true
	/vscode-markdown-toc-config -->
<!-- /vscode-markdown-toc -->

---

1. This application is a basic e-commerce app to sell products.

The use is super simple:
    - Create your account & connect to you space
    - Add product into your cart
    - Validate your cart & process to the paiement

2. How to install the app ?

This app is a simple Symfony/PHP/MySQL application.

This documentation offers a simplified installation FOR DEVELOPMENT ONLY with Docker. You can do without it if you already have MySQL.

###  2.1. Prerequisites

- [PHP 8.1 or heigher](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/)
- [Make](https://www.gnu.org/software/make/)
- [Symfony CLI](https://symfony.com/download)

###  2.2. Clone and install

```bash
git clone https://github.com/ibnadam2010/receipe-symfony6-app.git
cd receipe-symfony6-app
composer install
```

3. HOW do you use it!

###  3.1. Create a new User

Simply click on Login link located on the right corner.

###  5.1. <a name='Createadocker-compose.yml'></a> Create a docker-compose.yml

```yaml
version: '3'

services:
  database:
    image: postgres:${POSTGRES_VERSION:-13}-alpine
    environment:
      POSTGRES_DB: ${POSTGRES_DB:-app}
      POSTGRES_PASSWORD: ${POSTGRES_PASSWORD:-ChangeMe}
      POSTGRES_USER: ${POSTGRES_USER:-symfony}
    volumes:
      - db-data:/var/lib/postgresql/data:rw

  app:
    image: yoanbernabeu/cronify:latest
    ports:
      - "8080:80"
    environment:
      DATABASE_URL: postgres://${POSTGRES_USER:-symfony}:${POSTGRES_PASSWORD:-ChangeMe}@database:5432/${POSTGRES_DB:-app}

volumes:
  db-data:
```

###  5.2. <a name='Startcontainers'></a>Start containers

```bash
docker-compose up -d
```

###  5.3. <a name='Launchyourbrowserandhavefun'></a>Launch your browser and have fun !

- Go to http://localhost:8080
- Login with :
	- username: demo@demo.com
	- password: password

##  6. <a name='BuildyourownDockerimage'></a> Build your own Docker image

If you want to build your own Docker image, we provide a make command that you **need to adapt to your context**.

*Do not run the command without modifications, you would not have the rights to upload the image to the Docker Hub.*

```bash
make docker-build-and-push
```

##  7. <a name='License'></a>License

See the bundled [LICENSE](LICENCE) file.