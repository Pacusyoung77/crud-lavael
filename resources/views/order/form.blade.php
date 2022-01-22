@extends('theme.base')

@section('content')
    <div class= 'container py-5 text-center'>

        @if (isset($order))
            <h1>Editar pedidos</h1>
        @else
            <h1>Crear pedidos</h1>
        @endif


        @if (isset($order))
            <form action="{{ route('order.update', $order) }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('order.store') }}" method="post">
        @endif

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"> Nombre</label>
                <input type="text" name ="name" class="form-control" placeholder="Nombre del cliente" value="{{ old('name') ?? @$order->name }}">
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label"> Fecha</label>
                <input type="date" name ="date" class="form-control" placeholder="fecha" value="{{ old('date') ?? @$order->date }}">
                @error('date')
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="ref" class="form-label"> Referencia</label>
                <input type="text" name ="ref" class="form-control" placeholder="Referencia" value="{{ old('ref') ?? @$order->ref}}">
                @error('ref')
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="obser" class="form-label">Observaciones</label>
                <textarea name ="obser" cols="30" rows="4" class="form-control" placeholder="Observaciones"> {{ old('obser') ?? @$order->obser}}</textarea>
                @error('obser')
                    
                @enderror
            </div>

            @if (isset($order))
                <button type="submit" class="btn btn-primary">Editar pedido</button>
            @else
                <button type="submit" class="btn btn-primary">Guardar pedido</button>
            @endif
            
        </form>
        
    </div>
@endsection