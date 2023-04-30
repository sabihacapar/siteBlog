@extends('back.layouts.master')
@section('title','Makale Oluştur')
    
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
        <form method="POST" action="{{ route('makaleler.store') }}" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
                <label>Makale Başlığı</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale fotografı</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale İçeriği</label>
                <textarea id="editor" name="content" class="form-control"rows="4"></textarea>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block">Makale Oluştur</button>
            </div>
        </form>
    </div>
</div>
@endsection