@extends('front.layouts.pages-layout')
@section('pageTitle' , isset($pageTitle) ? $pageTitle : 'Welcome To My Blog')
@section('content')


    <!-- start of banner -->
    @include('front.layouts.inc.homeBanner')
    <!-- end of banner -->

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Recent Post</h2>
                    @foreach($posts as $post)
                        <article class="card mb-4">
                        <div class="post-slider">
                            <img src="/assets/fashion/bg-banner-2.jpg" class="card-img-top" alt="{{ $post->title }}">
                        </div>

                        <div class="card-body">
                            <h3 class="mb-3"><a class="post-title" href="#">{{ $post->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="card-meta-author">
                                        <span>{{ $post->author->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $post->created_at->format('Y-m-d') }}
                                </li>
                            </ul>
                            <p>{!! substr(strip_tags($post->content), 0, 90) !!}...</p>
                            <br>
                            <a href="{{ route('Posts.show', ['Post' => $post->id]) }}" class="btn btn-outline-primary">Read More</a>

                        </div>
                    </article>
                    @endforeach
                </div>

                <aside class="col-lg-4 sidebar-home">
                    <!-- authors -->
                    @if(!$authors->isEmpty())
                        <div class="widget widget-author">
                            <h4 class="widget-title">Authors</h4>
                            @foreach($authors as $author)
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <img class="widget-author-image" src="/assets/fashion/default-user.webp">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-1"><a class="post-title" href="#">{{ $author->name }}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Promotion -->
                    <div class="promotion">
                        <img src="/assets/fashion/illustration-design-achieving-employee-activity-schedule_409025-512.jpg" class="img-fluid w-100">
                        <div class="promotion-content">
                            <h5 class="text-white mb-3">Join Us Now !!</h5>
                            <a href="{{ route('admin.register') }}" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Social Links</span></h4>
                        <ul class="list-inline widget-social">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>


@endsection

