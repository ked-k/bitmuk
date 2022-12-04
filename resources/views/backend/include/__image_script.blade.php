@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#image-upload-" + @json($key),   // Default: .image-upload
                preview_box: "#image-preview-" +@json($key),  // Default: .image-preview
                label_field: "#image-label",    // Default: .image-label
                label_default: "'.__('Choose File').'",   // Default: Choose File
                label_selected: "'.__('Choose File').'",  // Default: Change File
                no_label: false                 // Default: false
            });

        });
    </script>
@endpush
