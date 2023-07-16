@extends('front.layout.master' , ['title' => $item->title , 'active' => 'page_' . $item->id])


@section('content')

    @include('front.components.page_header' , ['title' => $item->title] )



    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <h2 class="font-bold section-title mb-4">{{ $item->title }}</h2>
                    <div class="mb-4">
                        {!! $item->content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
