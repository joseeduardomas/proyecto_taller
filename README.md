<p align="center">
    <a href="https://github.com/joseeduardomas/proyecto_taller" target="_blank">
        <img src="web/img/logo.png" height="100px">
    </a>
    <h1 align="center">Proyecto realizado en taller de Yii2</h1>
    <br>
</p>




Acerca del Proyecto
-------------------
Este proyecto fue elaborado con la finalidad de mostrar un poco acerca del uso
de Yii Framework junto con PHP, MySQL y Git, hecho con fines educativos de una manera sencilla.


Estructura de Directorios
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


Requerimientos
------------
Los requerimientos mínimos son los siguientes:
* PHP 5.6.0
* MariaDB/MySQL
* Composer
* Git


Instalación
------------
### Install via Composer
1. Clonar el repositorio
    ```sh
   git clone https://github.com/joseeduardomas/proyecto_taller.git
   ```
2. Instalar dependencias via Composer
    ```sh
   composer install
   composer update
   ```

Ahora deberian poder acceder a la aplicación a travez de la siguiente URL, asumiendo **_proyecto_** es el directorio
nombrado en la carpeta principal.
~~~
http://localhost/proyecto/web/
~~~

~~~
Usuario: demo
Contraseña: demo

Usuario: admin
Contraseña: admin
~~~


### Tener en cuenta lo siguiente: 
1. Recordar que el proyecto debe ser clonada en la carpeta de su servidior de aplicaciones, e.g **APACHE (Dentro de la carpeta htdocs)**
2. Deberán tener previamente instalado **Composer**
3. Deberán tener previamente instalado **Git**
4. Si usan **XAMPP** no olviden **encender** sus **servicios de APACHE y MySQL**
5. Si cambiaron sus puertos recuerden que se deben especificar, e.g `localhost:8080`
6. A la **larga** se acostumbra

Configuración
-------------

### Base de datos

Editar el archivo `config/db.php` con datos reales, por ejemplo:
~~~
Usuario: demo
Contraseña: demo

Usuario: admin
Contraseña: admin
~~~
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=proyecto_practica',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

**NOTES:**
- **Yii no crea la base de datos en automatico**, se tiene que generar **manualmente** antes de poder acceder a ella.
- Para este proyecto podrán buscar el ejemplo de la base de datos en `config/proyecto_practica.sql`
- Recordar que si cambiaron su puerto debe ser especificado, e.g `localhost:8080`
