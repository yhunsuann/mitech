@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-home-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-home/tpl-home3781.css?ver=6.2.2') }}" type='text/css'
    media='all' />
@endsection

@section('content')
<section class="main-banner">
    <div class="swiper bannerSwiper">
        <div class="swiper-wrapper">
            @foreach($sliders as $key => $slider)
                <div class="swiper-slide">
                    <a href="{{ $slider->link }}" class="btn btn-default">
                        <div class="thumb">
                            <img src="{{ asset('storage/assets/img/slider/' . $slider->file) }}" alt="#">
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>
        <div class="nav-control">
            <div class="swiper-pagination"></div>
            <div class="swiper-counter"></div>
        </div>
    </div>
</section>
<section class="category-sect wow fadeInUp"
    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/cl-bg.svg') }}')">
    <div class="left-col">
        <div class="top">
            <div class="time-mode">
                <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/morning.png') }}" alt="morning">
                <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/noon.png') }}" alt="noon">
                <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/afternoon.png') }}"
                    alt="afternoon">
                <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/evening.png') }}" alt="evening">
            </div>
            <div class="content">
                <h3 class="heading-1 mb-3"></h3>
                <p></p>
            </div>
        </div>
        <div class="loti-container">
            <script src="{{ asset('frontEnd/unpkg.com/%40lottiefiles/lottie-player%402.0.2/dist/lottie-player.js') }}">
            </script>
            <div class="item current" data-filter="target-0">
                <lottie-player
                    src="{{ asset('frontEnd/wp-content/uploads/2022/06/Cong-nghe-han-quoc.mp4.lottie-1.json') }}"
                    background="transparent.html" speed="1" loop autoplay></lottie-player>
            </div>
            <div class="item " data-filter="target-1">
                <lottie-player
                    src="{{ asset('frontEnd/wp-content/uploads/2022/06/kich-thuoc-toi-uu.mp4.lottie.json') }}"
                    background="transparent.html" speed="1" loop autoplay></lottie-player>
            </div>
            <div class="item " data-filter="target-2">
                <lottie-player src="{{ asset('frontEnd/wp-content/uploads/2022/07/diem-ban-vit.mp4.lottie-1-2.json') }}"
                    background="transparent.html" speed="1" loop autoplay></lottie-player>
            </div>
        </div>
    </div>
    <div class="right-col">
        <div class="select-group">
            <p class="small-text mt-4">{{  __('message.home-select') }}</p>
            <select class="form-select mb-2" name="user-type" id="user-type">
                <option value="target-0" selected>{{  __('message.host') }}</option>
                <option value="target-1">{{  __('message.investor') }}</option>
                <option value="target-2">{{  __('message.contractor') }}</option>
            </select>
        </div>
        <div class="nav-list">
            <div class="item current" data-filter="target-0">
                <p class="stroke-number">01</p>
                <a class="click-me-btn" href="{{ get_link($slugs, [4, 10]) }}">
                    <span class="text">{{ $menus[3]->children[4]->menuTransateDefault->first()->menu_name }}</span>
                    <span class="lines">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                    <span class="description">{{ $menus[3]->children[4]->menuTransateDefault->first()->description }}</span>
                </a>
            </div>
            <div class="item current" data-filter="target-0">
                <p class="stroke-number">02</p>
                <a class="click-me-btn" href="{{ get_link($slugs, [4, 13]) }}">
                    <span class="text">{{ $menus[3]->children[5]->menuTransateDefault->first()->menu_name }}</span>
                    <span class="lines">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                    <span class="description">{{ $menus[3]->children[5]->menuTransateDefault->first()->description }}</span>
                </a>
            </div>
            <div class="item current" data-filter="target-0">
                <p class="stroke-number">03</p>
                <a class="click-me-btn" href="{{ get_link($slugs, [4, 12]) }}">
                    <span class="text">{{ $menus[3]->children[7]->menuTransateDefault->first()->menu_name }}</span>
                    <span class="lines">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                    <span class="description">{{ $menus[3]->children[7]->menuTransateDefault->first()->description }}</span>
                </a>
            </div>
            <div class="item current" data-filter="target-0">
                <p class="stroke-number">04</p>
                <a class="click-me-btn" href="{{ get_link($slugs, 5) }}">
                    <span class="text">{{ $menus[4]->menu_name }}</span>
                    <span class="lines">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                    <span class="description">{{ $menus[4]->description }}</span>
                </a>
            </div>
        </div>   
</section>

