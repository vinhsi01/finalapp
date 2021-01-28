@extends('User.layout')
@section('main')
<section>
    <div class="container-fluid body-index">
        <div class="row content">
            <div class="col-xl-2 content-left">
                <div><a class="text-dark" href="/">Feeds</a></div>
                <div><a class="text-dark" href="/photo">My Photos</a></div>
                <div  class="text-primary"><a href="/album">My Albums</a></div>
            </div>
            <div class="col-xl-8 div-content">
                <div class="add-new">
                    <div><a href="/addAlbum/store"><button class="btn btn-success float-right">Add New Album</button></a></div>
                </div>
                <hr>
                <div class="myphoto-content">
                    <div>
                        @if($album)
                            @foreach($album as $item)
                                <div class="detail-photo">
                                <a href="/editAlbum/{{$item->id}}"><img  src="{{$item->getFirstMediaUrl('imagesAlbum')}}"></a>
                                <div class="title-post"><b class="text-success">{{$item->album_title}}</b>
                                    <button type="button" class="close" aria-label="Close">
                                    <a href="/album/delete/{{$item->id}}" aria-hidden="true">&times;</a>
                                    </button>
                                </div>  
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
</section>
@endsection