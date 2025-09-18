PRUEBA TECNICA BACKEND

Requisitos.
PHP 8.2, Composer, MARIADB SERVER, Apache server

Instalación

1-Clonar el repositorio y asignarle el host virtual




1- paso ejecutar el comando doctrine:database:create

1- paso ejecutar el comando doctrine:schema:create

1- paso ejecutar el comando php bin/console doctrine:fixtures:load --group=books_data --append

