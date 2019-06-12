@extends('layouts.front')
@section('title')
    Blog ME!
@endsection
@section('style')    
<style>
    a{
        text-decoration: none !important;
        color: #636b6f !important;
    }
    .jumbotron{ 
        height: 420px;
    }
    .card img{
        width: 100%;
        height: 200px;
    }

    #blog{
        padding-bottom: 40px;
    }

    @keyframes come{
        0%{
            opacity: 0;
        }

        100%{
            opacity: 1;
        }
    }

    .card{
        margin-top: 6%;
        height: 420px;
        padding-bottom: 10px;
    }

    .card-body{ 
        overflow: hidden; 
    }

</style>
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Welcome to tutu.com</h1>
            <p class="lead">tutu.com can solved your problem</p>
            <hr class="my-2">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Blog</a> <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Portfolio</a>
            </p>
        </div>
    </div>    
        <div id="blog">
            <div class="container">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-lg-4">
                        <a href="{{route('post.show', $post->slug)}}">
                        <div class="card">
                            <img src="{{$post->getPhoto()}}">
                            <div class="card-body">
                                <h3><strong>{{$post->title}}</strong></h3>
                                {!! $post->body !!} <br>
                            </div>
                            <div class="container mt-3">
                                <span>Kategori : <strong>{{$post->category->category_name}}</strong></span><br>
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-success">#{{$tag->tag_name}}</span>
                                @endforeach
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



@endsection
@section('script')
<script>
        const container = document.querySelector('.container-portfolio')
        const jumbo = document.querySelector('.jumbo')
        const thumbs = document.querySelectorAll('.gambar')
        container.addEventListener('click', function(e){

            if(e.target.className == 'gambar'){
                jumbo.src = e.target.src
                jumbo.classList.add('feid')
                setTimeout(function(){
                    jumbo.classList.remove('feid')
                }, 500)
            }

            thumbs.forEach(function(thumb){
                if(thumb.classList.contains('aktif')){
                    thumb.classList.remove('aktif')
                }
            })

            e.target.classList.add('aktif')


        });
</script>
@endsection