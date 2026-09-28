<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ajaxComplete(function () {
        $( "#sortable" ).sortable();
    });
    </script>
<script>
    $(document).on('shown.bs.modal hidden.bs.modal', '.modal', function () {
        $('select.select2').select2('destroy');

        $('select.select2').select2({
            dropdownParent: $('body')
        });
    });
    $(document).ready(function () {
        $.validate({
            ignore: 'input[type=hidden]',
            modules: 'date, security',
            lang: '{{\App::currentLocale()}}',
            validateOnEvent: true
        });
        $('#search-input').on('input', function () {
            var searchText = $(this).val().trim();

            if (searchText === '') {
                $('#sidebar-menu').empty();
                return;
            }

            $('#sidebar-menu').empty();

            $('.menu-list').each(function () {
                var menuList = $(this);

                // Function to search within a given list and its sublists
                function searchMenuList(menuList) {
                    menuList.find('li').each(function () {
                        var listItem = $(this);
                        var menuLink = listItem.find('a').first();
                        var menuHref = menuLink.attr('href');
                        var menuText = menuLink.find('span').text().trim();

                        if (menuText.includes(searchText)) {
                            var parentSections = listItem.parents('ul');
                            var breadcrumb = [];

                            parentSections.each(function () {
                                var parentText = $(this).parent('li').find('a > span').first().text().trim();
                                if (parentText) {
                                    breadcrumb.unshift(parentText);
                                }
                            });

                            breadcrumb.push(menuText);

                            if (menuHref && menuHref !== '#') {
                                var breadcrumbText = breadcrumb.join(' > ');

                                if ($('#sidebar-menu a:contains(' + breadcrumbText + ')').length === 0) {
                                    var resultItem = $('<a>')
                                        .addClass('list-group-item list-group-item-action text-truncate')
                                        .attr('href', menuHref)
                                        .append(
                                            $('<div>').addClass('fw-bold').text(menuText)
                                        );

                                    if (breadcrumb.length > 1) {
                                        var breadcrumbHtml = breadcrumb.join(' > ');
                                        resultItem.append(
                                            $('<small>').addClass('text-muted').html(breadcrumbHtml)
                                        );
                                    }

                                    $('#sidebar-menu').append(resultItem);
                                }
                            }
                        }

                        // Recursively search within submenus
                        var subMenu = listItem.find('ul');
                        if (subMenu.length > 0) {
                            searchMenuList(subMenu);
                        }
                    });
                }

                // Start searching from the current menu list
                searchMenuList(menuList);
            });

            // Get the length of result items
            var resultItemsLength = $('#sidebar-menu .list-group-item').length;
            if (resultItemsLength === 0) {
                $('#sidebar-menu').append(`<li class="list-group-item list-group-item-action text-truncate">{{ trans('auth.no_results') }}</li>`);
            }
            console.log('Number of result items:', resultItemsLength);
        });
    });
