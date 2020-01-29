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
    <script src="/js/app.js"></script>
</head>
<body>
<div class="container-fluid" id="container">
    <header>
    <nav class="row navbar navbar-expand-lg navbar-light bg-light">
        <a href="/" class="navbar-brand">Todo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/views/main">메인<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/todo/write">일정등록</a>
                </li>
            </ul>
        </div>
        <?php if(isset($_SESSION['user'])) : ?> 
            <?php extract($_SESSION['user'])?>
            <div>
                <button class="btn btn-primary"><?=$name?></button>
                <a href="/user/logout" class="btn btn-danger">로그아웃</a>
            </div>
        <?php else :?>
            <div>
                <a href="/user/register" class="btn btn-outline-success">회원가입</a>
                <a href="/user/login" class="btn btn-outline-primary">로그인</a>
            </div>
        <?php endif; ?>
        
    </nav>
    <?php if(session()->has("msg")): ?>
    <div class="alert alert-success out" role="alert">
        <?= session()->get("msg") ?>
    </div>
    <?php endif; ?>
    </header>