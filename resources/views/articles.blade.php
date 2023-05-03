
<title>Liste des articles</title>



@extends('base')

@section('content')

<div class="jumbotron">
    <h1 class="display-3 text-center">Articles</h1>

{{--    code hazinh lil filters.blade.php--}}

    @livewire('filters',['catego' => $catego])  <!--composant inclus dans articles-->
<!--                        catego ici par ce qu'il est fixe ds la base-->

            {{-- pour la pagination --}}
{{--                <div class="d-flex justify-content-center mt-5">--}}
{{--                        {{$articl -> links('vendor.pagination.custom')}}--}}
{{--                </div>--}}
    </div>

</div>
@endsection
