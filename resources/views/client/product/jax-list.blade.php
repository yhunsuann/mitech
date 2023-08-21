@if (!empty($request->ref))
    <ul class="responsive-table tabler-header">
        <li class="table-header">
            <div class="col t-col-1">{{ __('message.product_description') }}</div>
            <div class="col t-col-2">{{ __('message.resource.category') }}</div>
            <div class="col t-col-3">{{ __('message.resource.specifications') }}</div>
            <div class="col t-col-4">{{ __('message.resource.price_unit') }}</div>
        </li>
    </ul>
    @foreach($products as $key => $product)
        <div class="card-item">
            <div class="main-info">
                <div class="top-content">
                    <p class="category">{{ $product->name_category }}</p>
                    <h3 class="product-title">{{ $product->name }}</h3>
                </div>
                <a href="{{ get_link($slugs, 2) }}/{{ $product->slug }}"
                    class="text-blue btn-detail">{{ __('message.product.detail') }} <span class="lines mt-2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>

            <ul class="responsive-table">
                @forelse ($product->measurementProduct as $key2 => $measurement)
                    <li class="table-row">
                        <div class="col t-col-1 text-black-4">
                            <p class="name">
                            {{ convert_price($measurement->thickness) }} ({{ $measurement->thickness_unit }}) </p>
                        </div>
                        <div class="col t-col-2 text-black-4">
                        </div>
                        <div class="col t-col-3 text-black-1">{{ $measurement->width }} x {{ $measurement->height }} x {{ $measurement->thickness }} ({{ $measurement->thickness_unit }})</div>
                        <div class="col t-col-4">{{ convert_price(number_format($measurement->price)) }} VND</div>
                    </li>
                @empty 
                @endforelse 
            </ul>
        </div>
    @endforeach
@else
    @foreach($products as $key1 => $product)
        <div class="card">
            <div class="inner">
                <div class="main-info">
                    <div>
                        <p class="category">{{ $product->name_category }}</p>
                        <h3 class="product-title">{{ $product->name }}</h3>
                        @if(!empty($product->measurementProduct->first()->width))
                            <p class="type">{{ __('message.product.thickness') }} (mm)</p>
                            @else 
                            <p class="type">{{ __('message.product.weight') }} (kg)</p>
                        @endif
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($product->measurementProduct as $key2 => $measurement)
                                <li class="nav-item py-2" role="presentation">
                                    <button class="nav-link  btn-tab {{ $key2 == 0 ? 'active' : '' }}" id="detail-thickness-{{ $key1 }}-{{$key2}}-tab" data-bs-toggle="tab" data-bs-target="#detail-thickness-{{ $key1 }}-{{$key2}}" type="button" role="tab" aria-controls="detail-thickness-0" aria-selected="true">{{ convert_price($measurement->thickness) }}</button>
                                </li>
                            @endforeach 
                        </ul>
                        <div class="tab-content">
                            <p class="type">{{ __('message.product.price') }}</p>
                            @foreach ($product->measurementProduct as $key2 => $measurement)
                                <div class="tab-pane fade {{ $key2 == 0 ? 'show active' : '' }}" id="detail-thickness-{{ $key1 }}-{{$key2}}" role="tabpanel" aria-labelledby="detail-thickness-{{ $key1 }}-{{$key2}}-tab">
                                    <p class="price">{{ convert_price(number_format($measurement->price)) }} VND</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="thumb has-hover-img">
                        @if(!empty($product->avatar))
                        <img class="wow zômin"
                            src="{{ asset('storage/assets/img/product/' . $product->avatar) }}"
                            alt="#">
                        @else
                        <img class="wow zômin"
                            src="{{ asset('coreUi/assets/img/404.png') }}"
                            alt="#">
                        @endif  
                    </div>
                </div>
                <a href="{{ get_link($slugs, 8) }}/{{ $product->slug }}"
                    class="btn btn-primary btn-detail has-brand-icon">{{ __('message.product.detail') }}</a>
            </div>
        </div>
    @endforeach
@endif