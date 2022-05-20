@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Settings</h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Açıklama</th>
                                <th>İçerik</th>
                                <th>Anahtar Değer</th>
                                <th>Tip</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['manageSettings'] as $manageSettings)
                                <tr id="item-{{ $manageSettings->id }}">
                                    <td>{{ $manageSettings->id }}</td>
                                    <td>{{ $manageSettings['settings_description'] }}</td>
                                    <td>
                                        @if ($manageSettings['settings_type'] == 'file')
                                            <img width="100" src="/images/settings/{{ $manageSettings['settings_value'] }}"
                                                alt="">
                                        @else
                                            {{ $manageSettings->settings_value }}
                                        @endif
                                    </td>
                                    <td>{{ $manageSettings->settings_key }}</td>
                                    <td>{{ $manageSettings->settings_type }}</td>
                                    <td width="5"><a href="{{ route('settings.edit', $manageSettings->id) }}">
                                            <i class="fa fa-pencil-square"></i></a></td>
                                    <td width="5">
                                        @if ($manageSettings->settings_delete)
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o" id='clck'></i></a>
                                        </td>
                                            
                                    </td>
                            @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "#clck", function(e) {
            $('body').removeClass('timer-alert');
            swal({
                    title: "Uyarı",
                    text: "Veri silinecektir, emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'Vazgeç',
                    confirmButtonText: 'Evet,sil'
                },
                function() {
                    window.location.href = "settings/" + {{ $manageSettings->id }};
                });
        });
    </script></div>

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
