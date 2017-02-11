# Post

## Get Posts

* `GET /v1/posts` Devuelve un `Array` con **Posts Activos**.

**Ejemplo:**

```
http://api.ejemplo.com/v1/posts
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
id | integer | Identificador único de un post.
title | string | Titulo de una post.
summary | string | Bajada de un post.
created_at | timestamp | Fecha y hora de creación del post.
updated_at | timestamp | Fecha y hora de actualización del post.
newspaper | hash | Diario del post.

#### Newspaper Key

Key | Type | Description
--- | --- | ---
id | integer | Identificador único del diario.
name | string | Nombre del diario.