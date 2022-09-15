@extends('layouts.app')

@section('content')
@include('alert.err')
@include('alert.suc')
<div class="container-fluid">
	
<a href="/posts/create" class="btn  btn-block  input-group input-group-lg border">add post</a>
@isset($posts)
<div class="row fh5co-post-entry">
	@foreach($posts as $post)
		
			<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
				<figure>
					<a href="/posts/{{$post->id}}"><img src="{{asset($post->photo)}}" alt="Image" class="img-responsive">
                </a>
				</figure>
				<span>{{$post->user->name}}</span>
				<h2 class="fh5co-article-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
				<span class="fh5co-meta fh5co-date">{{$post->created_at}}</span>
			
			</article>
		@endforeach
		@endisset
		
		</div>
	</div>


@endsection
