@extends('templates/templateGeneral')
@section('tittle')
    {{ $tittle }}
@endsection
@section('header')
    {{ $header }}
@endsection
@section('content')
    <div class="row">
        <div class="col-9 mx-auto">
            <div class="row">
                <div class="col">
                    @if ($_SESSION['user'] === 'invitado')
                        <a class="btn btn-success disabled" href="create.php">
                            <span class=""><i class="bi bi-plus"></i></span>
                            <span class="">Crear</span>
                        </a>
                    @else
                        <a class="btn btn-success" href="create.php">
                            <span class=""><i class="bi bi-plus"></i></span>
                            <span class="">Crear</span>
                        </a>
                        @if ($delete === 'ok')
                            <span class="text-danger ms-5">Elemento Borrado correctamente</span>
                        @endif
                    @endif
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <form name="formListProducts" method="post" action="{{ $_SERVER['PHP_SELF'] }}" target="_self">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr class="text-center">
                                    <th>Detalle</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listProducts as $product)
                                    <tr class="text-center">
                                        <td>
                                            <button type="submit" class="btn btn-info text-white" name="detail"
                                                value="{{ $product['id'] }}">Detalle</button>
                                        </td>
                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product['nombre'] }}</td>
                                        <td>
                                            @if ($_SESSION['user'] === 'invitado')
                                                <button type="submit" class="btn btn-warning disabled" name="update"
                                                    value="{{ $product['id'] }}">Actualizar</button>
                                            @else
                                                <button type="submit" class="btn btn-warning me-2" name="update"
                                                    value="{{ $product['id'] }}">Actualizar</button>
                                                <button type="submit" class="btn btn-danger" name="delete"
                                                    value="{{ $product['id'] }}">Borrar</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
