@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='single-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product-solution/tpl-product-solution3781.css?ver=6.2.2') }}"
    type='text/css' media='all' />
@endsection

@section('content')
<section class="top-banner has-cover-img"
    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/img/joel-filipe-aK0EmfPuktA-unsplash-1.png') }}')">
    <div class="container">
        <div class="content wow fadeInUp" data-wow-delay=".3s">
            <p class="category mb-2">{{ __('message.product_solution') }}</p>
            <h3 class="display-2 text-blue text-uppercase">{{ __('message.product_solution_description') }}</h3>
            <div class="desc mt-4 mb-4">
                <p>
                <p>{{ __('message.product_solution_text') }}</p>
                </p>
            </div>
            <a href="" class="go-to-btn text-navi">{{ __('message.product_list') }}<span class="lines mt-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
        </div>
    </div>
</section>
<div class="container wow fadeInUp" data-wow-delay=".6s">
    <div class="experience-block">
        <div class="item">
            <p class="numbers">{{ __('message.product.capacity_title') }}</p>
            <p class="text text-uppercase">{{ __('message.product.capacity') }}</p>
        </div>
        <div class="item">
            <p class="numbers">{{ __('message.product.machinery_title') }}</p>
            <p class="text text-uppercase">{{ __('message.product.machinery') }}</p>
        </div>
        <div class="item">
            <p class="numbers">{{ __('message.product.technology_title') }}</p>
            <p class="text text-uppercase">{{ __('message.product.technology') }}</p>
        </div>
    </div>
</div>

<section class="product-list-sect">
    <div class="container">
        <div class="top-section wow fadeInUp" data-wow-delay=".3s">
            <h2 class="title display-2 text-blue text-uppercase">{!! __('message.product.best_product_title') !!}</h2>
            <div class="top-content">
                <div class="desc">
                    <p>
                        <p>{{ __('message.product.product_best_to_you') }}</p>
                    </p>
                </div>
                <a href="{{ get_link($slugs, [3, 8]) }}" class="go-to-btn text-navi mt-4">
                    {{ __('message.product_list') }} <span class="lines mt-2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>
        </div>
        <div class="cards wow fadeInUp" data-wow-delay=".3s">
            @foreach($products as $key1 => $product)
                <div class="card">
                    <div class="inner">
                        <div class="main-info">
                            <div>
                                <p class="category">{{ $product->name_category }}</p>
                                <h3 class="product-title">{{ $product->name }}</h3>
                                @if(!empty($product->measurementProduct->first()->width))
                                <p class="type">{{ __('message.product.thickness') }} (mm)</p>
                                @else 
                                <p class="type">{{ __('message.product.weight') }} (kg)</p>
                                @endif
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($product->measurementProduct as $key2 => $measurement)
                                        <li class="nav-item py-2" role="presentation">
                                            <button class="nav-link  btn-tab {{ $key2 == 0 ? 'active' : '' }}" id="detail-thickness-{{ $key1 }}-{{$key2}}-tab" data-bs-toggle="tab" data-bs-target="#detail-thickness-{{ $key1 }}-{{$key2}}" type="button" role="tab" aria-controls="detail-thickness-0" aria-selected="true">{{ convert_price($measurement->thickness) }}</button>
                                        </li>
                                    @endforeach 
                                </ul>
                               
                                <div class="tab-content">
                                    <p class="type">{{ __('message.product.price') }}</p>
                                    @foreach ($product->measurementProduct as $key2 => $measurement)
                                        <div class="tab-pane fade {{ $key2 == 0 ? 'show active' : '' }}" id="detail-thickness-{{ $key1 }}-{{$key2}}" role="tabpanel" aria-labelledby="detail-thickness-{{ $key1 }}-{{$key2}}-tab">
                                        <p class="price">{{ number_format($measurement->price) }} VND</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="thumb has-hover-img">
                                @if(!empty($product->avatar))
                                <img class="wow zômin"
                                    src="{{ asset('storage/assets/img/product/' . $product->avatar) }}"
                                    alt="#">
                                @else
                                <img class="wow zômin"
                                    src="{{ asset('coreUi/assets/img/404.png') }}"
                                    alt="#">
                                @endif    
                            </div>
                        </div>
                        <a href="{{ get_link($slugs, [8, $product->slug]) }}"
                            class="btn btn-primary btn-detail has-brand-icon">{{ __('message.product.detail') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="download-banner wow fadeInUp">
    <div class="container">
        <div class="wrapper has-cover-img"
            style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/img/BannerBottom_2023.07.07.jpg') }}')">
            <div class="content">
                <h3 class="heading-1">{{ __('message.product.download_document') }}</h3>
                <div class="desc mt-3 mb-5">
                    <p>
                    <p>{!! __('message.product.download_description') !!}</p>
                    </p>
                </div>
                <a href="{{ get_link($slugs, [4,11]) }}" class="btn btn-white text-blue">
                    {{ __('message.product.download_button') }} </a>
            </div>
        </div>
    </div>
</section>

<section class="common-sect">
    <div class="wrapper">
        <div class="thumb has-hover-img">
            <img class="wow zoomIn" src="">
        </div>
        <div class="content">
            <h3 class="title text-uppercase"></h3>
            <div class="desc">
            </div>
        </div>
    </div>
</section>

<section class="bottom-banner">
    <div class="container">
        <div class="wrapper">
            <div class="thumb">
                <img src="">
            </div>
            <div class="content wow fadeInUp" data-wow-delay=".3s">
                <h3 class="heading-1 text-uppercase"></h3>
                <div class="desc mt-3">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="grid-nav-section wow fadeInUp">
    <div class="wrapper">
        <div class="left-col has-cover-img" style="background-image: url('/frontEnd/wp-content/themes/zeit-theme-dev/images/frame-bg.png')">
            <h5 class="heading-1">{{ __('message.zeit_gypsum_resources') }}</h5>
        </div>
        <div class="right-col">
            <div class="item">
            <h6 class="name">{{ __('message.material') }} <span class="icon-calculator"></span></h6>
            <div class="desc">
                <p>{{ __('message.help') }}</p>
            </div>
            <a class="click-me-btn" href="">
                <span class="text text-navi"></span>
                <span class="lines">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </a>
            </div>
            <div class="item">
            <h6 class="name">{{ __('message.buy') }} <span class="icon-store"></span></h6>
            <div class="desc">
                <p>{{ __('message.distri') }}</p>
            </div>
            <a class="click-me-btn" href="">
                    <span class="text text-navi"></span>
                    <span class="lines">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
            </a>
            </div>
            <div class="item">
            <h6 class="name">{{ __('message.about') }} <span class="icon-information"></span></h6>
            <div class="desc">
                <p>{{ __('message.introduce') }} </p>
            </div>
            <a class="click-me-btn" href="">
                <span class="text text-navi"></span>
                <span class="lines">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product-solution/tpl-product-solution3781.js?ver=6.2.2') }}"
    id='single-js'></script>
@endsection