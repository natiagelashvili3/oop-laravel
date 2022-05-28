@extends('layout')

@section('content')
<section id="content" class="s-content">


    <!-- hero -->
    <div class="hero">

        <div class="hero__slider swiper-container">

            <div class="swiper-wrapper">
                <article class="hero__slide swiper-slide">
                    <div class="hero__entry-image" style="background-image: url({{asset('assets/images/thumbs/featured/featured-01_2000.jpg')}});"></div>
                    <div class="hero__entry-text">
                        <div class="hero__entry-text-inner">
                            <div class="hero__entry-meta">
                                <span class="cat-links">
                                    <a href="category.html">Inspiration</a>
                                </span>
                            </div>
                            <h2 class="hero__entry-title">
                                <a href="single-standard.html">
                                    Understanding and Using Negative Space.
                                </a>
                            </h2>
                            <p class="hero__entry-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                            nostrud corporis est laudantium voluptatum consectetur adipiscing. 
                            </p>
                            <a class="hero__more-link" href="single-standard.html">Read More</a>
                        </div>
                    </div>
                </article>
                <article class="hero__slide swiper-slide">
                    <div class="hero__entry-image" style="background-image: url('images/thumbs/featured/featured-02_2000.jpg');"></div>
                    <div class="hero__entry-text">
                        <div class="hero__entry-text-inner">
                            <div class="hero__entry-meta">
                                <span class="cat-links">
                                    <a href="category.html">Health</a>
                                </span>
                            </div>
                            <h2 class="hero__entry-title">
                                <a href="single-standard.html">
                                    10 Reasons Why Being in Nature Is Good For You.
                                </a>
                            </h2>
                            <p class="hero__entry-desc">
                            Voluptas harum sequi rerum quasi quisquam. Est tenetur ut doloribus in aliquid animi nostrum. Tempora 
                            quibusdam ad nulla. Quis autem possimus dolores est est fugiat saepe vel aut. Earum consequatur.
                            </p>
                            <a class="hero__more-link" href="single-standard.html">Read More</a>
                        </div>
                    </div>
                </article>
                <article class="hero__slide swiper-slide">
                    <div class="hero__entry-image" style="background-image: url('images/thumbs/featured/featured-03_2000.jpg');"></div>
                    <div class="hero__entry-text">
                        <div class="hero__entry-text-inner">
                            <div class="hero__entry-meta">
                                <span class="cat-links">
                                    <a href="category.html">Lifestyle</a>
                                </span>
                            </div>
                            <h2 class="hero__entry-title">
                                <a href="single-standard.html">
                                    Six Relaxation Techniques to Reduce Stress.
                                </a>
                            </h2>
                            <p class="hero__entry-desc">
                            Quasi consequatur quia excepturi ullam velit. Repellat velit vel occaecati neque perspiciatis quibusdam nulla. 
                            Unde et earum. Nostrum nulla optio debitis odio modi. Quis autem possimus dolores est est fugiat saepe vel aut.
                            </p>
                            <a class="hero__more-link" href="single-standard.html">Read More</a>
                        </div>
                    </div>
                </article>
            </div> <!-- swiper-wrapper -->

            <div class="swiper-pagination"></div>

        </div> <!-- end hero slider -->

        <a href="#bricks" class="hero__scroll-down smoothscroll">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
            </svg>
            <span>Scroll</span>
        </a>

    </div> <!-- end hero -->


    <!--  masonry -->
    <div id="bricks" class="bricks">

        <div class="masonry">

            <div class="bricks-wrapper" data-animate-block>

                <div class="grid-sizer"></div>

                @foreach ($data['posts'] as $post)
                    <article class="brick entry" data-animate-el>

                        <div class="entry__thumb">
                            <a href="{{ route('post.view', ['id' => $post->id, 'slug' => $post->slug]) }}" class="thumb-link">
                                <img src="{{ asset('storage/images/'.$post->image) }}" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->

                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title">
                                    <a href="{{ route('post.view', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                        {{ $post->title }}    
                                    </a>
                                </h1>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                    {{ $post->short_text }}
                                </p>
                            </div>
                            <a class="entry__more-link" href="{{ route('post.view', ['id' => $post->id, 'slug' => $post->slug]) }}">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article>
                @endforeach

            </div> <!-- end bricks-wrapper -->

        </div> <!-- end masonry-->


        {{ $data['posts']->links('pagination::front') }}
        

    </div> <!-- end bricks -->

</section> 
@endsection
