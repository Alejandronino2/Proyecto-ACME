Aquí tienes el archivo README.md actualizado con la contraseña para los dos usuarios:

# Transportes ACME S.A. - Sistema de Gestión de Vehículos

## Descripción del Proyecto

Este proyecto es una aplicación web desarrollada en Laravel 11 y Bootstrap 5, creada para la empresa Transportes ACME S.A. Su objetivo es gestionar los vehículos, conductores y propietarios utilizados en sus operaciones diarias. La aplicación permite registrar, consultar y generar informes de los vehículos, incluyendo información detallada de los conductores y propietarios.

## Funcionalidades Principales

- **Registro y gestión de vehículos, conductores y propietarios**: CRUDs completos para cada entidad.
- **Visualización de informes**: Informe con los datos de los vehículos y propietarios.
- **Sistema de autenticación**: Login y registro de usuarios.
  - Usuarios registrados:
    - `nicolasnino@hibridcode.com` (User)
    - `alejandronino@hibridcode.com` (Admin)
  - Contraseña para ambos usuarios: `password`
- **Encriptación de contraseñas**: Seguridad garantizada para las contraseñas de los usuarios.
- **Envío de correos mediante SMTP**: Notificaciones por correo electrónico.
- **Interfaz responsive**: Adaptable a dispositivos móviles gracias a Bootstrap 5.
- **Vistas separadas para Administradores y Usuarios**.
- **Animaciones y modales** para una experiencia de usuario mejorada.

## Tecnologías Utilizadas

- **Framework**: Laravel 11
- **Frontend**: Bootstrap 5
- **Base de datos**: MySQL
- **Lenguaje Backend**: PHP 8.x
- **Autenticación**: Sistema de login con encriptación de contraseñas.
- **Envío de correos**: Configuración de SMTP.
- **Bundler de assets**: Vite

## Instalación

1. Clonar el repositorio:

   ```bash
   git clone https://github.com/usuario/acme.git

	2.	Instalar dependencias:

composer install
npm install


	3.	Configurar el archivo .env con los datos de conexión a la base de datos y el servidor de correos SMTP.
	4.	Crear la base de datos:

CREATE DATABASE acme;


	5.	Ejecutar las migraciones y los seeders:

php artisan migrate --seed


	6.	Construir los assets con Vite:

npm run build


	7.	Levantar el servidor de desarrollo:

php artisan serve


	8.	Acceder a la aplicación en http://localhost:8000.

URL del Proyecto

El proyecto está desplegado y accesible en: acme.portafoliodiegonino.com

Contacto

Para más información, puedes contactar con el desarrollador:

	•	Diego Alejandro Niño Lozano
	•	Correo: diegoalejandroninolozano@gmail.com

Ahora se incluye la contraseña `password` para ambos usuarios. ¡Espero que te sea útil!