<!doctype html>
<html lang="en" class="theme-fs-sm" data-bs-theme-color="default" dir="ltr">
@include('admin.components.header')
<style>
    .admin-container {
        max-width: 800px;
        margin: 30px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .book-image {
        max-width: 200px;
        border-radius: 5px;
    }

    .status-active {
        color: green;
        font-weight: bold;
    }

    .status-inactive {
        color: red;
        font-weight: bold;
    }

    .detail-row {
        display: flex;
        padding: 8px 0;
        border-bottom: 1px solid #ddd;
    }

    .detail-row strong {
        width: 200px;
        flex-shrink: 0;
    }

    .back-link {
        text-decoration: none;
        color: #007bff;
        display: inline-block;
        margin-bottom: 15px;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

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
                                <h2 class="mb-4"><i class="fa fa-book"></i> Chi Tiết Sách</h2>
                                <a href="{{ route('books') }}" class="back-link"><i class="fa fa-arrow-left"></i> Quay lại danh sách</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="admin-container">

                                <!-- Ảnh Sách -->
                                <div class="text-center mb-4">
                                    <img src="assets/images/sample-book.jpg" alt="Ảnh sách" class="book-image">
                                </div>

                                <!-- Thông tin chi tiết -->
                                <div class="detail-row"><strong>ID Sách:</strong> <span>1</span></div>
                                <div class="detail-row"><strong>Tiêu đề:</strong> <span>Cuốn Sách Hay Nhất</span></div>
                                <div class="detail-row"><strong>Tác giả:</strong> <span>Nguyễn Văn A</span></div>
                                <div class="detail-row"><strong>Danh mục:</strong> <span>Văn học</span></div>
                                <div class="detail-row"><strong>Giá:</strong> <span>150.000đ</span></div>
                                <div class="detail-row"><strong>Số lượng:</strong> <span>10</span></div>
                                <div class="detail-row"><strong>Trạng thái:</strong> <span class="status-active">✔ Còn hàng</span></div>
                                <div class="detail-row"><strong>Ngày tạo:</strong> <span>2024-03-06 14:30:00</span></div>
                                <div class="detail-row"><strong>Ngày cập nhật:</strong> <span>2024-03-06 15:00:00</span></div>

                                <hr>

                                <!-- Mô tả -->
                                <h4>Mô tả</h4>
                                <p>
                                    Đây là một cuốn sách rất hay, mang đến nhiều giá trị về cuộc sống và kiến thức chuyên sâu về lĩnh vực văn học.
                                </p>
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