@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-thu-vien-thach-cao-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-thu-vien-thach-cao/tpl-thu-vien-thach-cao3781.css?ver=6.2.2') }}"
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
                            {{ __('message.resources') }} </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('message.resource.ceilings-library') }}</li>
                    </ol>
                </nav>
                <div class="top-banner has-cover-img "
                    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/list-banner.png') }}')">
                    <h3 class="display-1 text-blue wow fadeInUp" data-wow-delay="0.3s">{{ __('message.resource.ceilings-library') }}</h3>
                </div>
                <form action="#">
                    <div class="dropdown-group">
                        <select class="form-select" name="tech-1" id="tech-1">
                                <option value="opt-1-all">{{ __('message.style') }}</option>
                            @forelse($names as $key => $name)
                                <option value="{{ str()->slug($name->name, '_') }}">{{ $name->name }}</option>
                            @empty
                            <div></div>
                            @endforelse
                        </select>
                        <select class="form-select" name="tech-3" id="tech-3">
                            <option value="opt-2-all">{{ __('message.style') }}</option>
                            <option value="modern">{{ __('message.classic') }}</option>
                            <option value="classic">{{ __('message.modern') }}</option>
                        </select>
                    </div>
                </form>
                <div class="library-list">
                    @forelse($libraries as $key => $library)
                        <a class="item opt-1-all opt-1-46 opt-2-all opt-2-52 {{ str()->slug($library->name, '_') }} {{ $library->type }}"
                            href="{{ get_link($slugs, [4, 13, $library->slug]) }}">
                            <div class="thumb has-hover-img">
                                @if(!empty($library->avatar))
                                    <img class="wow zoomIn" data-wow-delay="0.6s"
                                        src="{{ asset('storage/assets/img/library/' . $library->avatar)}}" alt="#">
                                @else
                                <img class="wow zoomIn" src="{{ asset('coreUi/assets/img/404.png') }}"
                                        alt="Chứng nhận ISO">
                                @endif 
                            </div>
                            <h4 class="title">{{ $library->name }}</h4>
                        </a>
                    @empty
                        <div></div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-thu-vien-thach-cao/tpl-thu-vien-thach-cao3781.js') }}" id='tpl-thu-vien-thach-cao-js'></script>
@endsection