@extends('pages.layout')

@section('content')

@include('pages.breadcrumb')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="row">
            <a href="/edit-indikator-penilaian-atm/{{$itematm->id}}" class="text-end py-3 px-5">Edit</a>
        </div>
        <div class="indikator-penilain">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Kelangkapan</th>
                        <th>Indikator</th>
                        <th>Skor
                        <button id="sort-btn" class="btn btn-link">
                            <i id="sort-icon" class="fa fa-sort"></i>
                        </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($penilaianitematm as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><button class="indikator-btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"><img src="/uploads/penilaianitematm/{{$item->penilaianitematm_gambar}}" alt="Indikator" style="border-radius: 20%; overflow: hidden; width: 75px; height: 75px;"></button></td>
                    <td>{{$item->penilaianitematm_name}}</td>
                    <td>{{$item->indikator}}</td>
                    <td>{{$item->penilaianitematm_score}}</td>
                </tr>

                <!-- Modal Foto Outlet-->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body  modal-upload p-5 text-center">
                                <h1>Foto Penilaian {{$item->penilaianitematm_name}}</h1>
                                <img src="/uploads/penilaianitematm/{{$item->penilaianitematm_gambar}}" alt="Foto" width="80%" class="my-5">
                                <div class="btn-action" style="margin-top:-30px">
                                    <button class="btn-blue">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-2">
            <a href="/kantor-cabang" class="btn-go-back">
                <img src="../img/go-back@2x.png" alt="Button Go Back" width="60" height="60">
            </a>
        </div>
        <div class="col-md-8 text-center">
            <button class="btn-confirm">Done</button>
        </div>
    </div>
</div>


@endsection



@section('page-scripts')
<script>
    $(document).ready(function(){
    
        $(document).on("change", "#imageUpload", function() {
            readURL(this)
        })
    
        function readURL(input) {
    
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {    
                $('#preview').css('background-image', 'url('+e.target.result +')');
                $('#preview').css('background-repeat', 'no-repeat');
                $('#preview').css('background-size', 'cover');
                $('#preview').css('background-position', 'center');
                $('#preview').hide();
                $('#preview').fadeIn(650);
    
                $('.btn-upload').css('display', 'none')
                $('.btn-action').removeAttr('style')
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
        
    })
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Sort table by score in descending order on page load
        var asc = true;
        $('#sort-btn').click(function() {
            asc = !asc;
            var sortIcon = $('#sort-icon');
            sortIcon.removeClass('fa-sort');
            sortIcon.removeClass('fa-sort-down');
            sortIcon.removeClass('fa-sort-up');
            if (asc) {
                sortIcon.addClass('fa-sort-up');
                sortTable('asc');
            } else {
                sortIcon.addClass('fa-sort-down');
                sortTable('desc');
            }
        });

        function sortTable(sortOrder) {
            var $table = $('table');
            var rows = $table.find('tbody > tr').get();
            rows.sort(function(a, b) {
                var scoreA = parseInt($(a).find('td:nth-child(5)').text());
                var scoreB = parseInt($(b).find('td:nth-child(5)').text());
                if (sortOrder === 'asc') {
                    return scoreA - scoreB;
                } else {
                    return scoreB - scoreA;
                }
            });
            $.each(rows, function(index, row) {
                $table.children('tbody').append(row);
            });
        }
    });
</script>
@endsection