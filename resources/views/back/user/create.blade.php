@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kullanıcı Oluştur</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <small><li>{{ $error }}</li></small>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Profil Foto</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="profile_photo_path" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Parola</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password">


                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label> Menü Yetkileri</label>
                        <div class="row">
                            @foreach (config('menu') as $menu)
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



                        <div align="right" class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>



                </form>
            </div>
        </div>
   
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
@section('css')
@endsection
@section('js')
@endsection
