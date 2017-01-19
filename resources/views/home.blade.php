<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.css')}}"></link>


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (!Auth::check())
                <div class="top-right links">
                    <button type="button" data-toggle="modal" data-target="#loginmodel">Login</button>
                    <button type="button" data-toggle="modal" data-target="#registermodel">Register</button>
                </div>
            @else
                 <a href="{{url('profile')}}" >My profile</a>
            @endif

            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="loginmodel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                       
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-md-2 ">Email</div>
                          <div class="col-md-6 "><input type="email" name="user_name"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 ">Password</div>
                          <div class="col-md-6 "><input type="text" name="user_password"></div>
                        </div>
                        <div class="row">
                          <label>Remeber me:</label><input type="checkbox" name="remember">
                        </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                         </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="registermodel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" id="user-register-form" role="form" method="POST" >
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-md-2 ">First name:</div>
                          <div class="col-md-6 "><input type="text" name="user_first_name"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 ">Last name:</div>
                          <div class="col-md-6 "><input type="text" name="user_last_name"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 ">Email</div>
                          <div class="col-md-6 "><input type="email" name="user_email"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 ">phone</div>
                          <div class="col-md-6 "><input type="number" name="user_phone"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 ">Password</div>
                          <div class="col-md-6 "><input type="text" name="user_password"></div>
                        </div>
                       
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


        </div>
    </body>
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script type="text/javascript">
        
        $('#user-register-form').submit(function(e){
         e.preventDefault();
         $('#registermodel').modal('hide');
         var form_data=$(this).serialize();
         console.log(form_data)
         $.ajax({
                type:"POST",
                url:"{{url('/register')}}",
                data:form_data,
                success: function(response){
                    console.log(response);  
                },
                error: function(response){
                    console.log(response.responseText);  
                }
            });
        
        });

    </script>
</html>
