@extends('Layout.app')

@section('content')

<div class="edit-page">


<!-- =========================
     ENCABEZADO
========================== -->

<div class="edit-header">

    <div class="header-left">

        <a href="{{ url()->previous() }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="header-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <div>
            <h1>Actualizar aprendiz</h1>
            <p>Modifica la información del aprendiz seleccionado.</p>
        </div>

    </div>

</div>


<!-- =========================
     TARJETA PRINCIPAL
========================== -->

<div class="edit-card">


    <!-- =========================
         ENCABEZADO DE TARJETA
    ========================== -->

    <div class="card-top">

        <div class="student-preview">

            <div class="student-avatar">
                {{ strtoupper(substr($apprentice->name, 0, 2)) }}
            </div>

            <div>

                <span class="student-label">
                    APRENDIZ
                </span>

                <h2>
                    {{ $apprentice->name }}
                </h2>

                <span class="student-id">
                    ID #{{ $apprentice->id }}
                </span>

            </div>

        </div>


        <div class="edit-status">
            <i class="bi bi-pencil"></i>
            Editando información
        </div>

    </div>


    <!-- =========================
         FORMULARIO
    ========================== -->

    <div class="card-body">

        <form
            action="{{ route('apprentice.update', $apprentice) }}"
            method="POST"
        >

            @csrf
            @method('put')


            <!-- =========================
                 DATOS PERSONALES
            ========================== -->

            <div class="section-title">

                <div class="section-icon">
                    <i class="bi bi-person"></i>
                </div>

                <div>
                    <h3>Datos personales</h3>
                    <p>Información de contacto del aprendiz</p>
                </div>

            </div>


            <div class="form-grid">


                <!-- ID -->

                <div class="input-group-custom">

                    <label>
                        ID del aprendiz
                    </label>

                    <div class="input-wrapper readonly">

                        <i class="bi bi-hash"></i>

                        <input
                            type="text"
                            value="#{{ $apprentice->id }}"
                            disabled
                        >

                        <span class="lock-icon">
                            <i class="bi bi-lock-fill"></i>
                        </span>

                    </div>

                </div>


                <!-- Nombre -->

                <div class="input-group-custom">

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
                            value="{{ old('name', $apprentice->name) }}"
                            placeholder="Nombre completo"
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
                            value="{{ old('email', $apprentice->email) }}"
                            placeholder="correo@ejemplo.com"
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
                            value="{{ old('cell_number', $apprentice->cell_number) }}"
                            placeholder="300 123 4567"
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
                    <p>Actualiza la ficha y el computador asignado</p>
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
                            id="course_id"
                            name="course_id"
                            required
                        >

                            <option value="">
                                Selecciona un curso
                            </option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ old('course_id', $apprentice->course_id) == $course->id ? 'selected' : '' }}
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
                    </label>

                    <div class="input-wrapper select-wrapper">

                        <i class="bi bi-laptop"></i>

                        <select
                            id="computer_id"
                            name="computer_id"
                        >

                            <option value="">
                                Sin computador
                            </option>

                            @foreach($computers as $computer)

                                <option
                                    value="{{ $computer->id }}"
                                    {{ old('computer_id', $apprentice->computer_id) == $computer->id ? 'selected' : '' }}
                                >
                                    Computador #{{ $computer->number }}
                                    - {{ $computer->brand }}
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

            <div class="warning-box">

                <div class="warning-icon">
                    <i class="bi bi-info-circle-fill"></i>
                </div>

                <div>

                    <strong>Estás editando un registro existente</strong>

                    <p>
                        Los cambios realizados reemplazarán la información
                        actual del aprendiz. Verifica los datos antes de guardar.
                    </p>

                </div>

            </div>


            <!-- =========================
                 BOTONES
            ========================== -->

            <div class="form-footer">

                <a
                    href="{{ url()->previous() }}"
                    class="cancel-button"
                >
                    <i class="bi bi-arrow-left"></i>
                    Volver
                </a>


                <button
                    type="submit"
                    class="save-button"
                >
                    <i class="bi bi-check-lg"></i>
                    Guardar cambios
                </button>

            </div>


        </form>

    </div>

