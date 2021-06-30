
<div class="contenerdor-general-notas">
    <div class="container">
        <h2>Notas</h2>
        <div class="contenedor-notas owl-carousel owl-theme">
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('.contenedor-notas').owlCarousel({
        loop: false,
        margin: 30,
        dots: false,
        nav: true,
        navText: ["<img src='<?php echo get_template_directory_uri().'/img/flecha-izq.png';?>'>", "<img src='<?php echo get_template_directory_uri().'/img/flecha-der.png';?>'>"],
        responsive: {
            0: {
                items: 1,
                nav: false,
                stagePadding: 0,
            },
            768: {
                items: 2,
            },
            990: {
                items: 3,
            },
            1150: {
                items: 4,
            }
        }
    });
</script>