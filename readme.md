# Cablera Online

> Visualizar todas las noticias en un solo lugar

Cablera Online es un programa informatico que utiliza la técnica de [Web scraping](https://es.wikipedia.org/wiki/Web_scraping) para extraer las noticias de los diarios digitales más importantes.

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

Abrimos el archivo .env y editamos los datos de conexión a la base de datos:

```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Por últimos, creamos las tablas y cargamos los datos de ejemplos:
```bash
php artisan migrate:fresh
php artisan db:seed
```

------

Desarrollado por [Felix Barros](https://twitter.com/soyFelixBarros)