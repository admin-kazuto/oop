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
                                <form action="{{ route('edit-book/{id}', ['id'=>$book->book_id]) }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="book_id" value="<?= $book->book_id ?>">
                                    <div class="row">
                                        <!-- Cột trái (50%) -->
                                        <div class="col-md-6">
                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-book"></i> Tiêu đề sách</label>
                                                <input type="text" class="form-control" name="title" value="<?= $book->title ?>" required>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-user"></i> Tác giả</label>
                                                <select class="form-select" name="author">
                                                    @foreach ($authors as $auth)
                                                    <option value="{{ $auth->author_id }}" {{ $auth->author_id == $book->author_id ? 'selected' : '' }}> {{ $auth->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-list"></i> Danh mục</label>
                                                <select class="form-select" name="category_id">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->category_id }}" {{ $category->category_id == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-coins"></i> Giá (VNĐ)</label>
                                                <input type="number" class="form-control" name="price" value="{{ $book->price }}" required>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-box"></i> Số lượng</label>
                                                <input type="number" class="form-control" name="quantity" value="{{ $book->quantity }}" required>
                                            </div>
                                        </div>

                                        <!-- Cột phải (50%) -->
                                        <div class="col-md-6">
                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-align-left"></i> Mô tả sách</label>
                                                <textarea id="editor" name="description">{{ $book->description }}</textarea>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-check-circle"></i> Trạng thái</label>
                                                <select class="form-select" name="status">
                                                    @{% if book.status == 1 %}
                                                    echo <option value="1">Active</option>
                                                    {% endif %}
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>

                                            <div class="card p-3 mb-4">
                                                <label class="form-label fw-bold"><i class="fa fa-image"></i> Hình ảnh</label>
                                                <input type="file" class="form-control" name="image">
                                                <img src="../resources/public/images/upload/{{ $book->image }}" class="img-fluid w-25 mt-2 d-block mx-auto" alt="Hình sách">
                                            </div>

                                            <button name="saveEditBook" type="submit" class="btn btn-primary w-100"><i class="fa fa-save"></i> Lưu thay đổi</button>
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