<section class="product-list-sect wow fadeInUp">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay="0.6s">
            <h6 class="category text-uppercase text-bold">{{ __('message.list_off') }}</h6>
            <h3 class="heading-1 text-uppercase text-blue has-blue-underline">{{ __('message.products') }}</h3>
        </div>
        <div class="product-list-filters wow fadeInUp" data-wow-delay="0.9s">
            <div class="filters">
                <div class="accordion" id="accordionFilter">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="filterListOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">{{ __('message.product_group') }}</button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="filterListOne"
                            data-bs-parent="#accordionFilter">
                            <div class="accordion-body">
                                @foreach ($categories as $category)
                                @php $str_ct = Str::slug($category->name) @endphp
                                <div class="form-group-checkbox">
                                    <input type="checkbox" id="{{ $str_ct }}" name="{{ $str_ct }}"
                                        value="{{ $category->id }}">
                                    <label for="{{ $str_ct }}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <button id="btn--reset-product"
                    class="btn brn-default btn-clear"><span>{{ __('message.reset_filter') }}</span></button><br>
                <a href="{{ get_link($slugs, [3, 8]) }}"
                    class="btn btn-secondary">{{ __('message.view_all_product') }}<span></span></a>
            </div>

            <div class="product-list">
                <div class="cards">
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
                                        @forelse ($product->measurementProduct as $key2 => $measurement)
                                        <li class="nav-item py-2" role="presentation">
                                            <button class="nav-link  btn-tab {{ $key2 == 0 ? 'active' : '' }}"
                                                id="detail-thickness-{{ $key1 }}-{{$key2}}-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail-thickness-{{ $key1 }}-{{$key2}}" type="button"
                                                role="tab" aria-controls="detail-thickness-0"
                                                aria-selected="true">{{ convert_price($measurement->thickness) }}</button>
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                    <div class="tab-content">
                                        <p class="type">{{ __('message.product.price') }}</p>
                                        @forelse ($product->measurementProduct as $key2 => $measurement)
                                        <div class="tab-pane fade {{ $key2 == 0 ? 'show active' : '' }}"
                                            id="detail-thickness-{{ $key1 }}-{{$key2}}" role="tabpanel"
                                            aria-labelledby="detail-thickness-{{ $key1 }}-{{$key2}}-tab">
                                            <p class="price">{{ convert_price(number_format($measurement->price)) }} VND</p>
                                        </div>
                                        @empty
                                        @endforelse
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
                            <a href="{{ get_link($slugs, [8,  $product->slug]) }}"
                                class="btn btn-primary btn-detail has-brand-icon">{{ __('message.product.detail') }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="ripple" id="prodLoading"></div>
            </div>
        </div>
    </div>
</section>
<!-- ước tính chi phí -->
<section class="estimation-sect has-cover-img"
    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/home-estimate-bg.jpg') }}')">
    <div class="container">
        <div class="wrapper wow fadeInUp" data-wow-delay="0.3s">
            <div class="wrapper-form">
                <div class="top">
                    <h6 class="category text-uppercase">{{ __('message.estimation_of') }}</h6>
                    <h3 class="heading-1 text-uppercase text-blue has-blue-underline">{{ __('message.material_cost') }}
                    </h3>
                </div>
                <form action="{{ get_link($slugs, [4, 12]) }}" class="estimate-form">
                    <div class="groups">
                        <p class="type">{{ __('message.est_type') }}</p>
                        <div class="inputs-group">
                            <div class="form-group-checkbox">
                                <input type="radio" id="estimate-bottom-ceil" name="est_opt" value="1" checked>
                                <label for="estimate-bottom-ceil">{{ __('message.concealed_ceiling') }}</label>
                            </div>
                            <div class="form-group-checkbox">
                                <input type="radio" id="estimate-top-ceil" name="est_opt" value="2">
                                <label for="estimate-top-ceil">{{ __('message.exposed_ceilling') }}</label>
                            </div>
                            <div class="form-group-checkbox">
                                <input type="radio" id="estimate-wall" name="est_opt" value="3">
                                <label for="estimate-wall">{{ __('message.drywall') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="groups">
                        <p class="type">{{ __('message.area_to_be_covered') }}</p>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn-tab" id="estimate-dimension-tab" data-bs-toggle="tab"
                                    data-bs-target="#estimate-dimension" type="button" role="tab"
                                    aria-controls="estimate-dimension"
                                    aria-selected="true">{{ __('message.by_length_width') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-tab" id="estimate-area-tab" data-bs-toggle="tab"
                                    data-bs-target="#estimate-area" type="button" role="tab"
                                    aria-controls="estimate-area"
                                    aria-selected="false">{{ __('message.by_square_meter') }}
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="estimate-dimension" role="tabpanel"
                                aria-labelledby="estimate-dimension-tab">
                                <div class="form-controls">
                                    <div class="control-item">
                                        <label for="estimate-length" class="type">{{ __('message.length') }}(m):</label>
                                        <input type="number" id="estimate-length" value="0" name="length">
                                    </div>
                                    <div class="control-item">
                                        <label for="estimate-width" class="type">{{ __('message.width') }}(m):</label>
                                        <input type="number" id="estimate-width" value="0" name="width">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="estimate-area" role="tabpanel"
                                aria-labelledby="estimate-area-tab">
                                <div class="form-controls">
                                    <div class="control-item">
                                        <label for="estimate-area-input"
                                            class="type">{{ __('message.square_meter') }}(m2):</label>
                                        <input type="number" id="estimate-area-input" value="0" name="area" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-primary btn-submit has-brand-icon"><span>{{ __('message.calculate') }}</span></button>
                </form>
            </div>

            <div class="content">
                <h3 class="heading">{!! __('message.estimate_material_costs') !!}</h3>
                <p class="para">{!! __('message.note_material_costs') !!}</p>
            </div>
        </div>
    </div>
</section>
<!-- ước tính chi phí -->
<section class="about-us-sect">
    <div class="container">
        <div class="awards">
        </div>
        <div class="wrapper">
            <div class="thumb has-hover-img">
                <img class="wow zoomIn" data-wow-delay=".3s"
                    src="{{ asset('frontEnd/wp-content/uploads/2023/06/Block-image-scaled.jpg') }}" alt="#">
            </div>
            <div class="content wow fadeInUp" data-wow-delay=".3s">
                <div class="bottom">
                    <h6 class="category">{{ $trans['about_1'] ?? '' }}</h6>
                    <h3 class="display-2 text-blue">{{ $trans['about_2'] ?? '' }}</h3>
                    <div class="desc">
                        <p>{{ $trans['about_3'] ?? '' }}</p>
                        <p>&nbsp;</p>
                        <p>{{ $trans['about_contact'] ?? '' }}</p>
                    </div>
                    <a class="click-me-btn" href="{{ $menus[1]->slug }}">
                        <span class="text text-navi">{{ __('message.find_out_more') }}</span>
                        <span class="lines">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news-sec">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay=".3s">
            <h6 class="category text-uppercase">{{  __('message.new.title') }}</h6>
            <h3 class="heading-1 text-uppercase text-blue has-blue-underline">{{  __('message.new.new') }}</h3>
        </div>
        <div class="news-list wow fadeInUp" data-wow-delay=".6s">
            @forelse ($articles as $key => $article)
                @if(empty($article->outstanding))
                    <a class="news-item current" href="{{ get_link($slugs, [6, $article->slug]) }}">
                        <div class="inner">
                            <h6 class="catgory text-blue">{{  $article->name_category }}</h6>
                            <h2 class="heading-2">{{  $article->title }}</h2>
                            <div class="desc">
                                <p>{{ $article->description }}[&hellip;]</p>
                            </div>
                            <p class="date">{{ $article->created_at }}</p>
                            <div class="thumb image-with-overlay">
                                @if(!empty($article->avatar))
                                    <img src="{{ asset('storage/assets/img/news/' .$article->avatar) }}" alt="#">
                                @else
                                    <img src="{{ asset('coreUi/assets/img/404.png') }}" alt="#">
                                @endif 
                            </div>
                        </div>
                    </a>
                @endif
            @empty
            <div>No data...</div>
            @endforelse
        </div>
    </div>
</section>

<section class="library-sec">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay=".3s">
            <h6 class="category text-uppercase">{{  __('message.resource.title') }} </h6>
            <h3 class="heading-1 text-uppercase text-blue has-blue-underline">{{  __('message.resource.heading') }}</h3>
        </div>
        <div class="library-list">
            <a class="item"
                href="{{ get_link($slugs, [4, 9]) }}">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay=".6s"
                        src="{{ asset('frontEnd/wp-content/uploads/2023/07/THONG-TIN-HO-TRO-KHACH-HANG_A.jpg') }}">
                </div>
                <h3 class="title text-blue text-uppercase">
                    {{ $menus[3]->children[0]->menuTransateDefault->first()->menu_name }}</h3>
                <span class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a class="item"
                href="{{ get_link($slugs, [4, 15]) }}">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay=".6s"
                        src="{{ asset('frontEnd/wp-content/uploads/2023/07/THONG-TIN-HO-TRO-KHACH-HANG_B.jpg') }}">
                </div>
                <h3 class="title text-blue text-uppercase">
                    {{ $menus[3]->children[2]->menuTransateDefault->first()->menu_name }}</h3>
                <span class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a class="item"
                href="{{ get_link($slugs, [4, 12]) }}">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay=".6s"
                        src="{{ asset('frontEnd/wp-content/uploads/2023/07/THONG-TIN-HO-TRO-KHACH-HANG_C-1.jpg') }}">
                </div>
                <h3 class="title text-blue text-uppercase">
                    {{ $menus[3]->children[7]->menuTransateDefault->first()->menu_name }}</h3>
                <span class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a class="item"
                href="{{ get_link($slugs, [4, 16]) }}">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay=".6s"
                        src="{{ asset('frontEnd/wp-content/uploads/2023/07/THONG-TIN-HO-TRO-KHACH-HANG_D-1.jpg') }}">
                </div>
                <h3 class="title text-blue text-uppercase">
                    {{ $menus[3]->children[3]->menuTransateDefault->first()->menu_name }}</h3>
                <span class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-home/tpl-home3781.js?ver=6.2.2') }}" id='tpl-home-js'>
</script>
@endsection