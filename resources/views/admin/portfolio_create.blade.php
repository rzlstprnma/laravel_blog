@extends('layouts.app')
@section('title')
    Portfolio Baru
@endsection
@section('content')
    <div class="container">
        <form action="/admin/portfolio/store" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
              <label for="project_name">Nama Projek *</label>
              <input type="text" name="project_name" id="project_name" class="form-control" aria-describedby="projectName">
              <small id="projectName" class="text-muted">e.g. Wesite Sekoah</small>
            </div>
            <label for="photoProject">Foto Project *</label><br>
            <input type="file" name="photo" id="photoProject">
            <div class="form-group mt-2">
                <label>Deskripsi Projek</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button class="btn btn-warning">Tambah</button>
        </form>
    </div>
@endsection