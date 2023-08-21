@extends('admin.layout.layout') 

@section('content') 
<h4 class="mb-4">Thêm mới danh mục</h4>
<h5 class="title-create">Tạo danh mục</h5>
<form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        @foreach ($result as $key => $data)
            <input type="hidden" name="count[{{ $key }}]" value="{{ $loop->index }}">
            <li class="nav-item" role="presentation">
                <button class="nav-link px-5 rounded-0 lang{{ changeTab($errors) == $data->language_code ? ' show active' : '' }}"  data-coreui-toggle="pill" data-coreui-target="#{{ $data->language_code }}" type="button" role="tab" aria-controls="{{ $data->language_code }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
        @foreach ($result as $key => $data)
            <div class="tab-pane fade{{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="{{ $data->language_code }}" role="tabpanel" aria-labelledby="{{ $data->language_code }}" tabindex="0">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="language_code[{{ $key }}]" id="language_code" value="{{ $data->language_code }}">
                    <label for="name" class="form-label text-black">{{ config('constants.' . $data->language_code . '.category_name') }}<span class="strong-red"> *</span></label>
                    <input type="text" class="form-control" name="name_category[{{ $key }}]" id="name_category" placeholder="Nhập tên danh mục" value="{{ old('name_category')[$key] ?? ''}}">
                        @error("name_category.$key")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-black">{{ config('constants.' . $data->language_code . '.description') }}<span class="strong-red"> *</span></label>
                    <input type="text" class="form-control" name="description[{{ $key }}]" id="description" placeholder="Nhập mô tả danh mục"  value="{{ old('description')[$key] ?? ''}}">
                    @error("description.$key")
                        <span class="alert alert-custom">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-3">
        <div class="mb-3 col-6">
            <label for="status" class="form-label">Kiểu</label>
            <select name="type" class="form-select" id="status" style="width: 100%">
                <option value="product">Sản phẩm</option>
                <option value="article">Tin tức</option>
            </select>
        </div>
        <div class="mb-3 col-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" id="status" style="width: 100%">
                <option value="active">Hoạt động</option>
                <option value="inactive">Không hoạt động</option>
            </select>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-save text-white" value="Thêm mới"></input>
</form>
@endsection
