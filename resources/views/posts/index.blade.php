@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <br/>
    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8"style="padding-bottom: 22px;">
                            <form class="card card-sm" action="{{ route('posts.search') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="card-body row no-gutters align-items-center" >
                                    <div class="col-auto" style="padding: 10px 10px 0px 0px;">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords" / name="search">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
<div class="card-header">Board</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @foreach($posts as $post)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h5 class="card-title">
                カテゴリー:
                <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">{{ $post->category->category_name }}</a>
            <h5 class="card-title">
                投稿者:
                <a href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>
                </h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection
