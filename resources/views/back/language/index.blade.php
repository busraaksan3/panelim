@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Diller</h3>
            </div>
            <div class="card-body">
                <div align="right">
                    <a href="{{ route('language.create') }}"><button class="btn btn-primary"><i
                                class="fa fa-plus"></i></button></a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>

                                <th>Dil Adı</th>                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['lang'] as $language)
                                <td><img style="height: 30px; width:50px;" src="../images/flag/{{ $language['flag'] }}" alt="">  {{ $language['name'] }}</td>
                                
                                <td width="5"><a href="{{ route('language.edit', $language->id) }}"><i
                                            class="fa fa-pencil"></i></a></td>
                                <td width="5"><a href="javascript:void(0)"><i class="fa fa-trash-o" id='click5'></i></a>
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
    <script>
        $(document).on("click", "#click5", function(e) {
            $('body').removeClass('timer-alert');

            swal({
                    title: "Uyarı",
                    text: "Dil silinecektir, emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'Vazgeç',
                    confirmButtonText: 'Evet,sil'
                },
                function() {
                   window.location.href = "language/" + {{ $language->id }};
                });
        });
    </script>
@endsection
@section('css')
@endsection
@section('js')
@endsection
