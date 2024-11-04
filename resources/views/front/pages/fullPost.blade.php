@extends('front.layouts.pages-layout')
@section('pageTitle' , isset($pageTitle) ? $pageTitle : 'Post')
@section('content')

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-lg-9   mb-5 mb-lg-0">
                <article>
                    <div class="post-slider mb-4 slick-initialized slick-slider">
                        <div class="slick-list draggable">
                            <div class="slick-track"
                                style="opacity: 1; width: 690px; transform: translate3d(0px, 0px, 0px);"><img
                                    src="/assets/fashion/bg-banner-2.jpg"
                                    class="card-img slick-slide slick-current slick-active" alt="post-thumb"
                                    data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 690px;"></div>
                        </div>
                    </div>

                    <h1 class="h2">{{ $post->title }} .</h1>
                    <ul class="card-meta my-3 list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="card-meta-author">
                                <span>{{ $post->author->name }}</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <i class="ti-calendar"></i>{{ $post->created_at->format('Y-m-d') }}
                        </li>
                    </ul>
                    <div class="content">
                        <p>{!! $post->content !!}</p>
                    </div>
                </article>

            </div>

            <div class="col-lg-9 col-md-12">
                <div class="mb-5 border-top mt-4 pt-5">
                    <h3 class="mb-4">Comments</h3>
                    @if($post->comments->isEmpty())
                    <div class="media d-block d-sm-flex mb-4 pb-4">
                        <div class="mx-auto text-center">
                            <div class="empty-img"><img src="/assets/fashion/Get-more-blog-readers-431x230.jpg"
                                    height="170" alt=""></div>
                            <p class="empty-title">There Are No Comments Yet</p>
                        </div>
                    </div>

                    @else
                    @foreach($post->comments as $comment)
                    <div class="media d-block d-sm-flex mb-4 pb-4">
                        <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                            <img class="avatar me-3" width="70px" style="border-radius: 50%;"
                                src="/assets/fashion/default-user.webp" alt="{{ $comment->author->name }}">
                        </a>
                        <div class="media-body" style="margin-left: 10px; margin-top: 20px;">
                            <a href="#" class="h4 d-inline-block mb-3">{{ $comment->author->name }}</a>
                            <p>{{ $comment->content }}.</p>
                            <span
                                class="text-black-800 mr-3 font-weight-600">{{ $comment->created_at->format('Y-m-d g:i:s A') }}</span>
                        </div>

                            @auth
                            <!-- Report Icon -->
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('report-form-{{ $comment->id }}').submit();">
                                <svg style="margin-left: 10px" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-flag" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="red" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 21v-15h14l-4 5l4 5h-14" />
                                </svg>
                            </a>

                            <!-- Hidden Report Form -->
                            <form id="report-form-{{ $comment->id }}"
                                action="{{ route('posts.comments.report', ['post' => $post->id, 'comment' => $comment->id]) }}"
                                method="POST" style="display: none;">
                                @csrf
                            </form>

                            @if(auth()->user()->id == $comment->author->id)
                            <a href="#" onclick="event.preventDefault(); toggleEditForm({{ $comment->id }});">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="gray" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z" />
                                </svg>
                            </a>
                            @if(auth()->user()->id == $comment->author->id || auth()->user()->hasRole('admin'))

                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $comment->id }}').submit();">
                                <svg style="margin-left: 10px" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="gray" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z"
                                        stroke-width="0" fill="gray" />
                                    <path
                                        d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                                        stroke-width="0" fill="gray" />
                                </svg>
                            </a>
                            <form id="delete-form-{{ $comment->id }}"
                                action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endif
                            @endif
                            @endauth

                    </div>
                    <form id="edit-form-{{ $comment->id }}"
                        action="{{ route('posts.comments.update', ['post' => $post->id , 'comment' => $comment->id]) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div>
                                <img class="avatar me-3" width="70px" style="border-radius: 50%;"
                                    src="/assets/fashion/default-user.webp" alt="{{ $comment->author->name }}">
                            </div>
                            <div class="form-group col-md-10">
                                <textarea class="form-control shadow-none" name="text" rows="7"
                                    required>{{ $comment->content }}</textarea>
                                <span class="text-danger">@error('text'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <a href="#" onclick="event.preventDefault(); toggleEditForm({{ $comment->id }});">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="gray"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <button style="margin-left: 70px" class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
                @if(auth()->check())
                <div>
                    <h3 class="mb-4">Leave a Comment</h3>
                    <form method="POST" action="{{ route('posts.comments.store', ['post' => $post->id]) }}">
                        @csrf
                        <div class="row">
                            <div>
                                <img class="avatar me-3" width="70px" style="border-radius: 50%;"
                                    src="/assets/fashion/default-user.webp" alt="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group col-md-10">
                                <textarea class="form-control shadow-none" name="text" rows="7"
                                    required>{{ old('text') }}</textarea>
                                <span class="text-danger">@error('text'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div>
                            <button style="margin-left: 70px" class="btn btn-primary" type="submit">Comment Now</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

<script>
    function toggleEditForm(commentId) {
        var form = document.getElementById('edit-form-' + commentId);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

@endsection