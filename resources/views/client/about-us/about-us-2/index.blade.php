@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-about-us-2-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-about-us-2/tpl-about-us-23781.css?ver=6.2.2') }}" type='text/css' media='all' /> @endsection @section('content')
<section class="top-banner has-cover-img">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay="0.3s">
            <p class="category text-uppercase mb-4">{{ $trans['category'] ?? '' }}</p>
            <h2 class="display-1">{{ $trans['display-1'] ?? '' }}</h2>
        </div>
        <div class="thumb-list wow fadeInUp" data-wow-delay="0.6s">
            <div class="item has-hover-img">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/04/banner-home-1-1-1.png') }}">
            </div>
            <div class="item has-hover-img">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/04/banner-home-1-1-2.png') }}">
            </div>
            <div class="item has-hover-img">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/04/banner-home-3-1.png') }}">
            </div>
            <div class="item has-hover-img">
                <img src="{{ asset('frontEnd/wp-content/uploads/2022/04/banner-home-3-2.png') }}">
            </div>
        </div>
    </div>
</section>

<section class="common-sect gs-bg-sect">
    <div class="wrapper">
        <div class="content wow fadeInUp" data-wow-delay="0.3s">
            <h6 class="category mb-2"></h6>
            <h3 class="display-2 text-uppercase text-blue">{{ $trans['display-2'] ?? '' }}</h3>
            <div class="desc">
                <p>&nbsp;</p>
                <p>{{ $trans['desc-1'] ?? '' }}<span class="Apple-converted-space"> </span></p>
                <p>&nbsp;</p>
                <h3 class="display-2 text-uppercase text-blue">{{ $trans['display-3'] ?? '' }}</h3>
                <p>{{ $trans['desc-2'] ?? '' }}</p>
                <p>{{ $trans['desc-3'] ?? '' }}</p>
            </div>
        </div>
        <div class="thumb">
            <img src="{{ asset('frontEnd/wp-content/uploads/2022/04/Frame-48096148.png') }}" alt="">
        </div>
    </div>
</section>

<section class="statistic-sect wow fadeInUp">
    <div class="container">
        <h4 class="heading-1 title wow fadeInUp" data-wow-delay="0.3s">{{ $trans['heading-1'] ?? '' }}</h4>
        <div class="statistic-numbers">
            <div class="item">
                <p class="stroke-number counter" data-count="53">0</p>
                <p class="type">{{ $trans['exp'] ?? '' }}</p>
            </div>
            <div class="item">
                <p class="stroke-number counter" data-count="30">0</p>
                <p class="type">{{ $trans['subsidiaries'] ?? '' }}</p>
            </div>
            <div class="item">
                <p class="stroke-number counter" data-count="191">0</p>
                <p class="type">{{ $trans['project'] ?? '' }}</p>
            </div>
            <div class="item">
                <p class="stroke-number counter" data-count="12">0</p>
                <p class="type">{{ $trans['prize'] ?? '' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="common-sect mission-sect">
    <div class="container">
        <div class="wrapper">
            <div class="content wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active btn-tab" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="true">{{ __('message.vision') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-tab" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab" aria-controls="mission" aria-selected="false">{{ __('message.mission') }}</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                        <h3 class="display-2 text-blue">{{ $trans['title-tab'] ?? '' }}</h3>
                        <div class="desc">
                        {!! $trans['desc-tab'] ?? '' !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                        <h3 class="display-2 text-blue">{{ $trans['title-tab-1'] ?? '' }}</h3>
                        <div class="desc">
                            {!! $trans['desc-tab-1'] ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="thumb has-hover-img">
                <img class="wow zoomIn" data-wow-delay="0.6s" src="{{ asset('frontEnd/wp-content/uploads/2022/04/Thu-Thiem-Zeit-River-6-1024x577-1.png') }}">
            </div>
        </div>
    </div>
</section>

<section class="common-sect vgsi-sect">
    <div class="container">
        <div class="wrapper">
            <div class="content wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="category mb-2">{{ __('message.introduce') }}</h6>
                <h3 class="display-2 text-uppercase text-blue">VGSI </h3>
                <div class="desc">
                {!! $trans['desc-introduce'] ?? '' !!}
                </div>
            </div>
            <div class="thumb has-hover-img">
                <img class="wow zoomIn" data-wow-delay="0.3s" src="{{ asset('frontEnd/wp-content/uploads/2022/05/70e74530f544351a6c55.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section class="library-sec">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay="0.3s">
            <h6 class="category text-uppercase">LĨNH VỰC KINH DOANH </h6>
            <h3 class="heading-1 text-uppercase text-blue has-blue-underline">VIETNAM GS INDUSTRY</h3>
        </div>

        <div class="library-list">
            <a class="item" href="">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay="0.6s" src="{{ asset('frontEnd/wp-content/uploads/2022/04/Frame-48095940.png') }}">
                </div>
                <h3 class="title text-blue text-uppercase">VGSI - ELEVATOR</h3>
                <span class="lines">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <a class="item" href="">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay="0.6s" src="{{ asset('frontEnd/wp-content/uploads/2022/04/Frame-48096150.png') }}">
                </div>
                <h3 class="title text-blue text-uppercase">VGSI - AL-FORM</h3>
                <span class="lines">
							<span></span>
                <span></span>
                <span></span>
                </span>
            </a>
            <a class="item" href="">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay="0.6s" src="{{ asset('frontEnd/wp-content/uploads/2022/04/Frame-48095942.png') }}">
                </div>
                <h3 class="title text-blue text-uppercase">VGSI - PILE</h3>
                <span class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a class="item" href="">
                <div class="thumb has-hover-img">
                    <img class="wow zoomIn" data-wow-delay="0.6s" src="{{ asset('frontEnd/wp-content/uploads/2022/04/Frame-48095945.png') }}">
                </div>
                <h3 class="title text-blue text-uppercase">VGSI - GYPSUM BOARD</h3>
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
<script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-about-us-2/tpl-about-us-23781.js?ver=6.2.2') }} " id='tpl-about-us-2-js'></script>
@endsection