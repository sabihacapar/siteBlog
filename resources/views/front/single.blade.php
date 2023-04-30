@extends('front.layouts.master')  <!-- header ve footer alanlarını projeye dahil etmek için-->
    
@section('title',$articles->title)
@section('backgroundimage',$articles->image)
@section('content')

    <div class="container px-4 px-lg-5">
        {{ $articles->content }}
    </div>



@endsection