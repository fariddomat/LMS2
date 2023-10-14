@extends('layouts.dashboard')

@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">سجل العمليات</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-block">


                    @if ($logs->count() == 0)
                        <div class="table-responsive">
                            <h3 class="mr-3 mb-3" dir="rtl" style="text-align: right">@lang('site.no_data_found')</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('site.category')</th>
                                        <th scope="col">@lang('site.description')</th>
                                        <th scope="col">التاريخ والوقت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $index => $log)
                                        <tr dir="rtl" style=" text-align: right;">
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td dir="rtl">{{ $log->type }}</td>
                                            <td>{{ $log->content }}</td>
                                            <td>{{ $log->created_at->diffforhumans() }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="text-center m-auto">{{ $logs->appends(request()->query())->links() }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
        </div>
    </div>
</main>
@endsection
