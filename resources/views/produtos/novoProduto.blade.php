@extends('layout.app')

@section('body')

    <div class="card">

        <div class="card-header">

            Criar nova Produto

        </div>

        <div class="card-body">

            <form class="form-row" action="{{ route('produtos.store') }}" method="POST">

                @csrf
            
                <div class="form-group col-md-12">

                    <label for="lblNome">Nome</label>

                    <input type="text" class="form-control" name="produtoNome" id="lblNome" placeholder="Nome...">

                </div>
            
                <div class="form-group col-md-4">

                    <label for="lblEstoque">Estoque</label>

                    <input type="text" class="form-control" name="produtoEstoque" id="lblEstoque" placeholder="1...">

                </div>
            
                <div class="form-group col-md-4">

                    <label for="lblPreco">Preço</label>

                    <input type="text" class="form-control" name="produtoPreco" id="lblPreco" placeholder="R$...">

                </div>
            
                <div class="form-group col-md-4">

                    <label for="lblCategoria">Categoria</label>

                    <select name="produtoCategoria" id="lblCategoria" class="form-control">

                        @foreach ($cat as $c)

                            <option value="{{$c['id']}}">{{ $c['nome'] }}</option>
                            
                        @endforeach

                    </select>

                </div>

                <div class="form-group col">

                <button type="submit" class="btn">Salvar</button>
    
                <button type="cancel" class="btn">Cancelar</button>

                </div>
            
            </form>

        </div>

    </div>

@endsection