@extends('theme.base')

@section('content')
<div class= 'container'>
    <h1>Listado de pedidos</h1>
    <a href="{{ route('order.create') }}" class="btn btn-primary"> Crear pedidos</a>  

    @if (Session::has('mensaje'))
        <div class="alert alert-info my-5">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Ref</th>
            <th>Observ</th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order-> date }}</td>
                    <td>{{ $order->ref }}</td>
                    <td>{{ $order->obser }}</td>          
                    <td>
                        <a href="{{ route('order.edit', $order) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('order.destroy', $order) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Estás seguro de eliminar este pedido?')">Eliminar</button>
                        </form>
                    </td>          
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($orders->count())
        {{ $orders->links() }}
    @endif

</div>
@endsection