@extends('client.layouts.master')

@section('css-page')
   <link rel='stylesheet' id='tpl-contact-us-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-contact-us/tpl-contact-us3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection

@section('content')
<section class="about-us-intro has-cover-img" style="background-image: url('{{ asset('frontEnd/wp-content/uploads/2022/07/z3533251582243_5997f323484ae3df7ca281ba2f0804ce.jpg') }}')">
   <div class="container">
      <div class="top wow fadeInUp" data-wow-delay=".3s">
         <h6 class="category mb-2 text-navi">{{ __('message.contact_infor') }}</h6>
         <h3 class="display-2 text-blue">{{ __('message.zeit_gypsum') }}</h3>
      </div>
      <div class="info wow fadeInUp" data-wow-delay=".6s">
            <div class="item">
               <p class="text-blue">{{ __('message.address_2') }}</p>
               <p>{!! $trans['address_textarea'] ?? '' !!}</p>
            </div>
            <div class="item">
               <p class="text-blue">{{ __('message.factory') }}</p>
               <p>{{ $trans['address_textarea_2'] ?? '' }}</p>
            </div>
            <div class="item">
               <p class="text-blue">{{ __('message.email') }}</p>
               <p>{{ $trans['email'] ?? '' }}</p>
            </div>
            <div class="item">
               <p class="text-blue">{{ __('message.phone_number') }}</p>
               <p><a href="tel:{{ $trans['phone_number'] ?? '' }}">{{ $trans['phone_number'] ?? '' }}</a></p>
            </div>
            <div class="item">
               <p class="text-blue">{{ __('message.social') }}</p>
               <ul class="social-media-icons">
                  <li class="icon"><a href="{{ isset($trans['social_1']) ? $trans['social_1'] : '#' }}">
                     <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/Facebook.svg') }}" alt="">
                     </a>
                  </li>
                  <li class="icon"><a href="{{ isset($trans['social_2']) ? $trans['social_2'] : '#' }}">
                     <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/youtube.svg') }}" alt="">
                     </a>
                  </li>
                  <li class="icon"><a href="#">
                     <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/linkedin.svg') }}" alt="">
                     </a>
                  </li>
                  <li class="icon"><a href="{{ isset($trans['social_3']) ? $trans['social_3'] : '#' }}">
                     <img src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/Zalo.svg') }}" alt="">
                     </a>
                  </li>
               </ul>
            </div>
            <div class="bottom">
               <p class="text-navi"></p>
               <p></p>
            </div>
         </div>
      </div>
   </section>
   <section class="form-sect">
      <div class="container">
         <p class="heading-2 wow fadeInUp" data-wow-delay=".3s">{{ __('message.contact_1') }} <span class='text-navi'>{{ __('message.zeit_gypsum') }}</span> <br/>{{ __('message.contact_2') }}</p>
         <form class="contact-form" id="contact-form" method="POST" novalidate style="display: block;">
         @csrf
         <div class="group-input">
            <div class="form-group full">
               <select type="select" class="form-control form-select" id="type" name="target" required>
                  <option value="" selected disabled>{{ __('message.i_am') }}</option>
                  <option value="Chủ nhà">{{ __('message.homeowner') }}</option>
                  <option value="Kiến trúc sư">{{ __('message.architect') }}</option>
                  <option value="Chủ đầu tư">{{ __('message.contractor') }}</option>
                  <option value="Nhà thầu / Nhà thi công">{{ __('message.installer') }}</option>
                  <option value="Cửa hàng đại lý">{{ __('message.retailer') }}</option>
                  <option value="Nhà phân phối">{{ __('message.distributor') }}</option>
               </select>
               <span class="error">{{ __('message.request') }}</span>
            </div>
            <div class="form-group full">
                  <input type="text" class="form-control name" placeholder="{{ __('message.full_name') }}" name="name">
                  <span class="error">{{ __('message.request_name') }}</span>
            </div>
            <div class="form-group full">
               <input type="text" class="form-control address" placeholder="{{ __('message.address_3') }}" name="address">
               <span class="error">{{ __('message.request_address') }}</span>
            </div>
            <div class="form-group">
               <input type="email" class="form-control email" placeholder="{{ __('message.email') }}" name="email">
               <span class="error">{{ __('message.request_email') }}</span>
            </div>
            <div class="form-group">
               <input type="tel" class="form-control tel" placeholder="{{ __('message.phone_number') }}" name="phone_number">
               <span class="error">{{ __('message.request_phone') }}</span>
            </div>
            <div class="form-group full">
               <select type="select" class="form-control form-select" id="type" name="reason" aria-label="Bạn cần trợ giúp thông tin gì?">
                  <option value="" selected disabled>{{ __('message.infor') }}</option>
                  <option value="Tư vấn sản phẩm">{{ __('message.product_consulting') }}</option>
                  <option value="Giải đáp kỹ thuật">{{ __('message.technical_advices') }}</option>
                  <option value="Góp ý - khiếu nại">{{ __('message.complaints') }}</option>
                  <option value="Khác">{{ __('message.others') }}</option>
               </select>
               <span class="error">{{ __('message.infor_contact') }}</span>
            </div>
            <div class="form-group full">
               <textarea type="textarea" class="form-control message" id="message" name="message" placeholder="{{ __('message.content_contact') }}" rows="3"></textarea>
               <span class="error">{{ __('message.request_message') }}</span>
            </div>
         </div>
         <div class="bottom">
            <a href="javascript:void(0)">
               <button class="btn btn-primary has-brand-icon send_contact" type="submit">
                  <span class="text" style="color: #fff">{{ __('message.send') }}</span>
               </button>
            </a>
         </div>
      </form>
      </div>
   </section>
   <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
      <button type="button" class="ml-2 mb-1 close" data-bs-dismiss="toast" aria-label="Close">
      <span class="icon-close"></span>
      </button>
      <div class="toast-body" style="color: #fff">
         <p>{{ __('message.information') }}</p>
      </div>
   </div>
   <section class="grid-nav-section wow fadeInUp">
      <div class="wrapper">
         <div class="left-col has-cover-img" style="background-image: url('/frontEnd/wp-content/themes/zeit-theme-dev/images/frame-bg.png')">
            <h5 class="heading-1">{{ __('message.zeit_gypsum_resources') }}</h5>
         </div>
         <div class="right-col">
            <div class="item">
               <h6 class="name">{{ __('message.material') }} <span class="icon-calculator"></span></h6>
               <div class="desc">
                  <p>{{ __('message.help') }}</p>
               </div>
               <a class="click-me-btn" href="{{ get_link($slugs, [4, 12]) }}">
                  <span class="text text-navi"></span>
                  <span class="lines">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
               </a>
            </div>
            <div class="item">
               <h6 class="name">{{ __('message.buy') }} <span class="icon-store"></span></h6>
               <div class="desc">
                  <p>{{ __('message.distri') }}</p>
               </div>
               <a class="click-me-btn" href="{{ get_link($slugs, 5) }}">
                  <span class="text text-navi"></span>
                  <span class="lines">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
               </a>
            </div>
            <div class="item">
               <h6 class="name">{{ __('message.about') }} <span class="icon-information"></span></h6>
               <div class="desc">
                  <p>{{ __('message.introduce') }} </p>
               </div>
               <a class="click-me-btn" href="{{ get_link($slugs, 2) }}">
                  <span class="text text-navi"></span>
                  <span class="lines">
                     <span class="line"></span>
                     <span class="line"></span>
                     <span class="line"></span>
                  </span>
               </a>
            </div>
         </div>
      </div>
   </section>
@endsection 

@section('js-page')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-contact-us/tpl-contact-us3781.js?ver=6.2.2') }}" id='tpl-contact-us-js'></script>
@endsection