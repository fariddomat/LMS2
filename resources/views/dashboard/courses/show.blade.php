@extends('layouts.dashboard')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
@endsection
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Show</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.courses.index') }}">courses</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $course->title }}</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.lessons.create', $course->id) }}" class="btn btn-primary mb-3">
                                إضافة درس
                            </a>
                            @if($course->lessons->isEmpty())
                            <p>لم يتم الإضافة بعد.</p>
                            @else
                            <table  id="table"  class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>المدة</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody   id="tablecontents">
                                    @foreach($lessons as $index=>$lesson)
                                    <tr class="row1"  data-id="{{ $lesson->id }}">
                                        <td scope="row"><i class="fa fa-sort" style="  position: inherit;"></i> {{ $index+1 }}</td>
                                        <td>{{ $lesson->title }}</td>
                                        <td>{{ $lesson->duration }}</td>
                                        <td>
                                            <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-sm btn-success " >
                                                مشاهدة
                                            </a>
                                            <a href="{{ route('dashboard.lessons.edit', $lesson->id) }}" class="btn btn-sm btn-primary">
                                                تعديل
                                            </a>
                                            <form action="{{ route('dashboard.lessons.destroy', $lesson->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete" >حذف</button>
                                            </form>
                                            <a href="{{ route('dashboard.lesson.files.show', $lesson->id) }}" class="btn btn-primary btn-sm">ملفات الدرس</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection


@push('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" defer></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js" defer></script>

<script type="text/javascript" defer>

$(function () {

    $("#table").DataTable({
        responsive: true,
                searching: false,
                paging: false,
                sorting: false,
                info: true,}
    );
    $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });
    function sendOrderToServer() {
      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/lessons/sortable') }}",
            data: {
          order: order,
          _token: token

        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });
    }
  });

</script>
@endpush
