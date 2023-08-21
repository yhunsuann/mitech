@extends('admin.layout.layout') 

@section('content') 
    <h4 class="mb-4">{{ !empty($distributor->id) ? 'Cập nhật' : 'Thêm mới' }} nhà phân phối</h4>
    <h5 class="title-create">{{ !empty($distributor->id) ? 'Cập nhật nhà phân phối' : 'Thêm nhà phân phối' }}</h5>
    <form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-black">Tên<span class="strong-red"> *</span></label>
            <input type="text" class="form-control" value="{{ old('name', $distributor->name) }}" name="name" id="name" placeholder="Vui lòng nhập tên">
            @if($errors->has('name'))
                <span class="alert alert-custom">
                        {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <div class="mt-3 row">
            <div class="mb-3 col-6">
                <label for="description" class="form-label text-black">Địa chỉ<span class="strong-red"> *</span></label>
                <input type="text" class="form-control" value="{{ old('location', $distributor->location) }}" name="location" id="location" placeholder="Vui lòng nhập địa chỉ">
                @if($errors->has('location'))
                    <span class="alert alert-custom">
                        {{ $errors->first('location') }}
                    </span>
                @endif
            </div>
            <div class="mb-3 col-6">
                <label for="email" class="form-label">Email<span class="strong-red"> *</span></label>
                <input type="text" class="form-control" value="{{ old('email', $distributor->email) }}" name="email" multiple placeholder="Vui lòng nhập email">
                @if($errors->has('email'))
                    <span class="alert alert-custom">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <div class="mb-3 col-6">
                <label for="description" class="form-label text-black">Tỉnh/Thành phố<span class="strong-red"> *</span></label>
                <select class="form-control" name="city" id="city">
                    <option value="">Vui lòng chọn</option>
                    @foreach($data as $key => $item)
                        <option value="{{$item['Name']}}" @if(old('city', $distributor->city) == $item['Name']) selected @endif data-id="{{ $item['Id'] }}">{{$item['Name']}}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="alert alert-custom">
                        {{ $errors->first('city') }}
                    </span>
                @endif
            </div>
            <div class="mb-3 col-6">
                <label for="description" class="form-label text-black">Quận/huyện<span class="strong-red"> *</span></label>
                <select class="form-control" name="region" id="district">
                </select>
                @if($errors->has('region'))
                    <span class="alert alert-custom">
                        {{ $errors->first('region') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <div class="mb-3 col-6">
                <label for="latitude" class="form-label">Kinh độ<span class="strong-red"> *</span></label>
                <input type="text" class="form-control" value="{{ old('latitude', $distributor->latitude) }}" name="latitude" multiple placeholder="Vui lòng nhập kinh độ">
                @if($errors->has('latitude'))
                    <span class="alert alert-custom">
                        {{ $errors->first('latitude') }}
                    </span>
                @endif
            </div>
            <div class="mb-3 col-6">
                <label for="longitude" class="form-label">Vĩ độ<span class="strong-red"> *</span></label>
                <input type="text" class="form-control" value="{{ old('longitude', $distributor->longitude) }}" name="longitude" multiple placeholder="Vui lòng nhập vỹ độ">
                @if($errors->has('longitude'))
                    <span class="alert alert-custom">
                        {{ $errors->first('longitude') }}
                    </span>
                @endif
            </div>
            
        </div>
        <div class="row mt-3">
            <div class="mb-3 col-6">
                <label for="phone_number" class="form-label">Số điện thoaị<span class="strong-red"> *</span></label>
                <input type="text" class="form-control" value="{{ old('phone_number', $distributor->phone_number) }}" name="phone_number" multiple placeholder="Vui lòng nhập số điện thoại">
                @if($errors->has('phone_number'))
                    <span class="alert alert-custom">
                        {{ $errors->first('phone_number') }}
                    </span>
                @endif
            </div>
            <div class="mb-3 col-6">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" value="{{ old('website', $distributor->website) }}" name="website" multiple placeholder="Vui lòng nhập địa chỉ trang web">
                @if($errors->has('website'))
                    <span class="alert alert-custom">
                        {{ $errors->first('website') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <div class="mb-3 col-6">
                <label for="status" class="form-label">Danh mục</label>
                <select name="category" class="form-select" id="category" style="width: 100%">
                    <option value="Retailers" @if(old('category', $distributor->category) == 'Retailers') selected @endif>Nhà Phân Phối</option>
                    <option value="Distributors" @if(old('category', $distributor->category) == 'Distributors') selected @endif>Cửa hàng đại lý</option>
                    <option value="Installers" @if(old('category', $distributor->category) == 'Installers') selected @endif>Thầu thợ</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="status" style="width: 100%">
                    <option value="active" @if(old('status', $distributor->status) == 'active') selected @endif>Hoạt động</option>
                    <option value="inactive" @if(old('status', $distributor->status) == 'inactive') selected @endif>Không hoạt động</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-save text-white" value="{{ !empty($distributor->id) ? 'Cập nhật' : 'Tạo' }}"></input>
    </form>
@endsection

@section('js-page')
<script>
    let locationData = @json($data);
    function loadDistrict() {
        var id =  $('#city')?.find(":selected")?.attr('data-id') || 0;
        const cityresult = locationData.filter(n => n.Id === id);

        for (const k of cityresult[0].Districts) {
            $('#district').append(new Option(k.Name, k.Name));
        }
    }

    let districtName = "{{ $distributor->region }}";
    if (districtName != '') {
        loadDistrict();
        $('#district').val(districtName);
    }
    
    $('#city').on('change', function () {
        $('#district').find('option').remove();
        loadDistrict();
    })
</script>
@endsection