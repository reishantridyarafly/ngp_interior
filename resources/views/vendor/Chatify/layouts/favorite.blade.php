<div class="favorite-list-item">
    @if ($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ auth()->user()->avatar == null ? asset('storage/avatar/user-avatar.png') : asset('storage/avatar/' . auth()->user()->avatar) }}');">
        </div>
        <p>{{ strlen($user->name) > 5 ? substr($user->name, 0, 6) . '..' : $user->name }}</p>
    @endif
</div>
