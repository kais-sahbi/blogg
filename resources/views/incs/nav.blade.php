<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{route('home')}}">  <i class="fas fa-home" ></i> Acceuil </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="navbar-brand" href="{{route ('articles')}}">Articles</a>  {{-- articles esm route (->name('articles');) --}}
        </li>
      </ul>
      <ul class="navbar-nav ml-auto"> {{-- ml la buton à droite --}}

          @if (Auth::user())
              <h4 class="navbar-brand">{{Auth::user()->name}}</h4>
          @if (Auth::user()->role ==='ADMIN'){{-- on verifie que le role est bien admin : meme valeur et meme type--}}
            <li class="nav-item ">

              <a class="nav-link" href="{{route ('article.index')}}">Espace Admin</a>

            </li>


          @endif
            <li class="nav-item ">
              {{-- <a class="nav-link" href="/logout">Déconnexion</a> non supporter par get --}}
              {{-- <form method="POST" action="/logout"> --}}
                <form method="POST" action="{{route ('logout')}}">
                @csrf  {{-- directive pour créer les champs cache protection du formulaire --}}
                    <button type="submit" class="btn btn-dark"> Déconnexion
                    </button>

              </form>

            </li>
          @else
          <li class="nav-item ">
            {{-- <a class="nav-link" href="/login">Se connecter</a> login et logout nomme au niveau de Auth::routes --}}
            <a class="nav-link" href="{{route ('login')}}">Se connecter</a>
          </li>
          @endif

      </ul>


    </div>
</div>
  </nav>
