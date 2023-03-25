# Entrega 1 - Tópicos Especiales en Ingeniería de Software

<div style="text-align:center">
    <img src="https://i.imgur.com/qrNCSxg.png" alt="Logo" style="height: 400px; width:400px;" />
</div>

## Diagrama de Clases

---

![Diagrama de Clases](https://i.imgur.com/r2MNTGX.png)

## Diagrama de Arquitectura

---

![Diagrama de Arquitectura](https://i.imgur.com/khAGSDK.png)
## Instalación del proyecto

---

Para instalar el proyecto debemos seguir estos pasos :

1. Debemos clonar el repositorio de GitHub estando ubicados en la carpeta **htdocs**, donde está nuestro **XAMPP**.

```sh
git https://github.com/achavaned/projectcicd.git
```

2. Debemos ejecutar desde la carpeta del proyecto el siguiente comando para instalar el proyecto:

 ```sh
 composer install
 ```

3. Debemos abrir **XAMPP Control Panel** y hacer click en el botón **Start Apache** y **Start MySQL**.

![XAMPP](https://i.imgur.com/IkwqBG5.png)

4. Ahora debemos abrir el administrador de base de datos de **MySQL** y sobre la parte izquierda donde están las bases de datos, debemos hacer click en **New**.

![Crear base de datos](https://i.imgur.com/jBQxtbS.png)

Se va a llamar ``taller1_svelezp9``.

![Crear base de datos](https://i.imgur.com/ODYk7Uz.png)


Le damos click en **Create**.

1. Ahora, debemos crear un archivo ``.env`` en la carpeta principal del proyecto. En este, pegaremos lo siguiente:
=======
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

```sh
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:G65eNSnoyacF5jQgoFiXrg9pyV0WUFcm1OqG0yzJ/Zk=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller1_svelezp9
DB_USERNAME=root
DB_PASSWORD=

SCOUT_DRIVER=database

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

6. Ahora, debemos relizar las migraciones, para lo cual usaremos el siguiente comando:

```sh
php artisan migrate
```

7. Si hicimos bien los pasos, deberíamos ver la tabla en la base de datos creada en **phpMyAdmin**.

8. A continuación debemos ejecutar el siguiente comando:

```sh
php artisan key:generate
```

9. Debemos instalar DOMPDF Wrapper para Laravel, con el siguiente comando:

```sh
composer require barryvdh/laravel-dompdf
```

10. También hay que instalar y publicar Laravel Scout, con los siguientes comandos:

```sh
composer require laravel/scout
```

```sh
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```

11. Hay que instalar PHP API Client para lo que usaremos el siguiente comando:

```
composer require guzzlehttp/guzzle
```

12. Debemos instalar File Storage con el siguiente comando:

```sh
php artisan storage:link
```

13. Para finalmente ejecutar el proyecto debemos correr el siguiente comando:

```sh
php artisan serve
```

Si hicimos todo bien, entramos a la página web (**<http://127.0.0.1:8000>**) y veremos lo siguiente:

![Página en funcionamiento](https://i.imgur.com/w0HKyr4.png)
>>>>>>> ef367b75aa48f8383facbb3bff80882fb1ef4047
