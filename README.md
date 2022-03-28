# Entrega 1 - Tópicos Especiales en Ingeniería de Software

<div style="text-align:center">
    <img src="https://i.imgur.com/qrNCSxg.png" alt="Logo" style="height: 400px; width:400px;" />
</div>

## Instalación del proyecto

---

Para instalar el proyecto debemos seguir estos pasos:

1. Debemos clonar el repositorio de GitHub estando ubicados en la carpeta **htdocs**, donde está nuestro **XAMPP**.

```sh
git clone https://github.com/svelezp9/taller1.git
```

2. Debemos ejecutar desde la carpeta del proyecto el siguiente comando para instalar el proyecto:

 ```sh
 composer install
 ```

3. Ahora, debemos crear un archivo de migración, ejecutando el siguiente comando:

```sh
php artisan make:migration create_mobiles_table
```

4. Debemos abrir el archivo creado y pegar el siguiente código:

```php
<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('mobiles', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->float('price');

            $table->string('brand');

            $table->string('model');

            $table->string('color');

            $table->integer('ramMemory');

            $table->integer('storage');

            $table->string('imgName');

            $table->timestamps();
        });
    }

    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('mobiles');
    }
};
```

5. Debemos abrir **XAMPP Control Panel** y hacer click en el botón **Start Apache** y **Start MySQL**.

![XAMPP](https://i.imgur.com/IkwqBG5.png)

6. Ahora debemos abrir el administrador de base de datos de **MySQL** y sobre la parte izquierda donde están las bases de datos, debemos hacer click en **New**.

![Crear base de datos](https://i.imgur.com/jBQxtbS.png)

Se va a llamar ``taller1_svelezp9``.

![Crear base de datos](https://i.imgur.com/ODYk7Uz.png)

Le damos click en **Create**.

7. Ahora, debemos crear un archivo ``.env`` en la carpeta principal del proyecto. En este, pegaremos lo siguiente:

```sh
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:kZUhfW6rCk3l+ZMtWwKRTR1RoVGQ3l6CIz5MUIsbkQ8=
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

8. Ahora, debemos relizar las migraciones, para lo cual usaremos el siguiente comando:

```sh
php artisan migrate
```

9. Si hicimos bien los pasos, deberíamos ver la tabla en la base de datos creada en **phpMyAdmin**.

10. A continuación debemos ejecutar el siguiente comando:
```sh
php artisan key:generate
```

11. Para finalmente ejecutar el proyecto debemos correr el siguiente comando:
```sh
php artisan serve
```

Si hicimos todo bien, entramos a la página web (**http://127.0.0.1:8000**) y veremos lo siguiente:

![Página en funcionamiento](https://i.imgur.com/w0HKyr4.png)
