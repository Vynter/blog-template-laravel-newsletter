
@extends('default')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Créer votre article</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('articles.store')}}" method="POST" >
            @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" name="title" placeholder="Veuillez saisir le titre.." required value="{{old('title')}}">
            </div>
          </div>
          <!--<input type="hidden" name="user_id" value="1">-->

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Sous title</label>
              <textarea rows="2"  class="form-control" name="sub_title" placeholder="Veuillez saisir le sous titre.." required >{{old('sub_title')}}</textarea>

            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Date</label>
              <input type="date" class="form-control" name="published_at" required value="{{old('published_at')}}">

            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Texte</label>
              <textarea rows="5"  class="form-control" name="body" placeholder="Veuillez saisir le texte.." required >{{old('body')}}</textarea>

            </div>
          </div>

          <br>
          <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button></div>
        </form>
      </div>
    </div>
  </div>


@endsection
