# MiProyecto - Sistema de Gestión de Productos

Sistema CRUD completo de productos desarrollado con Laravel 11, Livewire 3 y Tailwind CSS.

## 🚀 Características

- ✅ Sistema de autenticación completo con Laravel Fortify
- ✅ CRUD completo de productos (Crear, Leer, Actualizar, Eliminar)
- ✅ Interfaz moderna y responsiva con Tailwind CSS
- ✅ Componentes interactivos con Livewire 3
- ✅ Alertas de éxito con auto-ocultamiento (3 segundos)
- ✅ Confirmación de eliminación con prompt de seguridad
- ✅ Paginación de productos
- ✅ Modo oscuro/claro
- ✅ Diseño responsive

## 📋 Requisitos

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB
- XAMPP (recomendado para desarrollo local)

## 🛠️ Instalación

1. **Clonar el repositorio**
```bash
cd c:\xampp\htdocs\Laravel\MiProyecto
```

2. **Instalar dependencias de PHP**
```bash
composer install
```

3. **Instalar dependencias de Node.js**
```bash
npm install
```

4. **Configurar el archivo .env**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurar la base de datos en .env**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=miproyecto
DB_USERNAME=root
DB_PASSWORD=
```

6. **Ejecutar las migraciones**
```bash
php artisan migrate
```

7. **Ejecutar los seeders (opcional)**
```bash
php artisan db:seed
```

8. **Compilar assets**
```bash
npm run dev
```

9. **Iniciar el servidor**
```bash
php artisan serve
```

Visita: `http://localhost:8000`

## 📁 Estructura del Proyecto

### Modelos
- **`app/Models/Product.php`** - Modelo de producto con campos: nombre, stock, precio, descripción
- **`app/Models/User.php`** - Modelo de usuario con autenticación

### Componentes Livewire
- **`app/Livewire/Products/Index.php`** - Listado de productos con paginación
- **`app/Livewire/Products/Create.php`** - Crear nuevo producto
- **`app/Livewire/Products/Update.php`** - Actualizar producto existente
- **`app/Livewire/Settings/Profile.php`** - Perfil de usuario
- **`app/Livewire/Settings/Password.php`** - Cambiar contraseña
- **`app/Livewire/Settings/Appearance.php`** - Configuración de apariencia
- **`app/Livewire/Settings/TwoFactor.php`** - Autenticación de dos factores

### Vistas
- **`resources/views/livewire/products/index.blade.php`** - Vista del listado de productos
- **`resources/views/livewire/products/create.blade.php`** - Formulario de productos (crear/actualizar)
- **`resources/views/dashboard.blade.php`** - Dashboard principal
- **`resources/views/welcome.blade.php`** - Página de inicio

### Migraciones
- **`2025_11_07_180315_create_products_table.php`** - Tabla de productos
- **`0001_01_01_000000_create_users_table.php`** - Tabla de usuarios
- **`2025_09_22_145432_add_two_factor_columns_to_users_table.php`** - Autenticación 2FA

### Rutas
**`routes/web.php`**
```php
// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard (requiere autenticación)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// Rutas de configuración
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    // Rutas de productos
    Route::get('products', Index::class)->name('products.index');
    Route::get('products/create', Create::class)->name('products.create');
    Route::get('products/update/{product}', Update::class)->name('products.edit');
});
```

## 🎨 Características de la Interfaz

### Listado de Productos
- Tabla responsive con las siguientes columnas:
  - ID del Producto
  - Nombre
  - Stock
  - Precio (formato moneda)
  - Fecha de Creación
  - Acciones (Editar/Eliminar)
- Botón "Crear Producto" con icono de suma (+)
- Paginación integrada
- Alertas de éxito con auto-ocultamiento (3 segundos)

### Formulario de Productos
- Campos:
  - **Nombre** - Input text
  - **Stock** - Input number
  - **Precio** - Input number (decimal)
  - **Descripción** - Textarea
- Validación en tiempo real
- Botón dinámico que cambia entre "Crear Producto" y "Actualizar Producto"

