@extends('layout.app')

@section('body')

    <div class="row justify-content-center">

        <div class="card-deck">

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title">Cadastro de produtos</h5>

                    <p class="card-text">
                        Aqui você cadastra todos os seus produtos.
                        Só não se esqueça de cadastrar previamente as categorias.
                    </p>

                    <a href="{{ route('produtos.create') }}" class="btn">Cadastre seus produtos</a>

                </div>

            </div>

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title">Cadastro de categorias</h5>

                    <p class="card-text">
                        Cadastre aqui suas categorias
                    </p>

                    <a href="{{ route('categorias.create') }}" class="btn">Cadastre suas categorias</a>

                </div>

            </div>

        </div>

    </div>

@endsection