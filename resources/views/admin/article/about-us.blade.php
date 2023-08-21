@extends('admin.layout.layout')

@section('content')
    @include('admin.layout.partials.flag')
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Trang chủ</span>
                </li>
                <li class="breadcrumb-item"><span>Về chúng tôi</span></li>
                <li class="breadcrumb-item active"><span>Chỉnh sửa</span></li>
            </ol>
        </nav>
    </div>
    <h5 class="title-create text-capitalize">Về chúng tôi</h5>
    <form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
        @csrf   
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($result as $key => $data)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" data-coreui-toggle="pill"
                        data-coreui-target="#{{ $data->language_code }}" type="button" role="tab" aria-controls="{{ $data->language_code }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
            @foreach ($result as $key => $data)
                @php
                    $qty = count($result);
                @endphp
                <div class="tab-pane fade{{ changeTab($errors) == $data->language_code ? ' show active' : '' }}" id="{{ $data->language_code }}" role="tabpanel" aria-labelledby="{{ $data->language_code }}" tabindex="0">
                    <div class="mb-4">
                        <input type="hidden" class="form-control" name="language_code[]" value="{{ $data->language_code }}">
                        <label for="title" class="form-label text-black">Tiêu đề về MiTech</label>
                        <input type="text" class="form-control" name="mitect_title[]" id="mitect_title" value="{{ old('mitect_title')[$key] ?? $about[$key]['mitect_title']}}" placeholder="Nhập tiêu đề về MiTech">

                        <label for="title" class="form-label text-black mt-3">Nội dung về MiTech</label>
                        <textarea class="form-control" name="mitect_content[]" placeholder="Nhập nội dung về MiTech" rows="8">{{ old('mitect_content')[$key] ?? $about[$key]['mitect_content']}}</textarea>

                        <label for="title" class="form-label text-black mt-3">Hình ảnh về MiTech</label>
                        @if (!empty($about[$key]['mitect_file']))
                            <div style="border-radius: 5px; border: 1px solid #ccc; padding: 2px; width: 140px; margin-bottom: 4px">
                                <img src="{{ asset('storage/assets/img/about/' . $about[$key]['mitect_file'])}}" alt="" style="width: 100%">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="mitect_file_{{$key}}" accept="image/png, image/gif, image/jpeg">

                        <label for="title" class="form-label text-black mt-3">Tìm hiểu về VGSI</label>
                        <input type="text" class="form-control" name="vgsi_title[]" id="vgsi_title" value="{{ old('vgsi_title')[$key] ?? $about[$key]['vgsi_title']}}" placeholder="Nhập tiêu đề về MiTech">

                        <label for="title" class="form-label text-black mt-3">Hình ảnh về VGSI</label>
                        @if (!empty($about[$key]['vgsi_file']))
                            <div style="border-radius: 5px; border: 1px solid #ccc; padding: 2px; width: 140px; margin-bottom: 4px">
                                <img src="{{ asset('storage/assets/img/about/' . $about[$key]['vgsi_file'])}}" alt="" style="width: 100%">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="vgsi_file_{{$key}}" accept="image/png, image/gif, image/jpeg">

                        <label for="title" class="form-label text-black mt-3">Hình ảnh giới thiệu</label>
                        @if (!empty($about[$key]['about_file']))
                            <div style="border-radius: 5px; border: 1px solid #ccc; padding: 2px; width: 140px; margin-bottom: 4px">
                                <img src="{{ asset('storage/assets/img/about/' . $about[$key]['about_file'])}}" alt="" style="width: 100%">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="about_file_{{$key}}" accept="image/png, image/gif, image/jpeg">

                        <label for="title" class="form-label text-black mt-3">Công xuất</label>
                        <textarea class="form-control" name="content_about_1[]" placeholder="Giới thiệu về công xuất" rows="8">{{ old('content_about_1')[$key] ?? $about[$key]['content_about_1']}}</textarea>

                        <label for="title" class="form-label text-black mt-3">Dây chuyền</label>
                        <textarea class="form-control" name="content_about_2[]" placeholder="Giới thiệu về dây chuyền" rows="8">{{ old('content_about_2')[$key] ?? $about[$key]['content_about_2']}}</textarea>

                        <label for="title" class="form-label text-black mt-3">Nền tảng</label>
                        <textarea class="form-control" name="content_about_3[]" placeholder="Giới thiệu về nền tảng" rows="8">{{ old('content_about_3')[$key] ?? $about[$key]['content_about_3']}}</textarea>
                    
                        <label for="title" class="form-label text-black mt-3">Tầm nhìn</label>
                        <input type="text" class="form-control" name="vision_title[]" id="vision_title" value="{{ old('vision_title')[$key] ?? $about[$key]['vision_title']}}" placeholder="Nhập tiêu đề tầm nhìn">

                        <label for="title" class="form-label text-black mt-3">Nội dung tầm nhìn</label>
                        <textarea class="form-control" name="vision_content[]" placeholder="Nhập nội dung tầm nhìn" rows="8">{{ old('vision_content')[$key] ?? $about[$key]['vision_content']}}</textarea>

                        <label for="title" class="form-label text-black mt-3">Hình ảnh tầm nhìn</label>
                        @if (!empty($about[$key]['vision_file']))
                            <div style="border-radius: 5px; border: 1px solid #ccc; padding: 2px; width: 140px; margin-bottom: 4px">
                                <img src="{{ asset('storage/assets/img/about/' . $about[$key]['vision_file'])}}" alt="" style="width: 100%">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="vision_file_{{$key}}" accept="image/png, image/gif, image/jpeg">


                        <label for="title" class="form-label text-black mt-3">Sứ mệnh</label>
                        <input type="text" class="form-control" name="mission_title[]" id="mission_title" value="{{ old('mission_title')[$key] ?? $about[$key]['mission_title']}}" placeholder="Nhập tiêu đề sứ mệnh">

                        <label for="title" class="form-label text-black mt-3">Nội dung sứ mệnh</label>
                        <textarea class="form-control" name="mission_content[]" placeholder="Nhập nội dung sứ mệnh" rows="8">{{ old('mission_content')[$key] ?? $about[$key]['mission_content']}}</textarea>

                        <label for="title" class="form-label text-black mt-3">Hình ảnh sứ mệnh</label>
                        @if (!empty($about[$key]['mission_file']))
                            <div style="border-radius: 5px; border: 1px solid #ccc; padding: 2px; width: 140px; margin-bottom: 4px">
                                <img src="{{ asset('storage/assets/img/about/' . $about[$key]['mission_file'])}}" alt="" style="width: 100%">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="mission_file_{{$key}}" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>
            @endforeach
        </div>
        <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Chỉnh sửa"></input>
    </form>
@endsection