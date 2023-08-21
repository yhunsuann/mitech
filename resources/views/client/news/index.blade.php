@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-news-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-news/tpl-news3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection

@section('content')
<section class="top-news-sect">
    <div class="top has-cover-img"
        style="background-image: url('{{ asset('frontEnd/wp-content/uploads/2022/07/frame-bg.png') }}')">
        <h3 class="title text-uppercase text-bold wow fadeInUp" data-wow-delay="0.3s">{{ __('message.news') }}</h3>
        <div class="desc">
        </div>
    </div>
    @if(isset($outstanding))
    <div class="container wow fadeInUp" data-wow-delay="0.6s">
        <div class="top-news">
            <div class="content">
                <p class="date mb-1">{{ $outstanding->created_at->format('d/m/Y') }}</p>
                <p class="type text-uppercase text-blue">{{ $outstanding->name_category}}</p>
                <h3 class="heading-2 news-title">{{ $outstanding->title}}</h3>
                <div class="desc">
                    <p>{{ $outstanding->description}}</p>
                </div>
                <a href="{{ get_link($slugs, [6,  $outstanding->slug]) }}" class="btn btn-primary has-brand-icon">{{ __('message.new.see_detail') }}</a>
            </div>
            <div class="thumb">
                @if(!empty($outstanding->avatar))
                    <img src="{{ asset('storage/assets/img/news/' .$outstanding->avatar) }}">
                @else
                    <img class="wow zômin"
                        src="{{ asset('coreUi/assets/img/404.png') }}"
                        alt="#">
                @endif  
            </div>
        </div>
    </div>
    @endif
</section>
<section class="news-sec wow fadeInUp">
    <div class="container">
        <div class="swiper filter-tabs">
            <div class="swiper-wrapper">
               <div class="swiper-slide">
                    <button class="btn tab-filter current" data-filter="all">{{ __('message.new.all') }}</button>
               </div>
                @foreach($category as $key => $item)
                    <div class="swiper-slide">
                        <button class="btn tab-filter current"
                                data-filter="{{ str()->slug($item->name_category, '_') }}">{{  $item->name_category }}</button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="news-list">
            @foreach ($articles as $key => $article)
                @if(empty($article->outstanding))
                <div class="news-item" data-filter-type="{{ str()->slug($article->name_category, '_') }}">
                    <div class="inner">
                        <h6 class="catgory text-blue">{{  $article->name_category }}</h6>
                        <h2 class="heading-2"><a href="{{ get_link($slugs, [6, $article->slug]) }}">{{ $article->title }}</a></h2>
                        <div class="desc">
                            <p>{{ $article->description }}</p>
                        </div>
                        <p class="date">{{ $article->created_at }}</p>
                        <div class="thumb image-with-overlay">
                            @if(!empty($article->avatar))
                                <img src="{{ asset('storage/assets/img/news/' .$article->avatar) }}">
                            @else
                                <img class="wow zômin"
                                    src="{{ asset('coreUi/assets/img/404.png') }}"
                                    alt="#">
                            @endif  
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="recruitment-banner-sect wow fadeInUp">
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h4 class="title text-blue">{!! __('message.new.update_information') !!}</h4>
                <div class="desc">
                    <p>{!! __('message.new.description_information') !!}</p>
                </div>
                <form action="#" class="form-subscription" novalidate>  
                    <div class="form-group">
                        <input class="form-control" placeholder="{{ __('message.placeholder-input-detail') }}" type="email"
                            name="subscribtionEmail" id="subscribtionEmail" required>
                        <span class="error">{{ __('message.new.enter_email') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary has-brand-icon">{{ __('message.new.register') }}</button>
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
        <p>{{ __('message.information') }}</p>
    </div>
</div>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-news/tpl-news3781.js?ver=6.2.2') }}" id='tpl-news-js'>
</script>
@endsection