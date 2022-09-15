@extends('layouts.app')
@section('content')
<form method="post" action="/posts/{{$post->id}}" enctype="multipart/form-data">
  <!-- title input -->
  @method('put')
  @csrf
  <div class="form-outline mb-4">
    <input type="text" id="form4Example1" class="form-control"  name="title" value="{{$post->title}}"/>
    <label class="form-label" for="form4Example1">title</label>
  </div>
  @error('title')
  <span >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


  <!-- post input -->
  <div class="form-outline mb">
    <textarea class="form-control" id="form4Example3" style="min-height: 200px;" name="content" >{{$post->content}}</textarea>
    <label class="form-label" for="form4Example3">post</label>
  </div>

  @error('content')
  <span >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

  <!-- highlight input -->
  <div class="form-outline mb">
    <textarea class="form-control" id="form4Example3" style="min-height: 100px;" name="highlight">{{$post->highlight}}</textarea>
    <label class="form-label" for="form4Example3">highlight</label>
  </div>
  @error('highlight')
  <span >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

  <!---photo------>
  <div class="form-outline mb">
    <img src="{{asset($post->photo)}}" class="small-img"/>
    <input  type="file" class="form-control" name="photo">
    <label class="form-label" for="form4Example3">photo</label>
  </div>
  @error('photo')
                                    <span >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
</form>
@endsection
