@extends('front.layouts.master')  <!-- header ve footer alanlarını projeye dahil etmek için-->
    
@section('title','Anasayfa')

@section('content')
    

<!-- Main Content-->

                <div class="col-md-9 col-lg-8 col-xl-7">
                    @foreach ($articles as $article)
                        
                  
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('single',$article->slug) }}">
                            <h2 class="post-title">{{ $article->title }}</h2>
                            <img src="{{ $article->image }}" alt="">
                            <h3 class="post-subtitle">{{ Str::limit($article->content,75) }}</h3>
                        </a>
                        <p class="post-meta">
                           
                            <a href="#!">Start Bootstrap</a>
                            {{ $article->created_at->diffForHumans()}}
                        </p>
                    </div>
                    @if (!$loop->last)

                    <hr class="my-4" />
                    @endif
                    @endforeach
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>

                  
                </div>

                 
                @endsection




            