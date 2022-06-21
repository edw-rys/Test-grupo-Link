## __PHP 7 - LARAVEL 7__


## __Levantar el sistema en ambiente de desarrollo__


### __Paso 1 - Configurar archivo de variables de entorno:__  
* El siguiente archivo: __.env.example__ se encuentra en la raíz del proyecto, copiar este archivo y nombrarlo __.env__, este archivo deberá estar ubicado en la raíz del proyecto.
* En el archivo __.env__, que se encuentra en la raíz del proyecto, modificar las siguientes configuraciones:


```
#CONEXIÓN CON LA BASE DE DATOS
# Indicar su host en el cuál se encuentra la BD
DB_HOST=127.0.0.1

# Indicar el puerto en el cuál se encuentra la BD
DB_PORT=3306

# Indicar el nombre de la BD
DB_DATABASE=database

# Indicar el nombre del usuario de la BD
DB_USERNAME=root

# Escribir la contraseña del usuario de la BD, en caso de no tene contraseña dejar vacío
DB_PASSWORD=
```

### __Paso 3 - Ejecutar los siguientes comandos en la consola para instalar dependencias:__  

 * >composer install



### __Paso 4 - Ejecutar comando para levantar el proyecto en desarrollo:__  

 * >php artisan serve
 * __Luego de esto la api funcionará en la URL: http://127.0.0.1:8000__
