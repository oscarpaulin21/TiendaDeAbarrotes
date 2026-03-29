<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta Producto</title>
</head>
<body>
    
    @extends('layouts.app')
    @section('content')
    @include('partials.alerts')
    <h1>Agregar Nuevo Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre" name="nombre" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen"></i></span>
            <input type="text" class="form-control" placeholder="Descripción del producto" id="descripcion" name="descripcion" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="number" step="0.01" class="form-control" placeholder="Precio del producto" id="precio" name="precio" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-boxes-stacked"></i></span>
            <input type="number" class="form-control" placeholder="Stock del producto" id="stock" name="stock" required>
        </div>
        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <!-- Botón para cancelar y volver a la lista de productos -->
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('productos.index') }}" class="btn btn-danger">
                <i class="fa-solid fa-ban"></i> Cancelar
            </a>
    </form>
    @endsection

</body>
</html>