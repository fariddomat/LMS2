@extends('layouts.dashboard')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
@endsection
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.course_categories.index') }}">course_categories</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">التصنيفات</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.course_categories.create') }}" class="btn btn-primary">إضافة</a>
                            @if(count($course_categories) > 0)
                                <table  id="table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>التصنيف الأب</th>
                                            <th>الدورة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody  id="tablecontents">
                                        @foreach($course_categories as $index=>$course_category)
                                            <tr class="row1"  data-id="{{ $course_category->id }}">
                                                <td scope="row"><i class="fa fa-sort" style="  position: inherit;"></i> {{ $index+1 }}</td>

                                                <td>{{ $course_category->name }}</td>
                                                <td>
                                                    @if ($course_category->parentCategory)
                                                    {{ $course_category->parentCategory->name }}
                                                    @endif</td>
                                                <td>{{ $course_category->course->title }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.course_categories.edit', $course_category->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                                                    <form action="{{ route('dashboard.course_categories.destroy', $course_category->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger delete" >حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No course_categories found.</p>
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
        url: "{{ url('dashboard/course_categories/sortable') }}",
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
