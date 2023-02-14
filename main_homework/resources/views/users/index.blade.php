@extends('layout.index')
@section('header-link-active_users')active @endsection

@section('content')

    <h2 class="text-center my-5">Список пользователей</h2>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="mt-5 table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection
