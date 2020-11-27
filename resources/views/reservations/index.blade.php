@extends('layout')
@section('body')

    <!-- ///============================================================= -->
    <div class="row">
        <div id="resultat">
            <!-- Nous allons afficher un retour en jQuery au visiteur -->
        </div>

        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Resrvation</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <form id="form">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>ville</label>
                                <select class="form-control" name="ville" id="ville">
                                    @if(isset($ville))
                                        @foreach($ville as $value)
                                            <option value="{{$value->id}}"> {{$value->libelle }} </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Date Début</label>
                                <input type="date" name="debut" id="debut" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Date Fin</label>
                                <input type="date" name="fin" id="fin" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="submit" class="btn btn-info">Valider</button>
                            <button type="reset" class="btn btn-default float-right">Cancel</button>
                        </div>
                    </form>
                    <div class="form-group table">
                        <table class="table table-bordered table" id="table">
                            <thead>
                            <tr>
                                <th>Villes</th>
                                <th>debut</th>
                                <th>fin</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @if ($reservation)
                                @foreach ($reservation->priorites as $item)
                                    <tr data-id="{{ $item->id }}">
                                        <td>{{ $item->ville->libelle }}</td>
                                        <td>{{ $item->date_debut }}</td>
                                        <td>{{ $item->date_fin }}</td>
                                        <td>
                                            <a href='' class='btn btn-sm btn-danger delete-button'>X</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        @endsection

        @section('javascripts')
            <script>
                $(document).ready(function () {
                    setRemoveButtonsEvent();

                    $("#submit").click(function (e) {
                        e.preventDefault();
                        var ville = $("#ville option:selected");
                        var debut = $("#debut").val();
                        var fin = $("#fin").val();
                        var _token = $("input[name='_token']").val();

                        const url = "{{ route('reservations.store') }}";
                        const data = {
                            ville: ville.val(),
                            debut,
                            fin
                        };

                        $.ajax({
                            url,
                            method: 'POST',
                            data,
                            success: function (data) {
                                console.log(data)
                                var table = $("<tr data-id='" + data.id + "'> <td>" + ville.text() + "</td> <td>" + debut + "</td> <td>" + fin + "</td> <td><a href=''class='btn btn-sm btn-danger delete-button'>X</a></td> </tr>");
                                $("#table").append(table);
                                const id = table.data('id');
                                setEventHandlerOnClickAndRemove(table, id);
                            },
                            error: function (error) {
                                alert(error.responseText)
                            }
                        })
                    });

                    function setEventHandlerOnClickAndRemove(item, id) {
                        $(item).unbind();
                        $(item).on('click', function (event) {
                            if (!confirm("Confirmation du suppression")) return false;
                            let item = $(this);
                            event.preventDefault();
                            var url = "{{ route("reservations.delete") }}";

                            url = new URL(url);
                            url.searchParams.append('id', id);
                            $.ajax({
                                url,
                                method: "DELETE",
                                success: function (data) {
                                    if (data === true) {
                                        item
                                            .closest('tr')
                                            .animate({width: 0, opacity: 0}, 'slow', function () {
                                                $(this).remove();
                                            });
                                    }
                                },
                                error: function (error) {
                                    alert(error.responseText)
                                }
                            })
                        });
                    }

                    function setRemoveButtonsEvent() {
                        $('.delete-button').each(function (index, item) {
                            setEventHandlerOnClickAndRemove(item, $(item).parents('tr').data('id'));
                        })
                    }
                });
            </script>
@endsection
