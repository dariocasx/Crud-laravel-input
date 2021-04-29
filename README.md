Crud de Lavarel 7.3

https://chetruco.com/laravel

Con busqueda relacional en el modelo de la base de datos.

Permite buscar con un select y input en la tabla clientes y en la tabla grupos.

Requisitos.

Php 7.1 o superior.
Laravel 5.6 o superior.
MariaDB 5.7 o superior.


Este proyecto no usa datatable, busqueda personalizadas con el ORM de laravel Eloquent.
Todas las peticiones request se realizan con jQuery

Demo en producción:
https://nekapp.com

Instalación.

1. Instale Composer
2. Ejecute Composer install, para las dependencias.
3. Importe Dump de sql de la base de datos en la raiz del proyecto.
4. Genere una clave con artisan key generator: php artisan key:generate
5. Agregue el siguiente código a AppServiceProvider.php (/app/Providers/AppServiceProvider.php)
6. Configure el archivo .env

use Illuminate\Support\Facades\Schema; //NEW: Import Schema

function boot()
{
    Schema::defaultStringLength(191); //NEW: Increase StringLength
}

7. Ejecute el servidor:

php artisan serve



