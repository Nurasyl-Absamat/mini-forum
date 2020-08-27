@extends('layouts.app')

@section('content')
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
                                        <a href="{{ route('discuss.showChannel', ['channel' => $channel->id]) }}">{{$channel->title}}</a>
                                    </td>


                                    <td>
                                        <a href="{{route('channels.edit', ['channel' => $channel->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>

                                    <td>
                                        <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group">
                                                <button class="btn btn-sm btn-danger" type="submit">
                                                    Delete
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

@endsection
