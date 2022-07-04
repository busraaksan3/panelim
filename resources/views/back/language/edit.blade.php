@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <small>
                                        <li>{{ $error }}</li>
                                    </small>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('language.update', $languages->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @isset($languages->flag)
                        <div class="form-group">
                            <label> Bayrak</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/flag/{{ $languages->flag }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset
                    <div class="form-group">
                        <label>Bayrak Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="flag" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dil Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name"
                                    value="{{ $languages->name }}">
                            </div>
                        </div>
                    </div>
                   
                            <input type="hidden" name="old_file" value="{{ $languages->flag }}">

                            <div align="right" class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
