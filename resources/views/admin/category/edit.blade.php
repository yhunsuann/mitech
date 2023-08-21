@extends('admin.layout.layout')

@section('content')
    <h4 class="mb-4">Cập nhật danh mục</h4>
    <h5 class="title-create">Chỉnh sửa danh mục</h5>
    <form class="form-create bg-white p-4" action="{{ route('admin.category.update', request()->segment(4)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @php 
        $active_tab = 'vi';
        if (tabClass($errors)) {
            $active_tab = 'en';
        }
        @endphp
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($result as $key => $data)
                <input type="hidden" name="count[{{ $key }}]" value="{{ $loop->index }}">
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang{{ $active_tab == $data->language_code ? 'show active' : '' }}" id="{{ $data->language_code }}" data-coreui-toggle="pill" data-coreui-target="#1{{ $data->language_code }}" type="button" role="tab" aria-controls="{{ $data->language_code }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
        @foreach ($result as $key => $data)
            <div class="tab-pane fade {{ $active_tab == $data->language_code ? 'show active' : '' }}" id="1{{ $data->language_code }}" role="tabpanel" aria-labelledby="{{ $data->language_code }}" tabindex="0">
                <div class="mb-3">
                    <label for="name_category{{ $key }}" class="form-label text-black">{{ config('constants.' . $data->language_code . '.category_name') }}<span class="strong-red"> *</span></label>
                    <input type="text" class="form-control" name="name_category[{{ $key }}]" id="name_category{{ $key }}" placeholder="Nhập tên danh mục" value="{{ old('name_category')[$key] ?? $categorys[$key]['name_category'] }}">
                    <input type="hidden" class="form-control" name="language_code[{{ $key }}]" id="language_code{{ $key }}" value="{{ $data->language_code }}">
                        @error("name_category.$key")
                            <span class="alert alert-custom">
                                {{ $message }}
                            </span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="description{{ $key }}" class="form-label text-black">{{ config('constants.' . $data->language_code . '.description') }}<span class="strong-red"> *</span></label>
                    <input type="text" class="form-control" name="description[{{ $key }}]" id="description{{ $key }}" placeholder="Nhập mô tả danh mục" value="{{ old('description')[$key] ?? $categorys[$key]['description'] }}">
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
                    <option value="product" @if($categorys->first()->type == 'product') selected @endif>Sản phẩm</option>
                    <option value="article" @if($categorys->first()->type == 'article') selected @endif>Tin tức</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="status" style="width: 100%">
                    <option value="active" @if($categorys->first()->status == 'active') selected @endif>Hoạt động</option>
                    <option value="inactive" @if($categorys->first()->status == 'inactive') selected @endif>Không hoạt động</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-save" value="Cập nhật"></input>
    </div>      
    </form>
@endsection
