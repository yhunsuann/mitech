@extends('admin.layout.layout')

@section('content')
@include('admin.layout.partials.flag')
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Trang chủ</span>
                </li>
                <li class="breadcrumb-item active"><span>nhà phân phôi</span></li>
            </ol>
        </nav>
    </div>
    <div class="container-content">
    <form id="form-employee" class="mb-0" method="get">
        <div class="row px-4 mt-3">
            <div class="col p-0">
                <h5>Danh sách nhà phân phối</h5>
            </div>
            <div class="col search">
                <div class="row float-end search-row">
                <div class="col-5">
                        <div class="input-group">
                            <input placeholder="Nhập tên..." class="form-control" value="{{ request()->title }}" name="title" style="width: 100% !important"></input>
                        </div>
                    </div>
                    <div class="col-5">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected="" value="">Chọn trạng thái</option>
                            <option value="Active">Hoạt động</option>
                            <option value="InActive">Không hoạt động</option>
                        </select>
                    </div>
                    <div class="col-2 group-btn-search">
                        <a type="button" id="submit-button" class="search-button">
                            <svg class="icon-search">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                            </svg>
                        </a>
                        <a class="reset-button">
                            <i class="fa fas fa-undo"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="row mt-4">
            <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
                <table class="table caption-top bg-white table table-striped table-hover mb-1">
                    <thead>
                        <tr class="py-3">
                            <th scope="col" width="25%"><b>Tên</b></th>
                            <th scope="col"><b>Danh mục</b></th>
                            <th scope="col"><b>Thành phố</b></th>
                            <th scope="col"><b>Sô điện thoại</b></th>
                            <th scope="col"><b>Trạng thái</b></th>
                            <th scope="col"><b>Ngày tạo</b></th>
                            <th scope="col"class="text-center"><b>Hành động</b></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">           
                        @forelse ($distributors as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ config('constants.' .$item->category) }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ config('constants.' .$item->status) }}</td>
                                <td>{{ $item->created_at}}</td>
                                <td class="text-center action-form">
                                    <a href="{{ route('admin.distributor.edit', $item->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                    <a data-id="{{ $item->id }}" m-type="distributor" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>             
                                </td>
                            </tr>
                        @empty     
                        <td colspan="7" class="text-center">No data</td>    
                        @endforelse
                    </tbody>
                    </table>
                    <div class="pagination--custom row">
                        <div class="col-6 pagination-info">
                            @php
                                $from = ($distributors->currentPage() - 1) * $distributors->perPage();
                                $to = $distributors->currentPage() * $distributors->perPage();
                                $total = $distributors->total()
                            @endphp
                            Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                        </div>
                        <div class="pagination-box col-6">
                            {{ $distributors->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @foreach($distributors as $data)
    <div class="modal fade table-modal" id="distributor_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-white">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Information Distributor</h6>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <table class="bg-white table  mb-0">
                        <tbody>
                            <tr>
                                <td class="th-table">
                                    <b>ID</b>
                                </td>
                                <td>
                                    {{ $data->id }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Latiture</b>
                                </td>
                                <td>
                                    {{ $data->latitude }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Longiture</b>
                                </td>
                                <td>
                                    {{ $data->longitude }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Name</b>
                                </td>
                                <td>
                                    {{ $data->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Location</b>
                                </td>
                                <td>
                                    {{ $data->location }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>City</b>
                                </td>
                                <td>
                                    {{ $data->city }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Region</b>
                                </td>
                                <td>
                                    {{ $data->region }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Phone</b>
                                </td>
                                <td>
                                    {{ $data->phone_number }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Website</b>
                                </td>
                                <td>
                                    {{ $data->website }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Email</b>
                                </td>
                                <td>
                                    {{ $data->email }}
                                </td>
                            </tr>
                            <tr>
                                <td class="th-table">
                                    <b>Category</b>
                                </td>
                                <td>
                                    {{ $data->category }}
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
