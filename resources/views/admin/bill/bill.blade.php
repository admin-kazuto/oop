<!doctype html>
<html lang="en" class="theme-fs-sm" data-bs-theme-color="default" dir="ltr">

@include('admin.components.header')

<body class="  ">
    <!-- loader Start -->
    @include('admin.components.loader')
    <!-- loader END -->
    @include('admin.components.sidebar')
    <main class="main-content">
        @include('admin.components.nav')
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div class="row ">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center position-relative">
                            <div class="iq-header-title">
                                <h4 class="mb-0">Bill Lists</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="custom-table-effect table-responsive custom-table-search">
                                <table class=" mb-0 table table-bordered custom-datatable-border" id="datatable"
                                    data-toggle="data-table">
                                    <thead class="">
                                        <tr class="bg-white">
                                            <th scope="col" class="border-bottom bg-primary text-white">No</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Name</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Total</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Status</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Date</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $i = 1 ?>
                                        @foreach ($Bills as $bill )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$bill->username}}</td>
                                            <td>{{$bill->total}}</td>
                                            <td>
                                                <span class="badge 
                                                        @if($bill->status == 'pending') bg-warning
                                                        @elseif($bill->status == 'canceled') bg-danger
                                                        @elseif($bill->status == 'completed') bg-success
                                                        @endif
                                                    ">
                                                    {{$bill->status}}
                                                </span>
                                            </td>

                                            <td>{{ date('d-m-Y H:i:s ', strtotime($bill->created)) ?? '' }}</td>
                                            <td>
                                                <div class="d-flex gap-1 align-items-center list-user-action">
                                                    <a class="bg-success-subtle rounded" data-toggle="tooltip" data-placement="top"
                                                        title="Edit" href="{{ route('detail-bill/{id}', ['id' => $bill->order_id]) }}">
                                                        <i class="ph ph-eye text-success custom-ph-icons"></i>
                                                    </a>
                                                </div>
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
        </div>
        <!-- Footer Section Start -->
        @include('admin.components.footer')
        <!-- Footer Section End -->
    </main>
    @include('admin.components.script')

</body>

</html>