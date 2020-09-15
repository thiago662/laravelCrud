@extends('layout.app')

@section('body')

    <div class="row">

        @if ( count($cat) >0 )

        <table class="table table-hover">

            <thead>

                <tr>

                    <th scope="col">#</th>

                    <th scope="col">Nome</th>

                    <th scope="col">Acões</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($cat as $c)

                <tr>

                    <th scope="row">{{ $c->id }}</th>

                    <td>{{ $c->nome }}</td>

                    <td>

                        <a href="{{-- route('categorias.edit') --}}" class="btn">Editar</a>

                        <a href="{{-- route('categorias.destroy') --}}" class="btn">Apagar</a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>
            
        @else

        <h1>Não há categorias</h1>
            
        @endif

        <a href="{{ route('categorias.create') }}" class="btn">Nova categoria</a>

    </div>
    
@endsection