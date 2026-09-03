@extends('Layout.app')

@section('content')

<div class="register-page">

```
<!-- =========================
     ENCABEZADO
========================== -->

<div class="register-header">

    <div class="header-left">

        <a href="{{ route('apprentice.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="header-icon">
            <i class="bi bi-person-plus-fill"></i>
        </div>

        <div>
            <h1>Registrar aprendiz</h1>
            <p>Agrega un nuevo aprendiz al sistema AdminSENA.</p>
        </div>

    </div>

</div>


<!-- =========================
     FORMULARIO
========================== -->

<div class="form-card">

    <div class="form-top">

        <div>
            <h2>Información del aprendiz</h2>
            <p>Completa los datos solicitados para registrar al aprendiz.</p>
        </div>

        <div class="required-info">
            <span>*</span> Campos obligatorios
        </div>

    </div>


    <form action="{{ route('apprentice.store') }}" method="POST">

        @csrf


        <!-- =========================
             DATOS PERSONALES
        ========================== -->

        <div class="section-title">

            <div class="section-icon">
                <i class="bi bi-person"></i>
            </div>

            <div>
                <h3>Datos personales</h3>
                <p>Información básica del aprendiz</p>
            </div>

        </div>


        <div class="form-grid">


            <!-- Nombre -->

            <div class="input-group-custom full">

                <label for="name">
                    Nombre completo
                    <span>*</span>
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-person"></i>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Ej. Juan Carlos Pérez"
                        value="{{ old('name') }}"
                        required
                    >

                </div>

            </div>


            <!-- Correo -->

            <div class="input-group-custom">

                <label for="email">
                    Correo electrónico
                    <span>*</span>
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Ej. juan@correo.com"
                        value="{{ old('email') }}"
                        required
                    >

                </div>

            </div>


            <!-- Teléfono -->

            <div class="input-group-custom">

                <label for="cell_number">
                    Número de celular
                    <span>*</span>
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-phone"></i>

                    <input
                        type="text"
                        id="cell_number"
                        name="cell_number"
                        placeholder="Ej. 300 123 4567"
                        value="{{ old('cell_number') }}"
                        required
                    >

                </div>

            </div>

        </div>


        <!-- =========================
             FORMACIÓN Y EQUIPO
        ========================== -->

        <div class="section-title second-section">

            <div class="section-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>
                <h3>Formación y equipo</h3>
                <p>Asigna el curso y computador correspondiente</p>
            </div>

        </div>


        <div class="form-grid">


            <!-- Curso -->

            <div class="input-group-custom">

                <label for="course_id">
                    Curso / Ficha
                    <span>*</span>
                </label>

                <div class="input-wrapper select-wrapper">

                    <i class="bi bi-book"></i>

                    <select
                        name="course_id"
                        id="course_id"
                        required
                    >

                        <option value="">
                            Seleccione una ficha
                        </option>

                        @foreach($courses as $course)

                            <option
                                value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}
                            >
                                Ficha {{ $course->course_number }}
                            </option>

                        @endforeach

                    </select>

                    <i class="bi bi-chevron-down select-arrow"></i>

                </div>

            </div>


            <!-- Computador -->

            <div class="input-group-custom">

                <label for="computer_id">
                    Computador asignado
                    <span>*</span>
                </label>

                <div class="input-wrapper select-wrapper">

                    <i class="bi bi-laptop"></i>

                    <select
                        name="computer_id"
                        id="computer_id"
                        required
                    >

                        <option value="">
                            Seleccione un computador
                        </option>

                        @foreach($computers as $computer)

                            <option
                                value="{{ $computer->id }}"
                                {{ old('computer_id') == $computer->id ? 'selected' : '' }}
                            >
                                Equipo #{{ $computer->number }} - {{ $computer->brand }}
                            </option>

                        @endforeach

                    </select>

                    <i class="bi bi-chevron-down select-arrow"></i>

                </div>

            </div>

        </div>


        <!-- =========================
             AVISO
        ========================== -->

        <div class="info-box">

            <div class="info-icon">
                <i class="bi bi-info-circle-fill"></i>
            </div>

            <div>
                <strong>Información importante</strong>

                <p>
                    Verifica que los datos del aprendiz sean correctos
                    antes de guardar el registro.
                </p>
            </div>

        </div>


        <!-- =========================
             BOTONES
        ========================== -->

        <div class="form-footer">

            <a
                href="{{ route('apprentice.index') }}"
                class="cancel-button"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="save-button"
            >
                <i class="bi bi-check-lg"></i>
                Registrar aprendiz
            </button>

        </div>


    </form>

</div>
```

</div>

<!-- =========================
     ESTILOS
========================== -->

