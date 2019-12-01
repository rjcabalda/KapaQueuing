<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
  
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">

                <select name = 'city' data-url="{{url('/')}}" data-token="{{ csrf_token() }}">
                     <option value = '1' SELECTED>new york</option>
                     <option value = '2'>france</option>
                     <option value = '3'>indonesia</option>
                     </select>

                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js')}}" ></script>
        <script>
                        $('select').on('change',function(){
                var city_id =  $( "select option:selected" ).val();
                var token = $(this).data('token');
                var base_url = $(this).data('url');
                    $.ajax({
                        url:base_url+'/update_city',
                        type: 'POST',
                        data: { _token :token,city_id:city_id },
                        success:function(msg){
                        alert("success");
                        }
                    });

                })
        </script>
    </body>
</html>
