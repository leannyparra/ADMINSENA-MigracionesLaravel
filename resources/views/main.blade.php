@extends('Layout.app')

@section('content')
<main class="adminsena-landing">
    
    <!-- 1. HERO SECTION (Sección Principal con fondo verde orgánico) -->
    <section class="hero-section">
        <div class="container hero-container">
            <span class="badge-tag">
                <i class="fa-solid fa-laptop-code"></i> Tecnología ADSO
            </span>
            <h1 class="hero-title">Administra Ambientes y Equipos Fácilmente</h1>
            <p class="hero-subtitle">La plataforma centralizada para la asignación y seguimiento de hardware, control de ambientes formativos y fichas académicas del centro de formación.</p>
            <a href="#modulos" class="btn-primary-hero">Explorar Módulos</a>
        </div>
    </section>

    <!-- 2. BUSCADOR FLOTANTE SUPERPUESTO (Estilo píldora) -->
    <section class="search-floating-section">
        <div class="container">
            <div class="floating-search-bar">
                <div class="search-col">
                    <span class="search-label">¿Qué buscas?</span>
                    <input type="text" placeholder="Ambientes, Fichas, Instructores..." class="search-input">
                </div>
                <div class="search-divider"></div>
                <div class="search-col">
                    <span class="search-label">Estado actual</span>
                    <select class="search-select">
                        <option>Todos los módulos</option>
                        <option>Equipos disponibles</option>
                        <option>Ambientes ocupados</option>
                    </select>
                </div>
                <button class="btn-search">
                    <i class="fa-solid fa-magnifying-glass"></i> Consultar
                </button>
            </div>
        </div>
    </section>

    <!-- 3. SECCIÓN PRESENTACIÓN (Imagen flotante y texto al lado) -->
    <section class="welcome-section">
        <div class="container welcome-container">
            
            <!-- Tarjeta de Imagen con Insignias Redondeadas -->
            <div class="welcome-image-wrapper">
                <div class="main-image-card">
                    <!-- Insignia flotante superior izquierda -->
                    <div class="floating-badge-top">
                        <i class="fa-solid fa-shield-halved"></i> Control Seguro
                    </div>
                    <!-- Foto representativa (puedes cambiar el src por tu propia imagen) -->
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=600&auto=format&fit=crop" alt="Ambiente de Formación SENA" class="img-fluid-rounded">
                    <!-- Insignia flotante inferior derecha -->
                    <div class="floating-badge-bottom">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                </div>
            </div>

            <!-- Texto Descriptivo -->
            <div class="welcome-text-content">
                <h2 class="section-title">¿Qué es AdminSENA?</h2>
                <p class="section-paragraph">
                    Es una solución interactiva desarrollada para optimizar los procesos de gestión en el área académica y tecnológica. Permitimos a los coordinadores e instructores realizar un control riguroso de las herramientas de cómputo y el agendamiento físico del centro formativo de manera automatizada.
                </p>
                <div class="welcome-buttons">
                    <a href="#" class="btn-green-dark"><i class="fa-solid fa-circle-info"></i> Conocer más</a>
                    <a href="#" class="link-simple">Ver manual de uso</a>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. SECCIÓN TARJETAS (Misión, Visión, Enfoque en columnas de bordes muy curvos) -->
    <section id="modulos" class="cards-section">
        <div class="container">
            <h2 class="grid-section-title">Nuestros Pilares de Gestión</h2>
            
            <div class="rounded-cards-grid">
                
                <!-- Tarjeta 1 -->
                <div class="rounded-card">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400&auto=format&fit=crop" alt="Misión" class="card-img">
                    <div class="card-body-content">
                        <h3>Misión del Sistema</h3>
                        <p>Asegurar la trazabilidad física y lógica de los equipos asignados a la tecnología ADSO, garantizando un entorno coordinado.</p>
                        <a href="#" class="btn-card-action">Ver Detalles</a>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="rounded-card">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=400&auto=format&fit=crop" alt="Visión" class="card-img">
                    <div class="card-body-content">
                        <h3>Visión y Futuro</h3>
                        <p>Expandir el control a todos los ambientes del centro de formación, consolidando un ecosistema de software escalable.</p>
                        <a href="#" class="btn-card-action">Plan de Ruta</a>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="rounded-card">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&auto=format&fit=crop" alt="Compromiso" class="card-img">
                    <div class="card-body-content">
                        <h3>Gestión de Fichas</h3>
                        <p>Organizar de forma ágil los horarios, aprendices e instructores asignados a cada ambiente de computación.</p>
                        <a href="#" class="btn-card-action">Ir a Fichas</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<style>
    /* --- Estilo de Diseño Inspirado en la Referencia --- */
    :root {
        --color-verde-principal: #39a900;  /* Verde SENA oficial */
        --color-verde-claro: #a3d98c;      /* Verde pastel claro para fondos/píldoras */
        --color-verde-oscuro: #276f00;     /* Verde bosque oscuro */
        --color-crema-fondo: #f5f8f4;      /* Fondo crema cálido general */
        --color-blanco: #ffffff;
        --color-texto: #2d3748;
        --color-texto-mutado: #636b77;
    }

    .adminsena-landing {
        background-color: var(--color-crema-fondo);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        color: var(--color-texto);
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* 1. HERO SECTION */
    .hero-section {
        background: linear-gradient(135deg, rgba(39, 111, 0, 0.85), rgba(57, 169, 0, 0.95)), 
                    url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop') no-repeat center center/cover;
        color: var(--color-blanco);
        text-align: center;
        padding: 100px 20px 140px 20px; /* Margen inferior amplio para la barra flotante */
        border-radius: 0 0 50px 50px; /* Bordes inferiores muy curvos como la imagen */
    }

    .hero-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .badge-tag {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
        backdrop-filter: blur(5px);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .hero-title {
        font-size: 3.2rem;
        font-weight: 800;
        max-width: 800px;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.15rem;
        max-width: 700px;
        line-height: 1.6;
        opacity: 0.9;
    }

    .btn-primary-hero {
        background-color: var(--color-blanco);
        color: var(--color-verde-oscuro);
        padding: 14px 28px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 700;
        margin-top: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .btn-primary-hero:hover {
        transform: scale(1.05);
    }

    /* 2. BUSCADOR FLOTANTE SUPERPUESTO */
    .search-floating-section {
        margin-top: -65px; /* Sube la barra para superponerla al Hero */
        margin-bottom: 50px;
        position: relative;
        z-index: 10;
    }

    .floating-search-bar {
        background-color: var(--color-verde-claro);
        padding: 18px 25px;
        border-radius: 50px; /* Súper redondeado */
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 10px 25px rgba(39, 111, 0, 0.15);
        max-width: 950px;
        margin: 0 auto;
    }

    .search-col {
        flex: 1;
        display: flex;
        flex-direction: column;
        background-color: var(--color-blanco);
        padding: 10px 20px;
        border-radius: 30px;
    }

    .search-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--color-verde-oscuro);
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .search-input {
        border: none;
        outline: none;
        font-size: 0.95rem;
        color: var(--color-texto);
        background: transparent;
    }

    .search-select {
        border: none;
        outline: none;
        font-size: 0.95rem;
        color: var(--color-texto);
        cursor: pointer;
        background: transparent;
    }

    .search-divider {
        width: 2px;
        height: 40px;
        background-color: rgba(39, 111, 0, 0.15);
    }

    .btn-search {
        background-color: var(--color-verde-oscuro);
        color: var(--color-blanco);
        border: none;
        padding: 15px 30px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s;
    }

    .btn-search:hover {
        background-color: var(--color-verde-principal);
    }

    /* 3. SECCIÓN BIENVENIDA (Imagen e Información de lado) */
    .welcome-section {
        padding: 60px 0;
    }

    .welcome-container {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 60px;
        align-items: center;
    }

    /* Diseño de Foto Estilo Referencia */
    .welcome-image-wrapper {
        position: relative;
        display: flex;
        justify-content: center;
    }

    .main-image-card {
        position: relative;
        background-color: var(--color-blanco);
        padding: 15px;
        border-radius: 24px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.06);
        max-width: 440px;
    }

    .img-fluid-rounded {
        width: 100%;
        height: 290px;
        object-fit: cover;
        border-radius: 18px;
        display: block;
    }

    /* Insignias flotantes en la imagen */
    .floating-badge-top {
        position: absolute;
        top: -15px;
        left: -15px;
        background-color: var(--color-verde-oscuro);
        color: var(--color-blanco);
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 8px 16px rgba(39, 111, 0, 0.2);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .floating-badge-bottom {
        position: absolute;
        bottom: -15px;
        right: -15px;
        background-color: #ff6b00; /* Toque naranja sutil */
        color: var(--color-blanco);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }

    /* Textos descriptivos */
    .welcome-text-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .section-title {
        font-size: 2.3rem;
        font-weight: 800;
        color: var(--color-texto);
    }

    .section-paragraph {
        font-size: 1.05rem;
        line-height: 1.7;
        color: var(--color-texto-mutado);
    }

    .welcome-buttons {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-top: 10px;
    }

    .btn-green-dark {
        background-color: var(--color-verde-oscuro);
        color: var(--color-blanco);
        padding: 12px 25px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 6px 15px rgba(39, 111, 0, 0.15);
        transition: transform 0.2s;
    }

    .btn-green-dark:hover {
        transform: translateY(-2px);
    }

    .link-simple {
        color: var(--color-texto);
        text-decoration: none;
        font-weight: 600;
        border-bottom: 2px solid transparent;
        transition: border-color 0.3s;
    }

    .link-simple:hover {
        border-color: var(--color-verde-oscuro);
    }

    /* 4. SECCIÓN TARJETAS CON CURVA */
    .cards-section {
        padding: 60px 0 100px 0;
    }

    .grid-section-title {
        font-size: 2rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 45px;
    }

    .rounded-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    /* Tarjeta estilo redondeado eco-friendly de la imagen */
    .rounded-card {
        background-color: var(--color-blanco);
        border-radius: 32px; /* Súper redondeada como el mockup */
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.03);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 12px; /* Margen interno blanco */
        display: flex;
        flex-direction: column;
    }

    .rounded-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(39, 111, 0, 0.08);
    }

    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 24px; /* Las fotos internas también se redondean */
    }

    .card-body-content {
        padding: 25px 15px 15px 15px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 15px;
    }

    .card-body-content h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--color-texto);
    }

    .card-body-content p {
        font-size: 0.95rem;
        color: var(--color-texto-mutado);
        line-height: 1.6;
    }

    .btn-card-action {
        background-color: var(--color-verde-principal);
        color: var(--color-blanco);
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        display: inline-block;
        font-size: 0.9rem;
        transition: background-color 0.2s;
        align-self: center;
    }

    .btn-card-action:hover {
        background-color: var(--color-verde-oscuro);
    }

    /* RESPONSIVIDAD PARA CELULARES Y TABLETS */
    @media (max-width: 991px) {
        .welcome-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        .floating-search-bar {
            flex-direction: column;
            border-radius: 30px;
            padding: 20px;
        }
        .search-divider {
            display: none;
        }
        .search-col {
            width: 100%;
        }
        .btn-search {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.2rem;
        }
        .hero-section {
            border-radius: 0 0 30px 30px;
        }
    }
</style>


@endsection