</script>
<script>
    function checkInternetConnection() {
        return navigator.onLine
    }

    /*$(document).ready(function(){
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    });*/
    var loader = `<div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>`;

    function showDataTable(url, columns) {
        //console.log("showDataTable")
        $("#dataTableObject").DataTable({
            // dom: 'Bfrtip',
            responsive: 1,
            "processing": true,
            // "lengthChange": false,
            "serverSide": false,
            "ordering": true,
            "searching": true,
            'iDisplayLength': 10,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "الكل"]],
            "sort": false,
            "ajax": url,
            "columns": columns,
            "language": {
                "sProcessing": "{{trans('dataTable.sProcessing')}}",
                "sLengthMenu": "{{trans('dataTable.sLengthMenu')}}",
                "sZeroRecords": "{{trans('dataTable.sZeroRecords')}}",
                "sInfo": "{{trans('dataTable.sInfo')}}",
                "sInfoEmpty": "{{trans('dataTable.sInfoEmpty')}}",
                "sInfoFiltered": "{{trans('dataTable.sInfoFiltered')}}",
                "sInfoPostFix": "",
                "sSearch": "{{trans('dataTable.sSearch')}}:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "{{trans('dataTable.sFirst')}}",
                    "sPrevious": "{{trans('dataTable.sPrevious')}}",
                    "sNext": "{{trans('dataTable.sNext')}}",
                    "sLast": "{{trans('dataTable.sLast')}}"
                }
            },
            order: [
                [0, "asc"]
            ]
        })
    }

    function handleErrorResponce(errorObj) {
        console.log('handleErrorResponce');
        console.log(errorObj.status);
        if (errorObj.status == 422) {
            let errorsObj = $.parseJSON(errorObj.responseText);
            let listObject = errorsObj.data;
            let testArr = [];
            $.each(listObject, function (errorKey, errorArr) {
                $.each(errorArr, function (key, value) {
                    testArr.push(value);
                });
            });
            validToster('{{__("auth.an error occurred")}}', testArr)
        } else {
            errorToster('{{__("auth.an error occurred")}}', "{{__("auth.code error")}}");
        }
    }

    function handleSuccessResponce(result) {
        console.log("handleSuccessResponce" + result.code)
        console.log(result)
        if (result.code == 200) {
            successToster('{{__("auth.done successfully")}}', result.message);
        } else if (result.code == 201) {
            successToster('{{__("auth.done successfully")}}', result.message);
            location.reload();
            //location.href = result.data.url;
        } else if (result.code == 202) {
            successToster('{{__("auth.done successfully")}}', result.message);
            $('.upCreateModalClose').click()
            if ($('.select2').length > 0) {
                $('.select2').select2({
                    dropdownParent: $('#createModal .modal-body'),
                });
                // $('.select2').select2();
            }
            if(result.data.up_id){
                let up_name_id = result.data.up_name_id
                let up_id = result.data.up_id;
                let select = document.getElementById(''+up_id);
                let newOption = document.createElement('option');
                newOption.value = result.data.id; // Set the value attribute
                newOption.text = result.data[up_name_id]; // Set the visible text
                if($('#'+up_id).length > 0){
                    console.log("aslll");
                    select.add(newOption);
                    select.value = newOption.value;
                }else{
                    console.log("as");
                    console.log($('#'+up_id).length);
                    $('.'+up_id).append(newOption);
                    // $('.'+up_id).val(newOption.value);
                }
            }
            //location.href = result.data.url;
        } else if (result.code == 203) {
            if (result.data && result.data.url) {
                window.location.href = result.data.url;
            }
        } else if (result.code == 401) {
            warningToster('{{__("auth.an error occurred")}}', result.message)
        } else {
            warningToster('{{__("auth.an error occurred")}}', result.message)
        }
    }

    function loadJqerySelectors(){
        $.validate({
            ignore: 'input[type=hidden]',
            modules: 'date, security',
            lang: '{{\App::currentLocale()}}',
            validateOnEvent: true
        });
        if ($('.dropify').length > 0) {
            $('.dropify').dropify();
        }
        if ($('#json_array').length > 0) {
            $('#json_array').multifield();
        }
        if ($('#json_array2').length > 0) {
            $('#json_array2').multifield();
        }
        if ($('input[data-role="tagsinput"]').length > 0) {
            $('input[data-role="tagsinput"]').each(function () {
                // Check if tagsinput is already initialized
                if (!$(this).hasClass('bootstrap-tagsinput-initialized')) {
                    $(this).tagsinput();
                    $(this).addClass('bootstrap-tagsinput-initialized');
                }
            });
        }
    }

    function loadOptionsOnAjax() {
        if ($('.select2').length > 0) {
            $('.select2').select2({
                dropdownParent: $('#createModal .modal-body'),
            });
        }
        loadJqerySelectors();
    }

    function loadOptionsOnAjaxUpModel() {
        if ($('.select2').length > 0) {
            $('.select2').select2({
                dropdownParent: $('#upCreateModal .modal-body'),
            });
        }
        loadJqerySelectors();
    }

    function reloadDataTable() {
        if ($('#dataTableObject').length > 0) {
            $('#dataTableObject').DataTable().ajax.reload();
        }
    }

    function clearSelectedFiles(){
        // 🚨 Now that form is loaded, clear selected files and UI
        selectedFiles = [];
        const container = document.querySelector(".work_samples_grid");

        if (container) {
            const uploadLabel = container.querySelector("label.img_upload");

            // Clear everything
            container.innerHTML = "";

            // Re-append upload input
            if (uploadLabel) {
                uploadLabel.querySelector("input[type='file']").value = "";
                container.appendChild(uploadLabel);
            }
        }
    }

     $(document).on('click', '.addButton', function (e) {
        e.preventDefault()
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        $('.modal-body').html(loader)
        let buttonObj = $(this);
        let modelRoute = buttonObj.attr("model-route");
        let modelTitle = buttonObj.attr("model-title");
        let modalResult = $("#createModal");
        $(".modal-body", modalResult).html();

        setTimeout(function () {
            $.ajax({
                url: modelRoute,
                type: 'GET',
                beforeSend: function () {
                    // You can add code to handle beforeSend event
                },
                complete: function () {
                    // You can add code to handle complete event
                },
                success: function (result) {
                    $("#exampleModalLgLabel").text(modelTitle);
                    $(".modal-body", modalResult).html(result.data.html);
                    loadOptionsOnAjax();

                    // 🚨 Now that form is loaded, clear selected files and UI
                    clearSelectedFiles();
                },
                error: function (errorObj, errorText, errorThrown) {
                    handleErrorResponce(errorObj);
                }
            });
        }, 500);
    });

    $(document).on('click', '.addUpButton', function (e) {
        e.preventDefault()
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        $('#upCreateModal .modal-body').html(loader)
        // $('.modal-body').html(loader)
        let buttonObj = $(this);
        var up_id =  buttonObj.attr("item-id");
        var popup_id =  buttonObj.attr("item-popup-id");
        var up_name_id =  buttonObj.attr("item-name-id");
        let modelRoute = buttonObj.attr("model-route")+'?item_add_id='+up_id+'&item_name_id='+up_name_id;
        let modelTitle = buttonObj.attr("model-title");
        let modalResult = $("#upCreateModal");
        $('#item_add_id').val(up_id);
        $('#item_add_name_id').val(up_name_id);
        $("#upCreateModal .modal-body", modalResult).html();

        $.ajax({
            url: modelRoute,
            type: 'GET',
            beforeSend: function () {
                // You can add code to handle beforeSend event
            },
            complete: function () {
                // You can add code to handle complete event
            },
            success: function (result) {
                // $("#exampleModalLgLabel").text(modelTitle);
                var html = result.data.html;

                // html.append('<input type="hidden" name="up_id" value="' + up_id + '">');
                $(".modal-body", modalResult).html(html);
                $(".fastCreate", modalResult).remove();
                // data-bs-toggle="modal" data-bs-target="#createModal"
                // console.log($('#createModal').is(':visible'));
                $('#popup_id').val(popup_id);
                if (popup_id == false) {
                    console.log('rrr');
                    $('.upCreateModalClose').attr('data-bs-toggle', "modal")
                    $('.upCreateModalClose').attr('data-bs-target', "#createModal")
                } else {
                    console.log('yyyyyyyyyyy');
                    //  data-bs-dismiss="modal" aria-label="Close"
                    $('.upCreateModalClose').attr('data-bs-dismiss', "modal")
                    $('.upCreateModalClose').attr('aria-label', "Close")
                }




                loadOptionsOnAjaxUpModel();

                // 🚨 Now that form is loaded, clear selected files and UI
                clearSelectedFiles();

            },
            error: function (errorObj, errorText, errorThrown) {
                handleErrorResponce(errorObj);
            }
        });

    });

    $(document).on('click', '.editButton', function (e) {
        e.preventDefault()
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        $('.modal-body').html(loader)
        let buttonObj = $(this);
        let modelRoute = buttonObj.attr("model-route");
        let modelTitle = buttonObj.attr("model-title");
        let modalResult = $("#createModal");
        $(".modal-body", modalResult).html();
        setTimeout(function () {
            $.ajax({
                url: modelRoute,
                type: 'GET',
                beforeSend: function () {
                },
                complete: function () {
                },
                success: function (result) {
                    $("#exampleModalLgLabel").text(modelTitle);
                    $(".modal-body", modalResult).html(result.data.html)
                    loadOptionsOnAjax();
                },
                error: function (errorObj, errorText, errorThrown) {
                    handleErrorResponce(errorObj);
                }
            });
        }, 700);
    });

    $(document).on('click', '.deleteButton', function (e) {
        e.preventDefault()
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        let buttonObj = $(this);
        let deleteRoute = buttonObj.attr("delete-route");
        swal.fire({
            title: "{{__('buttons.Are You Sure')}}",
            text: "{{__('buttons.You Can not to rollback')}}",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "{{__('buttons.accept')}}",
            cancelButtonText: "{{__('buttons.cancel')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteRoute,
                    type: 'DELETE',
                    beforeSend: function () {
                    },
                    complete: function () {
                    },
                    success: function (data) {
                        handleSuccessResponce(data);
                        Swal.fire({
                            icon: 'success',
                            title: "{{__('buttons.Deleted successfully')}}",
                            confirmButtonText: "{{__('buttons.close')}}",
                        });
                        reloadDataTable();
                    },
                    error: function (errorObj, errorText, errorThrown) {
                        handleErrorResponce(errorObj);
                    }
                });
            }
        });
    });

    $(document).on('submit', '.from-submit-global', function (e) {
        e.preventDefault();
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        let formData = new FormData(this);
        formData.append('up_id', $('#item_add_id').val());
        formData.append('up_name_id', $('#item_add_name_id').val());
        let url = $(this).attr('action');
        let submitButton = $(e.originalEvent.submitter);
        let buttonText = submitButton.text();
        let modalResult = $("#createModal");
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + buttonText)
            },
            complete: function () {
            },
            success: function (result) {
                //console.log(200)
                handleSuccessResponce(result);
                reloadDataTable();
                submitButton.html(buttonText)
                if (modalResult.is(":visible")) {
                    modalResult.modal('toggle');
                }
                // modalResult.modal('toggle');
                // console.log(modalResult.is(':visible'));
            },
            error: function (errorObj, errorText, errorThrown) {
                console.log(500)
                console.log(errorObj)
                handleErrorResponce(errorObj);
                submitButton.html(buttonText)
            }
        });

    });

    $(document).on('submit', '.from-submit-update-global', function (e) {
        e.preventDefault();
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        let formData = new FormData(this);
        let url = $(this).attr('action');
        let submitButton = $(e.originalEvent.submitter);
        let buttonText = submitButton.text();
        let modalResult = $("#createModal");
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + buttonText)
            },
            complete: function () {
            },
            success: function (result) {
                handleSuccessResponce(result);
                reloadDataTable();
                submitButton.html(buttonText)
                modalResult.modal('toggle');
            },
            error: function (errorObj, errorText, errorThrown) {
                handleErrorResponce(errorObj);
                submitButton.html(buttonText);
            }
        });

    });


    $(document).on('click', '.remove-tr', function (e) {
        e.preventDefault()
        let obj = $(this)
        let totalTr = $(".remove-tr").length;
        if (totalTr == 1) {
            return false;
        }
        let parentTr = obj.closest("tr");
        parentTr.remove();
    });

    /* TO DELETE IMAGES */
    $(document).on('click', '.deleteImagesButton', function (e) {
        e.preventDefault();
        if(!checkInternetConnection()){
            validToster("{{ __('auth.no_internet') }}")
            return;
        }
        let buttonObj = $(this);
        let deleteRoute = buttonObj.attr("delete-route");
        let uploadedImageDiv = buttonObj.closest('.uploadedImage');

        swal.fire({
            title: "{{__('buttons.Are You Sure')}}",
            text: "{{__('buttons.You Can not to rollback')}}",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "{{__('buttons.accept')}}",
            cancelButtonText: "{{__('buttons.cancel')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteRoute,
                    type: 'DELETE',
                    beforeSend: function () {
                    },
                    complete: function () {
                    },
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: "{{__('buttons.Deleted successfully')}}",
                            confirmButtonText: "{{__('buttons.close')}}",
                        });
                        uploadedImageDiv.remove();
                    },
                    error: function (errorObj, errorText, errorThrown) {
                        handleErrorResponce(errorObj);
                    }
                });
            }
        });
    });

