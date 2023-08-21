@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-faq-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-faq/tpl-faq3781.css?ver=6.2.2') }}" type='text/css'
    media='all' />
@endsection

@section('content')
<div class="top-banner has-cover-img"
    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/faq-img.png') }}')">
    <div class="container">
        <a href="{{ get_link($slugs, 4) }}" class="go-to-btn text-blue">
            <span class="icon-left-s"></span><span>{{ __('message.resources') }}</span>
        </a>
        <h3 class="display-1 text-blue wow fadeInUp" data-wow-delay="0.3s">{{ __('message.faq_title') }}</h3>
    </div>
</div>

<section class="main-content wow fadeInUp" data-wow-delay="0.6s">
    <div class="container wrapper">
        <div class="sidebar">
            <h6 class="title text-bold"> {{ __('message.topics') }}</h6>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="technical-tab" data-bs-toggle="tab" data-bs-target="#technical"
                        type="button" role="tab" aria-controls="technical" aria-selected="true">
                        {{ __('message.technical') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products"
                        type="button" role="tab" aria-controls="products" aria-selected="false">
                        {{ __('message.products') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="warranty-tab" data-bs-toggle="tab" data-bs-target="#warranty"
                        type="button" role="tab" aria-controls="warranty" aria-selected="false">
                        {{ __('message.warranty') }}</button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            @forelse ($faqs as $key => $topic)
            <div class="tab-pane fade {{ $key == 'technical' ? 'show active' : '' }} "  id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                <h3 class="heading-1 text-blue">{{ __('message.' . $key) }}</h3>
                <div class="accordion accordion-flush" id="accordion-1">
                    <div class="accordion-item">
                        @forelse ($topic as $faq)
                            <h2 class="accordion-header" id="collapse-1-accordion">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">{{ $faq->question }}</button>
                            </h2>
                            <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="collapse-1-accordion"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                {{ $faq->answer }}</div>
                            </div>
                        @empty    
                        <div>Nodata</div>
                        @endforelse   
                    </div>
                </div>
            </div>
            @empty
            <div>Nodata</div>
            @endforelse
        </div>
    </div>
</section>

<section class="cta-sect-2 wow fadeInUp">
    <div class="container">
        <div class="wrapper">
            <div class="thumb">
                <img src="#" alt="">
            </div>
            <h3 class="heading-2">{{ __('message.faq_heading-2') }}</h3>
            <div class="desc">
                <p>{{ __('message.faq_content-1') }}</p>
                </p>
                <p>{{ __('message.faq_content-2') }}</p>
            </div>
            <a href="{{ get_link($slugs, 7) }}" class="btn btn-primary has-brand-icon">
                <span>{{ __('message.btn-contac-us') }}</span>
            </a>
        </div>
    </div>
</section>
<section class="grid-nav-section wow fadeInUp">
    <div class="wrapper">
        <div class="left-col has-cover-img"
            style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/bg-1.png') }}')">
            <h5 class="heading-1">{{ __('message.faq_heading-1') }}</h5>
        </div>
        <div class="right-col">
            @forelse ($menus as $key => $menu)
                @if($menu->id == 4)
                    @forelse ($menu->children as $key => $child)
                        @if($child->is_menu == 0 || $child->is_menu == 3 )
                            <a href="{{ get_link($slugs, [$menu->id, $child->id]) }}" class="item">
                                <h6 class="name">{{ $child->menuTransateDefault->first()->menu_name }} {!! $child->icon  !!}</h6>
                                <div class="desc">
                                    <p>{{ $child->menuTransateDefault->first()->description }}</p>
                                </div>
                            </a>
                        @endif
                    @empty
                    <div>No data</div>
                    @endforelse
                @endif
            @empty
            <div>No data</div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-faq/tpl-faq3781.js?ver=6.2.2') }}" id='tpl-faq-js'>
</script>
@endsection