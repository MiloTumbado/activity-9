# activity-9

Sistema de autenticación de Laravel 7. La landingpage es pública y el dashboard requiere sesión. La navegación cambia para mostrar registro e inicio de sesión a visitantes, o dashboard y cierre de sesión a usuarios autenticados.

## Instalación

`composer install`, copiar `.env.example` a `.env`, configurar SQLite y crear su archivo. Ejecutar `php artisan key:generate`, `php artisan migrate` y `php artisan serve`.

Las contraseñas se almacenan con Hash, las sesiones se regeneran después del registro y login y los formularios están protegidos por CSRF. Registro y login limitan los intentos por minuto. El dashboard usa middleware auth; acceder a la URL sin sesión redirige al login.

## Tarea 8 correo

Registered envía WelcomeMail a la dirección almacenada en el usuario. Login envía LoginAlertMail después de validar las credenciales. La sesión automática tras registrarse no produce una alerta adicional. No se envían correos por intentos fallidos.

Las pruebas locales usan Mailpit en 127.0.0.1:1025 (SMTP) y 127.0.0.1:8025 (buzón web). El usuario eligió este buzón de prueba. No se afirma entrega por Internet. Para un proveedor externo se cambian únicamente las variables MAIL en el archivo privado .env. Nunca se publican credenciales.

`php artisan test` comprueba los tipos de mensaje y que ambos destinatarios coincidan con el usuario registrado.
