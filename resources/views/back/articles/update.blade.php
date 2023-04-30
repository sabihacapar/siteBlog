@extends('back.layouts.master')
@section('title',$articles->title.'Makalesini Güncelleme')
    
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold float-right text-primary">Tüm Makaleler </h6>
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
           <li>{{ $error }}</li> 
                
            @endforeach
        </div>
        @endif
        <form method="POST" action="{{ route('makaleler.update',$articles->id) }}" enctype="multipart/form-data">
          @method('PUT')
            @csrf
            <div class="form-group">
                <label>Makale Başlığı</label>
                <input type="text" name="title" class="form-control" value="{{ $articles->title }}" required>
            </div>
            <div class="form-group">
                <label>Makale fotografı</label><br>
                <img src="{{ asset($articles->image) }}" width="300" class="img-thumbnail rounded" alt="">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Makale İçeriği</label>
                <textarea id="editor" name="content" class="form-control"rows="4">{{  $articles->content  }}</textarea>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block">Makale Güncelle</button>
            </div>
        </form>
    </div>
</div>
@endsection