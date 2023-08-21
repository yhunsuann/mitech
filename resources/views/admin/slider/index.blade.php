@extends('admin.layout.layout') 
    @section('content')
    @include('admin.layout.partials.flag')
        <div class="container-fluid mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <span>Trang chủ</span>
                    </li>
                    <li class="breadcrumb-item active"><span>Slider</span></li>
                </ol>
            </nav>
        </div>
        <div class="container-content">
            <form id="form-employee" class="mb-0" method="get">
                <div class="row px-4 mt-2">
                    <div class="col-8 p-0">
                        <h5>Danh sách slider</h5>
                    </div>
                    <div class="col-4 search">
                        <div class="row float-end search-row">
                            <div class="col-9 p-0">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->keyword }}" class="form-control" type="text" placeholder="Nhập tên..">
                                </div>
                            </div>
                            <div class="col-3 group-btn-search">
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
                                <th scope="col"><b>Tên</b></th>
                                <th scope="col"><b>Hình ảnh</b></th>
                                <th scope="col"><b>Link</b></th>
                                <th scope="col" style="width: 150px"><b>Ngày tạo</b></th>
                                <th scope="col" style="width: 120px" class="text-center"><b>Hành động</b></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @forelse($sliders as $slider)
                            <tr style="vertical-align: middle">
                                <td>{{ $slider->name }}</td>
                                @if (!empty($slider->file))
                                    <td><img height="60px" width="100px" src="{{ asset('storage/assets/img/slider/' . $slider->file)}}" alt=""></td>
                                @else
                                    <td><img height="60px" width="100px" src="{{ asset('coreUi/assets/img/404.png') }}" alt=""></td>
                                @endif  
                                <td class="text-capitalize">{{ $slider->link }}</td>
                                <td class="text-capitalize">{{ $slider->created_at }}</td>
                                <td class="text-center action-form">
                                    <a href="{{ route('admin.slider.edit', $slider->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                                    <a data-id="{{ $slider->id }}" m-type="slider" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="text-center"><i>No data....</i></td>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="pagination--custom row mt-3">
                            <div class="col-5 pagination-info">
                                @php
                                    $from = ($sliders->currentPage() - 1) * $sliders->perPage();
                                    $to = $sliders->currentPage() * $sliders->perPage();
                                    $total = $sliders->total()
                                @endphp
                                Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                            </div>
                            <div class="pagination-box col-7">
                                {{ $sliders->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection