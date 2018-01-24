# Cablera Online

> Informarte de la mejor manera

Un sistema informático que obtiene las noticias de los diarios digitales, las clasifica y ordena por categoría, tema y lugar.

## Instalación

Desde la terminal vamos a comenzar clonando el proyecto e instalando las dependencias:

```bash
git clone https://github.com/soyFelixBarros/Cablera.Online.git
cd cablera.online
composer install
```

Crear el archivo de configuración de Laravel y genera un APP_KEY:
```md
cp .env.example .env
php artisan key:generate
```

Abrimos el archivo .env y agregamos los datos de conexión a la base de datos:
DB_DATABASE=cableraonline
DB_USERNAME=root
DB_PASSWORD=

Por últimos, creamos las tablas y cargamos los datos de ejemplos:
```bash
php artisan migrate:fresh
php artisan db:seed
```

## Contacto

Desarrollado por [Felix Barros](https://twitter.com/soyFelixBarros)