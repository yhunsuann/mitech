@extends('admin.layout.layout')
    @section('content')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item"><span>Thư viện</span></li>
                    <li class="breadcrumb-item active"><span>Chỉnh sửa</span></li>
                </ol>
            </nav>
        </div>
        <h5 class="title-create">Chỉnh sửa thư viện</h5>
        <form class="form-create bg-white p-4" action="{{ route('admin.library.update', $library->first()->id) }}" method="POST"
            enctype="multipart/form-data">
        @csrf
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @forelse ($result as $key => $data)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}"
                        data-coreui-toggle="pill"
                        data-coreui-target="#{{ $data->language_code }}" type="button" role="tab"
                        aria-controls="{{ $data->language_code }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
                </li>
                @empty
                <li>No Data</li>
                @endforelse
            </ul>

            <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
                @forelse ($result as $key => $data)
                <div class="tab-pane fade{{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="{{ $data->language_code }}"
                    role="tabpanel" aria-labelledby="{{ $data->language_code }}" tabindex="0">
                    <div class="mb-4">
                        <label for="description"
                            class="form-label text-black">{{ config('constants.' . $data->language_code . '.name') }}</label>
                        <input class="form-control" name="name[]" id="name" rows="3" value="{{ old('name')[$key] ?? $library[$key]['name'] }}"></input>
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

            <div class="row mt-3">
                <div class="mb-3 col-6">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" id="status" style="width: 100%">
                        <option value="active" @if($library->first()->status == 'active') selected @endif>Hoạt động</option>
                        <option value="inactive" @if($library->first()->status == 'inactive') selected @endif>Không hoạt động</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="status" class="form-label">Topic</label>
                    <select name="type" class="form-select" id="status" style="width: 100%">
                        <option value="classic" @if($library->first()->type == 'classic') selected @endif>Cổ điển</option>
                        <option value="modern" @if($library->first()->type == 'modern') selected @endif>Hiện đại</option>
                    </select>
                </div>
            </div>

            <div id="row-avartar" class="row image mb-2">
                <label for="status" class="form-label">Ảnh đại diện</label>
                <div class="col-3 mt-2">
                    @if (!empty($library->first()->avatar))
                    <img src="{{ asset('storage/assets/img/library/' . $library->first()->avatar)}}" alt="">
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

            <div id="row-images" class="row image mb-2">
                <label for="status" class="form-label">Hình ảnh chi tiết</label>
                @php
                    $allImages = [];
                @endphp

                @if (!$library->isEmpty())
                    @php $images = json_decode($library->first()->images); @endphp
                    @if (!empty($images))
                        @foreach ($images as $image)
                            @php $allImages[] = $image; @endphp
                                <div class="col-3 mt-2">
                                    <input type="hidden" name-image="{{$image}}" name="old_image" class="images-list"
                                        value="{{ json_encode($allImages) }}">
                                    <img src="{{ asset('storage/assets/img/library/' . $image) }}" class="" alt="{{ $image }}">
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
                        <p>Tải lên hình ảnh chi tiết</p>
                        <input type="file"  accept="image/png, image/gif, image/jpeg" name="upload_images[]" multiple="" class="upload__inputfile">
                    </label>
                </div>
            </div>

            <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Lưu"></input>
        </form>
    @endsection