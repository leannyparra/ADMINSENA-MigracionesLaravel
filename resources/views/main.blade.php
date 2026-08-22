@extends('Layout.app')

@php
    $nosotrosLayout = true;
@endphp

@section('title', 'Nosotros | AdminSENA')

@section('content')

<main class="adminsena-landing">

    <!-- =====================================================
         1. HERO SECTION
    ====================================================== -->

    <section class="hero-section">

        <div class="container hero-container">

            <span class="badge-tag">
                <i class="fa-solid fa-laptop-code"></i>
                Tecnología ADSO
            </span>


            <h1 class="hero-title">
                Administra Ambientes y Equipos Fácilmente
            </h1>


            <p class="hero-subtitle">
                La plataforma centralizada para la asignación y
                seguimiento de hardware, control de ambientes
                formativos y fichas académicas del centro de formación.
            </p>


            <a href="#modulos" class="btn-primary-hero">
                Explorar Módulos
            </a>

        </div>

    </section>



<!-- =====================================================
     2. OFERTAS DE FORMACIÓN - CARRUSEL
====================================================== -->

<section class="offers-section">

    <div class="container">

        <!-- ENCABEZADO -->

        <div class="offers-header">

            <div>

                <span class="offers-small-title">
                    <i class="fa-solid fa-graduation-cap"></i>
                    FORMACIÓN SENA
                </span>

                <h2 class="offers-title">
                    Encuentra tu próxima oportunidad
                </h2>

                <p class="offers-description">
                    Conoce algunas de las ofertas de formación
                    disponibles y encuentra el programa ideal para ti.
                </p>

            </div>


            <!-- BOTÓN VER TODAS -->

            <a
                href="{{ url('/ofertas') }}"
                class="offers-all-btn"
            >

                Ver todas las ofertas

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>



        <!-- CARRUSEL -->

        <div class="offers-carousel">

            <div class="offers-track" id="offersTrack">


                <!-- =================================================
                     OFERTA 1
                ================================================== -->

                <a
                    href="{{ url('/ofertas') }}"
                    class="offer-slide active"
                >

                    <img
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop"
                        alt="Tecnología y programación"
                    >


                    <div class="offer-overlay"></div>


                    <div class="offer-info">

                        <span class="offer-tag">
                            Tecnología
                        </span>


                        <h3>
                            Análisis y Desarrollo
                            de Software
                        </h3>


                        <p>
                            Fórmate en programación,
                            desarrollo web y tecnologías digitales.
                        </p>


                        <span class="offer-action">

                            Ver oferta

                            <i class="fa-solid fa-arrow-right"></i>

                        </span>

                    </div>

                </a>



                <!-- =================================================
                     OFERTA 2
                ================================================== -->

                <a
                    href="{{ url('/ofertas') }}"
                    class="offer-slide"
                >

                    <img
                        src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1200&auto=format&fit=crop"
                        alt="Programación"
                    >


                    <div class="offer-overlay"></div>


                    <div class="offer-info">

                        <span class="offer-tag">
                            Desarrollo
                        </span>


                        <h3>
                            Desarrollo de
                            Aplicaciones Web
                        </h3>


                        <p>
                            Aprende a crear soluciones digitales
                            modernas y funcionales.
                        </p>


                        <span class="offer-action">

                            Ver oferta

                            <i class="fa-solid fa-arrow-right"></i>

                        </span>

                    </div>

                </a>



                <!-- =================================================
                     OFERTA 3
                ================================================== -->

                <a
                    href="{{ url('/ofertas') }}"
                    class="offer-slide"
                >

                    <img
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1200&auto=format&fit=crop"
                        alt="Gestión empresarial"
                    >


                    <div class="offer-overlay"></div>


                    <div class="offer-info">

                        <span class="offer-tag">
                            Gestión
                        </span>


                        <h3>
                            Gestión Administrativa
                        </h3>


                        <p>
                            Desarrolla habilidades para la gestión
                            y administración de organizaciones.
                        </p>


                        <span class="offer-action">

                            Ver oferta

                            <i class="fa-solid fa-arrow-right"></i>

                        </span>

                    </div>

                </a>



                <!-- =================================================
                     OFERTA 4
                ================================================== -->

                <a
                    href="{{ url('/ofertas') }}"
                    class="offer-slide"
                >

                    <img
                        src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop"
                        alt="Formación académica"
                    >


                    <div class="offer-overlay"></div>


                    <div class="offer-info">

                        <span class="offer-tag">
                            Formación
                        </span>


                        <h3>
                            Programas de Formación
                            SENA
                        </h3>


                        <p>
                            Explora las diferentes oportunidades
                            de formación disponibles.
                        </p>


                        <span class="offer-action">

                            Ver todas

                            <i class="fa-solid fa-arrow-right"></i>

                        </span>

                    </div>

                </a>

            </div>



            <!-- =================================================
                 FLECHAS
            ================================================== -->

            <button
                type="button"
                class="offer-arrow offer-arrow-left"
                id="offerPrev"
                aria-label="Oferta anterior"
            >

                <i class="fa-solid fa-chevron-left"></i>

            </button>


            <button
                type="button"
                class="offer-arrow offer-arrow-right"
                id="offerNext"
                aria-label="Siguiente oferta"
            >

                <i class="fa-solid fa-chevron-right"></i>

            </button>



            <!-- =================================================
                 INDICADORES
            ================================================== -->

            <div class="offer-dots">

                <button
                    type="button"
                    class="offer-dot active"
                    data-slide="0"
                ></button>

                <button
                    type="button"
                    class="offer-dot"
                    data-slide="1"
                ></button>

                <button
                    type="button"
                    class="offer-dot"
                    data-slide="2"
                ></button>

                <button
                    type="button"
                    class="offer-dot"
                    data-slide="3"
                ></button>

            </div>

        </div>

    </div>

