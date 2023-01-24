@extends('Layouts.app')

@section('main')

<div class="container mt-3">
  <h2> Edit Posts </h2>
  
  <div class="row">
    <div class="col-sm-4">
        <form method="POST" action="/category-update/{{ $category->id }}">
        @csrf
        @method('put')
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{$category->title}}">
        <br>
        <label> Author</label>
        <input type="text" name="author" class="form-control" value="{{$category->author}}"> 

        <label> Contents</label>
        <textarea name="contents" class="form-control" rows="7">{{$category->contents}}</textarea>

     
        
        
        <button class="btn btn-info mt-4" type="submit"> Update</button>  
    </form>

   

    </div>

  </div>



</div>

@endsection