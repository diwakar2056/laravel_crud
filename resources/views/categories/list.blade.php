<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
?>

@extends('Layouts.app')

@section('main')

<div class="container mt-3">
  <h2>List of Posts :  <a  class="btn btn-info" href="/category-create">New Post </a> <a style="float: right;" class="btn btn-danger" href="/signout">Log Out  </a>

  </h2>

  @if(session()->has('success'))
    <div class="alert alert-info" role="alert">
      <strong>{{session()->get('success')}}</strong>
    </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>SN</th>
        <th>Articles </th>
        <th>Author </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$category->title}}</td>
              <td>{{$category->author}}</td>
              <td>
                  <a href="/category-view/{{ $category->id  }}" class="btn btn-sm btn-success">View</a>
                  <a href="/category-edit/{{ $category->id  }}" class="btn btn-sm btn-info">Edit</a>
                  <a href="/category-delete/{{ $category->id  }}" class="btn btn-sm btn-danger">Delete</a>
 
                </td>

            </tr>
      @endforeach
     
    </tbody>
  </table>

  
</div>
@endsection