@extends('layout.app')

@section('body')

    <div class="row justify-content-center">

        <h2 class="h2">Lista de Produtos</h2>
    
    </div>

    <div class="row justify-content-center">

        @if ( count($pro) >0 )

        <table class="table table-borderless table-hover">

            <thead class="tb">

                <tr>

                    <th scope="col">Codigo</th>

                    <th scope="col">Nome</th>

                    <th scope="col">Estoque</th>

                    <th scope="col">Preço</th>

                    <th scope="col">Categoria</th>

                    <th scope="col">Editar</th>

                    <th scope="col">Apagar</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($pro as $p)

                <tr>

                    <th scope="row">{{ $p['id'] }}</th>

                    <td>{{ $p['nome'] }}</td>

                    <td>{{ $p['estoque'] }}</td>

                    <td>{{ $p['preco'] }}</td>

                    <td>{{ $p['categoria_id'] }}</td>

                    <td>

                        <a href="{{-- route('produtos.edit', $pro['id'] ) --}}" class="btn">Editar</a>

                    </td>

                    <td>

                        <form action="{{-- route('produtos.destroy', $pro['id'] ) --}}" method="POST">
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

        <h1>Não há produtos</h1>
            
        @endif
    
    </div>
    
    <div class="row justify-content-center">

        <a href="{{ route('produtos.create') }}" class="btn">Nova produto</a>

    </div>
    
@endsection