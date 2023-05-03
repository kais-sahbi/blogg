
<title>Article {{$articll->id}}</title>
@extends('base')

@section('content')
    <div class="jumbotron">
        {{-- @dump($articll->category) category c est la fonction declarer dans article --}}
        <h2 class="display-5 text-center">{{ $articll->title }}</h2>

        <div class="d-flex justify-content-center my-5">
            
                @if (Auth::user())
                    @if (Auth::user()->role ==='ADMIN')
                        <a href="{{route ('article.index')}}" class="btn btn-dark" >
                            <i class="fas fa-arrow-left"></i>
                            Retour </a>
    
                    @endif
                    @if((Auth::user()->role !=='ADMIN')  )

                        <a href="{{route ('articles')}}" class="btn btn-dark" >
                            <i class="fas fa-arrow-left"></i>
                            Retour </a>
                
                    @endif
                @else
                <a href="{{route ('articles')}}" class="btn btn-dark" >
                    <i class="fas fa-arrow-left"></i>
                    Retour </a>
            @endif  
    
                
        </div>
        <h5 class="text-center my-3 ">{{ $articll->subtitle }} </h5>
        <div class="d-flex justify-content-center" >
        <span class="badge bg-dark">{{ $articll->category->label }} </span>
        </div>
    </div>
    <div class="container">
        <p class="text-center">{!! $articll->content !!}</p>{{-- deux point d exclamtion pour ne pas storer en tanque html code dans la colone content --}}
    </div>
@endsection