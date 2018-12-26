@extends('layouts.layoutAdmin')

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit') }}</div>

            <div class="card-body">
                <form method="POST" action="{{route('User.SaveEdit') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input  name="userId" type="text" hidden value="{{$user->userId}} ">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$errors->has('name')? old('name'): $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birth" type="date" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" name="birth" value="{{$errors->has('birth')? old('birth'): $user->birthday }}" required autofocus>

                            @if ($errors->has('birth'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{  $errors->has('phone')? old('phone'): $user->phone }}" required autofocus>

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    @if($user->role==2)
                    <div class="form-group row">
                        <label for="roomId" class="col-md-4 col-form-label text-md-right">{{ __('Room') }}</label>

                        <div class="col-md-6">
                            <select id="roomId" type="text" class="form-control{{ $errors->has('roomId') ? ' is-invalid' : '' }}" name="roomId"  required >
                                @foreach($room as $item)
                                    <option  value="{{$item->roomId}}" @if($item->roomId == $user->roomId ) selected @endif>{{$item->roomName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="text" name='oldroom' value="{{$user->roomId}}" hidden>
                    @endif
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} " name="email" value="{{ $errors->has('email') ? old('email'): $user->email }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }} " name="address" value="{{ $errors->has('address') ? old('address'): $user->address }}" required>

                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">File:</label>
                        <div class="col-md-6" >
                            <input class="form-control " name="image" type="file" >
                            <input type="text" hidden name="old_image" value="{{$user->imgLink}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
