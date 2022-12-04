<a href="{{ $role == 'user' ? route('admin.users.edit', $id) : route('admin.merchant.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
    <i class="far fa-eye"></i>
</a>
