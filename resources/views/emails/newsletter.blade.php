@component('mail::message')
# Introduction

Bonjour {{$email}}

@foreach ($articles as $article)
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="{{url(route('articles.show',$article))}}">{{$article->title}}</a>
    </li>

</ul>

@endforeach

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
Amine CHERAITIA
<!--{/{ config('app.name') }}-->
@endcomponent
