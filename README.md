# Viajes Para Ti
![](https://i.imgur.com/vTbZtCC.png)

## Deploy
### Instalar las dependencias
composer install

### Editar el fichero env 

### Añadir los parametros DB

### Creación de los proveedores schema
php bin/console doctrine:migrations:diff

### Ejecutar las migraciones
php bin/console doctrine:migrations:migrate

### Run symfony server 
symfony server:start

## Datos

Los datos que necesitaremos guardar de cada proveedor serán los siguientes:
● Nombre
● Correo electrónico
● Teléfono de contacto
● Tipo de proveedor, en nuestro caso podrán ser de hotel, pista o complemento.
● Si están activos o no

Además, sería interesante tener constancia de cuándo se ha introducido este proveedor en el
sistema, así como cuándo se ha actualizado su información por última vez.

## Aplicación
Necesitaremos que nuestro departamento de contabilidad pueda:
● Crear un nuevo proveedor
● Editar un proveedor
● Eliminar un proveedor
● Visualizar el listado completo de proveedores que tenemos en el sistema
Requisitos mínimos
● Desarrollar la aplicación utilizando Symfony 4.
● No utilizar el comando de symfony para generar un CRUD automáticamente.
● Utilizar Twig para las vistas
● Crear una base de datos MySQLsa