@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Language</h3>
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
                <form action="{{ route('language.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

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
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                    </div>


                    <div align="right" class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
            </div>


            </form>
        </div>
    </div>
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
