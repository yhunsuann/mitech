@extends('client.layouts.master') 

@section('css-page')
   <link rel='stylesheet' id='single-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product-detail/tpl-product-detail3781.css?ver=6.2.2') }}" type='text/css' media='all' />
   <link rel='stylesheet' id='tpl-product-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product/tpl-product3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection

@section('content')
   <section class="top-banner has-cover-img" style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/product-list-bg.jpg') }}')">
      <div class="container">
         <div class="content wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
            <h3 class="display-1">{{ __('message.detect') }}<span class="text-blue"> {{ __('message.products_1') }}</span></h3>
            <div class="desc mt-4 mb-4">
               <p>{{ __('message.explore') }}</p>
            </div>
         </div>
      </div>
   </section>
   <section class="product-list-sect wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
      <div class="container">
         <div class="list-grid-mode">
            <a class="btn active" href="{{ get_link($slugs, [3, 8]) }}">{{ __('message.grid_product') }} <i class="fas fa-th"></i></a>
            <a class="btn " href="{{ get_link($slugs, [3, 8]) }}/?listview">{{ __('message.list_product') }} <i class="fas fa-list"></i></a>
         </div>
         <div class="product-list-filters">
            <div class="filters">
               <div class="accordion" id="accordionFilter">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="filterListOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{ __('message.product_group') }}</button>
                     </h2>
                     <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="filterListOne" data-bs-parent="#accordionFilter">
                        <div class="accordion-body">
                           @foreach ($categories as $category)
                              @php $str_ct = Str::slug($category->name) @endphp
                              <div class="form-group-checkbox">
                                 <input type="checkbox" id="{{ $str_ct }}" name="{{ $str_ct }}" value="{{ $category->id }}">
                                 <label for="{{ $str_ct }}">{{ $category->name }}</label>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <button id="btn--reset-product" class="btn brn-default btn-clear"><span>{{ __('message.reset_filter') }}</span></button><br>
               <a href="{{ get_link($slugs, [3, 8]) }}" class="btn btn-secondary"><span>{{ __('message.view_all_product') }}</span></a>
            </div>
            <div class="product-list">
               <div class="cards">
                  @foreach($products as $key1 => $product)
                     <div class="card">
                        <div class="inner">
                           <div class="main-info">
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
                                          <p class="price">{{ convert_price(number_format($measurement->price)) }} VND</p>
                                       </div>
                                    @endforeach 
                                 </div>
                                 <div class="thumb has-hover-img">
                                    @if(!empty($product->avatar))
                                       <img class="wow zômin animated" src="{{ asset('storage/assets/img/product/' . $product->avatar) }}" alt="" style="visibility: visible;">
                                    @else
                                       <img class="wow zômin animated" src="{{ asset('coreUi/assets/img/404.png') }}" alt="" style="visibility: visible;">
                                    @endif 
                                 </div>
                                 <a href="{{ get_link($slugs, [8, $product->slug]) }}" class="btn btn-primary btn-detail has-brand-icon">{{ __('message.product.detail') }}</a>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            <div class="ripple" id="prodLoading"></div>
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
   <script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-product/tpl-product3781.js?ver=6.2.2') }}" id='tpl-product-js'></script>
@endsection
