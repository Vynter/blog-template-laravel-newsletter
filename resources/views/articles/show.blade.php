@extends('default')

@section('title')
    {{$article->title}}
@endsection
<!--si l'image existe on l'affiche sinon celle de base-->
@section('bg-image')
    @if ($article->image)
    /storage/{{$article->image}}
        @else
        /img/home-bg.jpg
    @endif

@endsection

@section('sub_title')
    {{$article->sub_title}}
@endsection

@section('content')
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>{{$article->body}}</p>
            <!--<img src="/storage/{/{//$article->image//}}" alt="">-->
            {{$article->date_publication}}
        </div>
      </div>
    </div>
  </article>
<div class="container">


</div>

@endsection
