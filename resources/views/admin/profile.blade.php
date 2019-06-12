@extends('layouts.app')

@section('title')
    Profile
@endsection
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@section('content')   
<div class="sampul"></div>
<section id="profile"> 
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card-profile">
                <div class="title-card">
                        @if ($profile == '')
                        <img src="{{asset('images/2.png')}}" alt="User Images">                    
                        @else
                        <img src="{{$profile->getPhoto()}}" alt="User Images">
                        @endif
                </div>
                <div class="body-card mt-2">
                    <div class="container">
                        <div class="head">
                            <h2>{{Auth::user()->name}}</h2>
                            <p>{{Auth::user()->email}}</p>
                        </div>

                        @if ($profile == '')
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#profileModal">Tambah Data lainnya</button>
                        @else
                        <div class="mt-3">
                            <p class="p3 text-muted"><strong>{{$profile->bio}}</strong></p>
                            <span>Nomor Handphone : <strong>{{$profile->phone}}</strong></span><br>
                            <span>Website : <a href="{{$profile->web}}">{{$profile->web}}</a></span><br>
                            <span>Alamat : </span><br><span>{{$profile->address}}</span>
                        </div>
                        <div class="mt-2">
                            <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-warning btn-sm float-left">Edit</a>
                            <a href="/admin/profile/delete/{{$profile->id}}" class="btn btn-sm btn-danger ml-2">Hapus</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div id="socialMedia" class="mt-3">
                <div class="container">
                    <h5>Social Media</h5>
                    <div class="medsos">
                        <table>
                            <tbody>
                                @foreach ($socialMedias as $socialMedia)
                                <tr>
                                    <td><a href="{{$socialMedia->link}}">{{$socialMedia->media_name}}</a></td>
                                    <td><a href="/admin/socialmedia/destroy/{{$socialMedia->id}}" class="badge badge-danger">X</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-warning btn-sm mt-3" data-toggle="modal" data-target="#medsos">Social Media baru</button><br><br>
                    

                </div>
            </div>
        </div>

        <div class="col-lg-8">
                <div id="skills">
                        <h4 class="float-left">#Skills</h4>
                        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#modelId">Skill Baru</button>

                            <table class="list-skills">
                                <tbody>
                                    @foreach ($skills as $skill)
                                    <tr height="50px">
                                        <td width="20%">{{$skill->skill_name}}</td>
                                        <td width="70%"><div class="progress">
                                             <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->achieved}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->achieved}}%;">
                                            <span>{{$skill->achieved}}%</span>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/admin/skill/destroy/{{$skill->id}}" class="btn btn-sm btn-warning">X</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

        </div>
    </div>

    <div id="portfolio">
            <div class="container">
                <strong>#Portfolio</strong><br>
                <a href="/admin/portfolio/create" class="btn btn-warning btn-sm">Portfolio Baru</a>
                <br><br>
                <div class="row">
                    @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4">
                        <div class="container">
                            <div class="portfolio-card">
                                <img src="{{$portfolio->getPhoto()}}" alt="Portfolio Images">
                                <div class="portfolio-body container">
                                    <div class="title-portfolio">
                                        <h4>{{$portfolio->project_name}}</h4>
                                    </div>
                                    <p>{{$portfolio->description}}</p>    
                                </div>         
                                <div class="card-footer">
                                    <a href="/admin/portfolio/destroy/{{$portfolio->id}}" class="btn btn-danger">X</a>
                                </div>                       
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

</div>
</section>






{{-- Modal --}}

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Lainnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                    <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea name="bio" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
            
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="web" class="form-control">
                        </div>
            
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" rows="4" class="form-control"></textarea>
                        </div>
            
                        <input type="file" name="photo"><br>
            
                        <button class="btn btn-info">Tambahkan</button>
                    </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="medsos" tabindex="-1" role="dialog" aria-labelledby="medsosModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Social Media Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="/admin/socialmedia/store" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                      <label>Nama Social Media</label>
                      <input type="text" name="media_name" class="form-control" aria-describedby="media">
                      <small id="media" class="text-muted">e.g. Instagram</small>
                    </div>
                    <div class="form-group">
                      <label for="link">Link Social Media</label>
                      <input type="text" name="link" id="link" class="form-control" aria-describedby="linkMedsos">
                      <small id="linkMedsos" class="text-muted">e.g. http://instagram.com/aa</small>
                    </div>
                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Skill Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="/admin/skill/store" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                      <label for="skill_name">Nama Skill</label>
                      <input type="text" name="skill_name" id="skill_name" class="form-control" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">e.g Vue js</small>
                    </div>

                    <div class="form-group">
                      <label for="achieved">Tercapai</label>
                      <input type="number" name="achieved" id="achieved" class="form-control" aria-describedby="achieved">
                      <small id="achieved" class="text-muted">e.g 80</small>
                    </div>
                <button class="btn btn-primary">Save</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection