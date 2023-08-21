@extends('admin.layout.layout')

@section('content')
@include('admin.layout.partials.flag')
<div class="row">
    <div class="col p-0">
        <h5 class="mb-4">Danh sách liên hệ</h5>
    </div>
</div>

<div class="row">
    <div class="col p-0">
        <h6 class="title">Tìm  kiếm</h6>
    </div>
</div>
<form class="mb-0" method="get">
    <div class="row search">
        <div class="col">
            @csrf
            <div class="row p-0 mt-3">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-form-label col-4 label-search" for="name">Tên</label>
                        <div class="col-8">
                            <input class="form-control keyword" autocomplete="off" value="{{ request()->name }}" type="text" placeholder="Nhập tên..." name="name" id="name">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-form-label col-4 label-search" for="email">Email</label>
                        <div class="col-8">
                            <input class="form-control keyword" autocomplete="off" type="text" value="{{ request()->email }}" placeholder="Nhập email..." name="email" id="email">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-0 mt-3">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-form-label col-4 label-search" for="phone">Số điện thoại</label>
                        <div class="col-8">
                            <input class="form-control keyword" autocomplete="off" value="{{ request()->phone_number }}" type="text" placeholder="Nhập số điện thoại.." name="phone_number" id="phone">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-form-label col-4 label-search" for="type">Danh mục</label>
                        <div class="col-8">
                            <select class="form-control" name="request_type" style="width: 100%">
                                <option value=""  selected>Chọn danh mục...</option>
                                <option value="installers" @if(request()->request_type == 'installers') selected @endif>Thầu thợ</option>
                                <option value="retailers" @if(request()->request_type == 'retailers') selected @endif>Cửa hàng đại lý</option>
                                <option value="distributors" @if(request()->request_type == 'distributors') selected @endif>Nhà phân phối</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col p-0 bottom-search">
            <input type="submit" class="btn-search btn btn-primary float-end m-2 mr-0 py-1" value="Tìm kiếm">
            <input type="reset" class="btn-reset btn btn-secondary text-dark float-end m-2 py-1" value="Làm mới" />
        </div>
    </div>
</form>

@csrf
<div class="row mt-5">
    <div class="col p-0">
        <h6 class="title">Danh sách liên hệ</h6>
    </div>
</div>
<div class="row">
    <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
        <table class="table caption-top bg-white table table-striped">
            <thead>
                <tr class="py-3">
                    <th scope="col"><b>Họ và tên</b></th>
                    <th scope="col"><b>Email</b></th>
                    <th scope="col"><b>Điện thoại</b></th>
                    <th scope="col"><b>Chức vụ</b></th>
                    <th scope="col" class="text-center"><b>Ngày gửi</b></th>
                    <th scope="col"><b>Danh mục</b></th>
                    <th scope="col" class="see-details text-center"><b>Hành động</b></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse($result as $data)
                <tr>
                    <td>{{ $data->full_name }}</td>
                    <td>{{ $data->email_address }}</td>
                    <td>{{ $data->distributor_phone }}</td>
                    <td>{{ $data->position }}</td>
                    <td class="text-center">{{ $data->created_at }}</td>
                    <td>{{ config('constants.' . ucfirst($data->form_type)) }}</td>
                    <td class="text-center action-form">
                        <a data-coreui-toggle="modal" data-coreui-target="#distributor_{{ $data->id }}" class="btn-edit"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;
                        <a data-id="{{ $data->id }}" m-type="distributor/form" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>             
                    </td>
                </tr>
                @empty
                    <td align="center" colspan="6">No data</td>
                @endforelse
            </tbody>
        </table>
        <div class="pagination--custom row">
            <div class="col-6 pagination-info">
                @php
                    $from = ($result->currentPage() - 1) * $result->perPage();
                    $to = $result->currentPage() * $result->perPage();
                    $total = $result->total()
                @endphp
                Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
            </div>
            <div class="pagination-box col-6">
                {{ $result->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@foreach($result as $data)
    <div class="modal fade table-modal" id="distributor_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-white">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Thông tin liên hệ nhà phân phối</h6>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <table class="bg-white table  mb-0">
                        <tbody>
                            <tr>
                                <td class="th-table">
                                    <b>Họ và tên</b>
                                </td>
                                <td>
                                    {{ $data->full_name }}
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td class="th-table">
                                    <b>Email</b>
                                </td>
                                <td>
                                    {{ $data->email_address }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Số điện thoại</b>
                                </td>
                                <td>
                                    {{ $data->distributor_phone }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Ngày tạo liên hệ</b>
                                </td>
                                <td>
                                    {{ $data->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Tên doanh nghiệp</b>
                                </td>
                                <td>
                                    {{ $data->address_1 }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Địa chỉ doanh nghiệp</b>
                                </td>
                                <td>
                                    {{ $data->address_2 }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Thành phố</b>
                                </td>
                                <td>
                                    {{ $data->city }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Nhà phân phối</b>
                                </td>
                                <td>
                                    {{ $data->district }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Kiểu</b>
                                </td>
                                <td>
                                    {{ $data->form_type }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
