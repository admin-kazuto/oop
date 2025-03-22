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
        @include('admin.components.notification')
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center position-relative">
                            <div class="iq-header-title">
                                <h4 class="mb-0">Add New Category</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('add-category') }}" enctype="mutipart/form-data" method="post">
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input name="category_name" type="text" class="form-control p-2 bg-white border">
                                </div>
                                <div class="form-group">
                                    <label>Category Description:</label>
                                    <textarea name="category_description" id="editor" type="text" class="form-control  bg-white border"></textarea>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-danger">Reset</button>
                                    <button name="add_category" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Footer Section Start -->
        @include('admin.components.footer')
        <!-- Footer Section End -->
    </main>

</body>

@include('admin.components.script')
<!-- Mirrored from templates.iqonic.design/booksto-dist/html/admin/admin-add-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2025 17:18:21 GMT -->

</html>