</section>



    <!-- =====================================================
         3. SECCIÓN PRESENTACIÓN
    ====================================================== -->

    <section class="welcome-section">

        <div class="container welcome-container">


            <!-- IMAGEN -->

            <div class="welcome-image-wrapper">

                <div class="main-image-card">


                    <div class="floating-badge-top">

                        <i class="fa-solid fa-shield-halved"></i>

                        Control Seguro

                    </div>


                    <img
                        src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=600&auto=format&fit=crop"
                        alt="Ambiente de Formación SENA"
                        class="img-fluid-rounded"
                    >


                    <div class="floating-badge-bottom">

                        <i class="fa-solid fa-graduation-cap"></i>

                    </div>

                </div>

            </div>



            <!-- TEXTO -->

            <div class="welcome-text-content">

                <h2 class="section-title">
                    ¿Qué es AdminSENA?
                </h2>


                <p class="section-paragraph">

                    Es una solución interactiva desarrollada para
                    optimizar los procesos de gestión en el área
                    académica y tecnológica.

                    Permitimos a los coordinadores e instructores
                    realizar un control riguroso de las herramientas
                    de cómputo y el agendamiento físico del centro
                    formativo de manera automatizada.

                </p>


                <div class="welcome-buttons">

                    <a href="#" class="btn-green-dark">

                        <i class="fa-solid fa-circle-info"></i>

                        Conocer más

                    </a>


                    <a href="#" class="link-simple">

                        Ver manual de uso

                    </a>

                </div>

            </div>

        </div>

    </section>



    <!-- =====================================================
         4. PILARES DE GESTIÓN
    ====================================================== -->

    <section id="modulos" class="cards-section">

        <div class="container">


            <h2 class="grid-section-title">

                Nuestros Pilares de Gestión

            </h2>



            <div class="rounded-cards-grid">


                <!-- =================================================
                     TARJETA 1
                ================================================== -->

                <div class="rounded-card">

                    <img
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400&auto=format&fit=crop"
                        alt="Misión"
                        class="card-img"
                    >


                    <div class="card-body-content">

                        <h3>
                            Misión del Sistema
                        </h3>


                        <p>

                            Asegurar la trazabilidad física y lógica
                            de los equipos asignados a la tecnología
                            ADSO, garantizando un entorno coordinado.

                        </p>

                    </div>

                </div>



                <!-- =================================================
                     TARJETA 2
                ================================================== -->

                <div class="rounded-card">

                    <img
                        src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=400&auto=format&fit=crop"
                        alt="Visión"
                        class="card-img"
                    >


                    <div class="card-body-content">

                        <h3>
                            Visión y Futuro
                        </h3>


                        <p>

                            Expandir el control a todos los ambientes
                            del centro de formación, consolidando un
                            ecosistema de software escalable.

                        </p>

                    </div>

                </div>



                <!-- =================================================
                     TARJETA 3
                ================================================== -->

                <div class="rounded-card">

                    <img
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&auto=format&fit=crop"
                        alt="Compromiso"
                        class="card-img"
                    >


                    <div class="card-body-content">

                        <h3>
                            Gestión de Fichas
                        </h3>


                        <p>

                            Organizar de forma ágil los horarios,
                            aprendices e instructores asignados
                            a cada ambiente de computación.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- =====================================================
         5. BOTÓN VOLVER ARRIBA
    ====================================================== -->

    <button
        id="btnVolverArriba"
        class="btn-scroll-top"
        title="Volver al inicio"
        aria-label="Volver arriba"
    >

        ↑

    </button>


