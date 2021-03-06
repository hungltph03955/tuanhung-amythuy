@extends('layouts.endUser.homepage')
@section('title'){{ __('messages.title_billing_address') }}@endsection
@section('content')
<!-- Checkout -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="block block-two-col container">
        <div class="row">
            @if(isset($carts) && count($carts) > 0)
            <div class="col-md-6 p-b-30 block-col-left">
                <div class="block-billing-product">
                    <div class="block-title">{{ __('messages.title_your_order') }}</div>
                    <div class="block-content">
                        <table class="table-billing-product">
                            <thead>
                                <tr>
                                    <th class="table-width"><strong>{{ __('messages.title_product') }}</strong></th>
                                    <th class="text-right"><strong>{{ __('messages.title_total') }}</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <p class="tb-commom"><strong>{{$cart->name}}</strong></p>
                                        <p class="tb-commom">{{$cart->qty}} x {{MONEY}}{{number_format((int)$cart->price,0)}}</p>        
                                    </td>
                                    <td class="text-right"><strong>{{MONEY}}{{number_format((int)$cart->subtotal, 0)}}</strong></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><strong>{{ __('messages.title_total') }}</strong></td>
                                    <td class="text-right"><strong>{{MONEY}}{{$total}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-b-30 block-col-right">
                <div class="block-billing">
                    <div class="block-title">{{ __('messages.title_billing_address') }}</div>
                    <div class="block-content">
                        {{ Form::open(['route' => 'endUser.order.addOrder', 'method' => 'POST']) }}
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 {{$errors->has('name')? 'error' : ''}}" 
                                   value="{{ old('name') }}" type="text" name="name" placeholder="{{ __('messages.place_full_name') }} *">
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 {{$errors->has('phone_number')? 'error' : ''}}" 
                                   value="{{ old('phone_number') }}" type="number" name="phone_number" placeholder="{{ __('messages.place_phone_number') }} *">
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 {{$errors->has('email')? 'error' : ''}}" 
                                   value="{{ old('email') }}" type="email" name="email" placeholder="{{ __('messages.place_email_address') }} * ">
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 {{$errors->has('address')? 'error' : ''}}" 
                                   value="{{ old('address') }}" type="text" name="address" placeholder="{{ __('messages.place_address') }} *">
                        </div>
                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" value="{{ old('message') }}" name="message" placeholder="{{ __('messages.place_message') }}"></textarea>
                        <div class="w-size25">
                            <!-- Button -->
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">{{ __('messages.btn_order') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /block-billing -->
            </div>
            @else
            <div class="col-md-12 p-b-30">
                <div class="alert alert-info center"><strong>{{ __('messages.message_no_cart') }}</strong></div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection