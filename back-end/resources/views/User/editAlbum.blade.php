@extends('User.layout')
@section('main')
<section>
    <div class="container-fluid body-index">
        <div class="row content">
            <div class="col-xl-2 content-left">
                <div><a class="text-dark" href="/">Feeds</a></div>
                <div><a class="text-dark" href="/photo">My Photos</a></div>
                <div><a class="text-dark" href="/album">My Albums</a></div>
            </div>
            <div class="col-xl-8 div-content">
                <div class="add-new">
                    <div class="d-xl-inline"><b> Edit Album</b></div>
                    <a href="/photo"><button class="float-right btn btn-primary">Back</button></a> 
                </div>
                <hr>
                <div class="myphoto-content">
                    @foreach($album as $item)
                    <form action="/album/update" class="dropzone" id="myawesomedropzone" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" id ="id" name ="id" value="{!! $item->id !!}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$item->album_title}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Sharing Mode</label>
                                <select class="custom-select custom-select-xl mb-3">
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                  </select>
                            </div>
                            <div class="fallback">
                                <input name="file[]" type="file" multiple />
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"  rows="3">{{$item->album_description}}</textarea>
                            </div>
                            </div>
                        </div>
                        @foreach($media as $items)
                        <div class="img-album-edit">
                            <a><img class="img-album" src="{{$items->getUrl()}}"></a>
                            <div>
                                <button type="button" class="close" aria-label="Close">
                                <a href="/delete/media/{{$items->id}}/{{$item->id}}" aria-hidden="true">&times;</a>
                                </button>
                            </div>  
                        </div>
                        @endforeach
                        <div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
Dropzone.autoDiscover = false;
Dropzone.options.myawesomedropzone ={
    paramName: "file[]", // The na\me that will be used to transfer the file
    maxFilesize: 2,
    url : null, // MB
    autoProcessQueue:false,
    uploadMultiple:true,
    accept: function(file, done) {
        if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
        }
        else { console.log('oooo'); }
    },
    init: function(){
        var submitbtn = document.querySelector("#btn");
        myawesomedropzone = this;
        submitbtn.addEventListener("click",function(){
            myawesomedropzone.processQueue();
        })
    }
}

</script>
@endsection