</main>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       BOTÓN VOLVER ARRIBA
    ===================================================== */

    const btnVolverArriba =
        document.getElementById('btnVolverArriba');

    if (btnVolverArriba) {

        window.addEventListener('scroll', function () {

            if (window.scrollY > 500) {
                btnVolverArriba.classList.add('show');
            } else {
                btnVolverArriba.classList.remove('show');
            }

        });

        btnVolverArriba.addEventListener('click', function () {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        });

    }


    /* =====================================================
       CARRUSEL DE OFERTAS
    ===================================================== */

    const slides =
        document.querySelectorAll('.offer-slide');

    const dots =
        document.querySelectorAll('.offer-dot');

    const btnPrev =
        document.getElementById('offerPrev');

    const btnNext =
        document.getElementById('offerNext');


    if (
        slides.length > 0 &&
        dots.length > 0
    ) {

        let currentSlide = 0;
        let autoplay;


        function showSlide(index) {

            if (index >= slides.length) {
                index = 0;
            }

            if (index < 0) {
                index = slides.length - 1;
            }

            slides.forEach(function (slide) {
                slide.classList.remove('active');
            });

            dots.forEach(function (dot) {
                dot.classList.remove('active');
            });


            slides[index].classList.add('active');
            dots[index].classList.add('active');

            currentSlide = index;
        }


        function nextSlide() {
            showSlide(currentSlide + 1);
        }


        function previousSlide() {
            showSlide(currentSlide - 1);
        }


        /* BOTÓN SIGUIENTE */

        if (btnNext) {

            btnNext.addEventListener(
                'click',
                function () {

                    nextSlide();
                    restartAutoplay();

                }
            );

        }


        /* BOTÓN ANTERIOR */

        if (btnPrev) {

            btnPrev.addEventListener(
                'click',
                function () {

                    previousSlide();
                    restartAutoplay();

                }
            );

        }


        /* PUNTOS */

        dots.forEach(function (dot, index) {

            dot.addEventListener(
                'click',
                function () {

                    showSlide(index);
                    restartAutoplay();

                }
            );

        });


        /* CAMBIO AUTOMÁTICO */

        function startAutoplay() {

            autoplay = setInterval(
                function () {
                    nextSlide();
                },
                5000
            );

        }


        function restartAutoplay() {

            clearInterval(autoplay);
            startAutoplay();

        }


        /* INICIAR */

        showSlide(0);
        startAutoplay();

    }

});

</script>



<style>

/* =========================================================
   VARIABLES GENERALES
========================================================= */

:root {

    --color-verde-principal: #39a900;
    --color-verde-claro: #a3d98c;
    --color-verde-oscuro: #276f00;

    --color-crema-fondo: #f5f8f4;

    --color-blanco: #ffffff;

    --color-texto: #2d3748;
    --color-texto-mutado: #636b77;

}


/* =========================================================
   CONTENEDOR GENERAL
========================================================= */

.adminsena-landing {

    background-color: var(--color-crema-fondo);

    font-family:
        'Segoe UI',
        system-ui,
        -apple-system,
        BlinkMacSystemFont,
        sans-serif;

    color: var(--color-texto);

    overflow-x: hidden;

}


.container {

    max-width: 1200px;

    margin: 0 auto;

    padding: 0 24px;

}


/* =========================================================
   HERO
========================================================= */

.hero-section {

    background:

        linear-gradient(
            135deg,
            rgba(39, 111, 0, .88),
            rgba(57, 169, 0, .95)
        ),

        url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop')

        no-repeat

        center center / cover;

    color: var(--color-blanco);

    text-align: center;

    padding:
        100px
        20px
        140px;

    border-radius:
        0 0 50px 50px;

}


.hero-container {

    display: flex;

    flex-direction: column;

    align-items: center;

    gap: 20px;

}


