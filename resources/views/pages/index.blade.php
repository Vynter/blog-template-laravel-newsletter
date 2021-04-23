@extends('default')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach ($articles as $article)


        <div class="post-preview">
          <a href="#">
            <h2 class="post-title">
              {{ $article->id }}-
                {{$article->title}}
            </h2>
            <h3 class="post-subtitle">
              {{$article->sub_title}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$article->user->name}}</a>
            on {{$article->date_publication}}</p>
        </div>
        <hr>
        @endforeach


        <div>

        <div class="text-center">
            {{$articles->links()}}
        </div>
        <!--<div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div> -->
      </div>
    </div>
  </div>

@endsection
