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
                    <div class="d-xl-inline"><b> Edit Photo</b></div>
                    <a href="/photo"><button class="float-right btn btn-primary">Back</button></a> 
                </div>
                <hr>
                <div class="myphoto-content">
                    @foreach($post as $item)
                    <form action="/photo/update" method="POST">
                        @csrf
                        <input type="hidden" id ="id" name ="id" value="{!! $item->id !!}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$item->post_title}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Sharing Mode</label>
                                <select class="custom-select custom-select-xl mb-3">
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                  </select>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" value="sds" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"  rows="3">{{$item->post_description}}</textarea>
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
</section>
@endsection