.badge-tag {

    background:
        rgba(255,255,255,.20);

    padding:
        8px 18px;

    border-radius:
        30px;

    font-size:
        .9rem;

    font-weight:
        600;

    backdrop-filter:
        blur(5px);

    display:
        inline-flex;

    align-items:
        center;

    gap:
        8px;

}


.hero-title {

    font-size:
        3.2rem;

    font-weight:
        800;

    max-width:
        800px;

    line-height:
        1.2;

    margin:
        0;

}


.hero-subtitle {

    font-size:
        1.15rem;

    max-width:
        700px;

    line-height:
        1.6;

    opacity:
        .9;

}


.btn-primary-hero {

    background:
        var(--color-blanco);

    color:
        var(--color-verde-oscuro);

    padding:
        14px 28px;

    border-radius:
        30px;

    text-decoration:
        none;

    font-weight:
        700;

    margin-top:
        10px;

    box-shadow:
        0 4px 10px rgba(0,0,0,.1);

    transition:
        .3s;

}


.btn-primary-hero:hover {

    transform:
        scale(1.05);

    color:
        var(--color-verde-oscuro);

}


/* =========================================================
   OFERTAS DE FORMACIÓN
========================================================= */

.offers-section {

    padding:
        25px 0 70px;

    position:
        relative;

}


/* =========================================================
   ENCABEZADO OFERTAS
========================================================= */

.offers-header {

    display:
        flex;

    align-items:
        flex-end;

    justify-content:
        space-between;

    gap:
        30px;

    margin-bottom:
        28px;

}


.offers-small-title {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        8px;

    color:
        var(--color-verde-principal);

    font-size:
        .78rem;

    font-weight:
        800;

    letter-spacing:
        1px;

    margin-bottom:
        8px;

}


.offers-title {

    font-size:
        2.3rem;

    font-weight:
        800;

    color:
        var(--color-texto);

    margin:
        0 0 8px;

}


.offers-description {

    color:
        var(--color-texto-mutado);

    font-size:
        1rem;

    max-width:
        650px;

    line-height:
        1.6;

    margin:
        0;

}


/* =========================================================
   BOTÓN VER TODAS LAS OFERTAS
========================================================= */

.offers-all-btn {

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        10px;

    padding:
        13px 20px;

    border-radius:
        30px;

    background:
        var(--color-verde-principal);

    color:
        white;

    text-decoration:
        none;

    font-weight:
        700;

    font-size:
        .9rem;

    white-space:
        nowrap;

    box-shadow:
        0 7px 18px rgba(57,169,0,.20);

    transition:
        .3s;

}


.offers-all-btn:hover {

    background:
        var(--color-verde-oscuro);

    color:
        white;

    transform:
        translateY(-3px);

    box-shadow:
        0 12px 25px rgba(39,111,0,.22);

}


/* =========================================================
   CARRUSEL
========================================================= */

.offers-carousel {

    position:
        relative;

    width:
        100%;

    height:
        430px;

    border-radius:
        30px;

    overflow:
        hidden;

    box-shadow:
        0 18px 45px rgba(0,0,0,.12);

    background:
        #1f5f00;

}


.offers-track {

    width:
        100%;

    height:
        100%;

    position:
        relative;

}


/* =========================================================
   SLIDES
========================================================= */

.offer-slide {

    position:
        absolute;

    inset:
        0;

    width:
        100%;

    height:
        100%;

    opacity:
        0;

    visibility:
        hidden;

    transform:
        scale(1.04);

    transition:
        opacity .7s ease,
        transform .7s ease,
        visibility .7s;

    color:
        white;

    text-decoration:
        none;

}


.offer-slide.active {

    opacity:
        1;

    visibility:
        visible;

    transform:
        scale(1);

}


.offer-slide img {

    width:
        100%;

    height:
        100%;

    object-fit:
        cover;

    display:
        block;

}


/* =========================================================
   CAPA SOBRE LA IMAGEN
========================================================= */

.offer-overlay {

    position:
        absolute;

    inset:
        0;

    background:

        linear-gradient(
            90deg,
            rgba(0,0,0,.78) 0%,
            rgba(0,0,0,.50) 45%,
            rgba(0,0,0,.12) 100%
        );

}


/* =========================================================
   INFORMACIÓN DE LA OFERTA
========================================================= */

