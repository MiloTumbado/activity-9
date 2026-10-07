# activity-9

Sistema de autenticación de Laravel 7. La landingpage es pública y el dashboard requiere sesión. La navegación cambia para mostrar registro e inicio de sesión a visitantes, o dashboard y cierre de sesión a usuarios autenticados.

## Instalación

`composer install`, copiar `.env.example` a `.env`, configurar SQLite y crear su archivo. Ejecutar `php artisan key:generate`, `php artisan migrate` y `php artisan serve`.

Las contraseñas se almacenan con Hash, las sesiones se regeneran después del registro y login y los formularios están protegidos por CSRF. Registro y login limitan los intentos por minuto. El dashboard usa middleware auth; acceder a la URL sin sesión redirige al login.
