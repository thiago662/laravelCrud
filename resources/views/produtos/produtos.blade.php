@extends('layout.app')

@section('body')

    <div class="row justify-content-center">

        <h2 class="h2">Lista de Produtos</h2>
    
    </div>
    
    <div class="row justify-content-center">

        <button class="btn" role="button" data-toggle="modal" data-target="#dlgProdutos" onclick="novoProduto()">Nova produto</button>

    </div>

    <div class="row justify-content-center">

        <table class="table table-borderless table-hover" id="tbProdutos">

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

            </tbody>

        </table>
    
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <form class="form-horizontal" id="formProduto">

                    <div class="modal-header">

                        <h5 class="modal-title">Novo Produto</h5>

                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">

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
            
                                </select>

                            </div>
        
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn">Salvar</button>

                        <button type="cancel" class="btn" data-dismiss="modal">Cancelar</button>

                    </div>
                
                </form>

            </div>

        </div>

    </div>
    
@endsection

@section('javascript')

    <script type="text/javascript">

        //token para o funcionamento do formulario
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        //atualizar
        function atualizar() {

            $('#tbProdutos>tbody>tr').remove();
            carregarProdutos();

        }

        //zerar
        function novoProduto(){
            $("#id").val('');
            $("#produtoNome").val('');
            $("#produtoEstoque").val('');
            $("#produtoPreco").val('');
            $("#produtoCategoria").val('');
        }

        //carrega as categorias no select
        function carregarCategorias() {

            $.getJSON('/api/categorias', function(data){

                console.log(data);

                for( i = 0 ; i<data.length ; i++ ){

                    opcao = '<option value = "' + data[i].id + '">' + data[i].nome + '</option>';
                    $('#produtoCategoria').append(opcao);

                }

            });

        }

        //atualiza tabela
        function montarLinha(p){

            var linha = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.preco + "</td>" +
                "<td>" + p.categoria_id + "</td>" +
                "<td>" + '<button class="btn" role="button" data-toggle="modal" data-target="#dlgProdutos" onclick="editar(' + p.id + ')">Editar</button>' + "</td>" +
                "<td>" + "<button class=\"btn\" onclick=\"remover(" + p.id + ")\">Apagar</button>" + "</td>" +
                "</tr>";

            return linha;
        }
        
        //criar
        function carregarProdutos() {

            $.getJSON('/api/produtos', function(produtos){

                console.log(produtos);

                for( i = 0 ; i < produtos.length ; i++ ){

                    linha = montarLinha(produtos[i]);

                    $('#tbProdutos>tbody').append(linha);

                }

            });

        }

        //deletar
        function remover(id){
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function(){
                    console.log('Apagou OK');
                },
                error: function(error){
                    console.log(error);
                }
            });

            atualizar();
        }

        //editar
        function editar(id){

            $.getJSON('/api/produtos/' + id , function(produtos){

                console.log(produtos);

                $("#id").val(produtos.id);
                $("#produtoNome").val(produtos.nome);
                $("#produtoEstoque").val(produtos.estoque);
                $("#produtoPreco").val(produtos.preco);
                $("#produtoCategoria").val(produtos.categoria_id);

            });

        }

        //salvar
        function salvarProduto(){

            pro = {
                id: $("#id").val(),
                nome: $("#produtoNome").val(),
                estoque: $("#produtoEstoque").val(),
                preco: $("#produtoPreco").val(),
                categoria_id: $("#produtoCategoria").val()
            };

            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + pro.id,
                context: this,
                data: pro,
                success: function(){
                    console.log('Salvou OK');
                },
                error: function(error){
                    console.log(error);
                }
            });

        }

        //cria objeto produto para auxiliar na inserção no banco de dados
        function criarProduto(){
            pro = { 
                nome: $("#produtoNome").val(),
                estoque: $("#produtoEstoque").val(),
                preco: $("#produtoPreco").val(),
                categoria_id: $("#produtoCategoria").val()
            };

            console.log(pro);

            $.post("/api/produtos", pro, function(data){
                console.log(data);
            });

        }

        $("#formProduto").submit( function(event){

            event.preventDefault();

            if( $('#id').val() != '' ){

                salvarProduto();
                atualizar();

            }else{

                criarProduto();
                atualizar();

            }

            $('#close').click();

            //$("#dlgProdutos").modal('hide');

        } );
        
        //metodo que carega as funções ao iniciar a pagina
        $(function(){

            carregarCategorias();
            carregarProdutos();

        })
        
    </script>
    
@endsection