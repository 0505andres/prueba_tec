PRUEBA TECNICA BACKEND

Requisitos.
PHP 8.2, Composer, MARIADB SERVER, Apache server o Symfony CLI

Instalación

1-Clonar el repositorio
2-Ejectuar composer install
3-Configurar el archivo .env las siguientes lineas
    DATABASE_URL="mysql://USER_DB:PASSWORD_DB@127.0.0.1:3306/DB_NAME?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
    CORS_ALLOW_ORIGIN=['*']
4- Abrir la terminal y ubicarse en el directorio del proyecto.
5- Ejecutar el comando doctrine:database:create
6- Ejecutar el comando doctrine:schema:create
7- Ejecutar el comando php bin/console doctrine:fixtures:load --group=books_data --append
8- Ahora se puede asignar un virtual host desde apache hacia el directorio public del proyecto o puede ejecutar el comando symfony server:start desde la linea de comandos.


Respuestas esperadas
Durante la ejecución del proyecto en caso de no asignar el formato json valido el proyecto notifiara error de sintaxis en el json para validar.
En caso de no encontrar un registro regresara el codigo de error 404, por aprovicionamiento las cabeceras cors estan aceptando peticiones desde cualquier origen, tanto en server como en virtual host.


¿Qué cambiarías para escalar esta app a cientos de miles de libros y usuarios?
Primero incluiria el contexto de seguridad a la aplicación mediante atenticacion JWT.
Despues asignaria las clases DTO para hacer mas limpia y escalable la API.
Continuaria con el manejo de cache optimizado y validaria la opcion de desplegar bajo docker en kubernets en un servicio de AWS como elastic kubernets
Terminaria aprovicionando la configuración de las cabeceras cors en el servidor.
