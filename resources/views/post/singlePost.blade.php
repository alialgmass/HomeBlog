@extends('layouts.app')
@section('content')
<div class="container-fluid ">
		<div class="row fh5co-post-entry single-entry">
			@isset($post)
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 singlePost">
				<figure class="animate-box ">
					<img src="{{asset($post->photo)}}" alt="Image" class="img-responsive image_single_post">
				</figure>
<span>{{$post->user->name}}</span>
				<h2 class="fh5co-article-title animate-box">{{$post->title}}</h2>
				<span class="fh5co-meta fh5co-date animate-box">{{$post->created_at}}</span>

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-8 cp-r animate-box">
					<p>	{{$post->content}}</p>
						</div>
						<div class="col-lg-4 animate-box">
							<div class="fh5co-highlight right">
								<h4>Highlight</h4>
								<p>{{$post->highlight}}</p>
							</div>
						</div>
@if($canupdate)
                        <form method="post" action="/posts/{{$post->id}}" >
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-primary btn-block mb-4">delete</button>
</form>
<a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block width">update</a>

@endif
</article>
@endisset
</div>
					</div>
@endsection
