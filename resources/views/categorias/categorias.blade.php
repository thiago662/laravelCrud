@extends('layout.app')

@section('body')

    <div class="row justify-content-center">

        <h2 class="h2">Lista de Categorias</h2>
    
    </div>

    <div class="row justify-content-center">

        @if ( count($cat) >0 )

        <table class="table table-borderless table-hover">

            <thead class="tb">

                <tr>

                    <th scope="col">Codigo</th>

                    <th scope="col">Nome</th>

                    <th scope="col">Editar</th>

                    <th scope="col">Apagar</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($cat as $c)

                <tr>

                    <th scope="row">{{ $c['id'] }}</th>

                    <td>{{ $c['nome'] }}</td>

                    <td>

                        <a href="{{ route('categorias.edit', $c['id'] ) }}" class="btn">Editar</a>

                    </td>

                    <td>

                        <form action="{{ route('categorias.destroy', $c['id'] ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">Apagar</button>
                        </form>
                        
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>
            
        @else

        <h1>Não há categorias</h1>
            
        @endif
    
    </div>
    
    <div class="row justify-content-center">

        <a href="{{ route('categorias.create') }}" class="btn">Nova categoria</a>

    </div>
    
@endsection