@extends('layout')

@section('content')

<section id="content" class="s-content">

    <!-- pageheader -->
    <div class="s-pageheader">
        <div class="row">
            <div class="column large-12">
                <h1 class="page-title">
                    <span class="page-title__small-type">Category:</span>
                    Blog
                </h1>
            </div>
        </div>
    </div> <!-- end s-pageheader-->


    <!--  masonry -->
    <div id="bricks" class="bricks">

        <div class="masonry">

            <div class="bricks-wrapper" data-animate-block>

                <div class="grid-sizer"></div>

                @foreach($data['posts'] as $item)
                <article class="brick entry" data-animate-el>
                    <div class="entry__thumb">
                        <a href="{{ route('post.view', ['id' => $item->id, 'slug' => $item->slug]) }}" class="thumb-link">
                            <img src="{{ asset('storage/images/'.$item->image) }}" alt="{{ $item->title }}">
                        </a>
                    </div> <!-- end entry__thumb -->

                    <div class="entry__text">
                        <div class="entry__header">
                            <h1 class="entry__title">
                                <a href="{{ route('post.view', ['id' => $item->id, 'slug' => $item->slug]) }}">
                                    {{ $item->title }}
                                </a>
                            </h1>
                         </div>
                        <div class="entry__excerpt">
                            <p>{{ $item->short_text }}</p>
                        </div>
                        <a class="entry__more-link" href="{{ route('post.view', ['id' => $item->id, 'slug' => $item->slug]) }}">Read More</a>
                    </div> <!-- end entry__text -->
                
                </article>
                @endforeach
                

            </div> <!-- end bricks-wrapper -->

        </div> <!-- end masonry-->


        <!-- pagination -->
        {{ $data['posts']->links('pagination::front') }}
        <!-- end pagination -->

    </div> <!-- end bricks -->

</section>
@endsection