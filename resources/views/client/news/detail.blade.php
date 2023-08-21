@extends('client.layouts.master')

@section('css-page')
   <link rel='stylesheet' id='single-css' href="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-news-detail/tpl-news-detail3781.css?ver=6.2.2') }}" type='text/css' media='all' />
@endsection

@section('content')
<div class="container wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
   <div class="main-title">
      <div class="left-col">
         <h6 class="category text-navi text-uppercase mb-3">{{ $new->name_category }}</h6>
         <p class="date">{{ $new->created_at->format('d/m/Y') }}</p>
      </div>
      <div class="right-col">
         <h2 class="heading-1 title">{{ $new->title }}</h2>
      </div>
   </div>
</div>
<span class="lines">
   <span></span>
   <span></span>
   <span></span>
</span>
<div class="container wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
<div class="main-content">
   <div class="socials-block">
      <p class="text text-bold mb-2">{{ __('message.share') }}:</p>
      <div class="socials">
         <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" target="_blank" rel="noopener noreferrer" class="social-item"><span class="icon-facebook"></span></a>
         <a href="#" target="_blank" rel="noopener noreferrer" class="social-item"><span class="icon-link"></span></a>
         <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->full() }}" target="_blank" rel="noopener noreferrer" class="social-item"><span class="icon-linkedin"></span></a>
      </div>
   </div>
   <div class="right-col">
      <div class="rich-text">
         {!! $new->content !!}
      </div>
   </div>
</div>
<section class="related-news-sect">
   <div class="container">
      <h4 class="heading-1 text-uppercase text-blue wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">{{ __('message.new.related_press') }}</h4>
      <div class="news-list wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
            @foreach ($articles as $key => $article)
               @if(empty($article->outstanding) && $article->id != $new->id  )
                  <div class="news-item d-block" data-filter-type="{{ str()->slug($article->name_category, '_') }}">
                        <div class="inner">
                           <h6 class="catgory text-blue">{{  $article->name_category }}</h6>
                           <h2 class="heading-2"><a href="{{ get_link($slugs, [6, $article->slug]) }}">{{ $article->title }}</a>
                           </h2>
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
@endsection 

@section('js-page')
   <script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/tpl-news-detail/tpl-news-detail3781.js?ver=6.2.2') }}" id='single-js'></script>
@endsection