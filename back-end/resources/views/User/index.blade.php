@extends('User.layout')
@section('main')
<section>
    <div class="container-fluid body-index">
        <div class="row content">
            <div class="col-xl-2 content-left">
                <div><a class="text-primary" href="/">Feeds</a></div>
                <div><a class="text-dark" href="/photo">My Photos</a></div>
                <div><a  class="text-dark" href="/album">My Albums</a></div>
            </div>
            <div class="col-xl-8 div-content">
                <div class="include-content">
                    <div class="btn-center text-center">
                        <div class="div-btn">
                            <button type="button" class="btn btn-primary">PHOTO</button>
                            <button type="button" class="btn btn-light">ALBUM</button>
                        </div>
                    </div>
                    <div class="row pt-3 justify-content-xl-around">
                        <div class="col-xl-6 ">
                            @if($post)
                                @foreach($post as $item)
                                    @if($loop->index == 3)
                                        </div><div class="col-xl-6 ">
                                    @endif
                                        <div class="col-left row ">
                                            <div class="photo-img col-xl-6">
                                                <img data-toggle="modal" data-target="#exampleModalLong{{$item->id}}" class="photo" src="{{$item->getFirstMediaUrl('images')}}" />
                                            </div>
                                            <div class="photo-content col-xl-6">
                                                <div class="text-primary">
                                                    {{$item->firstName}} {{$item->lastName}}
                                                </div>
                                                <div> 
                                                    <b>{{$item->post_title}}</b>
                                                    <p>{{$item->post_description}}</p>
                                                </div>
                                                <div class="bot-item">
                                                    <span>128</span>
                                                    <span>5:23 pm 01/02/2021</span>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="modal fade" id="exampleModalLong{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle"><b>{{$item->post_title}}</b></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <img class="photo-modal" src="{{$item->getFirstMediaUrl('images')}}" />
                                        <p>{{$item->post_description}}</p>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                            
                        </div> 
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

@section('scripts')
<script>
Dropzone.options.myawesomedropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2,
  url : null, // MB
  autoProcessQueue:false,
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
  }
};
</script>
@endsection