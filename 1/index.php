<?php
include "cabeza.php";
?>

<!-- Barra -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tramites">Trámites</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contacto">Contacto</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Carrusel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/2.jpg" class="d-block w-100" alt="Imagen 1">
            <div class="carousel-caption text-left custom">
                <h5 style="font-size: 9rem; text-align: left;">CALIDAD DEL <span style="color: skyblue;">AIRE</span>
                </h5>
                <p style="font-size: 2rem;">REPORTE ICA DEL MUNICIPIO DE LA PAZ.</p>
            </div>


        </div>

        <div class="carousel-item">
            <img src="img/1.jpg" class="d-block w-100" alt="Imagen 2">
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>


<!--información general -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Información General</h2>
        <p class="text-justify">
            La Honorable Alcaldía Municipal de La Paz (HAM-LP) es una institución pública que se encarga de la
            gestión administrativa y territorial de la ciudad de La Paz.
            Entre sus funciones, se incluyen la administración de bienes inmuebles, el cobro de impuestos, y la
            regulación de trámites catastrales.
            El objetivo de la HAM-LP es garantizar el bienestar y desarrollo urbano de la ciudad mediante servicios
            eficientes y accesibles para sus ciudadanos.
        </p>
    </div>
</section>

<!-- Sección de tramites -->
<section id="tramites" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Tipos de Trámites Disponibles</h2>
        <div class="row">

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Propiedad</h5>
                        <p class="card-text">
                            Solicite el registro de una nueva propiedad a nombre del dueño. Este trámite incluye la
                            asignación de un código catastral.
                        </p>
                    </div>
                    <button type="button" class="btn btn-info">Info</button>
                </div>
                
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Transferencia de Propiedad</h5>
                        <p class="card-text">
                            Realice el trámite para transferir la propiedad a otra persona. Este proceso requiere la
                            actualización del código catastral.
                        </p>
                    </div>
                    <button type="button" class="btn btn-info">Info</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pago de Impuestos</h5>
                        <p class="card-text">
                            Acceda a la plataforma para pagar los impuestos correspondientes a su propiedad en la
                            ciudad de La Paz.
                        </p>
                    </div>
                    <button type="button" class="btn btn-warning">Info</button>
                </div>
                
            </div>
        </div>
    </div>
</section>


<section id="contacto" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Contacto</h2>
        <p class="text-justify">
            Puede contactarnos a través de los siguientes medios:
        </p>
        <ul>
            <li>Teléfono: (591) 2 2900000</li>
            <li>Email: contacto@hamlp.gov.bo</li>
            <li>Dirección: Plaza Mayor, La Paz, Bolivia</li>
        </ul>
    </div>

</section>





<?php
include "pie.php";
?>