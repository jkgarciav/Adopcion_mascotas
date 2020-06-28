# Mascotas

## Requisitos

- Docker

## Comandos

### Instalar Dependencias
`$ docker-compose up composer`

### Instalar Base de Datos
`$ docker-compose up mariadb`

### Ejecutar Aplicación
`$ docker-compose up app`

### Ejecutar Migración
`$ docker exec -it mascotas_app bash`

`$ php artisan migrate`

### Acceder a la aplicación
http://127.0.0.1:8080

## Autor
Jeimmy Garcia - 2020