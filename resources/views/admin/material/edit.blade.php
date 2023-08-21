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
                <li class="breadcrumb-item active"><span>cập nhật</span></li>
            </ol>
        </nav>
    </div>
    <h5 class="title-create">Cập nhật thông tin vật liệu</h5>
    <form class="form-update bg-white p-4" method="POST">
        @csrf
        @php 
            $active_tab = 'vi';
            if (tabClass($errors)) {
                $active_tab = 'en';
            }
        @endphp
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($langs as $key => $lang)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang {{ $active_tab == $lang->language_code ? 'show active' : '' }}" 
                        id="{{ $lang->language_code }}" data-coreui-toggle="pill"
                        data-coreui-target="#1{{ $lang->language_code }}" type="button" role="tab"
                        aria-controls="{{ $lang->language_name }}"
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $lang->language_name }}</button>
                </li>
            @endforeach
        </ul>
    
        <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
            @foreach ($langs as $key => $lang)
                <div class="tab-pane fade  {{ $active_tab == $lang->language_code ? 'show active' : '' }}" id="1{{ $lang->language_code }}" role="tabpanel"
                    aria-labelledby="{{ $lang->language_code }}" tabindex="0">
                    <input type="hidden" class="form-control" name="language_code[]" id="title" placeholder="Enter title"
                            value="{{ $lang->language_code }}">
                    <div class="mb-4">
                        <label for="description" class="form-label text-black">{{ config('constants.' . $lang->language_code . '.title') }}</label>
                        <input class="form-control" name="name[]" id="description" rows="3" value="{{ $materials[$key]['name'] }}" placeholder="Enter name"></input>
                            @error("name.$key")
                                <span class="alert alert-custom">
                                    {{ $message }}
                                </span>
                            @enderror
                    </div>
                    <div class="">
                        <label for="description" class="form-label text-black">{{ config('constants.' . $lang->language_code . '.unit') }}</label>
                        <input class="form-control" name="unit[]" id="description" rows="3"
                            placeholder="Enter unit" value="{{ $materials[$key]['unit'] }}"></input>
                            @error("unit.$key")
                                <span class="alert alert-custom">
                                    {{ $message }}
                                </span>
                            @enderror
                    </div>
                </div>
            @endforeach
        </div>
        <?php $material = $materials->first() ?>
        <div class="row mt-3">
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Số lượng</label>
                <input class="form-control" value="{{ $material->amount }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" name="amount" id="amount" rows="3" placeholder="Enter amount"></input>
                @error("amount")
                    <span class="alert alert-custom">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Chất lượng</label>
                <input class="form-control" value="{{ $material->quantity }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="quantity" id="quantity" rows="3" placeholder="Enter quantity"></input>
                @error("quantity")
                    <span class="alert alert-custom">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Tổng giá trị</label>
                <input class="form-control" value="{{ $material->total_cost }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="total_cost" id="total_cost" rows="3"placeholder="Enter total_cost"></input>
            </div>
            <div class="mb-3 col-3">
                <label for="status" class="form-label">Kiểu</label>
                <select name="type" class="form-select" id="status" style="width: 100%">
                    @foreach(config('constants.material_types') as $key => $type)
                        <option @if($material->type == $key) selected @endif value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-search  btn m-2 mr-0 py-1 text-white" value="Cập nhật"></input>
    </form>
@endsection
