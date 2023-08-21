@extends('client.layouts.master') 

@section('css-page')
<link rel='stylesheet' id='single-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-document-detail/tpl-document-detail3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection 

@section('content')
<div class="success-message">
    <div class="wrapper">
        <i class="fas fa-check-circle"></i>
        <h4 class="title-message">Cám ơn bạn đã gửi thông tin</h4>
    </div>
</div>

<section class="top-news-sect">
    <div class="top has-cover-img" style="background-image: url('{{ asset('frontEnd/wp-content/uploads/2022/07/frame-bg.png') }}')">&nbsp;</div>
</section>

<div class="container wow fadeInUp" data-wow-delay=".3s">
    <div class="main-title">
        <div class="left-col">
        </div>
        <div class="right-col">
            <nav style="--bs-breadcrumb-divider: '\e900';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ get_link($slugs, 4) }}">
                            {{ __('message.resources') }}							</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ get_link($slugs, [4, 14]) }}">
                            {{ __('message.techincal-information') }}							</a>
                    </li>
                </ol>
            </nav>
            <h2 class="heading-1 title">{{ $installation_guide->first()->title }}</h2>
        </div>
    </div>
</div>
<span class="lines">
    <span></span>
<span></span>
<span></span>
</span>
<div class="container">
    <div class="main-content">
        <div class="socials-block">
            <p class="text text-bold mb-2">Chia sẻ:</p>
            <div class="socials">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" target="_blank" rel="noopener noreferrer" class="social-item"><span class="icon-facebook"></span></a>
                <a href="#" target="_blank" rel="noopener noreferrer" class="social-item"><span class="icon-link"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ URL::current() }}" target="_blank" rel="noopener noreferrer" class="social-item"><span class="icon-linkedin"></span></a>
            </div>
        </div>
        <div class="right-col">
            <div class="rich-text">
            {!! $installation_guide->first()->content !!}
        </div>

    </div>
</div>

<section class="recruitment-banner-sect wow fadeInUp">
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h4 class="title text-blue">{{ __('message.title-detail') }}<span class="text-bold text-uppercase">MiTech</span></h4>
                <div class="desc">
                    <p>{{ __('message.title-detail') }}</p>
                </div>
                <form action="#" class="form-subscription" novalidate>
                    <div class="form-group">
                        <input class="form-control" placeholder="{{ __('message.placeholder-input-detail') }}" type="email" name="subscribtionEmail" id="subscribtionEmail" required>
                        <span class="error">Xin hãy nhập email</span>
                    </div>
                    <button type="submit" class="btn btn-primary has-brand-icon">{{ __('message.btn-detail') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
    <button type="button" class="ml-2 mb-1 close" data-bs-dismiss="toast" aria-label="Close">
    <span class="icon-close"></span>
  </button>
    <div class="toast-body">
        <p>Thông tin của bạn đã được gửi đi</p>
    </div>
</div>
@endsection 

@section('js-page')
<script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-document-detail/tpl-document-detail3781.js?ver=6.2.2') }}" id='single-js'></script>
@endsection