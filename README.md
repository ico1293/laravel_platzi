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

## MYSQL

Iniciar mysql en windows con la terminal:
> mysqld

Parar mysql en windows con la terminal, es necesario que la terminar que tiene arrancado mysql no sea cerrada, hasta que no sea detenido mediante otra terminal:
> mysqladmin -u root shutdown

también puede ser detenido mediante:
> mysqld stop


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
- REQUESTS
```
/app/Http/Requests/
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
Route::<get/post>('/<ruta_a_asignar>', '<Nombre_Controller>Controller@<metodo>');
```
> 1. seleccionar el tipo de ruta si es get o post.
> 2. asignar una ruta.
>   note: '/' indica nuestra home.
> 3. nombre del controlador, usualmente sería el nombre del modelo en plural.
> 4. metodo del controlador, usualmente dependiendo de este, viene a ser asignada la ruta.

> Ubicacion: /routes/wep.php

> Note:
> Se puede configurar una ruta sin una view, no necesito que existan las dos cosas. (pero claro que no queremos hacer esto).

# CONTROLLER

**Create Controller Class:**
```
php artisan make:controller <Table_Name>Controller --resource
```
> **Note:**
> ** resource :** creará un controller con los metodos.

### Function Show
```
// import the namespace
use App\<Model>;
...
public function show(<Model> $<model>)
{
    return view('<carpeta>.<show>',['<model>' => $<model>,]);
}
```
> carpeta : se debe crear una carpeta dentro de /views con el nombre de la tabla (plural).
> show : es el nombre del .blade.php dentro de la carpeta <carpeta>
> **NOTE**:
> la funcion view funciona de la siguiente forma: rendericeme la view tal (primer parametro) y enviele las siguientes variables (segundo parametro).

> **Note 2**:
> note que solo va el nombre de la view y se ignora el resto ```.blade.php ```.

> **Note 3**:
>  Para el array del segundo parametro:
> - la key sera el nombre que se le dará a la variable en la view.
> - el value, será la variable que queramos mandarle a la view.

La configuracion de la ruta para este controller sería así: 
```
Route::get('/<table_name>/{<var_id>}', '<TableName>Controller@show');
```
> var_id : sería la variable normalmente id, enviada desde la vista que llama a esta ruta. 


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
podemos utilizarlas, pero las tenemos que enviar desde afuera, desde donde llamamos a este template, en las rutas (web.php), que a su vez llama a un controller que este es directamente el que le envia la varible.

## Conexion entre el CONTROLLER y la RUTA

el controller es llamado desde el segundo parametro de la ruta de la siguiente forma:

```
'<Nombre_Controller>Controller@<nombre_metodo>'
```

# REQUEST

El request es creado para las validaciones y los mensajes de error.
Llega por medio el metodo Post.

```
php artisan make:request Create<Model>Request
```

lo primero que debemos cambiar es: a true

```
    public function authorize()
    {
        // change this to true
        return true;
    }
```

Como funciona la function rules?:
```
    public function rules()
    {
        return [
            'message' => ['required', 'max:160'],
        ];
    }
```
> retorna un array de reglas.
> key: el nombre del campo que llega del request
> value: array de reglas: reglas vistas hasta hoy(required, max:tamaño maximo)

Adicionarle a la clase Request la siguiente funcion para modificar los mensajes mostrados:
```
/**
     * Create this to reconfig the request messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'message.required' => 'Por favor, escribe tu mensaje.',
            'message.max' => 'El mensaje no pude superar los 160 caracteres.',
        ];
    }  
```

> 'field.rule' => 'mensaje a mostrar.',