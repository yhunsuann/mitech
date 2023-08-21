<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog bg-white">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You are sure that it delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm text-white btn-secondary" data-coreui-dismiss="modal">Close</button>
                <a id="btn-delete-modal" type="button" href="" class="btn btn-sm text-white btn-danger px-4">Delete</a>
            </div>
        </div>
    </div>
</div>
@if(isset($qty))
    <script>
        var qty = parseInt("{{ $qty }}"); 
        if (qty > 0) {
            for (var i = 0; i < qty; i++) {
                CKEDITOR.replace('editor'+i, {
                    filebrowserBrowseUrl: "{{ asset('assets/vendor/ckfinder/ckfinder.html') }}",
                    filebrowserImageBrowseUrl: "{{ asset('assets/vendor/ckfinder/ckfinder.html?type=Images') }}",
                    filebrowserUploadUrl: "{{ asset('assets/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                    filebrowserImageUploadUrl: "{{ asset('assets/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}"
                }); 
            }
        }
    </script>
@endif
<script src="{{ asset('coreUi/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
<script src="{{ asset('coreUi/vendors/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('coreUi/js/main.js')}}"></script>
<script src="{{ asset('coreUi/js/custom.js')}}"></script>
<script src="{{ asset('coreUi/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('coreUi/js/bootstrap-datepicker.min.js') }}"></script>
@yield('js-page')
