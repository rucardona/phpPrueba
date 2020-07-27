# Prueba


## Proyecto Empresas

El proyecto esta desarrollado en PHP con el frameword Yii2



<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

los pasos utilizados para la creación del proyecto fueron:




INSTALACION
------------

### Instalar via Composer

obtener composer [Composer](http://getcomposer.org/) y seguir las instrucciones de instalación [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Para instalar el proyecto se utiliza composer

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Esta es la ruta de acceso por defecto

~~~
http://localhost/basic/web/
~~~


CONFIGURACIÓN
-------------

### Database

Editar el archivo `config/db.php` con la cadena de conexión, ejemplo:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```


#### Script

En la carpeta ScriptsDB se encuentran los script sql para la creacion de las bases de datos y tablas de cada proyecto

### Configuración Conexión Cliente SOAP
Editar el archivo `config/web.php` y cambiar el endpoint del `WSDL`

~~~
	'WSUsuarios' => [
            'class' => 'mongosoft\soapclient\Client',
            'url' => 'https://localhost:44301/wsUsuario.asmx?WSDL',
            'options' => [
                'cache_wsdl' => 0,
                'trace' => 1,
                'stream_context' => stream_context_create(array(
                      'ssl' => array(
                           'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                      )
                      )
                )
            ],
        ],
~~~




**NOTA:**

- el proyecto se movio a una carpeta denominada proyectoEmpresas por lo que la ruta de acceso al mismo cambió a :

~~~
	http://localhost/phpPrueba/proyectoEmpresas/web/index.php
~~~

- una vez descargado el proyecto de Git, se debe realizar la instalacion de dependencias de Yii2 para lo cual se debe ejecutar en el proyecto proyectoEmpresas el comando 
~~~
	composer install 
~~~
## Proyecto Usuarios

Proyecto desarrollado en .Net framework 4.7.2
Cuenta con un servicio asmx denominado wsUsuario

se debe arrancar el proyecto por el puerto 44301
la ruta de acceso al servicio SOAP es:

~~~
	https://localhost:44301/wsUsuario.asmx
~~~
