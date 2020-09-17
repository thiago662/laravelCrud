@extends('layout.app')

@section('body')

    <div class="row justify-content-center">

        <h2 class="h2">Lista de Produtos</h2>
    
    </div>

    <div class="row justify-content-center">

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

                <tr>



                </tr>

            </tbody>

        </table>
    
    </div>
    
    <div class="row justify-content-center">

        <button class="btn" role="button" data-toggle="modal" data-target="#dlgProdutos">Nova produto</button>

    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <form class="form-horizontal" id="formProduto">

                    <div class="modal-header">

                        <h5 class="modal-title">Novo Produto</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">

                        <div class="form-group">
    
                            <label for="produtoNome" class="control-label">Nome</label>

                            <div class="input-group">
        
                                <input type="text" class="form-control" id="produtoNome" placeholder="Nome...">

                            </div>
        
                        </div>
                    
                        <div class="form-group">
        
                            <label for="produtoPreco" class="control-label">Preço</label>
        
                            <div class="input-group" class="control-label">
        
                                <input type="text" class="form-control" id="produtoPreco" placeholder="R$...">

                            </div>
        
                        </div>
                    
                        <div class="form-group">
        
                            <label for="produtoEstoque" class="control-label">Estoque</label>
        
                            <div class="input-group">
        
                                <input type="number" class="form-control" id="produtoEstoque" placeholder="Estoque do produto...">

                            </div>
        
                        </div>
                    
                        <div class="form-group">
        
                            <label for="produtoCategoria" class="control-label">Categoria</label>

                            <div class="input-group">
        
                                <select id="produtoCategoria" class="form-control">
            
                                        <option value=""></option>
            
                                </select>

                            </div>
        
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn">Salvar</button>

                        <button type="cancel" class="btn" data-dissmiss="modal">Cancelar</button>

                    </div>
                
                </form>

            </div>

        </div>

    </div>
    
@endsection