</script>
<script>
    // $(document).on('click', '.translate-button', function () {
    //     const $input = $(this).closest('.translation-group').find('.translate-input');
    //     const inputName = $input.attr('name'); // e.g., "en[website_name]"

    //     const matches = inputName.match(/^([^\[]+)\[([^\]]+)]$/);
    //     if (!matches) return;

    //     const [ , sourceLang, fieldKey ] = matches;
    //     const targetLang = sourceLang === 'ar' ? 'en' : 'ar';
    //     const text = $input.val();

    //     $.ajax({
    //         url: '{{ route("translator.index") }}',
    //         method: 'GET',
    //         data: {
    //             texts: text,
    //             source_lang: sourceLang,
    //             target_lang: targetLang
    //         },
    //         success: function (response) {
    //             const $targetInput = $(`input[name="${targetLang}[${fieldKey}]"]`);
    //             if ($targetInput.length) {
    //                 $targetInput.val(response.translated);
    //             }
    //         },
    //         error: function (xhr) {
    //             console.warn('Translation failed:', xhr.responseText);
    //         }
    //     });
    // });


    $(document).on('click', '#translate-all', function () {
        const $button = $(this);
        $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> ...');

        const requests = [];

        $('.translate-input').each(function () {
            const $input = $(this);
            const inputName = $input.attr('name'); // e.g., "en[website_name]" or "ar[footer_text]"

            const matches = inputName.match(/^([^\[]+)\[([^\]]+)]$/);
            if (!matches) return;

            const [ , sourceLang, fieldKey ] = matches;
            const targetLang = sourceLang === 'ar' ? 'en' : 'ar';
            const text = $input.val();

            const $targetInput = $(`[name="${targetLang}[${fieldKey}]"]`);
            if (!text || !$targetInput.length || $targetInput.val()) return;

            const request = $.ajax({
                url: '{{ route("translator.index") }}',
                method: 'GET',
                data: {
                    texts: text,
                    source_lang: sourceLang,
                    target_lang: targetLang
                },
                success: function (response) {
                    $targetInput.val(response.translated);
                },
                error: function (xhr) {
                    console.warn(`Translation failed for ${inputName}:`, xhr.responseText);
                }
            });

            requests.push(request);
        });

        // When all AJAX requests are done
        $.when(...requests).always(function () {
            $button.prop('disabled', false).html('<i class="fa fa-language"></i>');
        });
    });

    $.formUtils.addValidator({
        name: 'onlyArabic',
        validatorFunction: function (value, $el, config, language, $form) {
            return /^[^\u0041-\u007A]*[\u0600-\u06FF][^\u0041-\u007A]*$/.test(value);
        },
        errorMessage: '{{ __("zemovit.you_must_write_only_arabic") }}',
        errorMessageKey: 'onlyArabic'
    });

    $.formUtils.addValidator({
        name: 'onlyEnglish',
        validatorFunction: function (value, $el, config, language, $form) {
            return /^[^\u0600-\u06FF]*[A-Za-z][^\u0600-\u06FF]*$/.test(value);
        },
        errorMessage: '{{ __("zemovit.you_must_write_only_english") }}',
        errorMessageKey: 'onlyEnglish'
    });

    $.validate();
</script>
