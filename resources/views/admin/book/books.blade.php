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
                                <h4 class="mb-0">Book Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('form-add-book') }}" class="btn btn-primary view-more">Add New Book</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="custom-table-effect table-responsive custom-table-search">
                                <table class=" mb-0 table table-bordered custom-datatable-border" id="datatable"
                                    data-toggle="data-table">
                                    <thead class="">
                                        <tr class="bg-white">
                                            <th scope="col" class="border-bottom bg-primary text-white">No</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Book Image</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Book Name</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Book Catergory</th>
                                            <!-- <th scope="col" class="border-bottom bg-primary text-white">Book Author</th>
                                            <th scope="col" class="border-bottom bg-primary text-white description-column">Book
                                                Description</th> -->
                                            <th scope="col" class="border-bottom bg-primary text-white">Book Price</th>

                                            <th scope="col" class="border-bottom bg-primary text-white">Status</th>
                                            <th scope="col" class="border-bottom bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $index = 1;
                                        foreach ($Books as $book): ?>
                                            <tr>
                                                <td><?= $index++ ?></td>
                                                <td><img style="max-width: 80px; max-height: 160px; object-fit: cover ;" src="resources/public/images/upload/{{ $book->image }}" class="img-fluid rounded"
                                                        alt=""></td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->category_name }}</td>
                                                <!-- <td>{{ $book->author_name }}</td> -->
                                                <!-- <td style="max-width: 200px;" class="description-column">
                                                    {{ $book->description }}
                                                </td> -->
                                                <td><?php echo number_format($book->price, 0, ',', '.') ?>vnđ</td>
                                                <td>
                                                    <span class="badge  <?php echo $book->status == 1 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                                                        <?php echo $book->status == 1 ? 'Active' : 'Inactive'; ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-1 align-items-center list-user-action">
                                                        <a href="{{ route('detail-book/{id}', ['id' => $book->book_id]) }}" class="bg-success-subtle rounded ">
                                                            <i class="ph ph-eye text-primary custom-ph-icons"></i> <!-- chi tiết -->
                                                        </a>
                                                        <a class="bg-warning-subtle rounded edit-btn "
                                                            href="{{ route('form-edit-book/{id}', ['id'=>$book->book_id]) }}">
                                                            <i class="ph ph-pencil-simple text-warning custom-ph-icons"></i> <!-- sửa -->
                                                        </a>
                                                        <a onclick="confirmDelete()" class="bg-danger-subtle  rounded" data-toggle="tooltip"
                                                            data-placement="top" title="Delete" href="{{ route('delete-book/{id}', ['id' => $book->book_id]) }}">
                                                            <i class="ph ph-trash text-danger custom-ph-icons"></i> <!-- xóa -->
                                                        </a>
                                                        <a  href="{{ route('restore-book/{id}', ['id'=> $book->book_id]) }}" class="bg-info-subtle  rounded">
                                                            <i class="ph ph-device-rotate text-info custom-ph-icons"></i> <!-- khôi phục  -->
                                                        </a>
                                            
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
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