<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="row">
        <div class="col-10">
{{--        @dump($activeFilters)--}}
            {{--@dump(array_keys($activeFilters))--}}
            {{--@dump($search)--}}
                <div class = "articles row justify-content-center">
<!--                    <div>
                        <input wire:model="search" type="text"  placeholder="Search..."/>

                    </div>-->
                @foreach ($articl as $articlee)

                    <div class ="col-md-6">
                        <div class = "card my-3">
                            <div class="card-body">
                                <h5 class="card-title">{{$articlee->title}}</h5>
                                <span class="badge bg-info">{{ $articlee->category->label }} </span>
                                <p class="card-text">{{$articlee->subtitle}}</p>
                                <a href="{{route('article', $articlee->slog)}}" class="btn btn-dark" >Lire la suite... </a>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-2 pt-3"> <!--pt : padding top-->
            <i class="fa-solid fa-filter"> Filtrage </i>
            @foreach($catego as $ct)
                <div class="form-group">

                    <div class="custom-control custom-checkbox">
<!--                        on va lier les info de chechbox au tableau $activeFilters (avec le directive wire:model)-->
                        <input type="checkbox" class="custom-control-input" id="{{$ct->id}}" wire:model="activeFilters.{{$ct->id}}"/>
{{--                                                                                            activfilter prend l id de checbox--}}
                        <label class="custom-control-label" for="{{$ct->id}}">
                            <i class="fas fa-{{$ct->icon}}" ></i>

                            {{$ct->label}}

                        </label>
                    </div>

                </div>

            @endforeach
        </div>
    </div>
</div>
