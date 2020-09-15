<nav class="navbar navbar-expand-sm sticky-top">

    <a class="navbar-brand" href="/">Followize</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        
        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav">

            <li class="nav-item {{request()->Is('produtos') ? 'active':''}}">

                <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>

            </li>

            <li class="nav-item {{request()->Is('categorias') ? 'active':''}}">

                <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>

            </li>

        </ul>

    </div>

</nav>