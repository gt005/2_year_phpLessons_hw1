@extends('layout.index')
@section('header-link-active_users')active @endsection
@section('content')
    <div class="container">
        <h2 class="text-center mt-5">Создание пользователя</h2> <br>
        <a class="btn btn-outline-secondary mb-5" href="{{ route('users.index') }}"> Назад</a>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        <div class="row">
            <div class="mb-3 col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Имя','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="mb-3 col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="mb-3 col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Пароль','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="mb-3 col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Повторить пароль','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="mb-3 col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-12 mt-3 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-secondary">Создать</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
