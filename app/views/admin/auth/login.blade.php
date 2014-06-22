@extends('admin._layouts.default')

@section('main')

        <div id="login" class="login">

                {{ Form::open() }}
                        <div class="control-group">
                                {{ Form::label('email', 'Email') }}
                                <div class="controls">
                                        {{ Form::text('email') }}
                                </div>
                                @if ($errors->has('login'))
                                {{ Notification::showAll() }}
                                @endif

                        </div>

                        <div class="control-group">
                                {{ Form::label('password', 'Password') }}
                                <div class="controls">
                                        {{ Form::password('password') }}
                                </div>
                        </div>

                        <div class="form-actions">
                                {{ Form::submit('Login', array('class' => 'btn btn-inverse btn-login')) }}
                        </div>

                {{ Form::close() }}
        </div>

@stop