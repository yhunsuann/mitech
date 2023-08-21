@extends('client.layouts.master')

@section('css-page')
<link rel='stylesheet' id='tpl-tai-lieu-css'
    href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-tai-lieu/tpl-tai-lieu3781.css?ver=6.2.2') }}"
    type='text/css' media='all' />
@endsection @section('content')
    <section class="search-sect has-cover-img"
        style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/wave.png') }}')">
        <div class="container wow fadeInUp" data-wow-delay=".3s">
            <div class="content">
                <p class="category mb-2">{{ __('message.resource.share_document') }}ac</p>
                <h2 class="display-2">{{ __('message.resource.title_page') }}</h2>
                <div class="desc mt-3">
                </div>
            </div>
            <div class="search-outer">
                <p>{{ __('message.resource.looking_for') }}</p>
                <div class="search-wrapper">
                    <form action="" id="quickSearch" class="searchForm">
                        <span class="icon-search text-blue"></span>
                        <input type="text" class="search-input" name="search"
                            placeholder="{{ __('message.resource.placeholder_search') }}" value="{{ request()->search }}">
                        <button type="submit" class="btn"><span class="icon icon-right-arrow"></span></button>
                    </form>
                </div>
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
                                    <h6 class="name">{{ $child->menuTransateDefault->first()->menu_name }} {!! $child->icon !!}</h6>
                                    <div class="desc">
                                        <p>{{ $child->menuTransateDefault->first()->description }}</p>
                                    </div>
                                </a>
                            @endif
                        @empty
                        <div>No data...</div>
                        @endforelse
                    @endif
                @empty
                <div>No data...</div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="faq-sect">
        <div class="container">
            <h3 class="heading-1 text-blue wow fadeInUp" data-wow-delay=".3s">{{ __('message.faq_title') }}</h3>
            <div class="accordion accordion-flush wow fadeInUp" data-wow-delay=".6s" id="accordionAboutUs">
                @if(!empty($faqs) && count($faqs))
                    @foreach ($faqs->first() as $key => $topic)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="collapse-0-accordion">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-0" aria-expanded="true"
                                    aria-controls="collapse-0">{{  $topic->question }}</button>
                            </h2>
                            <div id="collapse-0" class="accordion-collapse collapse" aria-labelledby="collapse-0-accordion">
                                <div class="accordion-body">{{ $topic->answer}}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

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
    <section class="list-sect">
        <div class="container">
            <div class="top wow fadeInUp" data-wow-delay=".3s">
                <p class="category">{{ __('message.resource.category') }}</p>
                <h3 class="heading-1 text-blue has-blue-underline">{{ __('message.resource.warranty_information') }}</h3>
                <a href="{{ get_link($slugs, [4, 10]) }}" class="click-me-btn">
                    <span class="text">{{ __('message.resource.view_more') }}</span>
                    <span class="lines">
                        <span></span><span></span><span></span>
                    </span>
                </a>
            </div>
            <div class="news-list type-2">
                @foreach ($replacements as $key => $replacement)
                <div class="news-item">
                    <div class="inner">
                        <div class="thumb has-hover-img">
                            @if(!empty($replacement->avatar))
                                <img src="{{ asset('storage/assets/img/replacement/' . $replacement->avatar) }}" alt="#">
                            @else
                                <img src="{{ asset('coreUi/assets/img/404.png') }}" alt="#">
                            @endif 
                        </div>
                        <h2 class="heading-3 name"><a
                                href="{{ get_link($slugs, [4, 10, $replacement->slug]) }}">{{ $replacement->title }}</a>
                        </h2>
                        <div class="desc">
                            <p>{{ $replacement->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="list-sect">
        <div class="container">
            <div class="top wow fadeInUp" data-wow-delay=".3s">
                <p class="category">{{ __('message.resource.category') }}</p>
                <h3 class="heading-1 text-blue has-blue-underline">{{ __('message.resource.ceilings-library') }}</h3>
                <a href="{{ get_link($slugs, [4, 13]) }}" class="click-me-btn">
                    <span class="text">{{ __('message.resource.view_more') }}</span>
                    <span class="lines">
                        <span></span><span></span><span></span>
                    </span>
                </a>
            </div>
            <div class="library-list">
                @foreach($libraries as $key => $library)
                    <a class="item" href="{{ get_link($slugs, [4, 13, $library->slug]) }}">
                        <div class="thumb has-hover-img">
                            @if(!empty($library->avatar))
                                <img class="wow zoomIn" data-wow-delay="0.6s"
                                src="{{ asset('storage/assets/img/library/' . $library->avatar)}}" alt="#">
                            @else
                                <img class="wow zoomIn" data-wow-delay="0.6s"
                                src="{{ asset('coreUi/assets/img/404.png') }}" alt="#">
                            @endif 
                        </div>
                        <h4 class="title">{{ $library->name }}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="list-sect">
        <div class="container">
            <div class="top wow fadeInUp" data-wow-delay=".3s">
                <p class="category">{{ __('message.resource.category') }}</p>
                <h3 class="heading-1 text-blue has-blue-underline">{{ __('message.download-document') }}</h3>
                <a href="{{ get_link($slugs, [4, 11]) }}" class="click-me-btn">
                    <span class="text">{{ __('message.resource.view_more') }}</span>
                    <span class="lines">
                        <span></span><span></span><span></span>
                    </span>
                </a>
            </div>
            <div class="document-swiper-container">
                <div class="document-list swiper-wrapper">
                    @foreach ($documents as $key => $document)
                        <div class="item swiper-slide">
                            <div class="thumb has-hover-img">
                            @if(!empty($library->avatar))
                                <img class="wow zoomIn" src="{{ asset('storage/assets/img/document/' . $document->avatar) }}"
                                    alt="Chứng nhận ISO">
                            @else
                            <img class="wow zoomIn" src="{{ asset('coreUi/assets/img/404.png') }}"
                                    alt="Chứng nhận ISO">
                            @endif 
                            </div>
                            <div class="content">
                                <p class="category">Chứng nhận, chứng chỉ</p>
                                <h3 class="name heading-2">{{ $document->name }}</h3>
                                <p class="date mb-4 mt-2">{{ $document->create_at }}</p>
                                <p class="text-bold">{{ __('message.download-document') }}</p>
                                <div class="bottom-button">
                                    <a class="btn btn-grey"
                                        href="{{ asset('frontEnd/wp-content/uploads/2022/05/FM-768700.pdf') }}" target="_blank"
                                        download>PDF</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="swiper-pagination"></div>
                </div>
                <div class="tables">
                    @foreach ($documents as $key => $document)
                        <ul class="responsive-table">
                            <li class="table-row">
                                <div class="col t-col-1 text-black-4">
                                    <p class="name">{{ $document->name }}</p>
                                </div>
                                <div class="col t-col-4">
                                    <a class="btn btn-download text-uppercase"
                                        href="{{ asset('storage/assets/file/document/' . $document->file) }}" target="_blank"
                                        download>{{ pathinfo($document->file, PATHINFO_EXTENSION) }}</a>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="list-sect">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay=".3s">
            <p class="category">{{ __('message.resource.category') }}</p>
            <h3 class="heading-1 text-blue has-blue-underline">{{ __('message.resource.ceilings-library') }}</h3>
            <a href="{{ get_link($slugs, [4, 13]) }}" class="click-me-btn">
                <span class="text">{{ __('message.resource.view_more') }}</span>
                <span class="lines">
                    <span></span><span></span><span></span>
                </span>
            </a>
        </div>
        <div class="library-list">
            @forelse($libraries as $key => $library)
            <a class="item" href="{{ get_link($slugs, [4, 13, $library->slug]) }}">
                <div class="thumb has-hover-img">
                    @if(!empty($library->avatar))
                        <img class="wow zoomIn" data-wow-delay="0.6s"
                        src="{{ asset('storage/assets/img/library/' . $library->avatar)}}" alt="#">
                    @else
                        <img class="wow zoomIn" data-wow-delay="0.6s"
                        src="{{ asset('coreUi/assets/img/404.png') }}" alt="#">
                    @endif 
                </div>
                <h4 class="title">{{ $library->name }}</h4>
            </a>
            @empty
            <div></div>
            @endforelse
        </div>
    </div>
</section>

<section class="list-sect">
    <div class="container">
        <div class="top wow fadeInUp" data-wow-delay=".3s">
            <p class="category">{{ __('message.resource.category') }}</p>
            <h3 class="heading-1 text-blue has-blue-underline">{{ __('message.download-document') }}</h3>
            <a href="{{ get_link($slugs, [4, 11]) }}" class="click-me-btn">
                <span class="text">{{ __('message.resource.view_more') }}</span>
                <span class="lines">
                    <span></span><span></span><span></span>
                </span>
            </a>
        </div>
        <div class="document-swiper-container">
            <div class="document-list swiper-wrapper">
                @forelse ($documents as $key => $document)
                <div class="item swiper-slide">
                    <div class="thumb has-hover-img">
                    @if(!empty($library->avatar))
                        <img class="wow zoomIn" src="{{ asset('storage/assets/img/document/' . $document->avatar) }}"
                            alt="Chứng nhận ISO">
                    @else
                    <img class="wow zoomIn" src="{{ asset('coreUi/assets/img/404.png') }}"
                            alt="Chứng nhận ISO">
                    @endif 
                    </div>
                    <div class="content">
                        <p class="category">Chứng nhận, chứng chỉ</p>
                        <h3 class="name heading-2">{{ $document->name }}</h3>
                        <p class="date mb-4 mt-2">{{ $document->create_at }}</p>
                        <p class="text-bold">{{ __('message.download-document') }}</p>
                        <div class="bottom-button">
                            <a class="btn btn-grey"
                                href="{{ asset('frontEnd/wp-content/uploads/2022/05/FM-768700.pdf') }}" target="_blank"
                                download>PDF</a>
                        </div>
                    </div>
                </div>
                @empty
                <div>No data...</div>
                @endforelse
                <div class="swiper-pagination"></div>
            </div>
            <div class="tables">
                @forelse ($documents as $key => $document)
                <ul class="responsive-table">
                    <li class="table-row">
                        <div class="col t-col-1 text-black-4">
                            <p class="name">{{ $document->name }}</p>
                        </div>
                        <div class="col t-col-4">
                            <a class="btn btn-download text-uppercase"
                                href="{{ asset('storage/assets/file/document/' . $document->file) }}" target="_blank"
                                download>{{ pathinfo($document->file, PATHINFO_EXTENSION) }}</a>
                        </div>
                    </li>
                </ul>
                @empty
                <div>No data...</div>
                @endforelse
            </div>
        </div>
</section>
@endsection

@section('js-page')
<script type='text/javascript'
    src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-tai-lieu/tpl-tai-lieu3781.js?ver=6.2.2') }}"
    id='tpl-tai-lieu-js'></script>
@endsection