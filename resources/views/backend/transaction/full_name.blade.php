@php
    $user = \App\Models\User::find($user_id)
@endphp

{{$user->full_Name}}
