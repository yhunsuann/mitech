@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Trang chủ</span>
                </li>
                <li class="breadcrumb-item"><span>slider</span></li>
                <li class="breadcrumb-item active"><span>tạo mới</span></li>
            </ol>
        </nav>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            Vui lòng nhập đầy đủ hình ảnh Tiếng Việt và Tiếng Anh
        </div>
    @endif
    <h5 class="title-create">Tạo mới slider</h5>
    <form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
        @csrf   
        @php 
            $active_tab = 'vi';
            if (tabClass($errors)) {
                $active_tab = 'en';
            }
        @endphp
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @forelse ($result as $key => $data)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang  {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" data-coreui-toggle="pill"
                        data-coreui-target="#{{ $data->language_code }}" type="button" role="tab" aria-controls="{{ $data->language_code }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
                </li>
                @empty
                    <li>No Data</li>
                @endforelse
            </ul>

            <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
            @forelse ($result as $key => $data)
                <div class="tab-pane fade {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="{{ $data->language_code }}" role="tabpanel" aria-labelledby="{{ $data->language_code }}" tabindex="0">
                    <div class="mb-4">
                        <label for="description" class="form-label text-black">{{ config('constants.' . $data->language_code . '.name') }}</label>
                        <input class="form-control" name="name[]" rows="3"
                            placeholder="Vui lòng nhập tên" value = "{{ old('name')[$key] ?? '' }}" />

                        <label for="description" class="form-label text-black mt-3">Hình ảnh<span class="strong-red">*</span></label>
                        <input class="form-control" type="file" name="file_{{ $key }}" accept="image/png, image/gif, image/jpeg"/>
                        <label for="description" class="form-label text-black mt-3">Link</label>
                        <input class="form-control" name="link[]" rows="3"
                            placeholder="Vui lòng nhập link" value = "{{ old('link')[$key] ?? '' }}" />
                        <input type="hidden" class="form-control" name="language_code[]" id="title" placeholder="Enter title" value="{{ $data->language_code }}">
                    </div>
                </div>
                @empty
                    <div>No Data</div>
                @endforelse
            </div>
            <div class="row mt-3">
                <div class="mb-3 col-6">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" id="status" style="width: 100%">
                        <option value="active" selected>Hoạt động</option>
                        <option value="inactive">Không hoạt động</option>
                    </select>
                </div>
            </div>

        <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Tạo mới"></input>
    </form>
@endsection
