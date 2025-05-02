# Plataforma de E-commerce de Películas con Yii2

![Vista previa del panel AdminLTE](https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png)

Plataforma completa de venta de películas con panel de administración, carrito de compras e integración con Stripe.

## Características principales

- 🎬 **Catálogo de películas**
  - Operaciones CRUD para películas
  - Vista de galería para usuarios
- 🛒 **Carrito de compras**
  - Añadir/eliminar películas
  - Contador en tiempo real
  - Proceso de pago seguro
- 💳 **Integración con Stripe**
  - Pagos seguros con Stripe Elements
  - API de PaymentIntent
  - Manejo de transacciones exitosas/fallidas
- 👨‍💻 **Panel de administración**
  - Desarrollado con AdminLTE 4
  - Gestión de usuarios
  - Seguimiento de pedidos

## Tecnologías utilizadas

- **Backend**: Framework Yii2 (PHP)
- **Frontend**: Bootstrap 5, AdminLTE 4
- **Pagos**: Stripe Elements
- **Base de datos**: MySQL

## Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/TheDavid0326/yii2-php-tienda-online
   cd yii2-php-tienda-online
   ```
2. **instalar dependencias**
    ```bash
    composer install
    ```
3. **Configurar base de datos**
   En config/params.php agrega tus claves de Stripe:
   ```php
       return [
        'stripePublicKey' => 'pk_test_XXXXXXXXXXXXXXXXXXXX',
        'stripeSecretKey' => 'sk_test_XXXXXXXXXXXXXXXXXXXX',
    ];
   ```
4. **Ejecutar migraciones**
    ```php
   yii migrate
   ```
## Estructura del proyecto
```
.
├── config/ # Archivos de configuración de Yii2
├── controllers/ # Controladores de la aplicación
│ ├── CartController.php # Lógica del carrito
│ ├── MovieController.php # Gestión de películas
│ └── UserController.php # Manejo de usuarios
├── migrations/ # Migraciones de base de datos
├── models/ # Modelos de la aplicación
├── views/ # Plantillas de vistas
│ └── layouts/
│ ├── admin.php # Layout para el panel de administración
│ └── main.php # Layout para el frontend
└── web/ # Assets accesibles públicamente
└── dist/ # Assets compilados de AdminLTE
```
## 🔧 Componentes principales

### 🛒 Carrito

**Modelos:** `Cart`, `CartItem`

**Funcionalidades:**

- Carritos persistentes para usuarios registrados
- Actualización de cantidad y contenido en tiempo real
- Proceso de pago seguro con Stripe

---

### 💳 Integración con Stripe

```php
public function actionCheckout()
{
    $stripe = new \Stripe\StripeClient(Yii::$app->params['stripeSecretKey']);
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => $totalAmount * 100,  // Stripe usa centavos
        'currency' => 'eur',
    ]);
    // ...
}
```

### 🧑‍💼 Panel de Administración

- Desarrollado con **AdminLTE 4**
- Diseño responsive
- Control de acceso basado en roles (RBAC)

### Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).
