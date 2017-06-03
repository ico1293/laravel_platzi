# laravel_platzi
Seguimiento paso a paso del curso de laravel de platzi, para el estudio futuro del framework

## INSTALACION DE LARAVEL EN WINDOWS
### Instalamos composer

[link to install composer](https://getcomposer.org/doc/00-intro.md)

para windows utilizamos el installer, solo es descargarlo e instalarlo.

verificar la instalación:

```
composer --version
```

### Instamamos laravel

terminal:
```
composer global require "laravel/installer"
```
> note: link de la documentación de laravel para windows : https://laravel.com/docs/4.2

> En la siguiente ruta, se encuentra instalado laravel: (Tengo entendido) C:\Users\Stiven\AppData\Roaming\Composer\vendor\bin

### Agregar laravel a la variable de entorno PATH
- damos propiedades a mi PC.

- luego clic en configuración avanzada del sistema.

- pestaña Opciones avanzadas.

- pulsamos el boton variables de entorno.

- en variables de sistema ubicamos path.

- pulsamos editar

- pulsamos nuevo, y copiamos ahí la ruta :

>C:\Users\Stiven\AppData\Roaming\Composer\vendor\bin

aceptar a todo y listo, ya podemos utilizar el comando laravel en la terminal.

## Crear un proyecto laravel

```
laravel new <nombre_del_proyecto>
```
## Levantar el servidor

```
php artisan serve
```

