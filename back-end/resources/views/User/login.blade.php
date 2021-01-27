@extends('User.layout')
@section('main')
<section>
    <div class="login">
        <div class="include-form">
            <h1 class="title-h1 text-primary">FotoBook Login</h1>
            <div class="margin-form">
                <div class="div-form a">
                    <div>
                        <img class="img-login" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" />
                    </div>
                    <form method="POST" action="/login/post" class="form-container">
                        @csrf
                        <div>
                          <input type="text" class="form-control" name="email" id="exampleInputFirstName1" placeholder="Enter your Email">
                          @if($errors->has('email'))
                                <span class="error">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div>
                          <input type="password" class="form-control" name="password" id="exampleInputLastName1" placeholder="Enter your Password">
                          @if($errors->has('password'))
                                <span class="error">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="ori-div-btn">
                            <button type="submit" class="btn div-btn btn-primary">Login</button>
                        </div>
                        <div class="ori-div-btn div-a">
                            <a class="div-btn "  href="#">Forgot password ?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="create-account"><a  href="#">Create an account</a></div>
        </div>
    </div>
</section>
@endsection