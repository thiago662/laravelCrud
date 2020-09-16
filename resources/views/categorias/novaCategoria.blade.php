@extends('layout.app')

@section('body')

    <div class="card">

        <div class="card-header">

            Criar nova Categoria

        </div>

        <div class="card-body">

            <form action="{{ route('categorias.store') }}" method="POST">

                @csrf
            
                <div class="form-group">

                    <label for="lblNome">Nome da Categoria</label>

                    <input type="text" class="form-control" name="nomeCategoria" id="lblNome" placeholder="Nome...">

                </div>

                <button type="submit" class="btn">Salvar</button>
    
                <button type="cancel" class="btn">Cancelar</button>
            
            </form>

        </div>

    </div>

@endsection