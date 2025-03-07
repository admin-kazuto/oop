const element = document.querySelectorAll(".flatpickr-calendar");
element.forEach((e) => {
  e.classList.add("custom-flatpickr");
});
tinymce.init({
    selector: "#editor",
    height: 300,
    menubar: true,
    plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table paste code help wordcount",
    ],
    toolbar:
      "undo redo | formatselect | bold italic underline backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image code",
    content_style: "body { font-family: Arial, sans-serif; font-size: 14px; }",
    relative_urls: false, // Bắt TinyMCE load đường dẫn tuyệt đối
    remove_script_host: false,
    external_plugins: {
      image: "/vendor/tinymce/tinymce/plugins/image/plugin.min.js", // Đã sửa đường dẫn
      link: "/vendor/tinymce/tinymce/plugins/link/plugin.min.js", // Đã sửa đường dẫn
      code: "/vendor/tinymce/tinymce/plugins/code/plugin.min.js", // Đã sửa đường dẫn
    },
  });
  
