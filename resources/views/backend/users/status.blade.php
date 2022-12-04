<label class="custom-switch mt-2">
    <input onclick="status({{$id}} ,{{$status}})" type="checkbox" name="custom-switch-checkbox"
           class="custom-switch-input status" {{ $status ? 'checked' : '' }}>
    <span class="custom-switch-indicator"></span>
</label>

<script>
    function status(id, status) {
        var active = status == 1 ? 0 : 1;

        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'user/changeStatus',
            data: {'status': active, 'user_id': id},
            success: function (data) {
                iziToast.show({
                    animateInside: true,
                    theme: 'light',
                    color: 'green', // blue, red, green, yellow
                    progressBarEasing: 'linear',
                    position: 'topRight',
                    message: data.success
                });

            }
        });
    }
</script>
