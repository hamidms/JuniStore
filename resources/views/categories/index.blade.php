@extends('layouts.global')

@section('title') Category list @endsection

@section('content')

    <div class="col-md-6">
      <form action="{{route('categories.index')}}">

        <div class="input-group">
            <input 
              type="text" 
              class="form-control" 
              placeholder="Filter by category name"
              name="name">
            <div class="input-group-append">
              <input 
                type="submit" 
                value="Filter" 
                class="btn btn-primary">
            </div>
        </div>

      </form>
    </div>

    <a href="{{route('categories.edit', [$category->id])}}" class="btn btn-info btn-sm"> Edit </a>

    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
        <thead>
            <tr>
            <th><b>Name</b></th>
            <th><b>Slug</b></th>
            <th><b>Image</b></th>
            <th><b>Actions</b></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                @if($category->image)
                    <img 
                     src="{{asset('storage/app/public/' . $category->image)}}" 
                     width="128px"/>
                @else 
                    No image
                @endif
                </td>
                <td>
                [TODO: actions]
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colSpan="4">
              {{$categories->appends(Request::all())->links()}}
            </td>
          </tr>
        </tfoot>
        </table>
    </div>

@endsection