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
