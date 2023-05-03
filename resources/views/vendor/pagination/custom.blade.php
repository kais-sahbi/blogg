@if ($paginator -> hasPages())
    <ul class="pagination">

        @if ($paginator->onFirstPage())

        <li class="page-item disabled"><span class="page-link">stop</span></li>
            
       @else
        <li class="page-item "><a class="page-link" href="{{$paginator->previousPageUrl()}}" rel="prev">Précedent</a></li>
        @endif
        

        @foreach ($elements as $elm)

            {{-- @if (is_string($elm))
            <li class="page-item disabled"><span class="page-link">{{$elm}}</span></li>
                
            @endif 
            code hetha tnjm thotah kif tnjm mtamlchi
            --}}


            @if (is_array($elm)){{-- on a plusieurs page --}}
                @foreach ($elm as $page => $url){{-- elements correspand à une page et on veu acceder à l url --}}
                   {{-- {{var_dump($page)}}  --}}
                    {{-- {{var_dump($url)}}  --}}
                    
                  @if ($page == $paginator->currentPage())
                  
                   <li class="page-item active my-active "><span class="page-link bg-dark ">{{$page}}</span></li>{{-- url c est  le lien et page c est le nbr label --}}
                
                  @else

                   <li class="page-item "><a class="page-link" href="{{$url}}">{{$page}}</a></li>{{-- url c est  le lien et page c est le nbr label --}}
                
                  @endif
               
                    @endforeach
            @endif
        @endforeach
        
        {{-- Methode 1 --}}
        {{--   @if ($paginator->onLastPage())

        <li class="page-item disabled"><span class="page-link">stop</span></li>
            
       @else
        <li class="page-item "><a class="page-link" href="{{$paginator->nextPageUrl()}}" rel="prev">next</a></li>
        @endif --}}
        
        {{-- Methode 2 --}}
        @if ($paginator->hasMorePages())

        <li class="page-item "><a class="page-link" href="{{$paginator->nextPageUrl()}}" rel="next">next </a></li>
            
       @else
        
        <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-right"></i></span></li>
        @endif

    </ul>
    
@endif