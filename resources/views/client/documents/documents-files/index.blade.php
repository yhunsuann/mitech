@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-download-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-download/tpl-download3781.css?ver=6.2.2') }}"
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
                        <li class="breadcrumb-item"><a href="{{ get_link($slugs, 4) }}">{{ __('message.resources') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('message.download-document') }}</li>
                    </ol>
                </nav>
                <div class="top-banner has-cover-img "
                    style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/list-banner.png') }}')">
                    <h3 class="display-1 text-blue wow fadeInUp" data-wow-delay="0.3s">{{ __('message.download-document') }}</h3>
                </div>

                <div class="dropdown-group">
                    <select class="form-select" name="tech-2" id="tech-2">
                            <option value="opt-all">{{ __('message.document-type') }}</option>
                        @forelse ($types as $key => $type)
                            <option value="{{ str()->slug($type->name, '_') }}">{{ $type->name }}</option>
                        @empty
                            <option value="">No option</option>
                        @endforelse
                    </select>
                    <div class="search-wrapper">
                        <form action="#" class="searchForm">
                            <span class="icon-search text-blue"></span>
                            <input type="text" name="search" value="" class="input-search" id="input-search">
                        </form>
                    </div>
                </div>

                <ul class="responsive-table" id="responsive-table">
                    <li class="table-header">
                        <div class="col t-col-1">{{ __('message.document-name') }}</div>
                        <div class="col t-col-2">{{ __('message.document-type') }}</div>
                        <div class="col t-col-3">{{ __('message.document-created') }}</div>
                        <div class="col t-col-3">{{ __('message.download-document') }}</div>
                    </li>
                    @forelse ($documents as $key => $document)
                    <li class="table-row opt-all {{ str()->slug($document->name, '_') }}">
                        <div class="col t-col-1 text-black-4">
                            <p class="name">{{ $document->name }}</p>
                        </div>
                        <div class="col t-col-2 text-black-4">{{ $document->type }}</div>
                        <div class="col t-col-3 text-black-1">{{ $document->created_at->format('d/m/Y') }}</div>
                        <div class="col t-col-3">
                            <a class="btn btn-download text-uppercase"
                                href="{{ asset('storage/assets/file/document/' . $document->file) }}" target="_blank"
                                download>{{ pathinfo($document->file, PATHINFO_EXTENSION) }}</a>
                        </div>
                    </li>  
                    @empty
                    <div> No have file</div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-download/tpl-download3781.js?ver=6.2.2') }}"
    id='tpl-download-js'></script>
@endsection