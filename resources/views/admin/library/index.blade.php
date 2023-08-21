@extends('admin.layout.layout') 
    @section('content')
    @include('admin.layout.partials.flag')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item active"><span>Thư viện</span></li>
                </ol>
            </nav>
        </div>
        <div class="container-content">
            <form id="form-employee" class="mb-0" method="get">
                <div class="row px-4 mt-2">
                    <div class="col-6 p-0">
                        <h5>Danh sách thư viện</h5>
                    </div>
                    <div class="col-6 search">
                        <div class="row float-end search-row">
                            <div class="col-6 p-0">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->keyword }}" class="form-control" type="text" placeholder="Nhập tên..">
                                </div>
                            </div>
                            <div class="col-4 px-1">
                                <select name="type" class="form-select" id="status" style="width: 100%">
                                <option value="" selected>Chọn danh mục</option>
                                <option value="classic" @if(request()->type == 'classic') selected @endif>Cổ điển</option>
                                <option value="modern" @if(request()->type == 'modern') selected @endif>Hiện đại</option>
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
                                <th scope="col"><b>Tên thư viện</b></th>
                                <th scope="col"><b>Kiểu</b></th>
                                <th scope="col"><b>Ảnh đại diện</b></th>
                                <th scope="col"><b>Ngày tạo</b></th>
                                <th scope="col" class="text-center"><b>Hành động</b></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @forelse($libraries as $library)
                            <tr>
                                <td>{{ $library->name }}</td>
                                <td class="text-capitalize">{{ config('constants.' .$library->type) }}</td>
                                @if (!empty($library->avatar))
                                <td><img height="60px" width="100px" src="{{ asset('storage/assets/img/library/' . $library->avatar)}}" alt=""></td>
                                @else
                                <td><img height="60px" width="100px" src="{{ asset('coreUi/assets/img/404.png') }}" alt=""></td>
                                @endif  
                                <td class="text-capitalize">{{ $library->created_at }}</td>
                                <td class="text-center action-form">
                                    <a href="{{ route('admin.library.edit', $library->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                    <a data-id="{{ $library->id }}" m-type="library" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="text-center">Nodata</td>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="pagination--custom row mt-3">
                            <div class="col-5 pagination-info">
                                @php
                                    $from = ($libraries->currentPage() - 1) * $libraries->perPage();
                                    $to = $libraries->currentPage() * $libraries->perPage();
                                    $total = $libraries->total()
                                @endphp
                                Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                            </div>
                            <div class="pagination-box col-7">
                                {{ $libraries->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection