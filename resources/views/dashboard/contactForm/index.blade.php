@extends('layouts.dashboard')
@section('title', 'Contact Us')
@section('contactusActive', 'active')

@section('styles')
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap libraries -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>


    <link href="{{ asset('dashboard/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/removeSortingDataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/datatablesStyles.css') }}" rel="stylesheet">

    <style>
        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control::before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control::before {
            right: 25px !important;
        }
    </style>
@endsection
@push('scripts')
    <script src="{{ asset('dashboard/js/contactUs.js') }}" defer></script>
    <script src="{{ asset('dashboard/js/datatables.min.js') }}" defer></script>
    <script defer>
        $(document).ready(function() {
            $('#contactsTable').DataTable({
                responsive: true,
                searching: false,
                paging: false,
                info: false,
                sorting: false,
            });
        });
    </script>
@endpush
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.contactForm.index') }}">ContactForm</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Contact Form</h3>

                        </div>
                        <div class="card-block">
                            @if (count($contacts) > 0)
                                <table id="contactsTable" class="table table-hover display responsive nowrap"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Sent Date</th>
                                            <th class="none">IP</th>
                                            <th class="none">Status</th>
                                            <th class="none">Delete</th>
                                            <th class="none">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td><a href="tel:{{ $contact->mobile }}"
                                                        style="text-decoration: none;">{{ $contact->mobile }}</a></td>

                                                <td>{{ $contact->subject }}</td>
                                                <td>{{ $contact->message }}</td>
                                                <td>{{ $contact->created_at->diffForHumans() }}</td>
                                                <td>{{ $contact->ip }}</td>
                                                <td>
                                                    @if ($contact->read == 0)
                                                        <button type="button"
                                                            data-link="{{ route('dashboard.contactForm.status', $contact->id) }}"
                                                            class="change-status btn btn-primary btn-sm"><i
                                                                class="fa fa-check"></i>
                                                            Mark As Read</button>
                                                    @else
                                                        <span class="text-success">Done</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('dashboard.contactForm.destroy', $contact->id) }}"
                                                        method="post" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                    </form><!-- end of form -->
                                                </td>
                                                <td>
                                                    <form action="{{ route('dashboard.contactForm.note', $contact->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <textarea name="note" class="form-control" id="">{{ $contact->note }}</textarea>

                                                        <button type="submit" class="btn btn-success btn-sm"> <i
                                                                class="fa fa-save"></i>
                                                            Save</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><!-- end of table -->
                                {{ $contacts->links() }}
                            @else
                                No Service Found
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
