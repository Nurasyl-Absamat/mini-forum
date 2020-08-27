<div class="card">
    <div class="card-body">
        @if (Auth::check())
            <form action="{{ route('discuss.reply', ['id' => $discussion->id]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="reply"> Your Reply</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group text-center">
                    <button class="form-control btn btn-primary">
                        Reply
                    </button>
                </div>
            </form>
    @else
        <h2 class="text-center">
            <a href="{{route('login')}}" style="color: black; ">Sign in for leave a reply</a>
        </h2>
    @endif
</div>
