<nav class="navbar navbar-expand-sm sticky-top">

    <a class="navbar-brand" href="/">Followize</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav">

            <li class="nav-item {{request()->Is('produtos') ? 'active':''}}">

                <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>

            </li>

            <li class="nav-item {{request()->Is('categorias') ? 'active':''}}">

                <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>

            </li>

        </ul>

    </div>

</nav>