@extends('User.layout')
@section('main')
<section>
    <div class="container-fluid body-index">
        <div class="row content">
            <div class="col-xl-2 content-left">
                <div><a class="text-dark" href="/">Feeds</a></div>
                <div class="text-primary"><a>My Photos</a></div>
                <div><a class="text-dark" href="/album">My Albums</a></div>
            </div>
            <div class="col-xl-8 div-content">
                <div class="add-new">
                    <div><a href="/addPhoto/store"><button class="btn btn-success float-right">Add New Photo</button></a></div>
                </div>
                <hr>
                <div class="myphoto-content">
                    <div>
                        @if($post)
                            @foreach($post as $item)
                                <div class="detail-photo">
                                <a href="/editPhoto/{{$item->id}}"><img  src="{{$item->getFirstMediaUrl('images')}}"></a>
                                <div class="title-post"><b class="text-success">{{$item->post_title}}</b>
                                    <button type="button" class="close" aria-label="Close">
                                    <a href="/photo/delete/{{$item->id}}" aria-hidden="true">&times;</a>
                                    </button>
                                </div>  
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="pagination">
                    {!! $post->links() !!}
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
</section>
@endsection