<style>

    /* =========================
       GENERAL
    ========================== */

    body {
        background: #f6f8f7 !important;
    }

    .register-page {
        max-width: 1050px;
        margin: 0 auto;
        padding: 35px 25px 55px;
    }


    /* =========================
       HEADER
    ========================== */

    .register-header {
        margin-bottom: 25px;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .back-button {
        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: white;
        border: 1px solid #e7ebe7;

        color: #66706a;

        text-decoration: none;

        font-size: 17px;

        transition: .2s;
    }

    .back-button:hover {
        background: #eef6eb;
        color: #39A900;
        border-color: #d8ebd0;
    }

    .header-icon {
        width: 54px;
        height: 54px;

        border-radius: 16px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(
            135deg,
            #39A900,
            #2e8c00
        );

        color: white;

        font-size: 22px;

        box-shadow: 0 8px 20px rgba(57,169,0,.18);
    }

    .header-left h1 {
        margin: 0;

        color: #202922;

        font-size: 28px;

        font-weight: 750;

        letter-spacing: -.6px;
    }

    .header-left p {
        margin: 4px 0 0;

        color: #858e88;

        font-size: 13px;
    }


    /* =========================
       CARD
    ========================== */

    .form-card {
        background: white;

        border: 1px solid #e9ede9;

        border-radius: 20px;

        box-shadow:
            0 8px 30px rgba(30,50,35,.055);

        overflow: hidden;
    }


    /* =========================
       TOP
    ========================== */

    .form-top {
        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 25px 30px;

        border-bottom: 1px solid #edf0ed;
    }

    .form-top h2 {
        margin: 0;

        font-size: 17px;

        font-weight: 720;

        color: #29322c;
    }

    .form-top p {
        margin: 4px 0 0;

        font-size: 12px;

        color: #8b938d;
    }

    .required-info {
        font-size: 11px;

        color: #929a94;
    }

    .required-info span {
        color: #e05252;

        font-weight: bold;
    }


    /* =========================
       SECTION TITLE
    ========================== */

    .section-title {
        display: flex;

        align-items: center;

        gap: 12px;

        margin: 28px 30px 20px;
    }

    .section-title.second-section {
        margin-top: 34px;
    }

    .section-icon {
        width: 39px;
        height: 39px;

        border-radius: 11px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #eaf7e3;

        color: #39A900;

        font-size: 16px;
    }

    .section-title h3 {
        margin: 0;

        color: #29322c;

        font-size: 14px;

        font-weight: 720;
    }

    .section-title p {
        margin: 3px 0 0;

        color: #929a94;

        font-size: 11px;
    }


    /* =========================
       FORM GRID
    ========================== */

    .form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 20px;

        padding: 0 30px;
    }

    .input-group-custom.full {
        grid-column: span 2;
    }


    /* =========================
       LABEL
    ========================== */

    .input-group-custom label {
        display: block;

        margin-bottom: 8px;

        color: #4c554f;

        font-size: 12px;

        font-weight: 650;
    }

    .input-group-custom label span {
        color: #e05252;

        margin-left: 2px;
    }


    /* =========================
       INPUT
    ========================== */

    .input-wrapper {
        position: relative;
    }

    .input-wrapper > i:first-child {
        position: absolute;

        left: 14px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa29c;

        font-size: 15px;

        z-index: 2;

        pointer-events: none;
    }

    .input-wrapper input,
    .input-wrapper select {

        width: 100%;

        height: 46px;

        padding: 0 15px 0 42px;

        border: 1px solid #e2e7e3;

        border-radius: 11px;

        background: #fafbfa;

        color: #333;

        font-size: 13px;

        outline: none;

        transition: .2s;

        box-sizing: border-box;
    }

    .input-wrapper input::placeholder {
        color: #b0b6b1;
    }

    .input-wrapper input:focus,
    .input-wrapper select:focus {

        background: white;

        border-color: #8acb68;

        box-shadow:
            0 0 0 3px rgba(57,169,0,.08);
    }


    /* =========================
       SELECT
    ========================== */

    .select-wrapper select {
        appearance: none;

        -webkit-appearance: none;

        cursor: pointer;

        padding-right: 42px;
    }

    .select-arrow {
        position: absolute;

        right: 15px;

        top: 50%;

        transform: translateY(-50%);

        color: #8d968f;

        font-size: 12px;

        pointer-events: none;
    }


    /* =========================
       INFO BOX
    ========================== */

    .info-box {
        margin: 28px 30px 0;

        padding: 14px 16px;

        display: flex;

        align-items: flex-start;

        gap: 12px;

        background: #f5faF2;

        border: 1px solid #e2f0dc;

        border-radius: 12px;
    }

    .info-icon {
        color: #39A900;

        font-size: 17px;

        margin-top: 1px;
    }

    .info-box strong {
        display: block;

        color: #45603b;

        font-size: 12px;

        margin-bottom: 3px;
    }

    .info-box p {
        margin: 0;

        color: #778171;

        font-size: 11px;

        line-height: 1.5;
    }


    /* =========================
       FOOTER
    ========================== */

    .form-footer {
        display: flex;

        justify-content: flex-end;

        align-items: center;

        gap: 10px;

        margin-top: 30px;

        padding: 20px 30px;

        background: #fafbfa;

        border-top: 1px solid #edf0ed;
    }


    /* =========================
       CANCELAR
    ========================== */

    .cancel-button {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        height: 42px;

        padding: 0 19px;

        border-radius: 10px;

        background: white;

        border: 1px solid #dfe4df;

        color: #626b64;

        text-decoration: none;

        font-size: 12px;

        font-weight: 650;

        transition: .2s;
    }

    .cancel-button:hover {
        background: #f2f4f2;

        color: #343c36;
    }


    /* =========================
       GUARDAR
    ========================== */

    .save-button {
        height: 42px;

        padding: 0 21px;

        border: none;

        border-radius: 10px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        background: #39A900;

        color: white;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;

        box-shadow: 0 6px 15px rgba(57,169,0,.18);

        transition: .25s;
    }

    .save-button i {
        font-size: 15px;
    }

    .save-button:hover {
        background: #2e8d00;

        transform: translateY(-1px);

        box-shadow: 0 8px 19px rgba(57,169,0,.25);
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 700px) {

        .register-page {
            padding: 25px 15px 40px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .input-group-custom.full {
            grid-column: span 1;
        }

        .form-top {
            flex-direction: column;

            align-items: flex-start;

            gap: 10px;
        }

        .form-footer {
            flex-direction: column-reverse;

            align-items: stretch;
        }

        .cancel-button,
        .save-button {
            width: 100%;
        }

    }

</style>

@endsection
