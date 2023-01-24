@extends('Layouts.app')

@section('main')

<div class="container mt-3">
  <h2> New Posts </h2>
  
  <div class="row">
    <div class="col-sm-4">
        <form method="POST" action="/category-store">
        @csrf
        <label>Title</label>
        <input type="text" name="title" class="form-control">
        @if($errors->has('title'))
            <p class="text-danger">{{$errors->first('title')}}</p>
          @endif
        

        <br>

        <label> Author</label>
        <input type="text" name="author" class="form-control">
          @if($errors->has('author'))
            <p class="text-danger">{{$errors->first('author')}}</p>
          @endif
        <label> Contents</label>
        <textarea type="textarea" name="contents" class="form-control " rows="7"></textarea>

          <button class="btn btn-info mt-4" type="submit"> create</button>  
    </form>
        

    </div>

  </div>



</div>

@endsection