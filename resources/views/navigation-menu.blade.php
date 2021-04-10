<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Sistema de upload</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout') }}">
            @csrf
            <li class="form-inline my-2 my-lg-0 ">
                <a class="nav-link disabled" href="#">Bem vindo {{ Auth::user()->name }}</a>
            </li>
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                Sair
            </a>
        </form>
    </div>
</nav>
