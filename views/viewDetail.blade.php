@extends('templates/templateGeneral')
@section('tittle')
    {{ $tittle }}
@endsection
@section('header')
    {{ $header }}
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card bg-primary text-white">
                <div class="card-header text-center">
                    {{ $name }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            Código: {{ $id }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Nombre: {{ $name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Nombre Corto: {{ $shortName }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Código Familia: {{ $family }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            PVP (€): {{ $pvp }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Descripción: {{ $description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <a class="btn btn-success" href="listing.php">Volver</a>
        </div>
    </div>
@endsection
