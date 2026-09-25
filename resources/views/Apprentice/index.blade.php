@extends('Layout.app')

@section('content')

<div class="admin-page">


<!-- =========================
     ENCABEZADO
========================== -->
<div class="page-header">

    <div class="header-info">
        <div class="header-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <div>
            <h1>Aprendices</h1>
            <p>Administra y consulta la información de los aprendices registrados.</p>
        </div>
    </div>

    <a href="{{ route('apprentice.create') }}" class="btn-new">
        <i class="bi bi-plus-lg"></i>
        <span>Nuevo aprendiz</span>
    </a>

</div>


<!-- =========================
     ESTADÍSTICAS
========================== -->
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="bi bi-people-fill"></i>
        </div>

        <div>
            <span class="stat-label">Total aprendices</span>
            <strong>{{ $apprentices->count() }}</strong>
        </div>
    </div>


    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <div>
            <span class="stat-label">Aprendices registrados</span>
            <strong>{{ $apprentices->count() }}</strong>
        </div>
    </div>


    <div class="stat-card">
        <div class="stat-icon purple">
            <i class="bi bi-laptop-fill"></i>
        </div>

        <div>
            <span class="stat-label">Equipos asignados</span>
            <strong>{{ $apprentices->whereNotNull('computer_id')->count() }}</strong>
        </div>
    </div>

</div>


<!-- =========================
     CONTENEDOR PRINCIPAL
