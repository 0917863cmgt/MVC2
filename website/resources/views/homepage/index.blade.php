@extends('components.layout')
@section('content')
    <body id="homepage">
        <div class="container-fluid px-5">
            <div class="row gx-2">
               <div class="col-12">
                   <h1>Recipes</h1>

                   <div class="row">
                       @foreach($recipes as $recipe)
                           <x-recipe-card :recipe="$recipe"></x-recipe-card>
                       @endforeach
                   </div>
               </div>
            </div>
        </div>
    </body>
@endsection
