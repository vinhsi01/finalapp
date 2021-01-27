@extends('User.layout')
@section('main')
<section>
    <div class="login">
        <div class="include-form">
            <h1 class="title-h1 text-primary">FotoBook Signup</h1>
            <div class="margin-form">
                <div class="div-form">
                    <form action="/register/post" method="POST" id="form-register" >
                        @csrf
                        <div class="form-group">
                          <label class="title-form" for="exampleInputFirstName">First Name</label>
                          <input type="text" name="firstName" class="form-control" id="exampleInputFirstName1" placeholder="Enter your First Name">
                            @if($errors->has('firstName'))
                                <span class="error">{{$errors->first('firstName')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label class="title-form" for="exampleInputLastName">Last Name</label>
                          <input type="text" name="lastName" class="form-control" id="exampleInputLastName1" placeholder="Enter your Last Name">
                          @if($errors->has('lastName'))
                                <span class="error">{{$errors->first('lastName')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label class="title-form" for="exampleInputLastName">Email</label>
                          <input type="text"name="email" class="form-control" id="exampleInputLastName1" placeholder="Enter your Email">
                          @if($errors->has('email'))
                                <span class="error">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="title-form" for="exampleInputnewPassword1">New Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputnewPassword1" placeholder="Enter your Password">
                            @if($errors->has('password'))
                                <span class="error">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="title-form" for="exampleInputrePassword1">Password Confirmation</label>
                            <input type="password" name="confirmPassword" class="form-control" id="exampleInputrePassword1" placeholder="Confirm your Password">
                            @if($errors->has('confirmPassword'))
                                <span class="error">{{$errors->first('confirmPassword')}}</span>
                            @endif
                        </div>
                        <div class="ori-div-btn">
                            <button type="submit" class="btn div-btn btn-primary">Signup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection