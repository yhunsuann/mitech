@if(session()->has('errors'))
    <div class="alert alert-danger">
        {{ session('errors')->first() }}
    </div>
    @php
        session()->forget('errors');
    @endphp
@elseif(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @php
        session()->forget('success');
    @endphp
@endif
