@extends('admin.layout.layout') 
    @section('content')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item "><span>câu hỏi thường gặp</span></li>
                    <li class="breadcrumb-item active"><span>tạo</span></li>
            </nav>
        </div>
        <h5 class="title-create">Tạo câu hỏi thường gặp</h5>
            <form id="myForm" class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
            @csrf   
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @forelse ($result as $key => $data)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" data-coreui-toggle="pill"
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
                            <label for="description" class="form-label text-black">{{ config('constants.' . $data->language_code . '.question') }}<span class="strong-red"> *</span></label>
                            <textarea class="form-control" name="question[]" id="description" rows="3"
                                placeholder="Nhập câu hỏi">{{ old('question')[$key] ?? ''}}</textarea>
                                @error("question.$key")
                                    <span class="alert alert-custom">
                                        {{ $message }}
                                    </span>
                                @enderror
                            <input type="hidden" class="form-control" name="language_code[]" id="title" placeholder="Enter title" value="{{ $data->language_code }}">
                        </div>
                        <div class="mb-4">
                            <label for="content" class="form-label text-black">{{ config('constants.' . $data->language_code . '.answer') }}<span class="strong-red"> *</span></label>
                            <textarea class="form-control" name="answer[]" id="answer" rows="3"
                                placeholder="Nhập câu trả lời">{{ old('answer')[$key] ?? ''}}</textarea>
                                @error("answer.$key")
                                    <span class="alert alert-custom">
                                        {{ $message }}
                                    </span>
                                @enderror
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
                    <div class="mb-3 col-6">
                        <label for="status" class="form-label">Chủ đề</label>
                        <select name="topic" class="form-select" id="status" style="width: 100%">
                            <option value="technical" selected>Kỹ thuật</option>
                            <option value="products">Sản phẩm</option>
                            <option value="warranty">Bảo hành</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <input type="submit" value="Tạo" class="btn btn-primary"></input>
                    </div>
                </div>  
        </form>
    @endsection