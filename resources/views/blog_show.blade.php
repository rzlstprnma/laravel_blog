@extends('layouts.front')
@section('title')
    {{$post->title}}
@endsection
<!—- ShareThis BEGIN -—>
<script async src="//platform-api.sharethis.com/js/sharethis.js#property=5cea5bd182010c0012835bde&product="sticky-share-buttons"></script>
<!—- ShareThis END -—>
<style>
    .box{
        background: #fff;
        padding: 10px;
    }
    .box-head{
        padding: 10px;
    }
    .box-body{
        padding: 10px;
    }
    .comment-admin{
        margin-top: 40px;
    }
    .comment-bubble:nth-child(1){
        margin-top: 0;
    }
    .comment-bubble{
        padding: 10px;
        background: #fff;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .1);
        margin-top: 40px;
    }

</style>
@section('content')
    <div class="container justify-content-center">
        <div class="box mt-3">
            <div class="box-head">
                <h1 class="text-uppercase"><strong>{{$post->title}}</strong></h1>
                <div class="text-muted" style="font-size: 12px; width: 15%; !important">
                <span style="font-size: 10px;">Ditulis Oleh:</span>
                <a href=""><p>{{$post->user->name}}</p></a>
                </div>
            </div>

            <div class="box-body text-justify">
                {!! $post->body !!}
            </div>
            <div class="box-footer mt-4">
                <div class="sharethis-inline-reaction-buttons"></div>
            </div>
        </div>

        <div class="box mt-5">
            <div class="box-head">
                <h3><strong>Comment</strong></h3>
            </div>
            <div class="box-body">
                <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://tutuu.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
            </div>
        </div>
    </div>
@endsection
@section('script')
<script id="dsq-count-scr" src="//tutuu.disqus.com/count.js" async></script>
@endsection