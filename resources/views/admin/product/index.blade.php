@extends('admin.layout.layout') 

@section('content')
    @include('admin.layout.partials.flag')
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Trang chủ</span>
                </li>
                <li class="breadcrumb-item active"><span>Sản phẩm</span></li>
            </ol>
        </nav>
    </div>
    <div class="container-content">
    <form id="form-employee" class="mb-0" method="get">
        <div class="row px-4 mt-3">
            <div class="col p-0">
                <h5>Danh sách sản phẩm</h5>
            </div>
            <div class="col search">
                <div class="row float-end search-row">
                    <div class="col-5">
                        <div class="input-group">
                            <input class="form-control" value="{{ request()->name }}" name="name" placeholder="Nhập tên sản phẩm.."></input>
                        </div>
                    </div>
                    <div class="col-5">
                            <select name="category" class="form-select" id="status" style="width: 100%">
                                <option value="" selected>Chọn kiểu...</option>
                                @if(request()->category)
                                    <option value="{{ request()->category }}" id="selected-request" selected>{{ request()->category }}</option>
                                @endif
                                @foreach($category as $cate)
                                    <option value="{{ $cate->name_category }}">{{ $cate->name_category }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-2 group-btn-search">
                        <a type="button" id="submit-button" class="search-button">
                            <svg class="icon-search">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                            </svg>
                        </a>
                        <a  class="reset-button">
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
                            <th scope="col" width="15%"><b>Tên sản phẩm</b></th>
                            <th scope="col" width="15%"><b>Danh mục sản phẩm</b></th>
                            <th scope="col"><b>Đơn vị</b></th>
                            <th scope="col"><b>Giá</b></th>
                            <th scope="col"><b>Ảnh</b></th>
                            <th scope="col"><b>Ngày tạo</b></th>
                            <th scope="col"class="text-center"><b>Hành động</b></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">           
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name_category }}</td>
                            <td>{{$item->thickness_unit }}</td>
                            <td>{{ $item->price }}</td>
                            @if(!empty($item->avatar))
                                <td><img width="70px" height="40px" src="{{ asset('storage/assets/img/product/'.$item->avatar)}}" alt=""></td>
                            @else
                                <td><img width="70px" height="40px" src="{{ asset('coreUi/assets/img/404.png') }}" alt=""></td>
                            @endif
                            <td>{{ $item->created_at}}</td>
                            <td class="text-center action-form">
                                <a href="{{ route('admin.product.edit', $item->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                <a data-id="{{ $item->id }}" m-type="product" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                        </tbody>
                    </table>
                    <div class="pagination--custom row">
                        <div class="col-6 pagination-info">
                            @php
                                $from = ($products->currentPage() - 1) * $products->perPage();
                                $to = $products->currentPage() * $products->perPage();
                                $total = $products->total()
                            @endphp
                            Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                        </div>
                        <div class="pagination-box col-6">
                            {{ $products->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection