@extends('admin.layout.layout')

@section('content')
<h4 class="mb-4">Tạo sản phẩm</h4>
<h5 class="title-create">Tạo sản phẩm</h5>
<form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        @forelse ($result as $key => $data)
            <li class="nav-item" role="presentation">
                <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' active' : '' }}"
                    data-coreui-toggle="pill" data-coreui-target="#{{ $data->language_code }}" type="button" role="tab"
                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
            </li>
        @empty
            <li>No data</li>
        @endforelse
    </ul>
    <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
        @forelse ($result as $key => $data)
            @php
                $qty = count($result);
            @endphp
        <div class="tab-pane fade {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="{{ $data->language_code }}" role="tabpanel"
            aria-labelledby="{{ $data->language_code }}" tabindex="0">
            <div class="mb-3">
                <label for="name_product"
                    class="form-label text-black">{{ config('constants.' . $data->language_code . '.product_name') }} <span class="strong-red">*</span></label>
                <input type="text" class="form-control" value="{{ old('name')[$key] ?? ''}}" name="name[]" placeholder="Vui lòng nhập tên sản phẩm">
                    @error("name.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                <input type="hidden" class="form-control" name="language_code[]" value="{{ $data->language_code }}">
            </div>
            <div class="mb-4 position-relative">
                <label for="description"
                    class="form-label text-black">{{ config('constants.' . $data->language_code . '.description') }}</label>
                <textarea class="form-control" name="description[]" id="description" rows="3"
                    placeholder="Vui lòng nhập mô tả">{{ old('description')[$key] ?? ''}}</textarea>
            </div>
            <div class="mb-4 position-relative">
                <label for="content"
                    class="form-label text-black">{{ config('constants.' . $data->language_code . '.content') }}</label>
                <textarea name="content[]"  class="form-control ml-0 mb-2 mb-sm-0 w-100 " id="editor{{ $key }}" rows="4">{{ old('content')[$key] ?? ''}}</textarea>
            </div>
        </div>
        @empty
        <div>No data</div>
        @endforelse
    </div>
    <div class="mb-3 mt-4">
        <label for="name_category" class="form-label text-black">Danh mục</label>
        <select name="category_id" class="form-select type_product" id="status" style="width: 100%">
            @foreach($category as $cate)
                <option value="{{ $cate->id }}" @if(old('category_id') == $cate->id) selected @endif>{{ $cate->name_category }}</option>
            @endforeach
        </select>

    </div>
    <div id="row-avartar" class="row image mb-2">
    </div>
    <div class="upload__box">
        <div class="upload__btn-box">
            <label class="upload__btn">
                <p>Tải lên ảnh dại diện</p>
                <input type="file" accept="image/png, image/gif, image/jpeg"  name="upload_avatar" class="upload__avartar">
            </label>
        </div>
    </div>
    <div class="row mt-3">
        <div class="mb-3 col-4">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" class="form-select" id="status" style="width: 100%">
                <option value="active">Hoạt động</option>
                <option value="inactive">Không hoạt động</option>
            </select>
        </div>
    </div>
    <div id="row-images" class="row image mb-2">
    </div>
    <div class="upload__box">
        <div class="upload__btn-box">
            <label class="upload__btn">
                <p>Tải lên ảnh chi tiết</p>
                <input type="file"  accept="image/png, image/gif, image/jpeg" name="upload_images[]" multiple="" class="upload__inputfile">
            </label>
        </div>
    </div>
    @php $numbers = old('price') ?? [1] @endphp
    <div id="row-measurement" class="row image mb-2">
        @foreach($numbers as $key => $number)
        <div class="row row-info-measurement mt-2">
            <div class="col-3">
                <div class="mb-4">
                    <label for="price" class="form-label text-black">Giá<span class="strong-red"> *</span></label>
                    <input class="form-control" name="price[]" value="{{ old('price')[$key] ?? ''}}"></input>
                        @error("price.$key")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="thickness" class="form-label text-black thickness">Độ dày<span class="strong-red"> *</span></label>
                    <input class="form-control" name="thickness[]" value="{{ old('thickness')[$key]  ?? ''}}"></input>
                        @error("thickness.$key")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="col-2 input_plaster">
                <div class="mb-4">
                    <label for="thickness_unit" class="form-label text-black">Chiều dài<span class="strong-red"> *</span></label>
                    <input class="form-control" name="width[]" value="{{ old('width')[$key] ?? ''}}"></input>
                        @error("width.$key")
                                <span class="alert alert-custom">
                                    {{ $message }}
                                </span>
                        @enderror
                </div>
            </div>
            <div class="col-2 input_plaster">
                <div class="mb-4">
                    <label for="height" class="form-label text-black">Chiều cao<span class="strong-red"> *</span></label>
                    <input class="form-control" name="height[]" value="{{ old('height')[$key] ?? ''}}"></input>
                        @error("height.$key")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="thickness_unit" class="form-label text-black">Đơn vị</label>
                    <select name="thickness_unit[]" class="form-select" id="status" style="width: 100%">
                        <option value="mm" selected>mm</option>
                        <option value="kg">Kg</option>
                    </select>
                        @error("thickness_unit.$key")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row my-3">
        <div class="col">
            <a id="add-measurement" class="btn btn-success text-white d-inline-block float-end">Thêm giá</a>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-save text-white" value="Tạo"></input>
</form>
@endsection