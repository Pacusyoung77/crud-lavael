@extends('theme.base')

@section('content')
<div class= 'container'>
    <h1>Prueba</h1>
    <a href="{{ route('order.index') }}" class="btn btn-primary"> Pedidos</a>  
</div>
@endsection