# Sistema Académico — Guía de instalación

Este paquete contiene todo el código listo (migraciones, modelos, controlador,
rutas y vistas). Debes ejecutar estos pasos en **tu propia máquina**, donde
tengas PHP, Composer y MySQL instalados (yo no tengo acceso a esas
herramientas en este entorno, así que no pude correrlas por ti).

## Parte 1. Crear el proyecto Laravel

```bash
composer create-project laravel/laravel sistema-academico
cd sistema-academico
php artisan serve
```

Abre `http://127.0.0.1:8000` en el navegador y confirma que ves la página de
bienvenida de Laravel.

## Parte 2. Configurar MySQL

1. Crea la base de datos:
   ```sql
   CREATE DATABASE sistema_academico;
   ```
2. Edita el archivo `.env` del proyecto:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sistema_academico
   DB_USERNAME=root
   DB_PASSWORD=tu_password
   ```
3. Verifica la conexión:
   ```bash
   php artisan migrate
   ```
   Si no da error, la conexión es correcta.

## Parte 3 a 7. Copiar los archivos de este paquete

Copia cada archivo de este ZIP a la misma ruta dentro de tu proyecto
`sistema-academico` (sobrescribiendo `routes/web.php`):

```
database/migrations/2024_01_01_000001_create_estudiantes_table.php
database/migrations/2024_01_01_000002_create_profesores_table.php
database/migrations/2024_01_01_000003_create_materias_table.php
app/Models/Estudiante.php
app/Models/Profesor.php
app/Models/Materia.php
app/Http/Controllers/SistemaController.php
routes/web.php
resources/views/layouts/app.blade.php
resources/views/estudiantes/estudiantes.blade.php
resources/views/estudiantes/crear_estudiante.blade.php
resources/views/estudiantes/editar_estudiante.blade.php
resources/views/profesores/profesores.blade.php
resources/views/profesores/crear_profesor.blade.php
resources/views/profesores/editar_profesor.blade.php
resources/views/materias/materias.blade.php
resources/views/materias/crear_materia.blade.php
resources/views/materias/editar_materia.blade.php
```

Luego crea las tablas:

```bash
php artisan migrate
```

(El controlador ya lo puedes generar tú con
`php artisan make:controller SistemaController` y luego pegar el contenido
incluido aquí; o simplemente copia el archivo directamente, que es lo más
rápido.)

## Parte 8 y 9. Probar el CRUD

```bash
php artisan serve
```

Visita:

- `http://127.0.0.1:8000/estudiantes` — listar, crear, editar y eliminar estudiantes
- `http://127.0.0.1:8000/profesores` — lo mismo para profesores
- `http://127.0.0.1:8000/materias` — lo mismo para materias

Prueba el flujo completo en cada módulo:

1. Clic en "+ Nuevo ..." → llenar el formulario → Guardar → debe aparecer en la tabla.
2. Clic en "Editar" → cambiar un dato → Actualizar → debe reflejarse en la tabla.
3. Clic en "Eliminar" → confirmar → el registro debe desaparecer de la tabla.

Finalmente, abre MySQL Workbench, conéctate a `sistema_academico` y revisa las
tablas `estudiantes`, `profesores` y `materias` con:

```sql
SELECT * FROM estudiantes;
SELECT * FROM profesores;
SELECT * FROM materias;
```

para confirmar que los datos se guardaron correctamente.
