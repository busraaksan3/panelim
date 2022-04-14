@extends('back.layout')
@section('content')
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Kullanıcı Düzenle</h1>
            
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <form action="{{ route('user.update', $users->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <div class="card-title">Parola Düzenle</div>
                        </div>
                        <div class="card-body">
                            <div class="text-center chat-image mb-5">
                                <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                    <img alt="avatar" src="/images/users/{{$users->profile_photo_path}}" class="brround">
                                </div>
                                <div class="main-chat-msg-name">

                                    <h5 class="mb-1 text-dark fw-semibold">{{ $users->name }}</h5>

                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $users->role }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Parola Değiştir</label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 form-control" name="password" type="password">

                                </div>
                                <!-- <input type="password" class="form-control" value="password"> -->
                            </div>
                        </div>

                </div>
                <div class="card panel-theme">
                    <div class="card-header">
                        <div class="float-start">
                            <h3 class="card-title">İletişim</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="list-group no-margin">
                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href=""><i class="fe fe-mail"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">{{ $users->email }}</a>
                            </li>

                            <li class="list-group-item d-flex ps-3">
                                <div class="social social-profile-buttons me-2">
                                    <a class="social-icon text-primary" href=""><i class="fe fe-phone"></i></a>
                                </div>
                                <a href="javascript:void(0)" class="my-auto">+125 5826 3658</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kullanıcı Düzenle</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Profil Fotosu Seç</label>

                                    <input class="form-control" name="profile_photo_path" type="file">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputname">Adı</label>
                                    <input class="form-control" type="text" name="name" value="{{ $users->name }}">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                value="{{ $users->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputnumber">Telefon</label>
                            <input type="number" name="tel" class="form-control" id="exampleInputnumber"
                                placeholder="Contact number">
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Menü Yetkileri</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                @foreach(config("menu") as $menu)

                                <div class="col-lg-3">
                                    <label>
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            checked="">
                                        <span class="custom-switch-indicator me-3"></span>
                                        <span class="custom-switch-description mg-l-10">{{ $menu['name'] }}</span>
                                    </label>
                                </div>
                           
                               @endforeach
                            </div>

                            </div>
                        </div>
                    </div>
                   

                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Save</button>

                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- ROW-1 CLOSED -->
@endsection
@section('css')
@endsection
@section('js')
@endsection
