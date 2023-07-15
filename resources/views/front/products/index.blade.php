@extends('front.layout.master' , ['title' => __('landing.products') ])

@section('content')
    @include('front.components.page_header' , ['title' => __('landing.products')])


    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="row">
                        @foreach($products as $product)
                            @include('front.components.product' , ['item' => $product , 'class' => 'col-lg-4 col-md-6'])
                        @endforeach


                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{ $products->links() }}
{{--                            <ul class="pagination justify-content-center">--}}
{{--                                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="card border-0 box-shadow rounded-30">
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <div class="input-icon icon-right">
                                    <input class="form-control" type="text"
                                           placeholder="{{ __('landing.search_by_product_number') }}"/>
                                    <div class="icon text-primary"><i class="fa-solid fa-magnifying-glass fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mb-3 text-primary">{{ __('landing.filter_by') }}</h6>
                            @foreach($properties as $index => $property)

                                <div class="mb-3 pb-3 {{ $index == $properties->count() -1 ? '' : 'border-bottom' }} ">
                                    <h5 class="mb-2 text-muted">{{ $property->name }}</h5>
                                    @foreach($property->options as $option)
                                        <label class="m-checkbox d-block">
                                            <input type="checkbox" name="property[{{ $property->id }}]"/>
                                            <span class="checkmark"></span><span>{{ $option->name }}</span>
                                        </label>
                                    @endforeach

                                </div>
                            @endforeach

                           <div class="my-3">
                               <button class="btn btn-primary w-100 rounded-pill">{{ __('landing.filter_products') }}</button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
@endsection
