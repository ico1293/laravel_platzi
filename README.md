# Laravel_Platzi
Seguimiento paso a paso del curso de laravel de platzi, para el estudio futuro del framework

## Preparar Sublime Text 3 para Laravel
### Instalar Package Control

[link to install Package Control](https://packagecontrol.io/)

* Seleccionamos Installation.
* Copiamos el codigo referente a la version de Sublime Text
* En Sublime vamos a view->show console 
* Pegamos ahí el codigo, enter, y reiniciamos Sublime

### Instalar Paquetes
abrimos package control con la siguiente combinación de letras:
> control + shift + p

Instalamos los siguientes paquetes:

* Laravel Blade Highlighter
* Blade Snippets

**Extra**: podemos instalar para los .md (markdown): 

* MarkDown preview
* MarkDown Editing

Y reiniciamos sublime

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

## ¿DONDE SE ENCUENTRAN LOS ARCHIVOS?

- VISTAS
```
/resourses/views
```
- RUTAS
```
/routes/wep.php
```
- CONFIGURAR BASE DE DATOS (CONEXION)
```
/.env
```
- MODELOS
```
/app/<nombre_del_modelo>
```
- CONTROLADORES
```
/app/http/controllers/
```
- MIGRATIONS
```
/database/migrations
```


## Crear un proyecto laravel

```
laravel new <nombre_del_proyecto>
```
## Levantar el servidor

```
php artisan serve
```

# ROUTE
```
Route::get('/', function () {
    return view('welcome');
});
```
> Ubicacion: /routes/wep.php


> Note: 
> - Primero parametro : es la ruta. en este caso: ``` '/' ``` , que indica nuestra home. 
> -  Segundo parametro : es la funcion de un controlador. en este caso: funcion anonima que como unico retorno es ``` view('welcome'); ``` cada vez que un usuario entre a la home de nuestro sitio, se va a ejecutar esta función anonima, y está a su vez va a renderizar la vista welcome, que se encuentra en ``` /resourses/views/welcome.blade.php ```. 
> Note 2:
> note que solo va el nombre de la view y se ignora el resto ```.blade.php ```.
> Note 3:
> Se puede configurar una ruta sin una view, no necesito que existan las dos cosas. (pero claro que no queremos hacer esto).

para pasarle a la view variables, lo hacemos con el segundo parametro de view: este segundo parametro recibe un array, donde podemos mandarle n cantidad de variables a la view
```
Route::get('/', function () {

	$<variable> = [
		'<key>' => '<value>',
		'<key2>' => '<value2>'
	];

    return view('welcome' , ['<variable>' => $<variable>,
    ]);
});
```
> Note: Para el array del segundo parametro:
> - la key sera el nombre que se le dará a la variable en la view.
> - el value, será la variable que queramos mandarle a la view.


# BLADE

Todas las instrucciones de **Blade** empiezan con **@**, 
**@** convertirá todo en php.

```
<?php if (Route::has('login')): ?>
	...
<?php endif; ?>
```
Que sería lo mismo en la sintaxis de **Blade** como :

```
@if (Route::has('login'))
	...
@endif
```

Para un **Foreach** :
```php
<?php foreach ($links as $link => $text): ?>
	<a href="<?php echo $link; ?>"><?php echo $text;?></a>
<?php endforeach; ?>
```
en la sintaxis de **Blade** :
```
@foreach ($links as $ link => $text)
	<a href="{{ $link }}">{{ $text }}</a>
@endforeach
```
## Utilizar variables en el template
podemos utilizarlas, pero las tenemos que enviar desde afuera, desde donde llamamos a este template, en las rutas (web.php)

## Conexion entre el CONTROLLER y la RUTA

el controller es llamado desde el segundo parametro de la ruta de la siguiente forma:

```
'<Nombre_Controller>Controller@<nombre_metodo>'
```

