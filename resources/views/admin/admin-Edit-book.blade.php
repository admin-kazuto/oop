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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center position-relative">
                            <div class="iq-header-title">
                                <h2 class="text-center mb-4"><i class="fa fa-edit"></i> Chỉnh sửa sách</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <form action="update_product.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- Cột trái (50%) -->
                                        <div class="col-md-6">
                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-book"></i> Tiêu đề sách</label>
                                                <input type="text" class="form-control" name="title" value="Tên sách mẫu" required>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-user"></i> Tác giả</label>
                                                <select class="form-select" name="author_id">
                                                    <option value="1">Nguyễn Văn A</option>
                                                    <option value="2">Trần Thị B</option>
                                                    <option value="3">Lê Văn C</option>
                                                </select>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-list"></i> Danh mục</label>
                                                <select class="form-select" name="category_id">
                                                    <option value="1">Sách giáo khoa</option>
                                                    <option value="2">Tiểu thuyết</option>
                                                    <option value="3">Truyện tranh</option>
                                                </select>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-coins"></i> Giá (VNĐ)</label>
                                                <input type="number" class="form-control" name="price" value="150000" required>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-box"></i> Số lượng</label>
                                                <input type="number" class="form-control" name="quantity" value="10" required>
                                            </div>
                                        </div>

                                        <!-- Cột phải (50%) -->
                                        <div class="col-md-6">
                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-align-left"></i> Mô tả sách</label>
                                                <textarea id="editor" name="description">Mô tả chi tiết về sách...</textarea>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-check-circle"></i> Trạng thái</label>
                                                <select class="form-select" name="status">
                                                    <option value="1" selected>Còn hàng</option>
                                                    <option value="0">Hết hàng</option>
                                                </select>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-image"></i> Hình ảnh</label>
                                                <input type="file" class="form-control" name="image">
                                                <img src="example.jpg" class="img-fluid mt-2" alt="Hình sách">
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-save"></i> Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </form>
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


<!-- Mirrored from templates.iqonic.design/booksto-dist/html/admin/admin-add-book.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2025 17:18:21 GMT -->

</html>