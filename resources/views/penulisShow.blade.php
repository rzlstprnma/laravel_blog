@extends('layouts.front')
@section('title')
    {{$user->name}}
@endsection
<style>
.box{
    background: #fff;
    padding: 20px;
}
.box img{
    width: 100%;
}
.profile{
    margin-top: 40px;;
}

#skills .progress {
    overflow: visible;
    height: 4px;
}
#skills .progress-bar {
    background-color: #fdb432;
    position: relative;
    border-radius: 4px;
}
#skills span {
    background-color: #fdb432;
    position: absolute;
    bottom: -20px;
    font-size: 10px;
    line-height: 10px;
    padding: 2px 3px 2px 4px;
    right: -1.4em;
    border-radius: 2px;
}
#skills span:after {
    bottom: 100%;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #fdb432;
    border-width: 5px;
    margin-left: -5px;
}
.list-skills{
    width: 100%;
    font-size: 12px;
}

</style>
@section('content')

    <div class="container">
        <div class="box mt-5">
            <div class="row">
                <div class="col-4">
                    @if ($user->profile == '')
                        
                    @else
                    <img src="{{$user->profile->getPhoto()}}" alt="">
                    @endif
                </div>
                <div class="col-8">
                    <div class="profile">
                        <h4><strong>{{$user->name}}</strong></h4><span class="text-muted">{{$user->email}}</span>
                        @if ($user->profile == '')
                            
                        @else    
                        <p class="mt-2">
                            {{$user->profile->bio}}
                        </p>
                        @endif
                        @foreach ($user->socialMedias as $socialMedia)
                        <label>{{$socialMedia->media_name}} : </label>
                        <a class="ml-2" href="{{$socialMedia->link}}">{{$socialMedia->link}}</a><br>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
        <div id="skills" class="box mt-4">
                <h4>#Skills</h4>
                    <table class="list-skills">
                        <tbody>
                            @foreach ($user->skills as $skill)
                            <tr height="50px">
                                <td>{{$skill->skill_name}}</td>
                                <td width="70%"><div class="progress">
                                     <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->achieved}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->achieved}}%;">
                                    <span>{{$skill->achieved}}%</span>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
        </div>

        <div class="box mt-4" id="portfolio">
            <h4>#Portfolios</h4>
            <div class="container">
                <div class="row">
                    @foreach ($user->portfolios as $portfolio)
                    <div class="col-lg-4">
                        <div class="card">
                            <img src="{{$portfolio->getPhoto()}}">
                            <div class="card-body">
                                <span><strong>{{$portfolio->project_name}}</strong></span>
                                <p>{{$portfolio->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection