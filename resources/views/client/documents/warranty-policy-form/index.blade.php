@extends('client.layouts.master') 

@section('css-page')
<link rel='stylesheet' id='tpl-documents-form-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-documents-form/tpl-documents-form3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection 

@section('content')
<div class="success-message">
    <div class="wrapper">
        <i class="fas fa-check-circle"></i>
        <h4 class="title-message">Cám ơn bạn đã gửi thông tin</h4>
    </div>
</div>


<section class="product-list-sect">
    <div class="container">
        <div class="product-list-filters">
            <div class="top-right-filter">
                <nav style="--bs-breadcrumb-divider: '\e900';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ get_link($slugs, [4]) }}">{{ __('message.resources') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('message.registration-form') }}</li>
                    </ol>
                </nav>
                <div class="top-banner has-cover-img " style="background-image: url('{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/list-banner.png') }}')">
                    <h3 class="display-1 text-blue wow fadeInUp" data-wow-delay=".3s">{{ __('message.registration-form') }}</h3>
                </div>
            </div>
        </div>

        <div class="wrapper-form wow fadeInUp" data-wow-delay=".6s">
            <div class="content">
                <p class="small-heading">{{ __('message.registration-form') }}</p>
                <h3 class="display-1 text-blue">{{ $menus[3]->children[8]->menuTransateDefault->first()->menu_name }}</h3>
            </div>

            <form id="form-csbh" class="form-csbh" action="#">
                <div class="group-input">
                    <div class="input-item">
                        <input class="form-control" type="text" name="first_name" placeholder="Họ*" required>
                    </div>
                    <div class="input-item">
                        <input class="form-control" type="text" name="last_name" placeholder="Tên*" required>
                    </div>
                </div>
                <div class="group-input">
                    <div class="input-item">
                        <input class="form-control" type="email" name="email_address" placeholder="Email*" required>
                    </div>
                    <div class="input-item">
                        <input class="form-control" type="tel" name="phone_number" placeholder="Số điện thoại*" required>
                    </div>
                </div>
                <div class="group-input full-width">
                    <div class="input-item">
                        <input class="form-control" type="text" name="time" placeholder="Thời gian (Ngày/Tháng/Năm)">
                    </div>
                </div>
                <div class="group-input full-width">
                    <div class="input-item">
                        <input class="form-control" type="text" name="address" placeholder="Địa chỉ công trình:">
                    </div>
                </div>
                <button class="btn btn-primary btn-detail has-brand-icon" type="submit">Gửi thông tin</button>
            </form>
        </div>
    </div>
</section>
@endsection
 
@section('js-page')
<script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-documents-form/tpl-documents-form3781.js?ver=6.2.2') }}" id='tpl-documents-form-js'></script>
@endsection