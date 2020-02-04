@extends('layouts.app')

@section('title', $article->meta_title)
@section('title', $article->meta_keyword)
@section('title', $article->meta_description)
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>{{$article->title}}</h1>
        <p>{!!$article->description!!}</p>
      </div>
    </div>
  </div>
<example-component></example-component>
<prop-component :urldata ="{{json_encode($url_data)}}"></prop-component>
<ajax-component></ajax-component>
<chartline-component></chartline-component>

@endsection
