@extends('layouts.website')

@section('title', 'Blog')

@section('content')
<section class="page-title bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h1>Laravel Blog</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @if (count($posts) > 0)

                @foreach ($posts as $post)
                <div class="post">
                    <div class="post-media post-thumb text-center">
                        <a href="{{ route('website.posts.show', $post->id) }}">
                            <img src="{{ asset('storage/images/posts/'. $post->gallery->image) }}" style="width: 70% "
                                alt="Image Post">
                        </a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('website.posts.show', $post->id) }}">{{ $post->title }}</a>
                    </h3>
                    <div class="post-meta">
                        <ul>
                            <li>
                                <i class="ion-calendar"></i>{{ date('d-M-Y', strtotime($post->created_at)) }}
                            </li>
                            <li>
                                <i class="ion-android-people"></i> POSTED BY ADMIN
                            </li>
                            <li>
                                <a href="#"><i class="ion-pricetags"></i>{{ $post->category->name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="post-content">
                        <p>{!! Str::limit($post->description, 50) !!}</p>...
                    </div>
                    <div class="post-content">
                        <a href="{{ route('website.posts.show', $post) }}" class="btn btn-main">Continue Reading</a>
                    </div>
                </div>
                @endforeach

                @else
                <h2 class="text-center text-danger">No post added yet</h2>
                @endif

                <nav aria-label="Page navigation example">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </nav>
            </div>
            <div class="col-lg-4">
                <div class="pl-0 pl-xl-4">
                    <aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
                        <!-- Widget Latest Posts -->
                        <div class="widget widget-latest-post">
                            <h4 class="widget-title">Latest Posts</h4>
                            @if (count($posts) > 0)

                            @foreach ($latestPosts as $post)
                            <div class="media">
                                <a class="pull-left" href="{{ route('website.posts.show', $post->id) }}">
                                    <img class="media-object"
                                        src="{{ asset('storage/images/posts/'. $post->gallery->image) }}" alt="Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{ route('website.posts.show', $post->id) }}">{{
                                            $post->title }}</a>
                                    </h4>
                                    <p>{!! Str::limit( html_entity_decode($post->description), 15) !!}</p>
                                </div>
                            </div>
                            @endforeach

                            @else
                            <h3 class="text-center text-danger">No post added yet</h3>
                            @endif
                        </div>
                        <!-- End Latest Posts -->

                        <!-- Widget Category -->
                        <div class="widget widget-category">
                            <h4 class="widget-title">Categories</h4>
                            @foreach ($categories as $category)
                            <ul class="widget-category-list">
                                <li><a href="blog-grid.html">{{ $category->name }}</a>
                                </li>
                            </ul>
                            @endforeach
                        </div> <!-- End category  -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection