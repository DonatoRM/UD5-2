@extends('templates/templateGeneral')
@section('tittle')
    {{ $tittle }}
@endsection
@section('header')
    {{ $header }}
@endsection
@section('content')
    <form name="formCreateProduct" method="post" action="{{ $_SERVER['PHP_SELF'] }}" target="_self">
        <div class="row d-flex justify-content-center">
            <div class="col-9">
                <div class="row">
                    <div class="col">
                        <label class="input-text mb-2" id="name" for="name">Nombre</label>
                        @if (isset($registerProduct))
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                value="{{ $registerProduct['nombre'] }}" required>
                        @else
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                required>
                        @endif
                    </div>
                    <div class="col">
                        <label class="input-text mb-2" id="shortName" for="shortName">Nombre Corto</label>
                        @if (isset($registerProduct))
                            <input type="text" class="form-control" name="shortName" id="shortName"
                                placeholder="Nombre Corto" value="{{ $registerProduct['nombre_corto'] }}" required>
                        @else
                            <input type="text" class="form-control" name="shortName" id="shortName"
                                placeholder="Nombre Corto" required>
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label class="input-text mb-2" id="pvp" for="pvp">Precio (€)</label>
                        @if (isset($registerProduct))
                            <input type="number" class="form-control" name="pvp" id="pvp"
                                placeholder="Precio (€)" min="0" step="0.01" value="{{ $registerProduct['pvp'] }}"
                                required>
                        @else
                            <input type="number" class="form-control" name="pvp" id="pvp"
                                placeholder="Precio (€)" min="0" step="0.01" required>
                        @endif
                    </div>
                    <div class="col">
                        <label class="input-text mb-2" id="family" for="family">Familia</label>
                        <select class="form-select" name="family" id="family">
                            @foreach ($tableFamilies as $family)
                                @if (isset($registerProduct))
                                    @if ($registerProduct['familia'] === $family['cod'])
                                        <option value="{{ $family['cod'] }}" selected>{{ $family['nombre'] }}</option>
                                    @else
                                        <option value="{{ $family['cod'] }}">{{ $family['nombre'] }}</option>
                                    @endif
                                @else
                                    <option value="{{ $family['cod'] }}">{{ $family['nombre'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-9">
                        <label class="input-text mb-2" for="description">Descripción</label>
                        @if (isset($registerProduct))
                            <textarea class="form-control" name="description" id="description" rows="10">{{ $registerProduct['descripcion'] }}</textarea>
                        @else
                            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        @if (isset($registerProduct))
                            <button type="submit" name="update" value="{{ $registerProduct['id'] }}"
                                class="btn btn-primary">Modificar</button>
                        @else
                            <button type="submit" name="create" class="btn btn-primary">Crear</button>
                        @endif
                        <button type="reset" name="reset" class="btn btn-success mx-2">Limpiar</button>
                        <a class="btn btn-secondary" href="listing.php">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-9 mx-auto">
            @if ($result === 'ok')
                @if (isset($resgisterProduct))
                    <span class="text-success">Producto actualizado correctamente</span>
                @else
                    <span class="text-success">Producto insertado correctamente</span>
                @endif
            @elseif ($result === 'noOk')
                @if (isset($registerProdcut))
                    <span class="text-danger">Fallo en la actualización del producto</span>
                @else
                    <span class="text-danger">Fallo en la actualización del producto</span>
                @endif
            @endif
        </div>
    </div>
@endsection
