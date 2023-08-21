@extends('admin.layout.layout')

@section('content')
    <h4 class="mb-4"></h4>
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Trang chủ</span>
                </li>
                <li class="breadcrumb-item"><span>vật liệu</span></li>
                <li class="breadcrumb-item active"><span>tạo</span></li>
            </ol>
        </nav>
    </div>
    <h5 class="title-create">Tạo vật liệu</h5>
    <form class="form-create bg-white p-4" action="" method="POST">
        @csrf
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($langs as $key => $lang)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang {{ changeTab($errors) == $lang->language_code ? ' show active' : '' }}"
                        data-coreui-toggle="pill"
                        data-coreui-target="#{{ $lang->language_code }}" type="button" role="tab"
                        aria-controls="{{ $lang->language_name }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $lang->language_name }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
            @foreach ($langs as $key => $lang)
                <div class="tab-pane fade {{ changeTab($errors) == $lang->language_code ? ' show active' : '' }}" id="{{ $lang->language_code }}" role="tabpanel"
                    aria-labelledby="{{ $lang->language_code }}" tabindex="0">
                    <input type="hidden" class="form-control" name="language_code[]" id="title" placeholder="Enter title"
                            value="{{ $lang->language_code }}">
                    <div class="mb-4">
                        <label for="description" class="form-label text-black">{{ config('constants.' . $lang->language_code . '.title') }}<span class="strong-red">*</span></label>
                        <input class="form-control" value="{{ old('name')[$key]  ?? ''}}" name="name[]" id="description" rows="3"
                            placeholder="Vui lòng nhập tên"></input>
                            @error("name.$key")
                                <span class="alert alert-custom">
                                    {{ $message }}
                                </span>
                            @enderror
                    </div>
                    <div class="">
                        <label for="description" class="form-label text-black">{{ config('constants.' . $lang->language_code . '.unit') }}<span class="strong-red">*</span></label>
                        <input class="form-control" value="{{ old('unit')[$key]  ?? ''}}" name="unit[]" id="description" rows="3"
                            placeholder="Vui lòng nhập đơn vị đo"></input>
                            @error("unit.$key")
                                <span class="alert alert-custom">
                                    {{ $message }}
                                </span>
                            @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-3">
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Số lượng<span class="strong-red">*</span></label>
                <input class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{ old('amount') }}" name="amount" id="amount" rows="3"placeholder="Vui lòng nhập số lượng"></input>
                @error("amount")
                    <span class="alert alert-custom">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Chất lượng<span class="strong-red">*</span></label>
                <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ old('quantity') }}"  name="quantity" id="quantity" rows="3"placeholder="Vui lòng nhập chất lượng"></input>
                @error("quantity")
                    <span class="alert alert-custom">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Tổng trị giá</label>
                <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ old('total_cost') }}" name="total_cost" id="total_cost" rows="3" placeholder="Vui lòng nhập tổng giá trị"></input>
            </div>
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Kiểu</label>
                <select name="type" class="form-select" id="status" style="width: 100%">
                    @foreach(config('constants.material_types') as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Tạo "></input>
    </form>
@endsection
