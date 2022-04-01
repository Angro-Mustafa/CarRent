@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! trans('auth.login') !!}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="loginForm" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">{!! trans('auth.email') !!}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="test@mail.com">

                                    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">{!! trans('auth.pass') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="password" value="85200258">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> {!! trans('auth.rem') !!}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>{!! trans('auth.login') !!}
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">{!! trans('auth.forgot') !!}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
      $(document).ready(function() {

        $('#loginForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(e.target);
            if(validate()) {
                //----
                $('#submitButton').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                $("#submitButton").attr("disabled", true);
                var body = '{"username": "'+ document.forms["loginForm"]["email"].value +'","password": "'+ document.forms["loginForm"]["password"].value + '"}';
                $.ajax( {
                    type: $('#loginForm').attr( 'method' ),
                    url: 'http://localhost:8000/api/login',
                    data: body,
                    dataType: 'json',
                    contentType: "application/json; charset=utf-8",
                    success: function ( data ) {
                        $('span').remove('.spinner-border');
                        $('#submitButton').removeAttr("disabled");
                        if (data.code != 1) {
                            toastr.error(data.message);
                        } else {
                            localStorage.setItem("user", JSON.stringify(data.data));
                            sessionStorage.setItem('user', JSON.stringify(data.data));
                            location.replace("http://localhost/medicapp/WebAPP/");
                            toastr.success(data.message);
                        }
                        
                    },
                    error: function ( data, response ) {
                        $('span').remove('.spinner-border');
                        $('#submitButton').removeAttr("disabled");
                        toastr.error("Internal server error");
                    },
                });
                //----
            }
        })

    })

    function validate () {
    var re = /\S+@\S+\.\S+/;
    var username = document.forms["loginForm"]["username"].value;
    var pass = document.forms["loginForm"]["password"].value;
      //validate email
      if (username == "") {
        document.getElementById("usernameErr").textContent = "اسم المستخدم غير صالح";
        document.getElementById('username').classList.add('is-invalid');
        // return false;
      } else {
        document.getElementById("usernameErr").textContent = "";
        document.getElementById('username').classList.remove('is-invalid');
      }

      //validate password
      if (pass == "") {
        document.getElementById("passwordErr").textContent = "كلمة المرور غير صالحة";
        document.getElementById('password').classList.add('is-invalid');
        return false;
      } else {
        document.getElementById("passwordErr").textContent = "";
        document.getElementById('password').classList.remove('is-invalid');
      }

      return true;
  }
</script>
@endsection