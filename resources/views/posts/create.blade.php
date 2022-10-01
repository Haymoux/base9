@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url('https://th.bing.com/th/id/R.c9a9aa0de59906566c6158ac12fa30db?rik=g%2bAima3J8EJlYg&pid=ImgRaw&r=0')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Create Post</h1>
                    <span class="subheading">Share knowledge</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- @if (Alert::has('info'))
            @foreach (Alert::getMessages() as $type => $messages)
            @foreach ($messages as $message)
            <div class="alert alert-{{ $type }}">{{ $message }}</div>
            @endforeach
            @endforeach
            @endif -->


            <!-- @if (Alert::has('success'))
            @foreach (Alert::getMessages() as $type => $messages)
            @foreach ($messages as $message)
            <div class="alert alert-{{ $type }}">{{ $message }}</div>
            @endforeach
            @endforeach
            @endif -->

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Wanna share some knowledge? Enter the title and content then publish asap</p>
                <div class="my-5">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control @error('title') is-invalid @enderror" name="title" type="text" placeholder="Enter post title..." required />
                            <label for="title">Title</label>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter your post here..." style="height: 12rem" required></textarea>
                            <label for="message">Content 😎</label>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br />
                        <button class="btn btn-success text-uppercase" type="submit">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
