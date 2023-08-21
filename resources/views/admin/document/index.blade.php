@extends('admin.layout.layout') 
    @section('content')
    @include('admin.layout.partials.flag')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                       <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item active"><span>tài liệu</span></li>
                </ol>
            </nav>
        </div>
        <div class="container-content">
        <form id="form-employee" class="mb-0" method="get">
            <div class="row px-4 mt-2">
                <div class="col p-0">
                    <h5>Danh sách tài liệu</h5>
                </div>
                <div class="col search">
                    <div class="row float-end search-row">
                        <div class="col-6 p-0">
                            <div class="input-group">
                                <input name="keyword" value="{{ request()->keyword }}" class="form-control" type="text" placeholder="Nhập tên..">
                            </div>
                        </div>
                        <div class="col-4 px-1">
                            <select name="type" class="form-select" id="status" style="width: 100%">
                                <option value="">Chọn danh mục...</option>
                                <option value="brochure/Leaflet"  @if(request()->type == 'brochure/Leaflet') selected @endif>Brochure/Leaflet</option>
                                <option value="certificates"  @if(request()->type == 'certificates') selected @endif>Giấy chứng nhận</option>
                                <option value="drawings"  @if(request()->type == 'drawings') selected @endif>Bản vẽ</option>
                                <option value="installation Guide"  @if(request()->type == 'installation Guide') selected @endif>Hướng dẫn thi công</option>
                                <option value="submittal Sheet"  @if(request()->type == 'submittal Sheet') selected @endif>Submittal Sheet</option>
                                <option value="test reports"  @if(request()->type == 'test reports') selected @endif>Kết quả thử nghiệm</option>
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
                                <th scope="col"><b>Tên tài liệu</b></th>
                                <th scope="col"><b>Kiểu</b></th>
                                <th scope="col"><b>Tài liệu</b></th>
                                <th scope="col"><b>Ngày tạo</b></th>
                                <th scope="col" class="text-center"><b>Hành động</b></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @forelse($documents as $document)
                            <tr>
                                <td>{{ $document->name }}</td>
                                <td class="text-capitalize">{{ config('constants.' .$document->type) }}</td>
                                <td>{{ $document->file }}</td>
                                <td class="text-capitalize">{{ $document->created_at }}</td>
                                <td class="text-center action-form">
                                    <a href="{{ route('admin.document.edit', $document->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                    <a data-id="{{ $document->id }}" m-type="document" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
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
                                    $from = ($documents->currentPage() - 1) * $documents->perPage();
                                    $to = $documents->currentPage() * $documents->perPage();
                                    $total = $documents->total()
                                @endphp
                                Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                            </div>
                            <div class="pagination-box col-7">
                                {{ $documents->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection