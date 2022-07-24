<!DOCTYPE html>
<html>
   <head>
      <title>Article System</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap Css & Js-->

    <!-- 新 Bootstrap 核心 CSS & Js文件 -->
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
      <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <div class="bs-component">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Register</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!-- <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form> -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Back To Home</a></li>
                        <!-- <li><a href="#">Login</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                <form class="form-horizontal" action="/user" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="input" class="col-lg-3 control-label">Login Name</label>

                        <div class="col-lg-6">
                            <input class="form-control" id="input" value=" {{old('login_name')}}" placeholder="Login Name" type="text" name ="login_name">
                        </div>
                        @error('login_name')
                        <div style="color:red;font-size:10px">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-lg-3 control-label">User Name</label>

                        <div class="col-lg-6">
                            <input class="form-control" id="input"  value=" {{old('user_name')}}"  placeholder="User Name" type="text" name ="user_name">
                        </div>
                        @error('user_name')
                        <div style="color:red;font-size:10px">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">Email</label>

                        <div class="col-lg-6">
                            <input class="form-control" id="inputEmail" value=" {{old('email')}}"   placeholder="Email" type="text" name ="email">
                        </div>
                        @error('email')
                        <div style="color:red;font-size:10px">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-3 control-label">Password</label>

                        <div class="col-lg-6">
                            <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="password">
                        </div>
                        @error('password')
                        <div style="color:red;font-size:10px">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>   
                </div>
            </div>
        
        </div>
    </div>
   </body>
</html>