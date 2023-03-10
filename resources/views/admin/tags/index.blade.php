@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header')
    @can('admin.tags.creat')
        <a class="btn btn-secondary float-right" href="{{route('admin.tags.create')}}"> Agregar etiqueta</a>
    @endcan

    <h1>Mostrar listado de etiquetas</h1>
@stop

@section('content')
    <div class="container mx-auto">

        @if (session('info')) {{-- esta variable viene de el controlador tagcontroller metodo destroy, se manda  con    return redirect()->route('admin.categories.edit', $category)->with('info', 'actualizado con exito'); --}}
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
            
        @endif

       {{--  <x-alert /> --}}
       <div class="card">
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th> 
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px" > 
                                @can('admin.tags.edit')
                                    <a class= "btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag->id)}}">editar</a></td>
                                @endcan
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"> Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
     </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop