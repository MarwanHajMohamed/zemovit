<!------------------------ main -------------------------------------------------->
<script src="{{asset('admin')}}/assets/js/plugins.js"></script>
<script src="{{asset('admin')}}/assets/js/theme.js"></script>

<!------------------------ bundle -------------------------------------------------->
<script src="{{asset('admin')}}/assets/js/bundle/sweetalert2.bundle.js"></script>
<script src="{{asset('admin')}}/assets/js/bundle/select2.bundle.js"></script>
<script src="{{asset('admin')}}/assets/js/bundle/bootstraptagsinput.bundle.js?v=1"></script>

<!------------------------ vendor -------------------------------------------------->
<script src="{{asset('admin')}}/assets/vendor/toster/js/jquery.toast.js"></script>
<script src="{{asset('admin')}}/assets/vendor/jquery_validator/form_validator/jquery.form-validator.min.js"></script>

<!------------------------ custom -------------------------------------------------->
<script src="{{asset('admin')}}/assets/js/custom.js"></script>

<!------------------------ dropify -------------------------------------------------->
<script src="{{asset('admin')}}/assets/js/bundle/dropify.bundle.js"></script>
<!-- fancybox -->
<script src="{{ asset('admin') }}/assets/js/fancybox.js"></script>
<script>
    // fancybox
    $(document).ready(function() {
        Fancybox.bind("[data-fancybox]", {});
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    $(document).ajaxComplete(function () {
        let cropper;
        let fileInput = $('#image');

        // Initialize Dropify
        let dropifyInstance = fileInput.dropify();

        // When an image is chosen
        fileInput.on('change', function (event) {
            let files = event.target.files;
            if (files && files.length > 0) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#cropperImage').attr('src', e.target.result);
                    $('#cropImageModal').modal('show'); // Show modal
                };
                reader.readAsDataURL(files[0]);
            }
        });

        // When modal is shown, initialize Cropper.js
        $('#cropImageModal').on('shown.bs.modal', function () {
            let image = document.getElementById('cropperImage');
            console.log(image);

            cropper = new Cropper(image, {
                aspectRatio: 1, // Square cropping
                viewMode: 1,
                autoCropArea: 0.8,
            });
        });

        // Handle crop button click
        $('#cropImageBtn').on('click', function () {
            let canvas = cropper.getCroppedCanvas({
                width: 500,
                height: 500,
            });

            // تحويل الصورة إلى Base64
            let croppedImageData = canvas.toDataURL("image/jpeg");

            // تحديث data-default-file يدويًا
            fileInput.attr("data-default-file", croppedImageData);

            // تحديث معاينة Dropify مباشرةً بدون تدميره
            let dropifyWrapper = fileInput.closest('.dropify-wrapper');
            let previewContainer = dropifyWrapper.find('.dropify-render');

            // إزالة أي صورة قديمة وتعيين الصورة الجديدة
            previewContainer.html('<img src="' + croppedImageData + '" />');

            // تحديث ملف الإدخال (File Input) بالصورة الجديدة المقصوصة
            canvas.toBlob(function (blob) {
                let newFile = new File([blob], "cropped_image.jpg", { type: "image/jpeg" });
                let dataTransfer = new DataTransfer();
                dataTransfer.items.add(newFile);
                fileInput[0].files = dataTransfer.files;
            }, "image/jpeg", 0.9);

            // إغلاق الـ Modal
            $('#cropImageModal').modal('hide');
        });

        // Destroy Cropper on modal hide
        $('#cropImageModal').on('hidden.bs.modal', function () {
            if (cropper) {
                cropper.destroy();
            }
        });
    });
</script>

<script src="{{asset('admin')}}/assets/js/jquery.multifield.min.js"></script>
<script src="{{asset('admin')}}/assets/js/jquery.multifield.js"></script>


<script src="{{asset('admin')}}/assets/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://www.codehim.com/demo/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.js"></script>

<script src="{{asset('admin')}}/assets/js/tinymce.min.js"></script>
<script>
    $(document).ready(function() {
        $(".preloader").delay(1200).fadeOut(300);
    });
</script>
<script>
    $(document).ajaxComplete(function () {
        tinymce.init({
            selector: '.mytextarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss textcolor colorpicker',
            toolbar: 'undo redo | formatselect | fontselect fontsizeselect | forecolor backcolor | bold italic underline strikethrough | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    });
</script>
<script>
    var dropifyMessages = {
        "default": "{{ __('auth.default') }}",
        "replace": "{{ __('auth.replace') }}",
        "remove": "{{ __('auth.remove') }}",
        "error": "{{ __('auth.error') }}"
    };
</script>
<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $(function () {
        $('.dropify').dropify();
        var drEvent = $('#dropify-event').dropify();
        drEvent.on('dropify.beforeClear', function (event, element) {
          return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function (event, element) {
          alert('File deleted');
        });
        $('.dropify-fr').dropify({
          messages: {
            default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
            replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'DÃ©solÃ©, le fichier trop volumineux'
          }
        });




      });


</script>

<!------------------------ loader -------------------------------------------------->

<script>
    $(window).on('load', function () {
        $('#loading-wrapper').fadeOut();
    });
</script>

<!-- images upload -->
<script>
    let selectedFiles = []; // مصفوفة لتخزين الملفات المختارة

    function handleFileSelect(event) {
        const input = event.target;
        const container = document.querySelector(".work_samples_grid");
        const videoExtensions = ['mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm', '3gp', 'mpeg', 'mpg', 'ogv', 'm4v', 'f4v', 'ts'];
        let newFiles = Array.from(input.files); // الملفات الجديدة المختارة

        // إضافة الملفات الجديدة إلى المصفوفة مع منع التكرار
        newFiles.forEach(file => {
            if (!selectedFiles.some(f => f.name === file.name && f.lastModified === file.lastModified)) {
                selectedFiles.push(file);
                displayMedia(file, container, input, videoExtensions);
            }
        });

        // تحديث قيمة input بحيث يحتفظ بكل الملفات
        updateInputFiles(input);
    }

    // عرض الصورة أو الفيديو داخل الـ container
    function displayMedia(file, container, input, videoExtensions) {
        const fileExtension = file.name.split('.').pop().toLowerCase();
        const reader = new FileReader();

        reader.onload = function(event) {
            const uploadedMediaDiv = document.createElement("div");
            uploadedMediaDiv.classList.add("uploadedImage");

            if (videoExtensions.includes(fileExtension)) {
                // إنشاء عنصر فيديو
                const video = document.createElement("video");
                video.width = 100;
                video.height = 100;
                video.playsInline = true;
                video.autoplay = true;
                video.loop = true;
                video.muted = true;

                // إضافة المصدر للفيديو
                const source = document.createElement("source");
                source.src = event.target.result;
                source.type = `video/${fileExtension}`;

                video.appendChild(source);
                video.appendChild(document.createTextNode("Your browser does not support the video tag."));
                uploadedMediaDiv.appendChild(video);
            } else {
                // إنشاء عنصر صورة
                const img = document.createElement("img");
                img.src = event.target.result;
                img.alt = file.name;
                uploadedMediaDiv.appendChild(img);
            }

            // إنشاء زر الحذف
            const deleteIcon = document.createElement("button");
            deleteIcon.classList.add("delete");
            deleteIcon.style.border = "none";
            deleteIcon.style.background = "none";
            deleteIcon.style.color = "red";
            deleteIcon.innerHTML = '<img loading="lazy" src="{{ asset('admin') }}/assets/img/trash.svg" alt="trash">';

            deleteIcon.addEventListener("click", function() {
                uploadedMediaDiv.remove();
                selectedFiles = selectedFiles.filter(f => !(f.name === file.name && f.lastModified === file.lastModified));
                updateInputFiles(input);
            });

            uploadedMediaDiv.appendChild(deleteIcon);
            container.appendChild(uploadedMediaDiv);
        };

        reader.readAsDataURL(file);
    }

    // تحديث قيمة input بناءً على الملفات المخزنة في selectedFiles
    function updateInputFiles(input) {
        let fileList = new DataTransfer();
        selectedFiles.forEach(file => fileList.items.add(file));
        input.files = fileList.files;
    }
</script>
