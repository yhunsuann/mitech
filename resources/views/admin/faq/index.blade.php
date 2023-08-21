@extends('admin.layout.layout') 
    @section('content')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item active"><span>Câu hỏi thường gặp</span></li>
                </ol>
            </nav>
        </div>
        <div class="container-content">
            <form id="form-employee" class="mb-0" method="get">
                <div class="row px-4 mt-2">
                    <div class="col p-0">
                        <h5>Danh sách câu hỏi thường gặp</h5>
                    </div>
                    <div class="col search">
                        <div class="row float-end search-row">
                            <div class="col-6 p-0">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->keyword }}" class="form-control" type="text" placeholder="Nhập tên..">
                                </div>
                            </div>
                            <div class="col-4 px-1">
                                <select name="topic" class="form-select" id="status" style="width: 100%">
                                <option value="" selected>Chọn danh mục..</option>
                                <option value="technical" @if(request()->topic == 'technical') selected @endif>Kỹ thuật</option>
                                <option value="products" @if(request()->topic == 'products') selected @endif>Sản phẩm</option>
                                <option value="warranty" @if(request()->topic == 'warranty') selected @endif>Bảo hành</option>
                                </select>
                            </div>
                            <div class="col-1 px-2">
                                <a type="button" id="submit-button" class="search-button">
                                    <svg class="icon-search">
                                    <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-1 pr-3">
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
                                <th scope="col" width ="300px"><b>Câu hỏi</b></th>
                                <th scope="col" width ="600px"><b>Trả lời</b></th>
                                <th scope="col"><b>Chủ đề</b></th>
                                <th scope="col"><b>Trạng thái</b></th>
                                <th scope="col" class="text-center"><b>Hành động</b></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @forelse($faqs as $faq)
                            <tr>
                                <td><p class ="td-text-faq">{{ $faq->question }}</p></td>
                                <td><p class ="td-text-faq">{{ $faq->answer }}</p></td>
                                <td class="text-capitalize">{{ $faq->topic }}</td>
                                <td class="text-capitalize">{{ $faq->status }}</td>
                                <td class="text-center action-form">
                                    <a href="{{ route('admin.faq.edit', $faq->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                    <a data-id="{{ $faq->id }}" m-type="faq" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
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
                                    $from = ($faqs->currentPage() - 1) * $faqs->perPage();
                                    $to = $faqs->currentPage() * $faqs->perPage();
                                    $total = $faqs->total()
                                @endphp
                                Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                            </div>
                            <div class="pagination-box col-7">
                                {{ $faqs->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection