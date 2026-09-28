<!------------------------ bundle -------------------------------------------------->
<link rel="stylesheet" href="{{asset('admin')}}/assets/cssbundle/select2.min.css">
<!------------------------ vendor -------------------------------------------------->
<link rel="stylesheet" href="{{asset('admin')}}/assets/vendor/toster/css/jquery.toast.css">
<!------------------------ main -------------------------------------------------->
<link rel="stylesheet" href="{{asset('admin')}}/assets/css/luno-style.css">
<!------------------------ custom -------------------------------------------------->
<link rel="stylesheet" href="{{asset('admin')}}/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('admin')}}/assets/css/fontawesome.min.css">

<!-- fancybox -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/fancybox.css" />
<!------------------------ dropify -------------------------------------------------->
<link rel="stylesheet" href="{{url('/')}}/admin/assets/cssbundle/dropify.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<style>
    .cropper-container {
        max-width: 100%;
        max-height: 400px;
    }
    .image-preview {
        max-width: 100%;
        max-height: 300px;
        display: block;
        margin: auto;
    }
</style>


<!-- RTL Style For Text Area -->
<style>
    .text-area-ar{
        direction: rtl !important;
    }
    .text-area-en {
        direction: ltr !important;
    }
</style>
<!-- RTL Style For Text Area -->

<!-- RTL Style For table paginate -->
<style>
    ul.pagination {
        direction: ltr !important;
    }
    .paging_simple_numbers{
        justify-content: end;
        display: flex;
    }
</style>
<!-- RTL Style For table paginate -->

<style>
    .sortable-item {
        padding: 10px;
        background-color: #d7d7d7;
        margin-bottom: 3px;
        border-radius: 10px;
        transition: background-color 0.3s ease;
        cursor: move;
        font-weight: bold;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .sortable-item:hover,
    .sortable-item:active {
        background-color: #00a650 !important;
        color: white;
    }

    .sortable-item:active {
        transform: scale(1.02) !important;
    }
    .sortable-image {
        width: 50px;
        height: 50px;
        margin-right: 10px;
        border-radius: 5px;
    }
</style>
<style>
    .work_samples_grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 12px;
    }

    .work_samples_grid .img_upload {
        width: 100%;
        height: 160px;
        border-radius: 8px;
        border: 1px solid #e9e9e9;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .work_samples_grid .img_upload input {
        display: none;
    }

    .work_samples_grid .img_upload img {
        height: 48px;
    }

    .work_samples_grid .uploadedImage {
        width: 100%;
        height: 160px;
        border-radius: 8px;
        border: 1px solid transparent;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .work_samples_grid .uploadedImage img {
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .work_samples_grid .uploadedImage .delete {
        position: absolute;
        top: 6px;
        right: 6px;
        background: #ffffff;
        border-radius: 50%;
        width: 26px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .work_samples_grid .uploadedImage .delete img {
        height: 16px;
        width: 16px;
    }
</style>