### Confirmación de Eliminación
- Sistema de doble confirmación
- El usuario debe escribir "ELIMINAR" para confirmar
- Previene eliminaciones accidentales

### Alertas
- Alertas de éxito en color verde
- Auto-ocultamiento después de 3 segundos
- Botón de cierre manual (X)
- Animaciones suaves

## 🔐 Autenticación

El sistema incluye:
- Login
- Registro
- Recuperación de contraseña
- Autenticación de dos factores (2FA)
- Verificación de email
- Gestión de sesiones

## 🎯 Funcionalidades del CRUD

### Crear Producto
1. Clic en "Crear Producto"
2. Llenar formulario
3. Validación en tiempo real
4. Guardar y redireccionar

### Leer Productos
- Listado paginado
- Visualización de todos los campos
- Formato de fecha legible

### Actualizar Producto
1. Clic en "Editar" en la fila del producto
2. Formulario pre-cargado con datos actuales
3. Modificar campos necesarios
4. Guardar cambios

### Eliminar Producto
1. Clic en "Eliminar" en la fila del producto
2. Aparece prompt de confirmación
3. Escribir "ELIMINAR" para confirmar
4. Producto eliminado con alerta de éxito

## 🎨 Estilos y Diseño

### Colores del Sistema
- **Primary (Azul)** - Acciones principales y botón crear
- **Info (Azul claro)** - Botón editar
- **Error/Red (Rojo)** - Botón eliminar
- **Success (Verde)** - Alertas de éxito

### Componentes UI
- Botones con hover effects
- Inputs con focus states
- Tablas responsive
- Alerts animados
- Dark mode support

## 📝 Base de Datos

### Tabla: products
```sql
- id (bigint, primary key)
- nombre (string)
- stock (integer)
- precio (decimal 8,2)
- descripcion (text, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### Tabla: users
```sql
- id (bigint, primary key)
- name (string)
- email (string, unique)
- email_verified_at (timestamp, nullable)
- password (string)
- two_factor_secret (text, nullable)
- two_factor_recovery_codes (text, nullable)
- two_factor_confirmed_at (timestamp, nullable)
- remember_token (string, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

## 🧪 Testing

El proyecto incluye pruebas:
- **`tests/Feature/DashboardTest.php`** - Pruebas del dashboard
- **`tests/Feature/ExampleTest.php`** - Pruebas de ejemplo

Ejecutar pruebas:
```bash
php artisan test
```

## 🔧 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Crear nuevo componente Livewire
php artisan make:livewire NombreComponente

# Crear migración
php artisan make:migration nombre_migracion

# Crear modelo con migración
php artisan make:model NombreModelo -m

# Compilar assets para producción
npm run build

# Ver rutas
php artisan route:list
```

## 📦 Dependencias Principales

### Backend
- **Laravel 11.x** - Framework PHP
- **Livewire 3.x** - Componentes reactivos
- **Laravel Fortify** - Autenticación
- **MySQL** - Base de datos

### Frontend
- **Tailwind CSS 3.x** - Framework CSS
- **Alpine.js** - JavaScript reactivo (incluido con Livewire)
- **Vite** - Build tool

## 🚀 Características Técnicas

- **Inyección de dependencias** - Model binding en rutas
- **Validación de formularios** - Validación en tiempo real con Livewire
- **Paginación** - Sistema de paginación de Laravel
- **SPA-like navigation** - Con `wire:navigate`
- **Optimización de consultas** - Eager loading donde es necesario
- **Seguridad** - Protección CSRF, validación de datos, confirmaciones

## 📚 Recursos

- [Documentación de Laravel](https://laravel.com/docs)
- [Documentación de Livewire](https://livewire.laravel.com/docs)
- [Documentación de Tailwind CSS](https://tailwindcss.com/docs)

## 👨‍💻 Desarrollo

Desarrollado con:
- Laravel 12.37.0
- PHP 8.4.13
- Livewire 3.x
- Tailwind CSS 3.x

## 📄 Licencia

Este proyecto es de código abierto bajo la licencia MIT.

---

**Nota**: Este es un proyecto de práctica para aprender Laravel, Livewire y desarrollo web moderno.
