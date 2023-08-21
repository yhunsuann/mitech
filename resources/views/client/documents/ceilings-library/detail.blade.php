@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-single-thu-vien-thach-cao-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-single-thu-vien-thach-cao/tpl-single-thu-vien-thach-cao3781.css?ver=6.2.2') }}"
    type='text/css' media='all' />
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '\e900';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ get_link($slugs, 4) }}">
                {{ __('message.resources') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ get_link($slugs, [4, 13]) }}">
                {{ __('message.resource.ceilings-library') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{  $library->first()->name }}</li>
        </ol>
    </nav>
</div>

<section class="photos-sect">
    <div class="container">
        <div class="top">
            <h2 class="heading-2 text-uppercase text-blue wow fadeInUp" data-wow-delay=".3s">{{  $library->first()->name }}</h2>
            <div class="desc mt-4">
            </div>
        </div>
        <div class="socials-block">
            <p class="text text-bold mb-2">{{ __('message.share') }}: </p>
            <div class="socials">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                    target="_blank" rel="noopener noreferrer" class="social-item"><span
                        class="icon-facebook"></span></a>
                <a href="#" target="_blank" rel="noopener noreferrer" class="social-item"><span
                        class="icon-link"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ URL::current() }}"
                    target="_blank" rel="noopener noreferrer" class="social-item"><span
                        class="icon-linkedin"></span></a>
            </div>
        </div>
        <div class="wrapper gallery-library">
        @php $images = json_decode($library->first()->images); @endphp
            @if(!empty($images))
                @foreach ($images as $key => $image)
                <a class="thumb has-hover-img" href="{{ asset('storage/assets/img/library/' . $image) }}">
                    <img class="wow zoomIn" data-wow-delay=".6s"
                        src="{{ asset('storage/assets/img/library/' . $image) }}" alt="#">
                </a>
                @endforeach
            @else
            <div>No images</div>
            @endif
        </div>
    </div>
</section>
<section class="related-lib-sect">
    <div class="container">
        <h3 class="heading-2 text-uppercase text-blue mb-5 wow fadeInUp" data-wow-delay=".3s">{{ __('message.identify-heading') }}</h3>
        <div class="library-list wow fadeInUp" data-wow-delay=".6s">
            @forelse($libraries as $key => $data)
                @if($data->id !=  $library->first()->id)
                    <a class="item" href="{{ get_link($slugs, [4, 13, $data->slug]) }}">
                        <div class="thumb">
                            @if(!empty($data->avatar))
                                <img 
                                    src="{{ asset('storage/assets/img/library/' . $data->avatar)}}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async"
                                    loading="lazy" />
                            @else
                                <img 
                                    src="{{ asset('coreUi/assets/img/404.png') }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async"
                                    loading="lazy" />
                            @endif 
                        </div>
                        <h4 class="title">{{ $data->name }}</h4>
                    </a>
                @endif
            @empty
                <div></div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-single-thu-vien-thach-cao/tpl-single-thu-vien-thach-cao3781.js?ver=6.2.2') }}"
    id='tpl-single-thu-vien-thach-cao-js'></script>
@endsection
