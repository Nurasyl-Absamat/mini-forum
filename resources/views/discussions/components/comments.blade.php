
@foreach ($discussion->replies as $r)
<div class="card border-primary primary mb-3">
    <div class="card-header">

        @if ($r->is_reply_by_auth_user())
            <a href="{{route('reply.delete', ['id' => $r->id])}}" class="btn btn-sm btn-danger" style="float: right">Delete</a>
        @endif

        <p>{{$r->user->name}}, <b> {{ $r->created_at->diffForHumans() }} </b></p>

    </div>

    <div class="card-body">

        <h5 class="text-center">
            {{ $r->content }}
        </h5>
    </div>
    <div class="card-footer">
        <div>
            @if ($r->is_liked_by_auth_user())
                <a href=" {{ route('reply.unlike', ['id' => $r->id]) }} " class="btn btn-secondary btn-sm" style="min-width: 80px">Unlike <span class="badge badge-light">{{ $r->likes->count() }}</span></a>
            @else
                <a href=" {{ route('reply.like', ['id' => $r->id]) }} " class="btn btn-success btn-sm" style="min-width: 80px">Like <span class="badge badge-light">{{ $r->likes->count() }}</span></a>
            @endif

        </div>

    </div>
</div>
@endforeach
