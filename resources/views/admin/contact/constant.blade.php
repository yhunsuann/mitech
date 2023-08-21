@extends('admin.layout.layout') 

@section('content')
@include('admin.layout.partials.flag')
<h5 class="title-create">Cài đặt</h5>
<form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container p-0" id="container-form">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($languages as $key => $data)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-5 rounded-0 lang{{ $key == 0 ? ' active' : '' }}" id="{{ $data->language_code }}" data-coreui-toggle="pill" data-coreui-target="#{{ Str::slug($data->language_name) }}" type="button" role="tab" aria-controls="{{ $data->language_name }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $data->language_name }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content p-4 border border-dark-2 bg-white" id="pills-tabContent">
            @foreach ($languages as $key => $item)
                <div class="tab-pane fade{{ $key == 0 ? ' show active' : '' }}" id="{{ Str::slug($item->language_name) }}" role="tabpanel" aria-labelledby="{{ $item->language_code }}" tabindex="0">
                    @foreach($result as $data)
                        @php $trans = $data->trans->groupBy('language_code');@endphp
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="title" class="form-label text-black lable_add_contact">{{ !empty($trans[$item->language_code]) ? $trans[$item->language_code]->first()->name : '' }}</label>
                                </div>
                                @if($data->type == 'text')
                                    <div class="col-10">
                                        <input type="text" name="{{$item->language_code}}[{{ $data->id}}][value]" class="form-control edit-field" id="title" placeholder="Enter value" value="{{ !empty($trans[$item->language_code]) ? $trans[$item->language_code]->first()->value : '' }}">
                                    </div>
                                @elseif ($data->type == 'image')
                                <div class="col-10">
                                    @if(!empty($trans[$item->language_code]) && !empty($trans[$item->language_code]->first()->value))
                                        <img class="image-contact" src="{{ asset('storage/assets/img/constant/' . (!empty($trans[$item->language_code]) ? $trans[$item->language_code]?->first()->value : '')) }}" alt="image">
                                    @endif
                                    <input type="file"  accept="image/png, image/gif, image/jpeg" name="{{$item->language_code}}[{{ $data->id }}][value]" class="form-control upload_image edit-field" data-path="contact">
                                </div>
                                @elseif ($data->type == 'textArea')
                                    <div class="col-10">
                                        <textarea class="form-control edit-field" name="{{$item->language_code}}[{{ $data->id }}][value]" id="description" rows="3" placeholder="Enter description">{{ !empty($trans[$item->language_code]) ? $trans[$item->language_code]->first()->value : '' }}</textarea>
                                    </div>
                                @else
                                    <div class="col-10">
                                        <textarea name="{{$item->language_code}}[{{ $data->id }}][value]" class="summernote edit-field">{{ !empty($trans[$item->language_code]) ? $trans[$item->language_code]->first()->value : '' }}</textarea>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <input type="submit" class="btn btn-search btn-primary btn m-2 mr-0 mt-4 py-1 text-white" value="Save"></input>
</form>
@endsection
