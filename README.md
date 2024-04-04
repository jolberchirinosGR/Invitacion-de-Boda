# Invitación de boda

Sistema de invitacion con detalles como Musica, animacaciones, galeria, confirmar asistencia, descripción del evento entre otras cosas. 

Todo esto desarrollado con Laravel y Vue, tablas y migraciones, (Sin inicio de sesion ya que es un proyecto personal)

## Instalación

### Dependencias del BACKEND

<pre><div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md">
</div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">composer install</span></div></div></pre>

### Dependencias del FRONTEND

<pre>
<div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md">
<span class="" data-state="closed">
</span></div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">npm install
</code></div></div></pre>

### Configuración de la Base de Datos

1. Renombra el archivo `.env.example` a `.env`.
2. Configura los accesos a la base de datos en el archivo `.env`. Recuerda que el nombre del archivo `.env` es el nombre del proyecto.

### Generar Clave de la Aplicación

<pre>
<div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md">
<span class="" data-state="closed">
<div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">php artisan key:generate
</code></div></div></pre>

### Migración de la Base de Datos

<pre><div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span class="" data-state="closed"></span></div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">php artisan migrate:fresh --seed
</code></div></div></pre>

### Configuración de Almacenamiento Público

Crea la carpeta `Public` en `storage/app/` y establece el enlace simbólico.

<pre><div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span class="" data-state="closed"></span></div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">
php artisan storage:link
</code></div></div></pre>

## Despliegue

### Compilar el Frontend

Ejecuta uno de los siguientes comandos según tu preferencia:

<pre><div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span class="" data-state="closed"></span></div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">npm run dev
# o
npm run build
</code></div></div></pre>

### Iniciar Servidor

<pre><div class="dark bg-gray-950 rounded-md"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span class="" data-state="closed"></span></div><div class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-bash">php artisan serve
# Si deseas especificar el host, puedes hacerlo con el argumento --host
# php artisan serve --host 192.168.0.1
</code></div></div></pre>


## Capturas de Pantalla (opcional)

Privado por ahora...
