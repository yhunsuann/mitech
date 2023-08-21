@extends('admin.layout.layout')

@section('content')
    @include('admin.layout.partials.flag')
    <div class="row">
        <div class="col p-0">
            <h5 class="mb-4">Danh sách liên hệ bảo hành</h5>
        </div>
    </div>
    <div class="row">
        <div class="col p-0">
            <h6 class="title">Tìm kiếm</h6>
        </div>
    </div>
    <form class="mb-0" method="get">
        <div class="row search">
            <div class="col">
                @csrf
                <div class="row p-0 mt-3">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-form-label col-4 label-search" for="name">tên</label>
                            <div class="col-8">
                                <input class="form-control keyword" autocomplete="off" value="{{ request()->name }}" type="text" placeholder="Nhập tên..." name="name" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-form-label col-4 label-search" for="message">Email</label>
                            <div class="col-8">
                                <input class="form-control keyword" autocomplete="off" type="text" value="{{ request()->email }}" placeholder="email" name="email" id="messages">
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
            <h6 class="title">Danh sách liên hệ bảo hành</h6>
        </div>
    </div>
    <div class="row">
        <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
            <table class="table caption-top bg-white table table-striped">
                <thead>
                    <tr class="py-3">
                        <th scope="col"><b>Họ</b></th>
                        <th scope="col"><b>Tên</b></th>
                        <th scope="col"><b>Email</b></th>
                        <th scope="col"><b>Số điện thoại</b></th>
                        <th scope="col" class="text-center"><b>Ngày liên hệ</b></th>
                        <th scope="col" class="see-details text-center"><b>Hành động</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($replacements as $data)
                    <tr>
                        <td>{{ $data->first_name }}</td>
                        <td>{{ $data->last_name }}</td>
                        <td>{{ $data->email_address }}</td>
                        <td>{{ $data->phone_number }}</td>
                        <td class="text-center">{{ $data->created_at }}</td>
                        <td class="text-center action-form">
                            <a data-id="{{ $data->id }}" m-type="warranty" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>             
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
                        $from = ($replacements->currentPage() - 1) * $replacements->perPage();
                        $to = $replacements->currentPage() * $replacements->perPage();
                        $total = $replacements->total()
                    @endphp
                    Hiển thị {{ $from }} tới {{ $to < $total ? $to : $total  }} của {{ $total }} mục
                </div>
                <div class="pagination-box col-6">
                    {{ $replacements->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
