@extends('layouts.front')
@section('title')
    Profil Admin
@endsection

<style>
.box{
    background: #fff;
    padding: 10px;
    box-shadow: 0px 2px 4px rgba(10, 10, 10, 0.2);
    border-radius: 5px;
}
a{
    text-decoration: none !important;
    color: #333 !important;
}
.box:hover{
    transform: scale(1.03);
    transition: ease .4s;
    color: #333 !important;
}

.box img{
    width: 100%;
}
.title{
    padding-bottom: 20px;
}
</style>

@section('content')
    <div class="container mt-5">
        <h2 class="title">Daftar Penulis</h2>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-lg-6">
                <a href="/penulis/{{$user->id}}">
                <div class="box">
                    <div class="row">
                        <div class="col-4">
                            @if ($user->profile == '')
                                
                            @else
                            <img src="{{$user->profile->getPhoto()}}">
                            @endif
                        </div>
                        <div class="col-8">
                           <div class="head">
                               <h4><strong>{{$user->name}}</strong></h4>
                               @if ($user->profile == '')
                                   
                               @else
                               <span class="text-muted">{{$user->profile->bio}}</span>
                               @endif
                           </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>    
@endsection