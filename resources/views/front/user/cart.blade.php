@extends('front.layout.master' , ['title' => __('landing.cart') , 'show_header' => true])

@push('front_css')
    <style>
        .btn-remove-cart {
            color: #FFF !important;
            background-color: #ef4444 !important;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .cart-summary {
            box-shadow: 5px 10px 30px rgba(43, 45, 52, 0.0509803922);
        }

        .cart-image {
            width: 96px;
            height: 80px;
        }

        .s-quantity-input-container {
            display: flex;
            height: 2.5rem;
            width: 130px;
            align-items: stretch;
            justify-content: space-around;
            border-radius: 0.375rem;
            border-width: 1px;
            font-size: .875rem;
            line-height: 1.25rem;
            border: 1px solid #eee;
        }

        .s-quantity-input-button {
            width: 2.75rem;
            color: #9ca3af;
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: 300ms;
            background-color: transparent;
        }

        .s-quantity-input-input {
            width: 3rem;
            border-width: 1px;
            border-top-width: 0;
            border-bottom-width: 0;
            border-left: 1px solid #e5e7eb;
            border-right: 1px solid #e5e7eb;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            text-align: center;
            font-weight: 700;
        }

        .s-quantity-input-input::-webkit-outer-spin-button,
        .s-quantity-input-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        .s-quantity-input-input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush
@section('content')

    @include('front.components.page_header' , ['title' => __('landing.cart')  ] )


    <section class="section bg-light">
        <div class="container">
            <div class="row" id="cart_container">
                @include('front.user.partials.cart_container')
            </div>
        </div>
    </section>

@endsection

@push('front_js')

    <script src="{{ asset('frontAssets/js/post.js') }}"></script>
    <script>
        $(document).on("click", ".minus,.add", function () {
            var $qty = $(this).closest(".s-quantity-input-container").find(".number"),
                currentVal = parseInt($qty.val()),
                isAdd = $(this).hasClass("add");
            !isNaN(currentVal) && $qty.val(isAdd ? ++currentVal : currentVal > 0 ? --currentVal : currentVal);
            $qty.trigger('change');
        });

        $(document).on('change', 'input[name=qty]', function (e) {
            e.preventDefault();
            if ($(this).val() < 0) {
                $(this).val(0)
            } else {
                let update_url = $(this).closest('div').find('input[name=cart_update_url]').val();
                updateCartItem(update_url, $(this).val());
            }
        })

        function updateCartItem($update_url, $qty) {

            $.ajax({
                "url": $update_url,
                "type": "POST",
                "data": {
                    'quantity': $qty
                },

                success: function (response) {

                    if (isJson(response)) {
                        response = jQuery.parseJSON(response);
                    }


                    if (response.status) {

                        $('#cart_container').html(response.html);

                    } else {
                        customToasterAlert(false, response.message);
                    }


                },
                error: function (jqXhr) {
                    getErrors(jqXhr, '/');
                }
            });
        }

        $(document).on('click', '#confirm_order', function (e) {
            e.preventDefault();

            $.ajax({
                "url": "{{ route('front.cart.confirm') }}",
                "type": "POST",
                success: function (response) {
                    if (isJson(response)) {
                        response = jQuery.parseJSON(response);
                    }

                    if (response.status) {
                        customToasterAlert(true, response.message, function (response) {
                            window.location = response.redirect_url;
                        });
                    } else {
                        customToasterAlert(false, response.message);
                    }
                },
                error: function (jqXhr) {
                    getErrors(jqXhr, '/');
                }
            });

        })

    </script>
@endpush
