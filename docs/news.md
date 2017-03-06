# News

## All news

* `GET` /v1/news - Devuelve un `Array` con las **noticias activas**.

**Ejemplo:**

```
http://ejemplo.com/api/v1/news
```

### Respuesta

```json
[
	{
		"id": 1,
		"title": "At eaque voluptatem dignissimos consectetur sed et delectus",
		"summary": "Sed veritatis debitis expedita voluptates enim occaecati. Error qui qui ut aliquam asperiores soluta quis. Explicabo molestiae ut non sunt ea.",
		"created_at": "2017-02-11 18:07:54",
		"updated_at": "2017-02-11 18:07:54",
		"newspaper": {
			"id": 1,
			"name": "Eleanore Runte"
		}
	},
	{
		"id": 2,
		"title": "Pariatur rerum consectetur nisi qui",
		"summary": "Magnam vel iure ea est veritatis a cupiditate. Nulla quo ratione velit sint praesentium dolore. Perferendis illum perspiciatis molestiae sit possimus reprehenderit id repudiandae. Repellat delectus qui maxime quidem.",
		"created_at": "2017-02-11 18:07:54",
		"updated_at": "2017-02-11 18:07:54",
		"newspaper": {
			"id": 2,
			"name": "Joyce Sanford"
		}
	}
]
```

Key | Type | Description
--- | --- | ---
id | integer | Identificador único de la noticia.
title | string | Titulo de la noticia.
summary | string | Bajada de la noticia.
created_at | timestamp | Fecha y hora de creación de la noticia.
updated_at | timestamp | Fecha y hora de actualización de lan noticia.
newspaper | hash | Diario de la noticia.

#### Newspaper Key

Key | Type | Description
--- | --- | ---
id | integer | Identificador único del diario.
name | string | Nombre del diario.