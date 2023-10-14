@extends('layouts.dashboard')
@section('title')
    Manage profiles
@endsection

@section('styles')
    <link href="{{ asset('dashboard/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/removeSortingDataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/datatablesStyles.css') }}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <!-- JS -->


    <script src="{{ asset('dashboard/js/datatables.min.js') }}" defer></script>
    <!-- DataTables -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js" defer></script>

    <!-- Buttons -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" defer>
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js" defer></script>

    <!-- JSZip -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>

    <!-- pdfmake -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js" defer>
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js" defer></script>

    <!-- html2canvas -->
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script defer>
        $(document).ready(function() {
            $('#Table').DataTable({
                searching: false,
                paging: false,
                info: false,
                sorting: false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('sheet', sheet).attr('rightToLeft', 'true');
                        }
                    }
                ]
            });
        });
    </script>
@endpush
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.profiles.index') }}">profiles</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" id="search" autofocus
                                        value="{{ request()->search }}" aria-describedby="helpId" placeholder="البحث">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                        aria-hidden="true"></i>
                                    بحث</button>
                                <a href="{{ route('dashboard.profiles.create') }}" class="btn btn-outline-primary"><i
                                        class="fa fa-plus" aria-hidden="true"></i> إضافة</a>

                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12" style="margin-top: 15px">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> الطلاب
                        </div>
                        <div class="card-block table-responsive">

                            @if ($profiles->count() > 0)
                                <table id="Table" class="table table-striped responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>تاريخ التسجيل</th>
                                            <th>حالة الحساب</th>
                                            <th  class="none">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profiles as $index => $profile)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $profile->full_name }}</td>
                                                <td>{{ $profile->email }}</td>
                                                <td>{{ $profile->created_at->diffForHumans() }}</td>
                                                <td>{{ $profile->status }}</td>

                                                <td>

                                                    <a href="{{ route('dashboard.profiles.edit', $profile->id) }}"
                                                        class="btn btn-outline-warning" style="display: inline-block"><i
                                                            class="fa fa-edit"></i> تعديل</a>


                                                    <form action="{{ route('dashboard.profiles.destroy', $profile->id) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger delete"
                                                            style="display: inline-block"><i class="fa fa-trash"
                                                                aria-hidden="true"></i> حذف</button>
                                                    </form>

                                                    @if ($profile->status == 'active')
                                                        <form
                                                            action="{{ route('dashboard.profiles.reject', $profile->id) }}"
                                                            method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('post')
                                                            <button type="submit" class="btn btn-outline-info"
                                                                style="display: inline-block"><i class="fa fa-ban"
                                                                    aria-hidden="true"></i> إلفاء تفعيل</button>
                                                        </form>
                                                    @else
                                                        <form
                                                            action="{{ route('dashboard.profiles.active', $profile->id) }}"
                                                            method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('post')
                                                            <button type="submit" class="btn btn-outline-success"
                                                                style="display: inline-block"><i class="fa fa-ban"
                                                                    aria-hidden="true"></i> تفعيل</button>
                                                        </form>
                                                    @endif
                                                    @if ($profile->status == 'pending')
                                                        <form action="{{ route('dashboard.profiles.paid', $profile->id) }}"
                                                            method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('post')
                                                            <button type="submit" class="btn btn-outline-info"
                                                                style="display: inline-block"><i class="fa fa-money"
                                                                    aria-hidden="true"></i> سداد الرسم</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="nav-scroller py-1 mb-2"> <nav class="nav d-flex justify-content-center"> <ul class="pagination pagination-sm flex-sm-wrap">{{ $profiles->links('pagination::bootstrap-4') }}

                                </ul> </nav> </div>
                            @else
                                <h3 style="font-weight: 400">Sorry no record found !</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/.container-fluid-->
    </main>
@endsection