========================== -->
<div class="content-card">

    <!-- Barra superior -->
    <div class="table-toolbar">

        <div>
            <h2>Lista de aprendices</h2>
            <p>Consulta, edita o elimina aprendices.</p>
        </div>


        <div class="toolbar-actions">

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    id="searchApprentice"
                    placeholder="Buscar aprendiz..."
                >
            </div>

        </div>

    </div>


    <!-- =========================
         TABLA
    ========================== -->
    <div class="table-wrapper">

        <table class="modern-table" id="apprenticesTable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>APRENDIZ</th>
                    <th>CONTACTO</th>
                    <th>CURSO</th>
                    <th>EQUIPO</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>


            <tbody>

            @forelse ($apprentices as $apprentice)

                <tr class="apprentice-row">

                    <!-- ID -->
                    <td>
                        <span class="id-badge">
                            #{{ $apprentice->id }}
                        </span>
                    </td>


                    <!-- APRENDIZ -->
                    <td>

                        <div class="apprentice-info">

                            <div class="avatar">
                                {{ strtoupper(substr($apprentice->name, 0, 2)) }}
                            </div>

                            <div class="name-container">

                                <strong>
                                    {{ $apprentice->name }}
                                </strong>

                                <span>
                                    Aprendiz SENA
                                </span>

                            </div>

                        </div>

                    </td>


                    <!-- CONTACTO -->
                    <td>

                        <div class="contact-info">

                            <div>
                                <i class="bi bi-envelope"></i>
                                {{ $apprentice->email }}
                            </div>

                            <div>
                                <i class="bi bi-telephone"></i>
                                {{ $apprentice->cell_number }}
                            </div>

                        </div>

                    </td>


                    <!-- CURSO -->
                    <td>

                        <span class="course-badge">
                            <i class="bi bi-book"></i>
                            Ficha {{ $apprentice->course_id }}
                        </span>

                    </td>


                    <!-- EQUIPO -->
                    <td>

                        @if($apprentice->computer_id)

                            <span class="equipment-badge">
                                <i class="bi bi-laptop"></i>
                                PC {{ $apprentice->computer_id }}
                            </span>

                        @else

                            <span class="no-equipment">
                                Sin equipo
                            </span>

                        @endif

                    </td>


                    <!-- ACCIONES -->
                    <td>

                        <div class="actions">

                            <!-- Ver -->
                            <a
                                href="{{ route('apprentice.show', $apprentice->id) }}"
                                class="action view"
                                title="Ver aprendiz"
                            >
                                <i class="bi bi-eye"></i>
                            </a>


                            <!-- Editar -->
                            <a
                                href="{{ route('apprentice.edit', $apprentice->id) }}"
                                class="action edit"
                                title="Editar aprendiz"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>


                            <!-- Eliminar -->
                            <form
                                action="{{ route('apprentice.destroy', $apprentice->id) }}"
                                method="POST"
                                class="delete-form"
                            >

                                @csrf
                                @method('delete')

                                <button
                                    type="submit"
                                    class="action delete"
                                    title="Eliminar aprendiz"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este aprendiz?')"
                                >
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6">

                        <div class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-people"></i>
                            </div>

                            <h3>No hay aprendices registrados</h3>

                            <p>
                                Comienza agregando el primer aprendiz.
                            </p>

                            <a
                                href="{{ route('apprentice.create') }}"
                                class="btn-empty"
                            >
                                <i class="bi bi-plus-lg"></i>
                                Agregar aprendiz
                            </a>

                        </div>

                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

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

    .admin-page {
        max-width: 1450px;
        margin: 0 auto;
        padding: 35px 30px 50px;
    }


    /* =========================
       HEADER
    ========================== */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        gap: 20px;
    }

    .header-info {
        display: flex;
        align-items: center;
        gap: 17px;
    }

    .header-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(
            135deg,
            #39A900,
            #2e8b00
        );

        color: white;
        font-size: 24px;

        box-shadow: 0 8px 20px rgba(57,169,0,.20);
    }

    .header-info h1 {
        margin: 0;
        color: #18231b;
        font-size: 30px;
        font-weight: 750;
        letter-spacing: -.7px;
    }

    .header-info p {
        margin: 5px 0 0;
        color: #7b847e;
        font-size: 14px;
    }


    /* =========================
       BOTÓN NUEVO
    ========================== */

    .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 9px;

        padding: 13px 20px;

        border-radius: 12px;

        background: #39A900;
        color: white;

        text-decoration: none;

        font-size: 14px;
        font-weight: 650;

        box-shadow: 0 7px 18px rgba(57,169,0,.20);

        transition: .25s ease;
    }

    .btn-new i {
        font-size: 17px;
    }

    .btn-new:hover {
        background: #2e8d00;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 22px rgba(57,169,0,.28);
    }


    /* =========================
       ESTADÍSTICAS
    ========================== */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: white;
        border: 1px solid #edf0ed;

        border-radius: 17px;

        padding: 19px 21px;

        display: flex;
        align-items: center;
        gap: 15px;

        box-shadow: 0 4px 15px rgba(25,45,30,.035);

        transition: .25s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(25,45,30,.07);
    }

    .stat-icon {
        width: 46px;
        height: 46px;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;
    }

    .stat-icon.green {
        background: #eaf7e3;
        color: #39A900;
    }

    .stat-icon.blue {
        background: #eaf3ff;
        color: #3984d9;
    }

    .stat-icon.purple {
        background: #f2edff;
        color: #7855d8;
    }

    .stat-label {
        display: block;
        color: #858d87;
        font-size: 12px;
        margin-bottom: 3px;
    }

    .stat-card strong {
        color: #202a23;
        font-size: 23px;
        font-weight: 750;
    }


    /* =========================
       CARD TABLA
    ========================== */

    .content-card {
        background: white;
        border: 1px solid #edf0ed;
        border-radius: 20px;

        overflow: hidden;

        box-shadow: 0 7px 25px rgba(30,50,35,.045);
    }


    /* =========================
       TOOLBAR
    ========================== */

    .table-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 23px 25px;

        border-bottom: 1px solid #edf0ed;
    }

    .table-toolbar h2 {
        margin: 0;

        color: #202922;

        font-size: 17px;
        font-weight: 720;
    }

    .table-toolbar p {
        margin: 4px 0 0;

        color: #8a928c;

        font-size: 12px;
    }


    /* =========================
       BUSCADOR
    ========================== */

    .search-box {
        position: relative;
        width: 270px;
    }

    .search-box i {
        position: absolute;

        left: 14px;
        top: 50%;

        transform: translateY(-50%);

        color: #9aa29c;

        font-size: 15px;
    }

    .search-box input {
        width: 100%;

        padding: 11px 14px 11px 39px;

        border: 1px solid #e6eae6;

        border-radius: 11px;

        background: #fafbfa;

        outline: none;

        font-size: 13px;

        color: #333;

        transition: .2s;
    }

    .search-box input:focus {
        background: white;

        border-color: #8bcf68;

        box-shadow: 0 0 0 3px rgba(57,169,0,.08);
    }


    /* =========================
       TABLA
    ========================== */

    .table-wrapper {
        overflow-x: auto;
    }

    .modern-table {
        width: 100%;

        border-collapse: collapse;

        min-width: 1000px;
    }

    .modern-table thead {
        background: #fafcf9;
    }

    .modern-table th {
        padding: 14px 20px;

        color: #89918b;

        font-size: 10px;

        font-weight: 750;

        letter-spacing: .7px;

        border-bottom: 1px solid #edf0ed;

        white-space: nowrap;
    }

    .modern-table td {
        padding: 17px 20px;

        border-bottom: 1px solid #f0f2f0;

        color: #59625c;

        font-size: 13px;

        vertical-align: middle;
    }

    .modern-table tbody tr {
        transition: .2s ease;
    }

    .modern-table tbody tr:hover {
        background: #fbfdfb;
    }

    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       ID
    ========================== */

    .id-badge {
        display: inline-flex;

        padding: 6px 9px;

        border-radius: 8px;

        background: #f3f5f3;

        color: #68716b;

        font-size: 11px;

        font-weight: 700;
    }


    /* =========================
       APRENDIZ
    ========================== */

    .apprentice-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 43px;
        height: 43px;

        min-width: 43px;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(
            135deg,
            #e4f6da,
            #cdeebd
        );

        color: #2e7b0a;

        font-size: 12px;

        font-weight: 800;
    }

    .name-container strong {
        display: block;

        color: #252e28;

        font-size: 13px;

        font-weight: 700;
    }

    .name-container span {
        display: block;

        margin-top: 3px;

        color: #929a94;

        font-size: 11px;
    }


    /* =========================
       CONTACTO
    ========================== */

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .contact-info div {
        display: flex;
        align-items: center;
        gap: 7px;

        white-space: nowrap;
    }

    .contact-info i {
        color: #8e9891;
        font-size: 12px;
    }


    /* =========================
       CURSO
    ========================== */

    .course-badge,
    .equipment-badge,
    .no-equipment {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 8px 11px;

        border-radius: 9px;

        font-size: 11px;

        font-weight: 650;

        white-space: nowrap;
    }

    .course-badge {
        background: #f2f5f2;
        color: #59625b;
    }

    .course-badge i {
        color: #79837c;
    }

    .equipment-badge {
        background: #eaf7e3;
        color: #337a13;
    }

    .equipment-badge i {
        color: #39A900;
    }

    .no-equipment {
        background: #f7f7f7;
        color: #9b9f9b;
    }


    /* =========================
       ACCIONES
    ========================== */

    .actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
    }

    .action {
        width: 35px;
        height: 35px;

        border-radius: 9px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        border: 1px solid transparent;

        text-decoration: none;

        font-size: 14px;

        cursor: pointer;

        transition: .2s ease;
    }

    .action.view {
        background: #f1f4f2;
        color: #66706a;
        border-color: #e7ebe7;
    }

    .action.view:hover {
        background: #e5eae6;
        color: #29322c;
        transform: translateY(-2px);
    }

    .action.edit {
        background: #eaf7e3;
        color: #39A900;
        border-color: #d7edcc;
    }

    .action.edit:hover {
        background: #39A900;
        color: white;
        border-color: #39A900;
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(57,169,0,.20);
    }

    .action.delete {
        background: #fff1f1;
        color: #e05252;
        border-color: #f9dddd;
    }

    .action.delete:hover {
        background: #e05252;
        color: white;
        border-color: #e05252;
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(224,82,82,.18);
    }

    .delete-form {
        margin: 0;
    }


    /* =========================
       ESTADO VACÍO
    ========================== */

    .empty-state {
        padding: 70px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 70px;
        height: 70px;

        margin: 0 auto 15px;

        border-radius: 20px;

        background: #eef7e9;

        color: #39A900;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 30px;
    }

    .empty-state h3 {
        margin: 0 0 7px;

        color: #29322c;

        font-size: 17px;
    }

    .empty-state p {
        color: #929993;

        font-size: 13px;

        margin-bottom: 20px;
    }

    .btn-empty {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 10px 16px;

        border-radius: 10px;

        background: #39A900;

        color: white;

        text-decoration: none;

        font-size: 13px;

        font-weight: 650;
    }

    .btn-empty:hover {
        background: #2e8d00;
        color: white;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 900px) {

        .admin-page {
            padding: 25px 18px 40px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            align-items: flex-start;
        }

    }


    @media (max-width: 650px) {

        .page-header {
            flex-direction: column;
        }

        .btn-new {
            width: 100%;
            justify-content: center;
        }

        .table-toolbar {
            flex-direction: column;
            align-items: stretch;
            gap: 17px;
        }

        .search-box {
            width: 100%;
        }

        .header-info h1 {
            font-size: 25px;
        }

    }

</style>

<!-- =========================
     BUSCADOR
========================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchApprentice');

    if (!searchInput) return;

    searchInput.addEventListener('keyup', function () {

        const search = this.value.toLowerCase();

        const rows = document.querySelectorAll(
            '#apprenticesTable tbody .apprentice-row'
        );

        rows.forEach(function (row) {

            const text = row.textContent.toLowerCase();

            if (text.includes(search)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    });

});

</script>

@endsection
