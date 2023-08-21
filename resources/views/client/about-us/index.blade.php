@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-about-us-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-about-us/tpl-about-us3781.css?ver=6.2.2') }}"
    type='text/css' media='all' />
@endsection

@section('content')
<main class="main">
    <section class="common-sect">
        <div class="container">
            <div class="wrapper">
                <div class="content wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="category text-uppercase mb-2">{{ __('message.about_us_title') }}</h6>
                    <h3 class="heading-1 text-uppercase text-blue">{{ $aboutUs->mitect_title ?? '' }}</h3>
                    <div class="desc">
                        <p>{!! nl2br($aboutUs->mitect_content) ?? '' !!}</p>
                    </div>
                    <a class="click-me-btn" href="{{ get_link($slugs, 7) }}">
                        <span class="text text-navi">{{ __('message.about_contact')}}</span>
                        <span class="lines">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </span>
                    </a>
                </div>
                @if (!empty($aboutUs->mitect_file))
                    <div class="thumb has-underground">
                        <img class="wow zoomIn" data-wow-delay="0.6s" src="{{ asset('storage/assets/img/about/' . $aboutUs->mitect_file) }}">
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="common-sect has-gradient-overlap wow fadeInUp">
        <div class="wrapper">
            <div class="content wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="category text-uppercase mb-2">{{ __('message.about_us_vgsi') }}</h6>
                <h3 class="heading-1 text-blue mb-4">{{ $aboutUs->vgsi_title ?? '' }}</h3>
            </div>
            @if ($aboutUs->vgsi_file)
                <div class="thumb">
                    <img src="{{ asset('storage/assets/img/about/' . $aboutUs->vgsi_file) }}">
                </div>
            @endif
        </div>
    </section>

    <section class="intro-section wow fadeInUp">
        @if ($aboutUs->about_file)
            <div class="thumb">
                <img class="" src="{{ asset('storage/assets/img/about/' . $aboutUs->about_file) }}">
            </div>
        @endif
        <div class="content wow fadeInUp" data-wow-delay="0.6s">
            <div class="item">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/05/icon-web-03.png') }}" alt="">
                <div class="desc">{{ $aboutUs->content_about_1 ?? '' }} </div>
            </div>
            <div class="item">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/05/icon-web-02.png') }}" alt="">
                <div class="desc">{{ $aboutUs->content_about_2 ?? '' }} </div>
            </div>
            <div class="item">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/05/icon-web-01.png') }}" alt="">
                <div class="desc">{{ $aboutUs->content_about_3 ?? '' }} </div>
            </div>
        </div>
    </section>

    <section class="vision-sect">
        <div class="top wow fadeInUp" data-wow-delay="0.3s">
            <p class="category text-bold mb-4">{{ __('message.vision') }}</p>
            <h3 class="heading-1 title">{{ $aboutUs->vision_title ?? '' }}</h3>
            <div class="desc">
                <p>{!! nl2br($aboutUs->vision_content) ?? '' !!}</p>
            </div>
        </div>

        @if ($aboutUs->vision_file)
            <div class="bottom-thumb container">
                <img class="wow zoomIn" data-wow-delay="0.6s"
                    src="{{ asset('storage/assets/img/about/' . $aboutUs->vision_file) }}">
            </div>
        @endif
        <div class="wrapper">
            <div class="container">
                @if ($aboutUs->mission_file)
                    <div class="thumb has-hover-img">
                        <img class="wow zoomIn" data-wow-delay="0.3s"
                            src="{{ asset('frontEnd/wp-content/uploads/2023/07/nha-may-522x698-ne-01a-1.jpg') }}">
                    </div>
                @endif
                <div class="content wow fadeInUp" data-wow-delay="0.6s">
                    <p class="category">{{ __('message.mission') }}</p>
                    <h3 class="heading-1">{{ $aboutUs->mission_title ?? '' }}</h3>
                    <div class="desc">
                        <p>{!! nl2br($aboutUs->mission_content) ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="memmber-sect">
        <div class="container">
            <div class="top wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="category text-bold mb-3"></h6>
                <h3 class="display-1 text-blue text-uppercase"></h3>
            </div>
            <div class="member-list wow fadeInUp" data-wow-delay="0.6s">
            </div>
        </div>
    </section>
</main>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-about-us/tpl-about-us3781.js?ver=6.2.2 ') }}"
    id='tpl-about-us-js '></script>
@endsection