</div>


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

    .edit-page {
        max-width: 1050px;

        margin: 0 auto;

        padding: 35px 25px 55px;
    }


    /* =========================
       HEADER
    ========================== */

    .edit-header {
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

        border: 1px solid #e6ebe6;

        color: #68716b;

        text-decoration: none;

        font-size: 17px;

        transition: .2s;
    }

    .back-button:hover {
        background: #eef7ea;

        border-color: #d6eacc;

        color: #39A900;
    }

    .header-icon {
        width: 54px;
        height: 54px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background: linear-gradient(
            135deg,
            #39A900,
            #2d8800
        );

        color: white;

        font-size: 22px;

        box-shadow:
            0 8px 20px rgba(57,169,0,.18);
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

    .edit-card {
        background: white;

        border: 1px solid #e8ece8;

        border-radius: 20px;

        overflow: hidden;

        box-shadow:
            0 8px 30px rgba(30,50,35,.055);
    }


    /* =========================
       CARD TOP
    ========================== */

    .card-top {
        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 25px 30px;

        background: linear-gradient(
            135deg,
            #fbfdfb,
            #f5faf3
        );

        border-bottom: 1px solid #e8eee7;
    }

    .student-preview {
        display: flex;

        align-items: center;

        gap: 14px;
    }

    .student-avatar {
        width: 55px;
        height: 55px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background: linear-gradient(
            135deg,
            #e1f5d8,
            #cbeab9
        );

        color: #31780e;

        font-size: 15px;

        font-weight: 800;
    }

    .student-label {
        display: block;

        color: #89938c;

        font-size: 9px;

        font-weight: 750;

        letter-spacing: 1px;

        margin-bottom: 2px;
    }

    .student-preview h2 {
        margin: 0;

        color: #273029;

        font-size: 17px;

        font-weight: 720;
    }

    .student-id {
        display: block;

        margin-top: 3px;

        color: #8c958e;

        font-size: 11px;
    }

    .edit-status {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 8px 12px;

        border-radius: 9px;

        background: #eaf7e3;

        color: #397c1d;

        font-size: 10px;

        font-weight: 650;
    }


    /* =========================
       BODY
    ========================== */

    .card-body {
        padding: 0 0 25px;
    }


    /* =========================
       SECTIONS
    ========================== */

    .section-title {
        display: flex;

        align-items: center;

        gap: 12px;

        margin: 28px 30px 20px;
    }

    .section-title.second-section {
        margin-top: 35px;
    }

    .section-icon {
        width: 39px;
        height: 39px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 11px;

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
       INPUT WRAPPER
    ========================== */

    .input-wrapper {
        position: relative;
    }

    .input-wrapper > i:first-child {
        position: absolute;

        left: 14px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa39d;

        font-size: 15px;

        z-index: 2;

        pointer-events: none;
    }

    .input-wrapper input,
    .input-wrapper select {

        width: 100%;

        height: 46px;

        box-sizing: border-box;

        padding: 0 15px 0 42px;

        border: 1px solid #e1e6e2;

        border-radius: 11px;

        background: #fafbfa;

        color: #333;

        font-size: 13px;

        outline: none;

        transition: .2s;
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
       READONLY
    ========================== */

    .input-wrapper.readonly input {
        background: #f2f4f2;

        color: #89918b;

        cursor: not-allowed;
    }

    .lock-icon {
        position: absolute;

        right: 14px;

        top: 50%;

        transform: translateY(-50%);

        color: #a1a8a2;

        font-size: 11px;
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
       AVISO
    ========================== */

    .warning-box {

        margin: 28px 30px 0;

        padding: 14px 16px;

        display: flex;

        align-items: flex-start;

        gap: 12px;

        background: #f5faf2;

        border: 1px solid #e1efdb;

        border-radius: 12px;
    }

    .warning-icon {
        color: #39A900;

        font-size: 17px;

        margin-top: 1px;
    }

    .warning-box strong {
        display: block;

        color: #45603b;

        font-size: 12px;

        margin-bottom: 3px;
    }

    .warning-box p {
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

        padding: 20px 30px 0;

        border-top: 1px solid #edf0ed;
    }


    /* =========================
       CANCELAR
    ========================== */

    .cancel-button {

        height: 42px;

        padding: 0 18px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

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

        background: #f3f5f3;

        color: #333b35;
    }


    /* =========================
       GUARDAR
    ========================== */

    .save-button {

        height: 42px;

        padding: 0 20px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        border: none;

        border-radius: 10px;

        background: #39A900;

        color: white;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;

        box-shadow:
            0 6px 15px rgba(57,169,0,.18);

        transition: .25s;
    }

    .save-button:hover {

        background: #2e8d00;

        transform: translateY(-1px);

        box-shadow:
            0 8px 20px rgba(57,169,0,.25);
    }

    .save-button i {
        font-size: 15px;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 700px) {

        .edit-page {
            padding: 25px 15px 40px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .card-top {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .edit-status {
            align-self: flex-start;
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