.offer-info {

    position:
        absolute;

    left:
        55px;

    bottom:
        55px;

    max-width:
        600px;

    z-index:
        2;

}


.offer-tag {

    display:
        inline-block;

    background:
        rgba(57,169,0,.95);

    padding:
        7px 15px;

    border-radius:
        20px;

    font-size:
        .75rem;

    font-weight:
        800;

    text-transform:
        uppercase;

    margin-bottom:
        14px;

}


.offer-info h3 {

    font-size:
        2.5rem;

    line-height:
        1.15;

    font-weight:
        800;

    margin:
        0 0 12px;

    color:
        white;

}


.offer-info p {

    font-size:
        1rem;

    line-height:
        1.6;

    color:
        rgba(255,255,255,.9);

    margin:
        0 0 20px;

    max-width:
        520px;

}


.offer-action {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        9px;

    font-size:
        .9rem;

    font-weight:
        700;

    color:
        white;

    background:
        rgba(255,255,255,.15);

    border:
        1px solid rgba(255,255,255,.35);

    padding:
        10px 17px;

    border-radius:
        25px;

    backdrop-filter:
        blur(5px);

    transition:
        .3s;

}


.offer-slide:hover .offer-action {

    background:
        var(--color-verde-principal);

    border-color:
        var(--color-verde-principal);

}


/* =========================================================
   FLECHAS DEL CARRUSEL
========================================================= */

.offer-arrow {

    position:
        absolute;

    top:
        50%;

    transform:
        translateY(-50%);

    width:
        48px;

    height:
        48px;

    border:
        1px solid rgba(255,255,255,.3);

    border-radius:
        50%;

    background:
        rgba(0,0,0,.25);

    backdrop-filter:
        blur(5px);

    color:
        white;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    cursor:
        pointer;

    z-index:
        10;

    font-size:
        16px;

    transition:
        .3s;

}


.offer-arrow:hover {

    background:
        var(--color-verde-principal);

    transform:
        translateY(-50%) scale(1.08);

}


.offer-arrow-left {

    left:
        20px;

}


.offer-arrow-right {

    right:
        20px;

}


/* =========================================================
   INDICADORES
========================================================= */

.offer-dots {

    position:
        absolute;

    bottom:
        20px;

    left:
        50%;

    transform:
        translateX(-50%);

    display:
        flex;

    gap:
        8px;

    z-index:
        10;

}


.offer-dot {

    width:
        9px;

    height:
        9px;

    padding:
        0;

    border:
        none;

    border-radius:
        50%;

    background:
        rgba(255,255,255,.45);

    cursor:
        pointer;

    transition:
        .3s;

}


.offer-dot.active {

    width:
        26px;

    border-radius:
        10px;

    background:
        white;

}


/* =========================================================
   SECCIÓN BIENVENIDA
========================================================= */

.welcome-section {

    padding:
        60px 0;

}


.welcome-container {

    display:
        grid;

    grid-template-columns:
        1fr 1.1fr;

    gap:
        60px;

    align-items:
        center;

}


/* =========================================================
   IMAGEN DE BIENVENIDA
========================================================= */

.welcome-image-wrapper {

    position:
        relative;

    display:
        flex;

    justify-content:
        center;

}


.main-image-card {

    position:
        relative;

    background:
        var(--color-blanco);

    padding:
        15px;

    border-radius:
        24px;

    box-shadow:
        0 15px 30px rgba(0,0,0,.06);

    max-width:
        440px;

}


.img-fluid-rounded {

    width:
        100%;

    height:
        290px;

    object-fit:
        cover;

    border-radius:
        18px;

    display:
        block;

}


/* =========================================================
   INSIGNIAS
========================================================= */

.floating-badge-top {

    position:
        absolute;

    top:
        -15px;

    left:
        -15px;

    background:
        var(--color-verde-oscuro);

    color:
        var(--color-blanco);

    padding:
        8px 16px;

    border-radius:
        30px;

    font-size:
        .85rem;

    font-weight:
        600;

    box-shadow:
        0 8px 16px rgba(39,111,0,.2);

    display:
        flex;

    align-items:
        center;

    gap:
        6px;

}


.floating-badge-bottom {

    position:
        absolute;

    bottom:
        -15px;

    right:
        -15px;

    background:
        #ff6b00;

    color:
        var(--color-blanco);

    width:
        50px;

    height:
        50px;

    border-radius:
        50%;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    font-size:
        1.3rem;

    box-shadow:
        0 8px 16px rgba(0,0,0,.15);

}


