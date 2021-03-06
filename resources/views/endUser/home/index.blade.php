@extends('layouts.endUser.homepage')
@section('title'){{ __('messages.home') }}@endsection
@push('styles')
@endpush
@section('content')
    <!-- Slide1 -->
    @include('element.section.slide', ['imagesBanner' => $imagesBanner,'category' => $category])
    <!-- Banner -->
    @include('element.section.banner')
    <!-- New Product -->
    {{-- @if(!$products->isEmpty()) --}}
    @if(!empty($products))
        <section class="newproduct bgwhite p-t-45">
            <div class="container">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5 t-center">{{ __('messages.featured_products') }}</h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        @foreach($products as $product)
                            <div class="item-slick2 p-l-15 p-r-15">
                                <!-- Block2 -->
                                <div class="block2 col-sm-12 col-md-12 col-lg-12 m-l-r-auto">
                                    <div class="block2-img hov-img-zoom wrap-pic-w of-hidden pos-relative {{renderClass($product->updated_at, NEW_DATE)}}">
                                        <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $product->img))
                                                <img src="{{PATH_IMAGE_MASTER. $product->img}}"
                                                     alt="{{$product->name ? $product->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </a>
                                        <!-- <div class="block2-overlay trans-0-4"> -->
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size2 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}"
                                                   class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">{{ __('messages.btn_view_more') }}</a>
                                            </button>
                                        </div>
                                        <!-- </div> -->
                                    </div>

                                    <!-- <div class="block2-txt p-t-20"> -->
                                <!-- <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}" -->
                                <!-- class="block2-name dis-block s-text3 p-b-5">{{$product->name}}</a> -->
                                <!-- <span class="block2-oldprice m-text7 p-r-5">{{MONEY}}{{number_format($product->price)}}</span> -->
                                <!-- <span class="block2-newprice m-text8 p-r-5">{{MONEY}}{{number_format($product->price)}}</span> -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- @if(!$news->isEmpty()) --}}
    @if(!empty($news))
        @include('element.section.blog', ['news' => $news])
    @endif
    <!-- Blog -->

@endsection