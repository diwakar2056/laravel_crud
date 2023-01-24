@extends('Layouts.app')
@section('main')

<div class="container mt-3">


  <h2> {{$categories->title}}  </h2>
  
  <hr>
  <div class="row">
    <div class="col-sm-4">
        <p>
            {{$categories->contents}}
        </p>
        

    </div>

  </div>




</div>

@endsection