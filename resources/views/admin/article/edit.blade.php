@extends('admin.layout.layout')
    @section('content')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                       <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item"><span>{{ __('message.' .$segment) }}</span></li>
                    <li class="breadcrumb-item active"><span>chỉnh sửa</span></li>
                </ol>
            </nav>
        </div>
        <h5 class="title-create">Cập nhật {{ __('message.' .$segment) }}</h5>
        <form class="form-create bg-white p-4"
            action="{{ route('admin.article.update', ['id' => $article->first()->id, 'segment' => $segment ]) }}" method="POST"
            enctype="multipart/form-data">
        @csrf
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @forelse ($result as $key => $data)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}"
                        id="{{ $data->language_code }}" data-coreui-toggle="pill"
                        data-coreui-target="#1{{ $data->language_code }}" type="button" role="tab"
                        aria-controls="{{ $data->language_name }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
                </li>
                @empty
                    <li>No Data</li>
                @endforelse
            </ul>

            <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
                @forelse ($result as $key => $data)
                @php
                        $qty = count($result);
                @endphp
                <div class="tab-pane fade{{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="1{{ $data->language_code }}" role="tabpanel"
                    aria-labelledby="{{ $data->language_code }}" tabindex="0">
                    <div class="mb-4">
                        <input type="hidden" class="form-control" name="language_code[]" id="title" placeholder="Enter title"
                            value="{{ $data->language_code }}">
                        <label for="title"
                            class="form-label text-black">{{ config('constants.' . $data->language_code . '.title') }}<span class="strong-red"> *</span></label>
                        <input type="text" class="form-control" name="title[]" id="title" placeholder="Enter title"
                            value="{{ old('title')[$key] ?? $article[$key]['title'] }}">
                            @error("title.$key")
                                    <span class="alert alert-custom">
                                        {{ $message }}
                                    </span>
                            @enderror
                    </div>
                    <div class="mb-4 position-relative">
                        <label for="description"
                            class="form-label text-black">{{ config('constants.' . $data->language_code . '.description') }}</label>
                        <textarea class="form-control" name="description[]" id="description" rows="3"
                            placeholder="Enter description">{{ old('description')[$key] ?? $article[$key]['description'] }}</textarea>
                    </div>
                    <div class="mb-4 position-relative">
                        <label for="content"
                            class="form-label text-black">{{ config('constants.' . $data->language_code . '.content') }}</label>
                        <textarea name="content[]" class="form-control ml-0 mb-2 mb-sm-0 w-100 " id="editor{{ $key }}" rows="4">{{ old('content')[$key] ?? $article[$key]['content'] }}</textarea>
                    </div>
                    <div id="row-avartar" class="row image mb-2">
                        <div class="col-3 mt-2">
                            @if (!empty($article[$key]['avatar'] ))
                                <img src="{{ asset('storage/assets/img/'.$segment.'/' .$article[$key]['avatar'])}}" alt="">
                            @else
                                <img height="60px" width="100px" src="{{ asset('coreUi/assets/img/404.png') }}" alt="">
                            @endif
                            <div class="upload__img-close" data-key="{{ $key }}"></div>
                        </div>
                    </div>

                    <div class="upload__box">
                        <div class="upload__btn-box">
                            <label class="upload__btn">
                                <p>Tải lên ảnh đại diện</p>
                                <input type="file"  accept="image/png, image/gif, image/jpeg" name="upload_avatar[{{ $article[$key]['language_code'] }}]" class="upload__avartar">
                            </label>
                        </div>
                    </div>
                </div>
                @empty
                    <div>No Data</div>
                @endforelse
            </div>
            <div class="row mt-3">
                <div class="mb-3 col-5">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" id="status" style="width: 100%">
                        <option value="active" @if($article->first()->status == 'active') selected @endif>Hoạt động</option>
                        <option value="inactive" @if($article->first()->status == 'inactive') selected @endif>Không hoạt động</option>
                    </select>
                </div>
                <div class="mb-3 col-5">
                    <label for="status" class="form-label">Danh mục</label>
                    <select name="category_id" class="form-select" id="status" style="width: 100%">
                            @foreach($category as $cate)
                            <option value="{{ $cate->id }}" @if($article->first()->category_id ==  $cate->id) selected @endif>{{ $cate->name_category }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="mb-3 col-2">
                    <label for="status" class="form-label d-block">Nổi bật</label>
                    <input type="checkbox"  name="outstanding" @if($article->first()->outstanding == true) checked @endif>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Lưu"></input>
        </form>
    @endsection