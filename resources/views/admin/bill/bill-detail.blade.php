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
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Thông Tin Hóa Đơn</h5>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item"><strong>Số tiền:</strong> 350,000.00 VNĐ</li>
                                            <li class="list-group-item"><strong>Trạng thái:</strong> <span class="badge bg-warning text-dark">Pending</span></li>
                                            <li class="list-group-item"><strong>Ngày tạo hóa đơn:</strong> 2025-02-21 16:46:05</li>
                                            <li class="list-group-item"><strong>Ngày cập nhật hóa đơn:</strong> 2025-02-21 16:46:05</li>
                                        </ul>
                                        <h5 class="card-title">Thông Tin Khách Hàng</h5>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item"><strong>ID người dùng:</strong> 1</li>
                                            <li class="list-group-item"><strong>Tên khách hàng:</strong> Nguyễn Văn A</li>
                                            <li class="list-group-item"><strong>Email:</strong> nguyenvana@example.com</li>
                                            <li class="list-group-item"><strong>Địa chỉ:</strong> Hà Nội, Việt Nam</li>
                                            <li class="list-group-item"><strong>Vai trò:</strong> Customer</li>
                                            <li class="list-group-item"><strong>Ngày tạo tài khoản:</strong> 2025-02-21 16:42:15</li>
                                            <li class="list-group-item"><strong>Ngày cập nhật tài khoản:</strong> 2025-02-21 16:42:15</li>
                                            <li class="list-group-item"><strong>Ngày giao dịch cuối:</strong> 2025-02-21 16:46:05</li>
                                        </ul>
                                        <div class="text-center">
                                            <button class="btn btn-success">Xác nhận</button>
                                            <button class="btn btn-danger">Hủy bỏ</button>
                                        </div>
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