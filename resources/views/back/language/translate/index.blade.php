@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ _c('Çeviriler') }}</h3>
            </div>
            <div class="card-body">
                <span><b>{{ _c('Çeviriyi düzenlemek için üstüne tıklayıp içine gidebilirsiniz.') }}</b></span> <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th>{{ _c('Anahtar Metin') }}</th>
                                <th> </th>
                                <th> </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (getAllWords() as $word)
                                    <td> <a href="">{{ _c($word->word_key) }}</a></td>
                                    <td width="5"><a href=""><i class="fa fa-pencil"></i></a></td>
                                    <td width="5"><a href="javascript:void(0)"><i class="fa fa-trash-o"
                                                id='click4'></i></a>

                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
