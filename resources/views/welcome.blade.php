<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ff6600" />

        <title>Fleet Management System</title>
        <!--icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!--icons-->
        <!--bootstrap-->
          <script src="{{ asset('js/app.js') }}" defer></script>
          <script src="{{ asset('js/jquerylatest.js') }}" defer></script>
          <script src="{{ asset('js/application.js') }}" defer></script>


          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:900&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #19273d;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                color: white;
            }
            @media screen and (max-width: 992px) {
            .right-header-info {display: none}
           
            
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

               
                font-size: 13px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-family: 'Poppins', sans-serif;
                float: right;
                padding: 10px  10px;
                border: 1px solid rgb(100, 150, 200);
                margin: 5px;
                color: white;
            }
             .links > a:hover{
                background-color: rgb(100, 150, 200);
                color: white;
             }
            

            .header{
                text-align: center;
                position:absolute;
                top: 0;
                
                background-color: red;

            }
            .m-b-md {
                margin-bottom: 30px;

            }
            .text-center{
                margin:5px 5px;
            }
            .welcome-nav{
                height: 80px;
                width: 100%;
                
            }
            .welcome-nav-icon{
               padding: 10px;
               color: white;
            }
            .welcome-side-nav{
                display: none;
                position: relative;
                width: 70px;
                background-color: rgb(100, 150, 200);
                color: white;
                border-radius: 100%;
                border: 3px solid #fff;
                text-align: center;

            }
                .welcome-side-nav li{
                display: block;
                list-style:none;
            }
             .welcome-side-nav a{
    
                color: #111;
                padding-top: 30px;

            }
           
            .welcome-button:hover{
                -webkit-transform:rotateZ(150deg);
                transform: rotateZ(10deg);
                transition: all 0.3s ease-in-out;
                width: 200px;
            }
        
            .intro-1{
               
                color: white;
                width: 100%;
                

            }
            .satisfied-clients{
                border-bottom: 5px solid rgb(100, 150, 200);
            }
            .card-header{
                text-align: center;
                font-weight: 600;
                margin-top: 0;
            }
            .welcome-header{
                color: white;
                position: relative;
                font-family: 'Roboto', sans-serif;
                font-size: 50px;
                text-shadow: 5px 5px 10px #000000;
                margin-top: 100px;
            }
            .welcome-button{
              
            }
            .welcome-header-p{
                position: relative;
                color: white;
                font-size: 40px;
                margin-top: 30px;
            }
           
            .header-fluid{
                background-image: url('https://d33wubrfki0l68.cloudfront.net/a51c52dcc1365d92465ff5e191bc6b908198caff/cc8e5/assets/images/blog/fleet-maintenance-management-check.png');
                background-size: cover;
                background-repeat: none;
                background-position: center;
                padding: 20px;
                height: 500px;
           

            }

            .icon{
                color:white;
                font-size: 30px;

            }

             
</style>
    </head>
    <body>

            <nav class="welcome-nav">
            <div class="icon">
                <img src="http://www.ugandahighcommissionpretoria.com/images/xcourt2.jpg.pagespeed.ic.GF5JUdAYNN.jpg" width="80px" height="80px">
            </div>
                   
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
            </nav>
            <div class="container-fluid header-fluid" >
                <div class="row first-row">
                    <div class="col-md-6 test">
                    <div class="welcome-center text-center test">
                    <h3 class="welcome-header" >Welcome To The Fleet Management System</h3>
                    <a href="{{ route('register') }}" class="btn btn-danger btn-lg welcome-button">Get Started</a> 
                </div> 
                </div>
               
            </div>
        </div>        
     </div>  
        </div> 
    </body>
</html>
