@extends('default')

@section('title')
    {{$article->title}}
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

            {{$article->date_publication}}
        </div>
      </div>
    </div>
  </article>
<div class="container">


</div>

@endsection
