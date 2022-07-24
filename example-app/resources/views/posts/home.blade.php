<!DOCTYPE html>
<html>
   <head>
      <title>Airticle System</title>
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
                    <a class="navbar-brand" href="/">Airticle System</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search" method="get" action="/">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Title" type="text" name="search" value="{{request('search')}}" >
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <a href="/posts/create" class="btn btn-primary">Add Airticle</a>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                        <li><a href="#">Welcome! | {{auth()->user()->login_name}}</a></li>
                        <li><a href="/user/logout">Login Out</a></li>
                        @else
                        <li><a href="/user">Register</a></li>
                        <li><a href="/user/login">Login</a></li>
                        @endauth
                       
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="bs-docs-section">

        <div class="row">
            <div class="col-md-12">
                <h2>Airticle Lists</h2>
            </div>
            @foreach($posts as $post)
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail content-thumbnail">
                    <img alt="" src="imgs/image-1.png">

                    <div class="caption">
                        <h4>{{$post->title}}</h4><h6>{{$post->created_at}}</h6>
                        <p>{{$post->body}}</p>
                        <a class="btn btn-danger" href="{{url('posts/edit',['id'=>$post->id])}}">Edit</a> 
                        <a class="btn btn-info" href="{{url('posts/delete',['id'=>$post->id])}}">Delete</a>
                        <a class="btn btn-success" href="{{url('posts/detail',['id'=>$post->id])}}">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   </body>
</html>