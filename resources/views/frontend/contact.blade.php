@extends('layout')

@section('content')
<div id="content" class="s-content s-content--page">

    <div class="row entry-wrap">
        <div class="column lg-12">

            <article class="entry">

                <header class="entry__header entry__header--narrow">

                    <h1 class="entry__title">
                        Contact Us.
                    </h1>

                </header>
                <div class="content-primary">

                    @if(isset($success))
                    <h4>Your message has been send</h4>
                    @endif
                    <div class="entry__content">
                        <form action="{{ route('contact.send') }}" class="entry__form" method="post" >
                            @csrf
                            <fieldset class="row">

                                <div class="column lg-6 tab-12 form-field">
                                    <input name="name" class="u-fullwidth" placeholder="Your Name" type="text" required>
                                </div>

                                <div class="column lg-6 tab-12 form-field">
                                    <input name="email" class="u-fullwidth" placeholder="Your Email" type="email" required>
                                </div>

                                <div class="column lg-12 message form-field">
                                    <textarea name="message" class="u-fullwidth" placeholder="Your Message" required></textarea>
                                </div>

                                <div class="column lg-12">
                                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large u-fullwidth" value="Add Comment" type="submit">
                                </div>

                            </fieldset>
                        </form> <!-- end form -->

                </div> <!-- end content-primary -->

            </article> <!-- end entry -->

        </div>
    </div> <!-- end entry-wrap -->
</section>
@endsection