@extends('front.layout.master' , ['title' => __('landing.products'), 'show_header' => true ])

@section('content')
    @include('front.components.page_header' , ['title' => __('landing.products')])


    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms" id="content">
                  @include('front.products.partials.content')
                </div>

                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="card border-0 box-shadow rounded-30">
                        <div class="card-body p-4">
                            <form id="form">
                                <div class="mb-4">
                                    <div class="input-icon icon-right">
                                        <input class="form-control" type="text" name="q"
                                               placeholder="{{ __('landing.search_by_product_number') }}"/>
                                        <div class="icon text-primary"><i
                                                class="fa-solid fa-magnifying-glass fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="mb-3 text-primary">{{ __('landing.filter_by') }}</h6>
                                @foreach($properties as $index => $property)

                                    <div
                                        class="mb-3 pb-3 {{ $index == $properties->count() -1 ? '' : 'border-bottom' }} ">
                                        <h5 class="mb-2 text-muted">{{ $property->name }}</h5>
                                        @foreach($property->options as $option)
                                            <label class="m-checkbox d-block">
                                                <input type="checkbox" name="property[{{ $property->id }}][]" value="{{$option->id}}"/>
                                                <span class="checkmark"></span><span>{{ $option->name }}</span>
                                            </label>
                                        @endforeach

                                    </div>
                                @endforeach

                                <div class="my-3">
                                    <button type="submit"
                                            class="btn btn-primary w-100 rounded-pill">{{ __('landing.filter_products') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('front_js')

    <script>
        $(document).on('submit', '#form', function (e) {
            e.preventDefault();

            let data = $('form#form').serializeArray();

            $.ajax({
                "url": "{{ url()->current() }}",
                "type": "GET",
                "data": data,
                success: function (response) {

                    if (isJson(response)) {
                        response = jQuery.parseJSON(response);
                    }

                    if (response.status){
                        $('#content').html(response.html);
                    }


                },
                error: function (jqXhr) {
                }
            });

        });



        function isJson(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
    </script>
@endpush
