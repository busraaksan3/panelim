@extends('back.layout')
@section('content')

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Settings</h3>
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
                <form action="{{route('settings.update',$settings->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" readonly type="text"
                                       value="{{$settings->settings_description}}">
                            </div>
                        </div>
                    </div>

                    @if($settings->settings_type=="file")
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input class="form-control" name="settings_value" required type="file">
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                @if($settings->settings_type=="text")
                                    <input class="form-control" type="text" name="settings_value" required
                                           value="{{$settings->settings_value}}">
                                @endif

                                @if($settings->settings_type=="textarea")
                                    <textarea class="form-control"
                                              name="settings_value">{{$settings->settings_value}}</textarea>
                                @endif

                                @if($settings->settings_type=="ckeditor")
                                    <textarea class="form-control" id="editor1"
                                              name="settings_value">{{$settings->settings_value}}</textarea>
                                @endif

                                    @if($settings->settings_type=="file")
                                        <img width="100" src="/images/settings/{{$settings->settings_value}}" alt="">
                                    @endif

                                    <script>
                                        CKEDITOR.replace('editor1');
                                    </script>

                            </div>
                        </div>

                        @if($settings->settings_type=="file")
                            <input type="hidden" name="old_file" value="{{$settings->settings_value}}">
                        @endif

                        <div align="right" class="card-footer">
                            <button type="submit" class="btn btn-success">Düzenle</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>



@endsection
@section('css')@endsection
@section('js')@endsection