/* =========================================================
   TEXTO DE BIENVENIDA
========================================================= */

.welcome-text-content {

    display:
        flex;

    flex-direction:
        column;

    gap:
        20px;

}


.section-title {

    font-size:
        2.3rem;

    font-weight:
        800;

    color:
        var(--color-texto);

    margin:
        0;

}


.section-paragraph {

    font-size:
        1.05rem;

    line-height:
        1.7;

    color:
        var(--color-texto-mutado);

    margin:
        0;

}


.welcome-buttons {

    display:
        flex;

    align-items:
        center;

    gap:
        25px;

    margin-top:
        10px;

}


.btn-green-dark {

    background:
        var(--color-verde-oscuro);

    color:
        var(--color-blanco);

    padding:
        12px 25px;

    border-radius:
        30px;

    text-decoration:
        none;

    font-weight:
        600;

    display:
        inline-flex;

    align-items:
        center;

    gap:
        8px;

    box-shadow:
        0 6px 15px rgba(39,111,0,.15);

    transition:
        .2s;

}


.btn-green-dark:hover {

    transform:
        translateY(-2px);

    background:
        var(--color-verde-principal);

    color:
        white;

}


.link-simple {

    color:
        var(--color-texto);

    text-decoration:
        none;

    font-weight:
        600;

    border-bottom:
        2px solid transparent;

    transition:
        .3s;

}


.link-simple:hover {

    border-color:
        var(--color-verde-oscuro);

    color:
        var(--color-verde-oscuro);

}


/* =========================================================
   TARJETAS
========================================================= */

.cards-section {

    padding:
        60px 0 100px;

}


.grid-section-title {

    font-size:
        2rem;

    font-weight:
        800;

    text-align:
        center;

    margin:
        0 0 45px;

}


.rounded-cards-grid {

    display:
        grid;

    grid-template-columns:
        repeat(
            auto-fit,
            minmax(300px, 1fr)
        );

    gap:
        30px;

}


.rounded-card {

    background:
        var(--color-blanco);

    border-radius:
        32px;

    overflow:
        hidden;

    box-shadow:
        0 10px 20px rgba(0,0,0,.03);

    transition:
        transform .3s ease,
        box-shadow .3s ease;

    padding:
        12px;

    display:
        flex;

    flex-direction:
        column;

}


.rounded-card:hover {

    transform:
        translateY(-8px);

    box-shadow:
        0 15px 30px rgba(39,111,0,.08);

}


.card-img {

    width:
        100%;

    height:
        200px;

    object-fit:
        cover;

    border-radius:
        24px;

}


.card-body-content {

    padding:
        25px 15px 15px;

    text-align:
        center;

    flex-grow:
        1;

    display:
        flex;

    flex-direction:
        column;

    justify-content:
        space-between;

    gap:
        15px;

}


.card-body-content h3 {

    font-size:
        1.3rem;

    font-weight:
        700;

    color:
        var(--color-texto);

    margin:
        0;

}


.card-body-content p {

    font-size:
        .95rem;

    color:
        var(--color-texto-mutado);

    line-height:
        1.6;

    margin:
        0;

}


/* =========================================================
   BOTÓN VOLVER ARRIBA
========================================================= */

.btn-scroll-top {

    position:
        fixed;

    bottom:
        30px;

    right:
        30px;

    z-index:
        1050;

    width:
        50px;

    height:
        50px;

    border:
        1px solid rgba(255,255,255,.25);

    outline:
        none;

    background:
        rgba(57,169,0,.45);

    backdrop-filter:
        blur(8px);

    -webkit-backdrop-filter:
        blur(8px);

    color:
        #ffffff;

    cursor:
        pointer;

    border-radius:
        50%;

    font-size:
        20px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    box-shadow:
        0 8px 20px rgba(0,0,0,.2);

    opacity:
        0;

    visibility:
        hidden;

    transform:
        translateY(20px) scale(.9);

    transition:
        all .3s cubic-bezier(
            .4,
            0,
            .2,
            1
        );

}


.btn-scroll-top:hover {

    background:
        rgba(57,169,0,.85);

    transform:
        translateY(-3px) scale(1.08);

    box-shadow:
        0 12px 25px rgba(0,0,0,.3);

}


.btn-scroll-top.show {

    opacity:
        1;

    visibility:
        visible;

    transform:
        translateY(0) scale(1);

}


