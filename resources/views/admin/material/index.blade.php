@extends('admin.layout.layout')

@section('content')
    @include('admin.layout.partials.flag')
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Trang chủ</span>
                </li>
                <li class="breadcrumb-item active"><span>vật liệu</span></li>
            </ol>
        </nav>
    </div>
    <div class="container-content">
    <form id="form-employee" class="mb-0" method="get">
        <div class="row px-4 mt-3">
            <div class="col p-0">
                <h5>Danh sách vật liệu</h5>
            </div>
            <div class="col search">
                <div class="row float-end search-row">
                <div class="col-5">
                        <div class="input-group">
                            <input placeholder="Nhập tên..." class="form-control" value="{{ request()->name }}" name="name" style="width: 100% !important"></input>
                        </div>
                    </div>
                    <div class="col-5">
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option selected="" value="">Chọn kiểu...</option>
                            @foreach(config('constants.material_types') as $key => $type)
                                <option value="{{ $key }}" @if(request()->type == $key) selected @endif>{{ $type }}</option>
                            @endforeach
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
                            <th scope="col" width="25%"><b>Tên vật liệu</b></th>
                            <th scope="col"><b>Kiểu</b></th>
                            <th scope="col"><b>Đơn vị</b></th>
                            <th scope="col"><b>Giá</b></th>
                            <th scope="col"><b>Ngày tạo</b></th>
                            <th scope="col"class="text-center"><b>Hành động</b></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">           
                        @forelse ($materials as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ config('constants.material_types')[$item->type] }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->created_at}}</td>
                                <td class="text-center action-form">
                                    <a href="{{ route('admin.material.edit', $item->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                    <a data-id="{{ $item->id }}" m-type="material" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>              
                                </td>
                            </tr>
                        @empty     
                        <td colspan="6" class="text-center">No data</td>    
                        @endforelse
                    </tbody>
                    </table>
                    <div class="pagination--custom row">
                        <div class="col-6 pagination-info">
                            @php
                                $from = ($materials->currentPage() - 1) * $materials->perPage();
                                $to = $materials->currentPage() * $materials->perPage();
                                $total = $materials->total()
                            @endphp
                            Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                        </div>
                        <div class="pagination-box col-6">
                            {{ $materials->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
