@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>

                            <th>
                                Edit
                            </th>

                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($channels as $channel)
                                <tr>
                                    <td>
                                        {{$channel->title}}
                                    </td>

                                    <td>
                                        <a href="{{route('channels.edit', ['channel' => $channel->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>

                                    <td>
                                        <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <button class="btn btn-sm btn-danger" type="submit">
                                                    DELETE
                                                </button>
                                            </div>
                                        </form>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>
                <a href="{{route('channels.create')}}" class="btn btn-lg">
                    <div class="btn-primary">Create</div>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
