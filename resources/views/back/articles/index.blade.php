@extends('back.layouts.master')
@section('title','Tüm Makaleler')
    
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold float-right text-primary">Tüm Makaleler <strong>{{ $articles->count() }}</strong></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Oluşturma Tarihi</th>


                        
                        
                    </tr>
                </thead>
            
                <tbody>
                  @foreach ($articles as $article)
                      
                 
                    <tr>
                        <td>
                            <img src="{{ $article->image }}" width="200" height="200">
                            </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>{{ $article->created_at->diffForHumans() }}</td>
                       <td>
                        <a href="" title="görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('makaleler.edit',$article->id) }}" title="düzenle" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                       
                        <a href="{{ route('delete.article',$article->id) }}" title="sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>

                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection