@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='single-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product-detail/tpl-product-detail3781.css?ver=6.2.2') }}"
    type='text/css' media='all' />
@endsection

@section('content')
@php
$images = json_decode($product->first()->image);
@endphp
<section class="product-detail-sec">
    <div class="container">
        <div class="wrapper">
            <div class="thumbnails-slider wow fadeInUp" data-wow-delay=".3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div
                    class="swiper big-thumb-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-3abef2485bceac0b" aria-live="polite"
                        style="transform: translate3d(-683px, 0px, 0px); transition-duration: 0ms;">
                        @if(!empty($images))
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="4"
                                role="group" aria-label="5 / 5" style="width: 683px;">
                                <img src="{{ asset('storage/assets/img/product/' . $images[0]) }}" alt="">
                            </div>
                            @foreach($images as $key => $image)
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                                    aria-label="1 / 5" style="width: 683px;">
                                    <img src="{{ asset('storage/assets/img/product/' . $image) }}" alt="">
                                </div>
                            @endforeach
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                data-swiper-slide-index="0" role="group" aria-label="1 / 5" style="width: 683px;">
                                <img src="{{ asset('storage/assets/img/product/' .$images[$key] ) }}" alt="">
                            </div>
                        @else
                            @if(!empty($product->first()->avatar))
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                                    aria-label="1 / 5" style="width: 683px;">
                                    <img src="{{ asset('storage/assets/img/product/' .$product->first()->avatar) }}" alt="">
                                </div>
                            @else
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                                    aria-label="1 / 5" style="width: 683px;">
                                    <img src="{{ asset('coreUi/assets/img/404.png') }}" alt="">
                                </div>
                            @endif
                        @endif
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                <div
                    class="swiper thumb-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                    <div class="swiper-wrapper" id="swiper-wrapper-d2f32fb6a0ea7033" aria-live="polite"
                        style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                        @if(!empty($images))
                            @foreach($images as $key => $image)
                                <div class="swiper-slide swiper-slide-visible {{ $key == 0 ? 'swiper-slide-active swiper-slide-thumb-active' : '' }}  {{ $key == 1 ? 'swiper-slide-next' : '' }}"
                                    role="group" aria-label="1 / 5" style="margin-right: 12px;">
                                    <img src="{{ asset('storage/assets/img/product/' .$images[$key] ) }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
            @foreach ($product as $key => $data)
                <div class="detail-info">
                    <h3 class="display-1 product-title wow fadeInUp" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">{{ $data->name }}</h3>
                    <div class="desc">
                        <p>{{ $data->description }}</p>
                        <hr>
                        <p>{!! $data->content !!}</p>
                    </div>
                    @if(!empty($data->measurementProduct->first()->width))
                    <p class="type">{{ __('message.product.thickness') }} (mm)</p>
                    @else 
                    <p class="type">{{ __('message.product.weight') }} (kg)</p>
                    @endif
                    <ul class="nav nav-tabs" role="tablist">
                        @forelse ($measurements as $key => $measurement)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  btn-tab {{ $key == 0 ? 'active' : '' }}"
                                    id="detail-thickness-{{$key}}-tab" data-bs-toggle="tab"
                                    data-bs-target="#detail-thickness-{{$key}}" type="button" role="tab"
                                    aria-controls="detail-thickness-0"
                                    aria-selected="true">{{ convert_price(number_format($measurement->thickness)) }}</button>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                    
                    <div class="tab-content">
                        <p class="type">{{ __('message.product.price') }}</p>
                        @forelse ($measurements as $key => $measurement)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="detail-thickness-{{$key}}"
                                role="tabpanel" aria-labelledby="detail-thickness-{{$key}}-tab">
                                <p class="price">{{ convert_price(number_format($measurement->price)) }} VND</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <a data-filter="documentation" href="#form-block" class="tab-filter btn btn-primary btn-detail has-brand-icon ">{{ __('message.product.support_contact') }}</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="grid-nav-section wow fadeInUp">
    <div class="wrapper">
        <div class="left-col has-cover-img"
            style="background-image: url('/frontEnd/wp-content/themes/zeit-theme-dev/images/frame-bg.png')">
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
<section class="info-detail-sec">
    <div class="container">
        <div class="swiper filter-tabs">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <button class="btn tab-filter current" data-filter="features">{{ __('message.product.features') }}</button>
                </div>
                <div class="swiper-slide">
                    <button class="btn tab-filter" data-filter="application">{{ __('message.product.product_identity') }}</button>
                </div>
                <div class="swiper-slide">
                    <button class="btn tab-filter" data-filter="documentation">{{ __('message.product.document_file') }}</button>
                </div>
            </div>
        </div>
        <span class="lines">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class="detail-list">
            <div class="detail-item" data-filter-type="features">
                <div class="rich-text">
                    {!! $data->content !!}
                </div>
            </div>
            <div class="detail-item" data-filter-type="application">
                <div class="rich-text">
                    <p><strong>IDENTITY MiTech BY FOLLOWING FEATURES:</strong></p>
                    <p>&nbsp;</p>
                    <p>Endtape design</p>
                    <p>&nbsp;</p>
                    <p><img class="alignnone size-full wp-image-1098"
                            src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/img/z3496713327960_40d0465bcda52181a119f868e8b9f7ed.jpg') }}"
                            alt="" width="846" height="413" /></p>
                    <p>&nbsp;</p>
                    <p>Surface having screw points</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
            <div class="detail-item" data-filter-type="certification">
                <div class="rich-text">
                </div>
            </div>
            <div class="detail-item" data-filter-type="technical">
                <div class="rich-text">
                </div>
            </div>
            <div class="detail-item" data-filter-type="documentation">
                <div class="document-form-sect">
                    <h3 class="heading-2 text-blue title">{{ __('message.product.download_file') }}</h3>
                    <div class="wrapper">
                        <div class="document-list">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('frontEnd/wp-content/uploads/2022/06/160622-BV-Tran-noi-1_413x310.jpg') }}"
                                        alt="">
                                </div>
                                <div class="content">
                                    <p class="category">Bản vẽ kỹ thuật</p>
                                    <h3 class="name heading-2">Trần nổi điển hình</h3>
                                    <p class="date mb-4 mt-2">16/06/2022</p>
                                    <p class="text-bold">Tải xuống</p>
                                    <div class="bottom-button">
                                        <a class="btn btn-grey"
                                            href="{{ asset('frontEnd/wp-content/uploads/2022/06/160622-BV-Tran-noi.pdf') }}"
                                            target="_blank" download="">PDF</a>
                                        <a class="btn btn-grey"
                                            href="https://drive.google.com/file/d/1e3DyDRzAW15hA1VtEn_-NS0TORvhsYVC/view?usp=sharing"
                                            target="_blank" download="">DWG</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('frontEnd/wp-content/uploads/2022/06/z3499066328410_3eefd8bcc6777ea2e934c08f60f39816.jpg') }}"
                                        alt="">
                                </div>
                                <div class="content">
                                    <p class="category">Brochure/Leaflet</p>
                                    <h3 class="name heading-2">Brochure MiTech</h3>
                                    <p class="date mb-4 mt-2">13/06/2022</p>
                                    <p class="text-bold">Tải xuống</p>
                                    <div class="bottom-button">
                                        <a class="btn btn-grey"
                                            href="{{ asset('frontEnd/wp-content/uploads/2022/06/220617_Zeit-Brochure-Vie.pdf') }}"
                                            target="_blank" download="">PDF | Vie</a>
                                        <a class="btn btn-grey"
                                            href="{{ asset('frontEnd/wp-content/uploads/2022/06/220617_Zeit-Brochure-Eng.pdf') }}"
                                            target="_blank" download="">PDF | Eng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-block" id="form-block">
                            <form action="#" class="contact-form" id="contact-form" novalidate="">
                                @csrf
                                <h6 class="top-text">{{ __('message.contact_us') }}</h6>
                                <p class="has-underline">{{ __('message.product.support_product') }}</p>
                                <div class="group-input">
                                    <div class="form-group full">
                                        <label>{{ __('message.product.type_of_product') }}</label>
                                        <select class="form-select mb-2" name="user-type" id="user-type" required="">
                                            <option value="owner" selected="">{{ __('message.product.home_owner') }}</option>
                                            <option value="architecture">{{ __('message.product.architecture') }}</option>
                                            <option value="installer">{{ __('message.product.installer') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group full">
                                        <label>{{ __('message.where_to_buy.modal.full_name') }}</label>
                                        <input type="text" id="name" placeholder="{{ __('message.product.name_contact') }}" name="name"
                                            class="form-control" required="">
                                        <input type="hidden" id="form_type" value="retailers">
                                        <span class="error">{{ __('message.where_to_buy.modal.enter_full_name') }}</span>
                                    </div>
                                    <div class="form-group full">
                                        <label>Email</label>
                                        <input type="email" id="email" placeholder="Email" name="email"
                                            class="form-control">
                                    </div>
                                    <div class="form-group full">
                                        <label>{{ __('message.where_to_buy.modal.phone_number') }}</label>
                                        <input type="tel" id="phone" name="phone" placeholder="{{ __('message.where_to_buy.modal.phone_number') }}"
                                            class="form-control" required="">
                                        <span class="error">{{ __('message.where_to_buy.modal.enter_phone_number') }}</span>
                                    </div>
                                    <div class="form-group full">
                                        <label>{{__('message.product.content_contact')}}</label>
                                        <textarea id="message" name="message" placeholder="{{__('message.product.content_contact')}}" rows="1"
                                            class="form-control" required=""></textarea>
                                        <span class="error">{{__('message.product.enter_content_contact')}}</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <button class="btn btn-white" type="submit">{{ __('message.product.request_assistance') }}</button>
                                </div>
                            </form>
                            <span class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-list-sect">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay=".3s"
            style="visibility: hidden; animation-delay: 0.3s; animation-name: none;">
            <p class="category">{{ __('message.product.interested') }}</p>
            <h3 class="heading-1 text-blue has-blue-underline">{{ __('message.product.related_products') }}</h3>
        </div>
        <div class="cards wow fadeInUp" data-wow-delay=".6s"
            style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
            @foreach($products as $key1 => $item)
               @if($product->first()->id != $item->id)
                  <div class="card">
                     <div class="inner">
                        <div class="main-info">
                              <div>
                                <p class="category">{{ $item->name_category }}</p>
                                <h3 class="product-title">{{ $item->name }}</h3>
                                @if(!empty($item->measurementProduct->first()->width))
                                <p class="type">{{ __('message.product.thickness') }} (mm)</p>
                                @else 
                                <p class="type">{{ __('message.product.weight') }} (kg)</p>
                                @endif
                                <p class="type">{{ __('message.product.thickness') }} (mm)</p>
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($item->measurementProduct as $key2 => $measurement)
                                        <li class="nav-item py-2" role="presentation">
                                            <button class="nav-link  btn-tab {{ $key2 == 0 ? 'active' : '' }}"
                                                id="detail-thickness-{{ $key1 }}-{{$key2}}-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail-thickness-{{ $key1 }}-{{$key2}}" type="button"
                                                role="tab" aria-controls="detail-thickness-0"
                                                aria-selected="true">{{ $measurement->thickness }}</button>
                                        </li>
                                    @endforeach
                                </ul>
                                 <div class="tab-content">
                                    <p class="type">{{ __('message.product.price') }}</p>
                                    @foreach ($item->measurementProduct as $key2 => $measurement)
                                        <div class="tab-pane fade {{ $key2 == 0 ? 'show active' : '' }}"
                                            id="detail-thickness-{{ $key1 }}-{{$key2}}" role="tabpanel"
                                            aria-labelledby="detail-thickness-{{ $key1 }}-{{$key2}}-tab">
                                            <p class="price">{{ convert_price(number_format($measurement->price)) }} VND</p>
                                        </div>
                                    @endforeach
                                 </div>
                              </div>
                              <div class="thumb has-hover-img">
                                 <img class="wow zômin" src="{{ asset('storage/assets/img/product/' . $item->avatar) }}"
                                    alt="#">
                              </div>
                        </div>
                        <a href="{{ get_link($slugs, [8, $item->slug]) }}"
                              class="btn btn-primary btn-detail has-brand-icon">{{ __('message.product.detail') }}</a>
                     </div>
                  </div>
               @endif
            @endforeach
        </div>
    </div>
</section>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
    <button type="button" class="ml-2 mb-1 close" data-bs-dismiss="toast" aria-label="Close">
        <span class="icon-close"></span>
    </button>
    <div class="toast-body">
        <p>{{ __('message.information') }}</p>
    </div>
</div>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product-detail/tpl-product-detail3781.js?ver=6.2.2') }}"
    id='single-js'></script>
@endsection