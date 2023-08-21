@extends('admin.layout.layout')

@section('content')

<h4 class="mb-4">Chỉnh sửa sản phẩm</h4>
<h5 class="title-create">chỉnh sửa sản phẩm</h5>
<form class="form-create bg-white p-4" action="{{ route('admin.product.update', request()->segment(4)) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        @forelse ($result as $key => $data)
            <li class="nav-item" role="presentation">
                <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' active' : '' }}" id="{{ $data->language_code }}"
                    data-coreui-toggle="pill" data-coreui-target="#1{{ $data->language_code }}" type="button" role="tab"
                    aria-controls="{{ $data->language_code }}"
                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
            </li>
        @empty
            <li>No data</li>
        @endforelse
    </ul>
    
    <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
        @forelse ($result as $key => $data)
            @php
                $qty = count($product);
            @endphp
        <div class="tab-pane fade {{ changeTab($errors) == $data->language_code ? 'show active' : '' }}" id="1{{ $data->language_code}}" role="tabpanel"
            aria-labelledby="{{ $data->language_code }}" tabindex="0">
            <div class="mb-3">
                <label for="title"
                    class="form-label text-black">{{ config('constants.' . $data->language_code . '.name') }}<span class="strong-red"> *</span></label>
                <input type="text" class="form-control" name="name[]" id="name" placeholder="Enter name"
                    value="{{ old('name')[$key] ?? $product[$key]['name'] }}">
                <input type="hidden" class="form-control" name="language_code[]" id="name" placeholder="Enter title"
                    value="{{ $data->language_code }}">
                    @error("name.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
            </div>
            <div class="mb-4 position-relative">
                <label for="description"
                    class="form-label text-black">{{ config('constants.' .$data->language_code . '.description') }}</label>
                <textarea class="form-control" name="description[]" id="description" rows="3"
                    placeholder="Enter description">{{ old('description')[$key] ?? $product[$key]['description'] }}</textarea>
            </div>
            <div class="mb-4 position-relative">
                <label for="content"
                    class="form-label text-black">{{ config('constants.' .$data->language_code . '.content') }}</label>
                <textarea name="content[]" class="form-control ml-0 mb-2 mb-sm-0 w-100 " id="editor{{ $key }}"
                    rows="4">{{ old('content')[$key] ?? $product[$key]['content'] }}</textarea>
            </div>
        </div>
        @empty
        @endforelse
    </div>
    <div class="mb-3 mt-4">
        <label for="name_category" class="form-label text-black">Danh mục</label>
        <select name="category_id" class="form-select type_product" id="status" style="width: 100%">
            @foreach($category as $cate)
            <option value="{{ $cate->id }}" @if(old('category_id') == $cate->id || !old('category_id') && $cate->id == $product->first()->category_id) selected
                @endif>{{ $cate->name_category }}</option>
            @endforeach
        </select>

    </div>
    <div id="row-avartar" class="row image mb-2">
        <label for="status" class="form-label">Ảnh đại diện</label>
        <div class="col-3 mt-2">
            @if (!empty($product->first()->avatar))
            <img src="{{ asset('storage/assets/img/product/' . $product->first()->avatar)}}" alt="">
            @else
            <img height="60px" width="100px" src="{{ asset('coreUi/assets/img/404.png') }}" alt="">
            @endif
            <div class="upload__img-close"></div>
        </div>
    </div>

    <div class="upload__box">
        <div class="upload__btn-box">
            <label class="upload__btn">
                <p>Tải lên ảnh đại diện</p>
                <input type="file"  accept="image/png, image/gif, image/jpeg" name="upload_avatar" class="upload__avartar">
            </label>
        </div>
    </div>
    <div class="row mt-3">
        <div class="mb-3 col-4">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" class="form-select" id="status" style="width: 100%">
                <option value="active"  @if($product->first()->status == 'active') selected @endif>Hoạt động</option>
                <option value="inactive" @if($product->first()->status== 'inactive') selected @endif>Không hoạt động</option>
            </select>
        </div>
    </div>
    <div id="row-images" class="row image mb-2 mt-2">
        <label for="status" class="form-label">Ảnh chi tiết</label>
        @php
            $allImages = [];
        @endphp

        @if (!$product->isEmpty())
            @php $images = json_decode($product->first()->image); @endphp
            @if (!empty($images))
                @foreach ($images as $image)
                    @php $allImages[] = $image; @endphp
                    <div class="col-3 mt-2">
                        <input type="hidden" name-image="{{$image}}" name="old_image" class="images-list"
                            value="{{ json_encode($allImages) }}">
                        <img src="{{ asset('storage/assets/img/product/' . $image) }}" class="" alt="{{ $image }}">
                        <div class="upload__img-closes"></div>
                    </div>    
                @endforeach
            @else
                <img id="image-404" style="width: 284px !important;height: 180px !important;" src="{{ asset('coreUi/assets/img/404.png') }}" alt="">
            @endif
        @endif
    </div>

    <div class="upload__box">
        <div class="upload__btn-box">
            <label class="upload__btn">
                <p>Tải lên ảnh chi tiết</p>
                <input type="file"  accept="image/png, image/gif, image/jpeg" name="upload_images[]" multiple="" class="upload__inputfile">
            </label>
        </div>
    </div>

    @php $numbers = old('new_price') ?? []  @endphp
    <div id="row-measurement" class="row image mb-2">
        @forelse ($measurement as $key => $item)
        <div class="row row-info-measurement mt-2">
            <div class="col-3">
                <div class="mb-4">
                    <label for="price" class="form-label text-black">Giá<span class="strong-red"> *</span></label>
                    <input class="form-control" name="price[{{ $item->id }}] " value="{{ old('price')[$item->id] ?? $item->price }}"></input>
                    @error("price.$item->id")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="thickness" class="form-label text-black thickness">Độ dày<span class="strong-red"> *</span></label>
                    <input class="form-control" name="thickness[{{ $item->id }}]"
                        value="{{ old('thickness')[$item->id] ?? $item->thickness }}"></input>
                        @error("thickness.$item->id")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-2 input_plaster">
                <div class="mb-4">
                    <label for="width" class="form-label text-black">Chiều dài<span class="strong-red"> *</span></label>
                    <input class="form-control" name="width[{{ $item->id }}]"
                        value="{{ old('width')[$item->id] ??  $item->width }}"></input>
                        @error("width.$item->id")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="col-2 input_plaster">
                <div class="mb-4">
                    <label for="height" class="form-label text-black">Chiều cao<span class="strong-red"> *</span></label>
                    <input class="form-control" name="height[{{ $item->id }}]"
                        value="{{ old('height')[$item->id] ?? $item->height }}"></input>
                        @error("height.$item->id")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="thickness_unit" class="form-label text-black">Đơn vị</label>
                    <select name="thickness_unit[{{ $item->id }}]" class="form-select" id="status" style="width: 100%">
                            <option value="mm" @if($item->thickness_unit == 'mm') selected @endif>mm</option>
                            <option value="kg" @if($item->thickness_unit == 'kg') selected @endif>Kg</option>
                    </select>
                        @error("thickness_unit.$item->id")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
            @if( $key != 0)
            <div class="col-1">
                <a class="btn-delete-measurement">x</a>
            </div>
            @endif
        </div>
        @empty
        <div></div>
        @endforelse
        
        @foreach($numbers as $key => $number)
        <div class="row row-info-measurement mt-2">
            <div class="col-3">
                <div class="mb-4">
                    <label for="price" class="form-label text-black">Giá<span class="strong-red"> *</span></label>
                    <input class="form-control" name="new_price[]"  value="{{ old('new_price')[$key] ?? ''}}"></input>
                    @error("new_price.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-2 ">
                <div class="mb-4">
                    <label for="thickness" class="form-label text-black thickness">Độ dày<span class="strong-red"> *</span></label>
                    <input class="form-control" name="new_thickness[]" value="{{ old('new_thickness')[$key] ?? ''}}"></input>
                    @error("new_thickness.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-2 input_plaster">
                <div class="mb-4">
                    <label for="width" class="form-label text-black">Chiều dài<span class="strong-red"> *</span></label>
                    <input class="form-control" name="new_width[]" value="{{ old('new_width')[$key] ?? ''}}"></input>
                    @error("new_width.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-2 input_plaster">
                <div class="mb-4">
                    <label for="height" class="form-label text-black">Chiều cao<span class="strong-red"> *</span></label>
                    <input class="form-control" name="new_height[]" value="{{ old('new_height')[$key] ?? ''}}"></input>
                    @error("new_height.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="thickness_unit" class="form-label text-black">Đơn vị</label>
                    <select name="new_thickness_unit[]" class="form-select" id="status" style="width: 100%">
                            <option value="mm">mm</option>
                    </select>
                    @error("new_thickness_unit.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-1">
                <a class="btn-delete-measurement">x</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row my-3">
        <div class="col">
            <a id="add-edit-measurement" class="btn btn-success text-white d-inline-block float-end">Thêm giá</a>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-save" value="Lưu"></input>
</form>
@endsection