/* =========================================================
   RESPONSIVE - TABLET
========================================================= */

@media (max-width: 991px) {


    /* HERO */

    .hero-title {

        font-size:
            2.7rem;

    }


    /* OFERTAS */

    .offers-header {

        align-items:
            flex-start;

    }


    .offers-carousel {

        height:
            420px;

    }


    /* BIENVENIDA */

    .welcome-container {

        grid-template-columns:
            1fr;

        gap:
            40px;

    }


    .welcome-image-wrapper {

        order:
            1;

    }


    .welcome-text-content {

        order:
            2;

    }

}


/* =========================================================
   RESPONSIVE - TABLET PEQUEÑA
========================================================= */

@media (max-width: 768px) {


    /* HERO */

    .hero-title {

        font-size:
            2.2rem;

    }


    .hero-subtitle {

        font-size:
            1rem;

    }


    .hero-section {

        padding:
            80px 20px 120px;

        border-radius:
            0 0 30px 30px;

    }


    /* OFERTAS */

    .offers-header {

        flex-direction:
            column;

        align-items:
            flex-start;

        gap:
            18px;

    }


    .offers-title {

        font-size:
            1.9rem;

    }


    .offers-carousel {

        height:
            430px;

        border-radius:
            24px;

    }


    .offer-info {

        left:
            30px;

        right:
            30px;

        bottom:
            55px;

    }


    .offer-info h3 {

        font-size:
            1.8rem;

    }


    .offer-info p {

        font-size:
            .9rem;

    }


    .offer-arrow {

        width:
            40px;

        height:
            40px;

    }


    .offer-arrow-left {

        left:
            12px;

    }


    .offer-arrow-right {

        right:
            12px;

    }


    /* BIENVENIDA */

    .welcome-section {

        padding:
            40px 0;

    }


    .section-title {

        font-size:
            2rem;

    }


    .welcome-buttons {

        flex-direction:
            column;

        align-items:
            flex-start;

    }


    /* TARJETAS */

    .cards-section {

        padding:
            40px 0 70px;

    }

}


/* =========================================================
   RESPONSIVE - CELULAR
========================================================= */

@media (max-width: 500px) {


    .container {

        padding:
            0 16px;

    }


    /* HERO */

    .hero-section {

        padding:
            65px 18px 110px;

    }


    .hero-title {

        font-size:
            1.9rem;

    }


    .hero-subtitle {

        font-size:
            .9rem;

    }


    .badge-tag {

        font-size:
            .75rem;

    }


    .btn-primary-hero {

        padding:
            12px 22px;

    }


    /* OFERTAS */

    .offers-section {

        padding:
            10px 0 50px;

    }


    .offers-title {

        font-size:
            1.7rem;

    }


    .offers-description {

        font-size:
            .9rem;

    }


    .offers-all-btn {

        width:
            100%;

    }


    .offers-carousel {

        height:
            390px;

        border-radius:
            22px;

    }


    .offer-info {

        left:
            22px;

        right:
            22px;

        bottom:
            45px;

    }


    .offer-info h3 {

        font-size:
            1.55rem;

    }


    .offer-info p {

        font-size:
            .84rem;

    }


    .offer-tag {

        font-size:
            .68rem;

        padding:
            6px 12px;

    }


    .offer-action {

        font-size:
            .8rem;

        padding:
            9px 14px;

    }


    .offer-arrow {

        width:
            36px;

        height:
            36px;

        font-size:
            13px;

    }


    /* BIENVENIDA */

    .main-image-card {

        max-width:
            100%;

    }


    .img-fluid-rounded {

        height:
            230px;

    }


    .floating-badge-top {

        left:
            -5px;

        top:
            -12px;

        font-size:
            .7rem;

        padding:
            7px 12px;

    }


    .floating-badge-bottom {

        right:
            -5px;

        bottom:
            -12px;

    }


    .section-title {

        font-size:
            1.75rem;

    }


    .section-paragraph {

        font-size:
            .95rem;

    }


    /* TARJETAS */

    .rounded-cards-grid {

        grid-template-columns:
            1fr;

    }


    .grid-section-title {

        font-size:
            1.7rem;

    }


    /* BOTÓN ARRIBA */

    .btn-scroll-top {

        width:
            45px;

        height:
            45px;

        right:
            18px;

        bottom:
            18px;

    }

}

</style>

@endsection