@extends('admin.layout.layout')
    @section('content')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                       <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item"><span>tài liệu</span></li>
                    <li class="breadcrumb-item active"><span>chỉnh sửa</span></li>
                </ol>
            </nav>
        </div>
        <h5 class="title-create">Chỉnh sửa tài liệu</h5>
        <form class="form-create bg-white p-4" action="{{ route('admin.document.update', $document->first()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @forelse ($result as $key => $data)
                    <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}"
                        data-coreui-toggle="pill" data-coreui-target="#{{ $data->language_code }}" type="button" role="tab">{{ $data->language_name }}</button>
                @empty        
                    <li>No Data</li>
                @endforelse
            </ul>

            <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
                @forelse ($result as $key => $data) 
                <div class="tab-pane fade  {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="{{ $data->language_code }}"
                    role="tabpanel" aria-labelledby="{{ $data->language_code }}" tabindex="0">
                    <div class="mb-4">
                        <label for="description" class="form-label text-black">{{ config('constants.' . $data->language_code . '.name') }}<span class="strong-red"> *</span></label>
                        <input class="form-control" name="name[]" rows="3" value="{{old('name')[$key] ?? $document[$key]['name'] }}"></input>
                                @error("name.$key")
                                    <span class="alert alert-custom">
                                        {{ $message }}
                                    </span>
                                @enderror
                        <input type="hidden" class="form-control" name="language_code[]" id="title" placeholder="Enter title"
                            value="{{ $data->language_code }}">
                    </div>
                </div>
                @empty
                    <div>No Data</div>
                @endforelse
            </div>

            <div id="row-avartar" class="row image mb-2 mt-4">
                <label for="status" class="form-label">Ảnh đại diện</label>
                <div class="col-3 mt-2">
                    @if (!empty($document->first()->avatar))
                    <img src="{{ asset('storage/assets/img/document/' . $document->first()->avatar)}}" alt="">
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
                <div class="mb-3 col-6">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" id="status" style="width: 100%">
                        <option value="active" @if($document->first()->status == 'active') selected @endif>Hoạt động</option>
                        <option value="inactive" @if($document->first()->status == 'inactive') selected @endif>Không hoạt động</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="status" class="form-label">Danh mục</label>
                    <select name="type" class="form-select" id="status" style="width: 100%">
                        <option value="brochure/Leaflet" @if($document->first()->status == 'brochure/Leaflet') selected @endif>Brochure/Leaflet</option>
                        <option value="certificates" @if($document->first()->status == 'certificates') selected @endif>Giấy chứng nhận</option>
                        <option value="drawings" @if($document->first()->status == 'drawings') selected @endif>Bản vẽ</option>
                        <option value="installation Guide" @if($document->first()->status == 'installation Guide') selected @endif>Hướng dẫn thi công</option>
                        <option value="submittal Sheet" @if($document->first()->status == 'submittal Sheet') selected @endif>Submittal Sheet</option>
                        <option value="test reports" @if($document->first()->status == 'test reports') selected @endif>Kết quả thử nghiệm</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3 p-2">
                <iframe src="{{ asset('storage/assets/file/document/' . $document->first()->file)}}" width="100%" height="500px"></iframe>
            </div>
            <div class="row mt-3 p-2">
                <label for="status" class="form-label">Tài liệu</label>
                <input type="file" name="document_file" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Cập nhật"></input>
        </form>
    @endsection