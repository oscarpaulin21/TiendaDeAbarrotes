<!DOCTYPE html>
<html>
<head>
    <title>Productos Google</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: auto;
        }
        .card {
            background: white;
            padding: 15px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .card {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
        
    </style>
</head>
<body>
@if(isset($mensaje))
    <div style="background: #28a745; color:white; padding:12px; border-radius:8px;">
        {{ $mensaje }}
    </div>
@endif
<div class="container">
    <h1>Productos desde Google Merchant</h1>

    @if(count($productos) > 0)
        @foreach($productos as $producto)
            <div class="card">
                <img src="{{ $producto['image'] ?? 'https://via.placeholder.com/150' }}" 
                width="150"
                onerror="this.src='https://via.placeholder.com/150'">

                <h3>{{ $producto['title'] ?? 'Sin nombre' }}</h3>
                <p>Precio: {{ $producto['price']['value'] ?? 'N/A' }}</p>
                <p>ID: {{ $producto['id'] ?? '' }}</p>
            </div>
            
        @endforeach
    @else
        <div class="card">
            <h3>No hay productos disponibles</h3>
        </div>
    @endif
</div>

</body>
</html>