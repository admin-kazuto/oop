const element = document.querySelectorAll('.flatpickr-calendar');
element.forEach(e => {
    e.classList.add('custom-flatpickr')
});

document.addEventListener("DOMContentLoaded", function() {
    const editButtons = document.querySelectorAll(".edit-btn");
    const editForm = document.getElementById("editBookForm");
    editButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn chuyển trang
            const ID = this.getAttribute("data-id");
            document.getElementById("bookId").value = ID
            document.getElementById("bookTitle").value = this.getAttribute("data-title");
            document.getElementById("bookPrice").value = this.getAttribute("data-price");
            document.getElementById("bookAuthor").value = this.getAttribute("data-author");
            document.getElementById("category").value = this.getAttribute("data-category");
            document.getElementById("bookDescription").value = this.getAttribute("data-description");
            const imagePath = this.getAttribute("data-image");
            document.getElementById("previewImage").src = '/resources/public/images/upload/' + imagePath; 
            document.getElementById("oldImage").value = imagePath
            editForm.style.display = "block";
            let formId = document.getElementById("formId");
            formId.action = `/edit-book/${ID}`;
        });
    });
});

function closeEditBookForm(event) {

    event.preventDefault();
    document.getElementById("editBookForm").style.display = "none";
}

function confirmDelete(event) {
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        text: "Xóa là bay màu!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có, đóng lại!",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("editBookForm").style.display = "none";
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    
    const form = document.getElementById("editBookForm");
    const header = form.querySelector("#formId");

    let offsetX, offsetY, isDragging = false;

    function centerForm() {
        const screenWidth = window.innerWidth;
        const screenHeight = window.innerHeight;
        const formWidth = form.offsetWidth;
        const formHeight = form.offsetHeight;

        form.style.left = (screenWidth - formWidth) / 2 + 'px';
        form.style.top = (screenHeight - formHeight) / 2 + 'px';
    }

    header.addEventListener("mousedown", function(event) {
        isDragging = true;
        offsetX = event.clientX - form.offsetLeft;
        offsetY = event.clientY - form.offsetTop;
        document.body.style.cursor = 'grabbing'; // Thay đổi con trỏ khi kéo
    });

    document.addEventListener("mousemove", function(event) {
        if (isDragging) {
            form.style.left = (event.clientX - offsetX) + 'px';
            form.style.top = (event.clientY - offsetY) + 'px';
        }
    });

    document.addEventListener("mouseup", function() {
        isDragging = false;
        document.body.style.cursor = 'default'; // Trả lại con trỏ ban đầu
    });

    const editButtons = document.querySelectorAll(".edit-btn");
    const editForm = document.getElementById("editBookForm");

    editButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn chuyển trang
            editForm.style.display = "block";
            editForm.style.position = "fixed"; // Đảm bảo form luôn nằm ở vị trí cố định
            editForm.style.zIndex = "1000"; // Đảm bảo form không bị che khuất
            centerForm();
        });
    });
    window.addEventListener("resize", centerForm);
});

