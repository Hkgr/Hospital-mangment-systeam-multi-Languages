<div>
    @if($selected_conversation)
    <form wire:submit.prevent="sendMessage">
        <div class="main-chat-footer">
            <input class="form-control" wire:model="body" data-online-only placeholder="اكتب رسالتك..." type="text">
            <button class="main-msg-send" type="submit" data-online-only><i class="far fa-paper-plane"></i></button>
        </div>
    </form>
    @endif
</div>

