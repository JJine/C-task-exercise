<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src ="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="/js/app.js"></script>
</head>
<body>
<div class="container-fluid" id="container">
    <header>
    <nav class="row navbar navbar-expand-lg navbar-light" id="logoNav">
        <a href="/" class="logo">Todo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/main">Main<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/todo/write">Write</a>
                </li>
            </ul>
        </div>
        @if(user()->checkLogin())
            <div>
                <button class ="name_btn"><span>{{user()->get()->name}}</span><span class="w2">님</span></button>
                <a href="/user/logout" class="logout_btn"><span>Logout</span></a>
            </div>
        @else
            <div>
                <a href="/user/register" class="signup_btn"><span>Sign up</span></a>
                <a href="/user/login" class="login_btn"><span>Login</span></a>
            </div>
        @endif
    </nav>
    @if(session()->has("msg"))
    <div class="alert alert-success out" role="alert">
        {{session()->get("msg")}}
        </div>
    @endif
    </header>