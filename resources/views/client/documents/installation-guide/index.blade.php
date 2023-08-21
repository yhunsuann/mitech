@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-documents-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-documents/tpl-documents3781.css?ver=6.2.2') }}"
    type='text/css' media='all' />
@endsection 

@section('content')
<section class="product-list-sect">
    <div class="container">
        <div class="product-list-filters">
            @include('client.layouts.partials.filters')
            <div class="top-right-filter">
                <nav style="--bs-breadcrumb-divider: '\e900';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ get_link($slugs, 4) }}">
                                Tài liệu </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Hướng dẫn thi công</li>
                    </ol>
                </nav>
                <div class="top-banner has-cover-img "
                    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/list-banner.png') }}')">
                    <h3 class="display-1 text-blue wow fadeInUp" data-wow-delay=".3s">Hướng dẫn thi công</h3>
                </div>
            </div>
        </div>

        <div class="news-list type-2 wow fadeInUp" data-wow-delay=".6s">
            @forelse ($installation_guide as $key => $item)
                    <div class="news-item">
                        <div class="inner">
                            <div class="thumb has-hover-img">
                                @if(!empty($item->avatar))
                                <img src="{{ asset('storage/assets/img/installation-guide/' . $item->avatar) }}"
                                    alt="#">
                                @else
                                <img src="{{ asset('coreUi/assets/img/404.png') }}"
                                    alt="#">
                                @endif               
                            </div>
                            <h2 class="heading-3 name"><a
                                    href="{{ get_link($slugs, [4, 15, $item->slug]) }}">{{ $item->title }}</a></h2>
                            <div class="desc">
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-documents/tpl-documents3781.js?ver=6.2.2') }}"
    id='tpl-documents-js'></script>
@endsection