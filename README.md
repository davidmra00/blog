# Blog
## Blog creado con laravel

### Descripcion del proyecto:

La pagina principal del blog muetra la lista de todos los posts
que existen en la base de datos. Tiene un menu de navegacion
con un icono que redirecciona a la pagina principal,
Un link 'Home' que tambien redirecciona a la pagina principal del blog,
a continuación del link 'Home' se muestran dinámicamente otros links que corresponden al nombre de las categorías existentes en el proyecto,
las cuales se recupera desde la base de datos. Por último en el menú de navegación se muestra un link 'Contactanos' el cual redirige
a un formulario que envía un correo electrónico al servicio configurado en laravel(mailtrap.io) 
con la información recogida.

En la parte derecha del menú de navegacion aparecen los link 'login' y 'register' que se encargan de dichas acciones.
Una vez autenticado un usuario estos dos links desaparecen y en su lugar se muestra una foto de perfil(si está configurada) y el nombre de dicho usuario,
al dar click en la foto de perfil se despliega un menú con las opciones 'profile' para la configuración de perfil y 'logout'.

Adicionalmente si el usuario autenticado tiene los permisos necesarios se muestra una opción adicional a este menú desplegable llamado 'admin' que se describe a continuación. Si el usuario no tiene los permisos necesarios este link no se le mostrará.

Los post se muestran en formato grid de 3 columnas con paginacion,cada blog tiene una foto de fondo,el nombre y las etiquetas que pertenecen a dicho blog.
El nombre del post es un link y redirecciona al detalle completo del post,las etiquetas también son links y redireccionan a una vista similar a la vista principal pero solo se muestran los post que tienen esa etiqueta.

Los link de las categorias del menú de navegación también filtran los posts y muestran solo aquellos que pertenecen a esa categoría.

 #### El menú admin:

Tiene un menú lateral que muestran las opciones dashboard,usuarios,roles,categorías,etiquetas,listados de post y crear post.

En la parte derecha se muestra la vista correspondiente a la opción seleccionada.

En la opción dashboard solo se muestra texto.

En la opción usuarios se muestra la lista de usuarios recuperada de la bbdd y se pueden editar los roles de los usuarios y eliminar un usuario. También hay una búsqueda que filtra los usuarios por nombre.

En la opción roles se muestra la lista de roles recuperada de la bbdd y se pueden crear,editar o eliminar los roles.

En la opción categorías se muestra la lista de categorías recuperada de la bbdd y se pueden crear,editar o eliminar las categorias.

En la opcion etiquetas se muestran las etiquetas recuperadas de la bbdd y se pueden crear,editar o eliminar etiquetas.

En la opción lista de post se muestran los posts recuperados de la bbdd y se pueden editar o eliminar posts. Tiene una barra de búsqueda que filtra los posts por nombre.

En la opción crear post se muestra el formulario correspondiente para la creación de un post.

En este menú las opciones del panel lateral aparecen de acuerdo a los permisos del usuario autenticado,por lo que pueden variar,así como los botones editar,crear o eliminar se muestran o no de acuerdo a los permisos que tenga dicho usuario.

## Información del proyecto:

Versión de laravel:9.X

Login: Laravel Jetstream

Menú admin: Plantilla adminlte

Manejo bbdd: Eloquent ORM.

Server bbdd: MySQL y phpmyadmin

Roles y permisos: Spatie/Laravel permissions

El frontend se hizo editando las plantillas de Jetstream y adminlte,además de sacar plantillas prehechas de internet.

Toda la lógica del backend se hizo desde 0 por mi utilizando las tecnologías que brinda laravel.

## Descripcion de la lógica del proyecto

Se crea un model para administrar cada tabla de la bbdd.

Se crea un controller con los métodos necesarios para el crud de cada tabla.

Se crean las vistas necesarias para cada crud.

Se crean request para crear validaciones para los formularios.

Su usan middlewares para algunas rutas.

Se usan observers para eliminar la foto de los posts del servidor al momento de eliminar los posts.

Se usan Mailables para enviar emails.

Se usan policies para proteger algunas url.

Se crean factories para llenar la bbdd con datos falsos.

Se crean seeders para llenar la base de datos con algún dato específico de algunas tablas.

Se crean las migraciones para crear todas las tablas en la bbdd.

## Guía para descargar el proyecto

#### Requisitos:

-composer

-git

-xampp


#### Pasos:

-git clone https://github.com/davidmra00/blog.git

-composer install

-cp .env.example .env

-php artisan key:generate

-npm install

-npm run dev

-Crear bbdd con nombre blog en phpmyadmin

-php artisan storage:link

-php artisan migrate --seed

-Para ejecutar el proyecto abrir una terminal en el directorio del proyecto y ejecutar php artisan serve.Usar esa direccion para acceder por el navegador.

-Cambiar el campo APP_URL por la direccion anterior que devolvio el comando php artisan serve(127.0.0.1:8000).Si no se hace esto Laravel no encontrara algunas rutas como por ejemplo la foto de fondo de los posts.(si el proyecto se abre desde localhost/blog/public en el servidor apache de xampp tampoco encontrara la ruta de la foto de fondo de los post,por eso se recomienda utilizar php artisan serve).

-LLenar todos los campos MAIL en el archivo .env por el servidor de correo a utilizar o usar mis credenciales.Sino el formulario de Contactanos no enviara la informacion.


### Mis credencales Mail en el archivo .env

MAIL_MAILER=smtp

MAIL_HOST=smtp.mailtrap.io

MAIL_PORT=2525

MAIL_USERNAME=59005dba654411

MAIL_PASSWORD=4be7c054d745c4

MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS=david@blog.com

MAIL_FROM_NAME=Blog


### Otras informaciones

Los seeders crean 25 usuarios,50 posts,4 categorias,8 etiquetas y 2 roles(Admin y Blogger).

Siempre se crea el usuario con correo david@gmail.com y contraseña 12345678

Este usuario tiene el rol admin y todos los permisos. Autenticarse con este usuario para poder acceder al panel admin y todas las funcionalidades del blog.

Para otras pruebas autenticarse con los usuarios creados por los factories. Escoger un correo en la bbdd y la constraseña por defecto es 'password'

Si no se ejecutan los comandos npm install y npm run dev no funcinara el sistema de login y el frontend se vera desproporcionado.
