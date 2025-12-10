# SYSTECH 2025 — Implementación en Laravel  
Plataforma web del Congreso Nacional de Ingeniería en Sistemas de Información (SYSTECH – UAM) desarrollada en Laravel.  
Incluye módulos de **Inicio**, **Agenda**, **Registro**, panel administrativo, integración de patrones de diseño y estructura escalable para futuras ediciones.

---

## 🚀 Tecnologías utilizadas
- Laravel 10+
- PHP 8.1+
- MySQL 8
- Composer
- Blade Templates
- Git / GitHub
- Laragon (entorno sugerido)

---

## 📌 Funcionalidades principales

### **1. Sección Inicio**
- Hero dinámico.
- Información del congreso.
- Listado de patrocinadores (controlado desde BD).
- Módulo de “¿Por qué asistir?”.
- Preguntas frecuentes.

### **2. Agenda**
- Gestión completa desde panel admin.
- Tracks, ponencias, horarios, expositores.
- Vista pública filtrable.
- Soporte para sesiones compuestas (Composite Pattern).

### **3. Registro**
- Formulario para **Estudiantes UAM**.
- Formulario para **Comunidad Externa**.
- Validaciones especializadas mediante **Chain of Responsibility**.
- Confirmación automática y cambio de estado de inscripción.
- Notificaciones basadas en **Observer Pattern**.

### **4. Panel Administrativo**
- Gestión de inscripciones.
- Cambio de estado (pendiente → confirmado → cancelado).
- Gestión de agenda.
- Gestión de patrocinadores y FAQs.

---

## 🧩 Patrones de diseño implementados

### **1. Observer**
- Notificaciones automáticas al registrar o actualizar una inscripción.
- Notificaciones al modificar agenda (opcional).

### **2. Factory Method**
- Creación de diferentes tipos de formularios de registro:
  - Estudiante UAM
  - Comunidad Externa

### **3. State Pattern**
- Estados de inscripción:
  - `Pendiente`
  - `Confirmada`
  - `Cancelada`


---

## 📁 Estructura del proyecto

/app
/Http
/Models
/Observers
/Services
/States
/resources
/views
/components
/routes
web.php
api.php


---

## ⚙️ Requisitos del sistema

| Componente | Versión mínima |
|-----------|----------------|
| PHP       | 8.1 |
| MySQL     | 8 |
| Composer  | 2.x |
| Node.js   | 16+ |
| Laravel   | 10+ |

---

## 🛠️ Instalación y configuración

### **1. Clonar el repositorio**
```bash
git clone https://github.com/JorgeRR1005/SYSTECH-LARAVEL.git
cd SYSTECH-LARAVEL
2. Instalar dependencias

composer install
npm install
npm run build

3. Crear archivo de entorno
cp .env.example .env

Modificar la conexión a la base de datos:

DB_DATABASE=systech
DB_USERNAME=root
DB_PASSWORD=

4. Generar la key del proyecto
php artisan key:generate

5. Ejecutar migraciones
php artisan migrate

Si el proyecto incluye seeders:
php artisan db:seed

6. Levantar el servidor
php artisan serve

Acceder en:
http://127.0.0.1:8000

🧪 Tests (opcional)
php artisan test

📦 Despliegue en Hosting / Producción
Subir archivos vía SFTP o Git Deploy.

Instalar dependencias:

composer install --no-dev
npm ci && npm run build
Configurar .env en producción.

Ejecutar migraciones:

php artisan migrate --force
Configurar permisos:

chmod -R 775 storage bootstrap/cache
👤 Autor
Jorge Alí Rodríguez
Desarrollo académico y técnico para el proyecto SYSTECH – Universidad Americana (UAM).

📄 Licencia
Este proyecto se distribuye sin licencia explícita.
Uso académico permitido.


