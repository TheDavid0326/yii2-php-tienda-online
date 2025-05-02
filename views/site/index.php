<?php

/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = 'Stream Movies';
?>
<div class="site-index">

<div class="jumbotron text-center bg-transparent mt-5 mb-5">
    <h1 class="display-4">Bienvenido a la Tienda Online</h1>

    <p class="lead">Explora nuestra colección de películas y disfruta de una experiencia única.</p>

    <p>
        <a class="btn btn-lg btn-primary" href="<?= Url::to(['/movie/gallery']) ?>">Ver Películas</a>
        <a class="btn btn-lg btn-success" href="<?= Url::to(['/cart/my-cart']) ?>">Ir al Carrito</a>
    </p>
</div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-4">
                <h2>User: Cómo agregar películas al carrito</h2>

                <div class="bg-light p-3 rounded shadow-sm">
                    <p style="text-align: justify;"> Para acceder a la aplicación y gestionar tu carrito de películas, 
                        primero debes iniciar sesión con el usuario y la contraseña "user/user". 
                        Una vez dentro, dirígete a la sección "Películas" y selecciona las que deseas añadir; 
                        simplemente haz clic en "Agregar al carrito" junto a la película elegida. Luego, 
                        accede a "Mi carrito" para revisar tu selección y proceder con la compra. ¡Así de fácil! 🎬🍿</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <h2>Stripe: Instrucciones de pago y Tarjetas de Prueba</h2>

                <div class="bg-light p-3 rounded shadow-sm">
                    <ul class="list-unstyled">
                        <li><strong>Número de tarjeta:</strong> <span class="text-dark">4242 4242 4242 4242</span> (Visa válida para pruebas)</li>
                        <li><strong>Fecha de expiración:</strong> <span class="text-dark">Cualquier fecha futura (Ejemplo: 12/30)</span></li>
                        <li><strong>CVC:</strong> <span class="text-dark">123</span></li>
                        <li><strong>Otros ejemplos:</strong> También puedes probar tarjetas de otros proveedores como:
                            <ul>
                                <li><strong>Mastercard:</strong> 5555 5555 5555 4444</li>
                                <li><strong>American Express:</strong> 3782 822463 10005</li>
                            </ul>
                        </li>
                    </ul>

                    <p class="mt-3">
                        Para más detalles sobre pruebas y configuración, visita la 
                        <a href="https://docs.stripe.com/testing?testing-method=card-numbers" target="_blank" rel="noopener" class="btn btn-sm btn-primary">Tarjetas de prueba de Stripe</a>.
                    </p>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <h2>Admin: Panel de Control y personalización del dashboard</h2>

                <div class="bg-light p-3 rounded shadow-sm">
                    <p style="text-align: justify;">Para ingresar a la aplicación con privilegios de administración, 
                        inicia sesión utilizando el usuario y la contraseña "admin/admin". 
                        Una vez dentro, tendrás acceso al panel de control, donde podrás gestionar usuarios, películas,
                        y administrar contenido. Además, podrás explorar las opciones para personalizar el dashboard, 
                        ajustando el diseño y los elementos del panel de control según tus necesidades. 
                        Para ello, accede a la sección de configuración y prueba diferentes ajustes visuales para optimizar la interfaz. 
                        ¡Tu panel, tus reglas! ⚙️🚀</p>
                </div>
            </div>
        </div>

    </div>
</div>
