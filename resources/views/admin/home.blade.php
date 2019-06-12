@extends('layouts.app')
@section('title')
    Home
@endsection

<style>
    
    
#accordion .panel {
  border-radius: 0;
  border: 0;
  margin-top: 0px;
}
#accordion a {
  display: block;
  padding: 10px 15px;
  text-decoration: none;
}
#accordion .panel-heading a.collapsed:hover,
#accordion .panel-heading a.collapsed:focus {
  background-color: #b42b2b;
  color: white;
  transition: all 0.2s ease-in;
}
#accordion .panel-heading a.collapsed:hover::before,
#accordion .panel-heading a.collapsed:focus::before {
  color: white;
}
#accordion .panel-heading {
  padding: 0;
  border-radius: 0px;
  text-align: center;
}
#accordion .panel-heading a:not(.collapsed) {
  color: white;
  background-color: #b42b2b;
  transition: all 0.2s ease-in;
}

/* Add Indicator fontawesome icon to the left */
#accordion .panel-heading .accordion-toggle::before {
  font-family: 'FontAwesome';
  content: '\f00d';
  float: left;
  color: white;
  font-weight: lighter;
  transform: rotate(0deg);
  transition: all 0.2s ease-in;
}
#accordion .panel-heading .accordion-toggle.collapsed::before {
  transform: rotate(-135deg);
  transition: all 0.2s ease-in;
}

.table{
    font-size: 14px;
}
.form-search{
    border-radius: 3px;
    border: .5px solid #DEE2E6;
    height: 28px;
    width: 220px;
}
.form-search:focus{
    box-shadow: none !important;
    outline: 1px solid #0af;
    color: #333;
}
.search{
    margin-left: -8px;
    margin-top: -3px;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}


</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <a href="{{route('post.create')}}" class="btn-sm btn btn-info float-left">Postingan Baru</a>
            <form method="GET">
                @csrf
            <div class="form-group float-right">
                <input class="form-search" type="text" name="search" placeholder="Cari disini,..">
                <button type="submit" class="search btn btn-sm btn-info">Cari</button>
            </div>
            </form>
            <table class="table mt-4">
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{route('post.edit', $post->id)}}" style="font-size: 15px; color: #2672b5">{{$post->title}}</a><br>
                            <a style="font-size: 12px; opacity: .7; text-decoration: none;" href="{{route('post.show', $post->slug)}}">View Blog</a>
                            <a style="font-size: 12px;  opacity: .7; text-decoration: none;" class="ml-2" href="/admin/post/destroy/{{$post->id}}" class="ml-2">Hapus</a>
                        </td>
                        <td width="10%">@if ($post->isPublished == 0)
                            <a class="btn btn-sm btn-warning"  href="/admin/post/publish/{{$post->id}}">Publish</a>
                        @else
                        <a class="btn btn-sm btn-primary" href="/admin/post/publish/{{$post->id}}">Unpublish</a>
                        @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="float-left">
                <span>Halaman {{$posts->currentPage()}} dari {{$posts->lastpage()}}</span>
            </div>
            <div class="float-right">
            @if ($posts->currentPage() <= 1)

            @else
            <a class="btn btn-sm btn-info" href="/admin/dashboard">First Page</a>
            <a class="btn btn-sm btn-info" href="/admin/dashboard?page={{$posts->currentPage() - 1}}">Prev Page</a>
            @endif
            
            @if ($posts->lastPage() <= 3)
                
            @else    
            <a class="btn btn-sm btn-info" href="/admin/dashboard?page=2">2</a>
            <a class="btn btn-sm btn-info" href="/admin/dashboard?page=3">3</a>
            @endif

            @if ($posts->lastPage() > 3)
            <span style="font-size: 18px;line-height: 30px;">....... </span><a class="btn btn-sm btn-info" href="/admin/dashboard?page={{$posts->lastPage() - 1}}">{{$posts->lastPage() - 1}}</a>                
            @endif

            @if ($posts->currentPage() == $posts->lastPage())
            
            @else
            <a class="btn btn-sm btn-info" href="/admin/dashboard?page={{$posts->currentPage() + 1}}">Next Page</a>
            <a class="btn btn-sm btn-info" href="/admin/dashboard?page={{$posts->lastPage()}}">last page</a>
            @endif
            </div>

        </div>
        <div class="col-lg-4">
                <div id="accordion">
                    <div class="card mt-2">
                      <div class="card-header" id="heading-3">
                            <h5 class="mb-0">
                              <a class="collapsed" role="button" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                              <span>Daftar Kategori</span>
                              </a>
                            </h5>
                      </div>
                    <div id="category" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                    <div class="card-body">

                        <form action="/admin/category/store" method="post">
                            <div class="row">
                                <div class="col-9">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="category_name" placeholder="Kategory Baru">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-info">Buat</button>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td width="90%">{{$category->category_name}}</td>
                                    <td><a href="/admin/category/destroy/{{$category->id}}" class="btn btn-sm btn-danger">X</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                 </div>
                </div>

                <div id="accordion">
                        <div class="card mt-2">
                          <div class="card-header" id="heading-3">
                                <h5 class="mb-0">
                                  <a class="collapsed" role="button" data-toggle="collapse" href="#tag" aria-expanded="false" aria-controls="tag">
                                  <span>Daftar Tag</span>
                                  </a>
                                </h5>
                          </div>
                        <div id="tag" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                        <div class="card-body">
                            <form action="/admin/tag/store" method="post">
                            <div class="row">
                                <div class="col-9">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="tag_name" class="form-control" placeholder="Tag Baru">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-info">Buat</button>
                                </div>
                            </div>
                        </form>
                            
                            <table class="table">
                                <tbody>
                                    @foreach ($tags as $tag)
                                    <tr>
                                        <td width="90%">{{$tag->tag_name}}</td>
                                        <td><a href="/admin/tag/destroy/{{$tag->id}}" class="btn btn-sm btn-danger">X</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                 </div>
                </div>
        </div>
    </div>
</div>
</div>

@section('script')
    
@endsection
@endsection
