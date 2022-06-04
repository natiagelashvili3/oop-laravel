@extends('layout')

@section('content')

<div id="content" class="s-content s-content--blog">

    <div class="row entry-wrap">
        <div class="column lg-12">

            <article class="entry format-standard">

                <header class="entry__header">

                    <h1 class="entry__title">
                        {{ $data['post']->title }}
                    </h1>

                    <div class="entry__meta">
                        <div class="entry__meta-date">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            {{ date('F d, Y', strtotime($data['post']->created_at)) }}
                        </div>
                        @if($data['post']->category)
                            <div class="entry__meta-cat">
                                <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 17.25V9.75C19.25 8.64543 18.3546 7.75 17.25 7.75H4.75V17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H17.25C18.3546 19.25 19.25 18.3546 19.25 17.25Z"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 7.5L12.5685 5.7923C12.2181 5.14977 11.5446 4.75 10.8127 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V11"></path>
                                </svg>
                                
                                <span class="cat-links">
                                    {{ $data['post']->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>
                </header>

                <div class="entry__media">
                    <figure class="featured-image">
                        <img src="{{ asset('storage/images/'.$data['post']->image) }}" alt="">
                    </figure>
                </div>

                <div class="content-primary">

                    <div class="entry__content">
                        <p>{{ $data['post']->text }}</p>
                    </div>

                    @if($data['post']->tags)
                    <p class="entry__tags">
                        <strong>Tags:</strong>
    
                        <span class="entry__tag-list">
                            @foreach($data['post']->tags as $tag)
                            <a>{{ $tag->name }}</a>
                            @endforeach
                        </span>
        
                    </p>
                    @endif

                </div> 

            </article>

            <div class="comments-wrap">

                @if($data['post']->comments)
                <div id="comments">
                    <div class="large-12">

                        <h3>{{ $data['post']->comments_count }} Comments</h3>

                        <!-- START commentlist -->
                        <ol class="commentlist">

                            @foreach($data['post']->comments as $comment)
                                <li class="depth-1 comment">
                                    <div class="comment__content">
                                        <div class="comment__info">
                                            <div class="comment__author">{{ $comment->name }}</div>
                                            <div class="comment__meta">
                                                <div class="comment__time">
                                                    {{ date('F d, Y', strtotime($comment->created_at)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment__text">
                                        <p>{{ $comment->message }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            
                        </ol>

                    </div>
                </div>
                @endif


                <div class="comment-respond">
                    <div id="respond">
                        <h3> Add Comment <span>Your email address will not be published.</span>
                        </h3>
                        <form method="post" action="{{ route('post.comment') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" value="{{ $data['post']->id }}" name="post_id">
                            <fieldset class="row">

                                <div class="column lg-6 tab-12 form-field">
                                    <input name="name" id="cName" class="u-fullwidth h-remove-bottom" placeholder="Your Name" value="" type="text">
                                </div>

                                <div class="column lg-6 tab-12 form-field">
                                    <input name="email" id="cEmail" class="u-fullwidth h-remove-bottom" placeholder="Your Email" value="" type="text">
                                </div>

                                <div class="column lg-12 message form-field">
                                    <textarea name="message" id="cMessage" class="u-fullwidth" placeholder="Your Message"></textarea>
                                </div>

                                <div class="column lg-12">
                                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large u-fullwidth" value="Add Comment" type="submit">
                                </div>

                            </fieldset>
                        </form> <!-- end form -->

                    </div>
                    <!-- END respond-->

                </div> <!-- end comment-respond -->

            </div>

        </div>
    </div>
</div>

@endsection