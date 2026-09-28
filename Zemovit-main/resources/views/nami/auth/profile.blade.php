@extends('nami.layout.indexs.index')
@section('page-title')
    {{$bladeTitle}}
@endsection
@section('page-links')
    <li class="breadcrumb-item active" aria-current="page"> {{$bladeTitle}}</li>
@endsection
@section('content')
    <div class="row g-3">
        <div class="col-xxl-3 col-lg-4 col-md-4">
            <div class="list-group list-group-custom sticky-top me-xl-4" style="top: 100px;">
                <a class="list-group-item list-group-item-action" href="#list-item-1">{{__('auth.profile')}}</a>
                <a class="list-group-item list-group-item-action" href="#list-item-2">{{__("auth.change_password")}}</a>
            </div>
        </div>
        <div class="col-xxl-8 col-lg-8 col-md-8">
            <div id="list-item-1" class="card fieldset border border-muted mt-0">
                <span class="fieldset-tile text-muted bg-body">{{__('auth.profile')}}:</span>
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="from-submit-update-global" action="{{route('profile.update',$user->id)}}"  enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3 col-sm-4 col-form-label">{{__('auth.image')}}</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="image-input avatar xxl rounded-4" style="background-image: url({{asset('admin/assets/img/profile_av.png')}})">
                                        <div class="avatar-wrapper rounded-4" style="background-image: url({{showFile($user->image)}})"></div>
                                        <div class="file-input">
                                            <input type="file" class="form-control" name="image" id="file-input">
                                            <label for="file-input" class="fa fa-pencil shadow text-muted"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-sm-4 col-form-label">{{__("auth.name")}}*</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" class="form-control form-control-lg" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-sm-4 col-form-label">{{__("auth.email")}}*</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" class="form-control form-control-lg" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-sm-4 col-form-label">{{__("auth.phone")}}*</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="number" class="form-control form-control-lg" name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-lg btn-light me-2" type="reset">{{__("buttons.cancel")}}</button>
                                <button class="btn btn-lg btn-primary" type="submit">{{__("buttons.save")}}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="list-item-2" class="card fieldset border border-muted mt-5">

                <span class="fieldset-tile text-muted bg-body">{{__("auth.change_password")}}</span>
                <form method="post" action="{{route('change-password.update',$user->id)}}" class="from-submit-update-global p-lg-4 p-0" id="">
                    @method('put')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg " name="current_password" placeholder="{{__("auth.current_password")}}">
                                    </div>
                                    <div class="mb-1">
                                        {{--                                            <input type="password" class="form-control form-control-lg" name="new_password" placeholder="New Password">--}}
                                        <div class="mb-2 ">
                                            <input type="password" name="new_password" placeholder="{{__("auth.new_password")}}" class="form-control form-control-lg password-meter-input">
                                        </div>
                                        <div class="progress mb-1" style="height: 10px;">
                                            <div class="progress-bar-bar bg-primary-gradient" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="text-muted small">استخدم 8 أحرف أو أكثر مع مزيج من الأحرف والأرقام والرموز.</div>
                                    </div>
                                    <div>
                                        <input type="password" class="form-control form-control-lg" name="new_confirm_password" placeholder="{{__("auth.confirm_password")}}">
                                        {{--                                            <span class="text-muted small">Minimum 8 characters</span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-lg btn-light me-2" type="reset">{{__("buttons.cancel")}}</button>
                            <button class="btn btn-lg btn-primary" type="submit">{{__("auth.change_password")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection

