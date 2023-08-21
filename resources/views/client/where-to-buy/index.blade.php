@extends('client.layouts.master') 

@section('css-page')
   <link rel='stylesheet' id='tpl-kenh-phan-phoi-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-kenh-phan-phoi/tpl-kenh-phan-phoi3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection

@section('content')
    <main class="main wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
        <div class="top-filter">
            <div class="button-group-pills">
                <label class="btn btn-tab distributor-btn">
                    <input type="radio" class="btn-radio" name="category" value="Distributors">
                    <span>{{ __('message.distributor') }}</span>
                </label>
                <label class="btn btn-tab retailers-btn">
                    <input type="radio" class="btn-radio" name="category" value="Retailers" checked="checked">
                    <span>{{ __('message.retailers') }}</span>
                </label>
                <label class="btn btn-tab installers-btn">
                    <input type="radio" class="btn-radio" name="category" value="Installers">
                    <span>{{ __('message.installers') }}</span>
                </label>
            </div>
            <button type="button" class="btn btn-show-popup text-blue" data-bs-toggle="modal" data-bs-target="#joinModal">
                {{ __('message.join') }}<span class="lines mt-3"></span>
            </button>
        </div>
    <div class="list-map">
        <div class="left-list">
            <div class="dropdown">
                <div class="form-group">
                <select class="form-select" name="city" id="city">
                    <option value="" selected="">{{ __('message.province') }}</option>
                </select>
                </div>
                <div class="form-group">
                <select class="form-select" name="districts" id="district">
                    <option value="" selected="">{{ __('message.district') }}</option>
                </select>
                </div>
                <div class="form-group hide">
                <select class="form-select" name="region" id="region">
                    <option value="" selected="">Chọn Khu vực</option>
                </select>
                </div>
            </div>
            <div class="location-content">
                <p class="total-container"><span class="total-text"><span class="total">0</span>&nbsp;<span class="type">{{ __('message.retailers') }}</span></span> {{ __('message.in_viet_nam') }}</p>
                <div class="location-list" id="locationList">
                </div>
            </div>
            </div>
                <div class="map" id="map" style="position: relative; overflow: hidden;"></div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="icon-close"></span></button>
            <div class="modal-body">
                <div class="form-container">
                <h4 class="form-title">
                    <span class="text-blue text-uppercase text-bold">{{ __('message.where_to_buy.modal.join') }}</span> {{ __('message.where_to_buy.modal.with_us') }}</h4>
                <div class="desc">
                    <p>{!! __('message.where_to_buy.modal.description') !!}</p>
                </div>
                <p class="intro-text">{{ __('message.where_to_buy.modal.who_you_are') }}</p>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active btn-tab" id="distributor-f-tab" data-bs-toggle="tab" data-bs-target="#distributor-f" type="button" role="tab" aria-controls="distributor-f" aria-selected="true">{{ __('message.distributor') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link btn-tab" id="dealer-f-tab" data-bs-toggle="tab" data-bs-target="#dealer-f" type="button" role="tab" aria-controls="dealer-f" aria-selected="false">{{ __('message.retailers') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link btn-tab" id="installer-f-tab" data-bs-toggle="tab" data-bs-target="#installer-f" type="button" role="tab" aria-controls="installer-f" aria-selected="false">{{ __('message.installers') }}</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="distributor-f" role="tabpanel" aria-labelledby="distributor-f-tab">
                    <form action="" class="join-form" id="distributor-join-form" novalidate="">
                        @csrf
                        <div class="group-input">
                        <div class="form-group">
                            <input type="text" id="full_name" placeholder="{{ __('message.where_to_buy.modal.full_name') }}" name="full_name" class="form-control name" required="">
                            <input type="hidden" class="type_submit" name="type" value="distributors">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_full_name') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="distributor_phone" name="distributor_phone" placeholder="{{ __('message.where_to_buy.modal.phone_number') }}" class="form-control" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_phone_number') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="email_address" placeholder="{{ __('message.where_to_buy.modal.email') }}" name="email_address" class="form-control email" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_email') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="position" placeholder="{{ __('message.where_to_buy.modal.title') }}" name="position" class="form-control position" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_title') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="address_1" placeholder="{{ __('message.where_to_buy.modal.business_name') }}" name="address_1" class="form-control address" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_business_name') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="address_2" placeholder="{{ __('message.where_to_buy.modal.business_address') }}" name="address_2" class="form-control" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_business_address') }}</span>
                        </div>
                        </div>
                        <div class="bottom">
                        <a href="javascript:void(0)">
                        <button class="btn btn-primary" type="submit">{{ __('message.where_to_buy.modal.send_request') }}</button>
                        </a>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="dealer-f" role="tabpanel" aria-labelledby="dealer-f-tab">
                    <form action="" class="join-form" id="dealer-join-form" method="POST" novalidate="">
                        @csrf
                        <div class="group-input">
                        <div class="form-group">
                            <input type="text" id="full_name" placeholder="{{ __('message.where_to_buy.modal.full_name') }}" name="full_name" class="form-control" required="">
                            <input type="hidden" class="type_submit" name="type" value="retailers">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_full_name') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="distributor_phone" name="distributor_phone" placeholder="{{ __('message.where_to_buy.modal.phone_number') }}" class="form-control" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_phone_number') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="address_1" placeholder="{{ __('message.where_to_buy.modal.store_name') }}" name="address_1" class="form-control" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_store_name') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="address_2" placeholder="{{ __('message.where_to_buy.modal.store_address') }}" name="address_2" class="form-control" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_store_address') }}</span>
                        </div>
                        </div>
                        <div class="bottom">
                        <button class="btn btn-primary" type="submit">{{ __('message.where_to_buy.modal.send_request') }}</button>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="installer-f" role="tabpanel" aria-labelledby="installer-f-tab">
                    <form action="" class="join-form" id="installer-join-form" novalidate="">
                        @csrf
                        <div class="group-input">
                        <div class="form-group">
                            <input type="text" id="installer-name" placeholder="{{ __('message.where_to_buy.modal.full_name') }}" name="full_name" class="form-control" required="">
                            <input type="hidden" class="type_submit" name="type" value="installers">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_full_name') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="installer-phone" name="distributor_phone" placeholder="{{ __('message.where_to_buy.modal.phone_number') }}" class="form-control" required="">
                            <span class="error">{{ __('message.where_to_buy.modal.enter_store_address') }}</span>
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="city" id="city-f">
                            <option value="" selected="">{{ __('message.province') }}</option>
                            @foreach($provinces as $key => $provice)
                                <option value="{{ $provice['Name'] }}" data-id="{{ $provice['Id'] }}">{{ $provice['Name'] }}</option>
                            @endforeach
                            </select>
                            </div>
                        <div class="form-group">
                            <select class="form-select form-control" name="district" id="district-f">
                            <option value="" selected="">{{ __('message.district') }}</option>
                            </select>
                        </div>
                        </div>
                        <div class="bottom">
                        <button class="btn btn-primary" type="submit">{{ __('message.where_to_buy.modal.send_request') }}</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <button type="button" class="ml-2 mb-1 close" data-bs-dismiss="toast" aria-label="Close">
            <span class="icon-close"></span>
        </button>
        <div class="toast-body">
            <p>{{ __('message.information') }}</p>
        </div>
    </div>
    <script type="text/javascript">
        var data_url = "/where-to-buy/data";
        var distributors_url = "/where-to-buy/distributors";
   </script>
@endsection

@section('js-page')
   <script src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-kenh-phan-phoi/tpl-kenh-phan-phoi3781.js?ver=6.2.3') }}" async defer></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfPZhOobyQI9SCUhFCAxO7FaSBWIKTrRQ&language={{ app()->getLocale() }}"></script>
   <script>
    let locationData = @json($provinces);
    function loadDistrict() {
        var id =  $('#city-f')?.find(":selected")?.attr('data-id') || 0;
        const cityresult = locationData.filter(n => n.Id === id);
        
        for (const k of cityresult[0]?.Districts) {
          $('#district-f').append(new Option(k.Name, k.Name));
        }
    }

    $('#city-f').on('change', function () {
        $('#district-f').find('option').remove();
        loadDistrict();
    })
</script>
@endsection
