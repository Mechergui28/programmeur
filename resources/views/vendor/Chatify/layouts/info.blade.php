{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex">
    <span class="m-topbar__userpic">
        <img src="/storage/users-avatar/{{ Auth::user()->avatar }}" style="vertical-align: middle;
        height: 100px;
        border-radius: 50%;" alt="{{ Auth::user()->name }}"/>
    </span>
</div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">shared photos</p>
    <div class="shared-photos-list"></div>
</div>
