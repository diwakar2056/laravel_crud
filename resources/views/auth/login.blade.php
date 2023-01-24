@extends('Layouts.app')
@section('main')


<div class="container">
  <h2>Login page </h2>
  @if(session()->has('success'))
  <div class="alert alert-info" role="alert">
    <strong>{{session()->get('success')}}</strong>
  </div>
  @endif
  <form action="{{url('login')}}" method="post">
    

  {{method_field('post')}}
    @csrf

    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    
  </form> 

  <span>New User ? <a href="/user-register">Click here to register !!</a></span>
  
</div>

@endsection