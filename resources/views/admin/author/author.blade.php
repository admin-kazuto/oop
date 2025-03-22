<!doctype html>
<html lang="en" class="theme-fs-sm" data-bs-theme-color="default" dir="ltr">

@include('admin.components.header')

<body class="  ">
    <!-- loader Start -->
    @include('admin.components.loader')
    <!-- loader END -->
    @include('admin.components.sidebar')
    <main class="main-content">
        @include('admin.components.notification')
        @include('admin.components.nav')
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div class="row ">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center position-relative">
                            <div class="iq-header-title">
                                <h4 class="mb-0">Author Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('form-add-author') }}" class="btn btn-primary">Add New</a>
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
                                            <th scope="col" class="border-bottom bg-primary text-white">Email</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Status</th>
                                            <th scope="col"
                                                class="border-bottom bg-primary text-white author-desc custom-column-width">Bio</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach( $authors as $author)

                                        <tr>
                                            <td>{{ $i++ }}</td>

                                            <td>{{ $author->author_name }}</td>
                                            <td>{{ $author->author_email }}</td>
                                            <td>
                                                <span class="badge  <?php echo $author->status == 1 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                                                    <?php echo $author->status == 1 ? 'Active' : 'Inactive'; ?>
                                                </span>
                                            </td>
                                            <td class="author-desc">
                                                {{ $author->author_bio }}
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1 align-items-center list-user-action">
                                                    <a class="bg-warning-subtle rounded edit-btn" data-toggle="tooltip"
                                                        data-placement="top" title="Edit" href="{{ route('form-edit-author/{id}', ['id' => $author->author_id]) }}">
                                                        <i class="ph ph-pencil-simple text-warning custom-ph-icons"></i>
                                                    </a>
                                                    <a class="bg-danger-subtle delete-btn rounded" data-toggle="tooltip"
                                                        data-placement="top" title="Delete" href="{{ route('delete-author/{id}', ['id' => $author->author_id]) }}">
                                                        <i class="ph ph-trash text-danger custom-ph-icons"></i>
                                                    </a>
                                                    <a href="{{ route('restore-author/{id}', ['id'=> $author->author_id]) }}" class="bg-info-subtle  rounded">
                                                        <i class="ph ph-device-rotate text-info custom-ph-icons"></i> 
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