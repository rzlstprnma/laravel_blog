@extends('layouts.app')
@section('title')
    Edit Profile
@endsection

<style>
img{
    width: 200px;
}
</style>

@section('content')
    
<div class="container">
    <form action="{{route('profile.update', $profile->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" rows="4" class="form-control">{{$profile->bio}}</textarea>
        </div>

        <div class="form-group">
            <label>Nomor Handphone</label>
            <input type="number" name="phone" class="form-control" value="{{$profile->phone}}">
        </div>

        <div class="form-group">
            <label>Website</label>
            <input type="text" name="web" class="form-control" value="{{$profile->web}}">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" rows="4" class="form-control">{{$profile->address}}</textarea>
        </div>

        <div class="form-group">
            <label for="">Foto Profil</label><br>
            <input type="file" name="photo" value="{{$profile->photo}}">
        </div>

        <div class="form-group">
            <label for="">Foto saat ini</label>
            <img src="{{$profile->getPhoto()}}">
        </div>

        <button class="btn btn-info">Tambahkan</button>
    </form>
</div>

@endsection