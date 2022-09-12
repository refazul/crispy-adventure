<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Cotfield')</title>
    <style>
        select {
            width: 100%;
            box-sizing: border-box;
            margin: 0;
            position: relative;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
    <link href="{{asset(elixir('css/vendor.css'))}}" rel="stylesheet">
    <link href="{{asset(elixir('css/inspinia.css'))}}" rel="stylesheet">
    @stack('styles')
    <style>
        .navbar-right {
            float: right !important;
            /*margin-right: -15px;*/
        }
    </style>
</head>

<body class="fixed-sidebar md-skin">
<div id="wrapper">
    @include('layouts.navigation')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.topnavbar')
        @yield('content')
        {{--@include('layouts.footer')--}}
    </div>
</div>

<script src="{{asset(elixir('js/vendor.js'))}}"></script>
<script src="{{asset(elixir('js/inspinia.js'))}}"></script>
<script>
    function getOptionsList(select2_id) {//just to initialize options global variable
//        console.log('getOptionsList');
        $.ajax({
            url: '{{url("ajax_select2_options_list")}}' + '/' + select2_id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                options = '<option></option>';//for ajax select2 needs an empty first tag for placeholder to work correctly
                //new
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].list + '</option>';
                }
                //newend
//                for (var key in data) {
//                    options += '<option value="' + key + '">' + data[key] + '</option>';
//                }
                $("#" + select2_id).empty().append(options);
            }
        });
    }

    function getOptionsListShipment(select2_id, id, editValue) {

        $.ajax({
            url: '{{url("ajax_select2_options_list")}}' + '/' + select2_id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                options = '<option></option>';
                //new
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].list + '</option>';
                }
                //newend
//                for (var key in data) {
//                    options += '<option value="' + key + '">' + data[key] + '</option>';
//                }
                $("#" + id).empty().append(options);
                if (editValue) {
                    $("#" + id).val(editValue).change();
                }
            }
        });
    }

    function add_new_option(select2_id) {

        $.post("{{url('ajax_project_create_option')}}" + '/' + select2_id,
            {
                _token: "{{csrf_token()}}",
                value: $('#modal-' + select2_id + ' input').val()
            },
            function (data, status) {
                if (data == 1) {
                    $('#modal-' + select2_id).modal('hide');
                    toastr["info"]("Option Added Successfully");
                    //i dont know why this selector was used for select2 id initialization so i changed it
//                    $("#modal-" + select2_id).on('select2:opening', getOptionsList(select2_id));
                    $("#" + select2_id).on('select2:opening', getOptionsList(select2_id));
                } else {
                    toastr["error"]("Could Not Add The Option");
                }
            }
        );
    }

    function add_new_option_shipment(select2_id) {

        $.post("{{url('ajax_project_create_option')}}" + '/' + select2_id,
            {
                _token: "{{csrf_token()}}",
                value: $('#modal-' + select2_id + ' input').val()
            },
            function (data, status) {
                if (data == 1) {
                    $('#modal-' + select2_id).modal('hide');
                    toastr["info"]("Option Added Successfully");
                    $("." + select2_id).each(function () {
                        var id = $(this).attr('id');
                        var className = $(this).attr('class');
                        className = className.split(" ");
                        className = className[0];
                        $("#" + id).on('select2:opening', getOptionsListShipment(className, id));
                    });
                } else {
                    toastr["error"]("Could Not Add The Option");
                }
            }
        );
    }

    function fineuploader(project_id, element_id) {
        var uploader = new qq.FineUploader({
            element: document.getElementById(element_id),
            session: {
                endpoint: "{{URL::to('initial_file_list')}}" + "/" + project_id + "/" + element_id
            },
            request: {
                debug: true,
                endpoint: "{{URL::to('upload')}}",
                params: {
                    _token: "{{csrf_token()}}",
                    project_id: project_id,
                    element_id: element_id,
                }
            },
            deleteFile: {
                debug: true,
                enabled: true,
                endpoint: "{{URL::to('upload')}}",
                params: {
                    _token: "{{csrf_token()}}"
                }

            },
            {{--chunking: {--}}
                    {{--enabled: true,--}}
                    {{--concurrent: {--}}
                    {{--enabled: true--}}
                    {{--},--}}
                    {{--success: {--}}
                    {{--endpoint: "{{URL::to('upload')}}?done"--}}
                    {{--},--}}
                    {{--params: {--}}
                    {{--_token: "{{csrf_token()}}"--}}
                    {{--}--}}
                    {{--},--}}
                    {{--resume: {--}}
                    {{--enabled: true,--}}
                    {{--recordsExpireIn: 1--}}
                    {{--},--}}
            retry: {
                enableAuto: true,
                showButton: true
            },
            thumbnails: {
                placeholders: {
                    notAvailablePath: "{{URL::to('/fine-uploader/placeholders/File.svg')}}"
                }
            },
            validation: {
                allowedExtensions: ['pdf', 'docx', 'doc', 'xlsx', 'xls', 'ppt', 'pptx', 'csv'],
                sizeLimit: 15728640
            },
            callbacks: {
                onComplete: function (id, name, responseJSON) {
                    if (responseJSON.success) {
                        var $element = document.getElementById(element_id + "_div");
                        var row = '<div id=' + responseJSON.uuid + ' class="form-group" style="padding: 10px 0 0;"><div ><a target="_blank" href="' + '{{URL::to('download')}}' + '/' + responseJSON.uuid + '"><button class="btn btn-outline btn-primary dim btn-sm" type="button"><i class="fa fa-check">Download</i></button></a><span>' + responseJSON.uploadName + '</span></div>';
                        $element.innerHTML += row;
                    }
                },
                onDeleteComplete: function (id, xhr) {
                    var element_to_delete = xhr.responseURL.split('/');
                    element_to_delete = element_to_delete[element_to_delete.length - 1].split('?')[0];
                    $('#' + element_to_delete).remove();
                }
            }
        });
    }

    $(function () {


        $('#data_x .input-group.date').datepicker({
            format: 'yyyy-mm',
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

//        $('.input-group.date:not(#data_4)').datepicker({
//            format: 'yyyy-mm-dd',
//            todayBtn: "linked",
//            keyboardNavigation: false,
//            forceParse: false,
//            calendarWeeks: true,
//            autoclose: true
//        });

        $('.input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": false,
            "preventDuplicates": true,
            "positionClass": "toast-top-center",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "0",
            "extendedTimeOut": "0",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if(session()->get('project_created_true') == 1)
            toastr["info"]("Successfully Project Created");
        @elseif(session()->get('project_created_false') == 1)
            toastr["error"]("Failed to Create New Project");
        @elseif(session()->get('project_updated_true') == 1)
            toastr["info"]("Successfully Project Updated");
        @elseif(session()->get('project_updated_false') == 1)
            toastr["error"]("Failed to Update Project");
        @elseif(session()->get('project_delete_true') == 1)
            toastr["info"]("Successfully Project Deleted");
        @elseif(session()->get('project_delete_false') == 1)
            toastr["error"]("Failed to Delete Project");
        @elseif(session()->get('register_error') == 1)
            toastr["error"]("Username Already Exists");
        @elseif(session()->get('register_success') == 1)
            toastr["info"]("Successfully Created New User");
        @elseif(session()->get('password_update') == 1)
            toastr["info"]("User Update Successful");
        @elseif(session()->get('password_update') == 2)
            toastr["error"]("User Update Failed");
        @elseif(session()->get('monthly_excel_file_format') == 1)
            toastr["error"]("Error: Please upload in xls or xlsx Format");
        @elseif(session()->get('excel_success_true') == 1)
            toastr["info"]("Excel Upload Successful");
        @elseif(session()->get('excel_success_false') == 1)
            toastr["error"]("Error: Please upload in correct format");
        @elseif(session()->get('monthly_excel_delete_success'))
            toastr["info"]('{{session()->get('monthly_excel_delete_success')}}' + " Rows Deleted Succesfully");
        @elseif(session()->get('monthly_excel_delete_fail') == 1)
            toastr["error"]("Error: Failed to delete");
        @elseif(session()->get('partial_shipment_select') == 1)
            toastr["error"]("Error: Must Select Partial Shipment");
        @endif
    });

    function initial_plugins_for_shipment_classes(file_id, both) {

        if ($('#lc_partial_shipments :selected').text().trim() == 'ALLOWED') {
//            if (file_id) {//for toggle not for the first time
            if (both) {
                fineuploader($('#project_id').val(), "shipment_advice_" + file_id);
                fineuploader($('#project_id').val(), "upload_nn_documents_" + file_id);
                fineuploader($('#project_id').val(), "invoice_upload_payment_copy_" + file_id);
                fineuploader($('#project_id').val(), "upload_acceptance_copy_" + file_id);
                fineuploader($('#project_id').val(), "upload_controller_documents_" + file_id);
                fineuploader($('#project_id').val(), "s_g_w_c_upload_claim_letter_" + file_id);
                fineuploader($('#project_id').val(), "short_gain_payment_copy_" + file_id);
            } else {//for toggle
                fineuploader($('#project_id').val(), "shipment_advice_" + file_id);
            }
        } else {
            fineuploader($('#project_id').val(), "shipment_advice");
            fineuploader($('#project_id').val(), "upload_nn_documents");
            fineuploader($('#project_id').val(), "invoice_upload_payment_copy");
            fineuploader($('#project_id').val(), "upload_acceptance_copy");
            fineuploader($('#project_id').val(), "upload_controller_documents");
            fineuploader($('#project_id').val(), "s_g_w_c_upload_claim_letter");
            fineuploader($('#project_id').val(), "short_gain_payment_copy");

        }
        var classes = [
            'shipment_port_of_loading',
            'shipment_transshipment_port',
            'shipment_port_of_discharge',
            'controller_weight_finalization_area',
            'controller_weight_type',
            'controller_tear_weight_unit',
            'controller_invoice_weight_unit',
            'controller_landing_weight_unit'
        ];
        var i;
        //initialize select2 for all ids of each classes
        for (i = 0; i < classes.length; i++) {//
            $("." + classes[i]).each(function () {
                var id = $(this).attr('id');
                var className = $(this).attr('class');

                if (!$("#" + id).hasClass("select2-hidden-accessible")) {

                    $("#" + id).select2({
                        placeholder: "select",
                        allowClear: true
                    }).on('select2:opening', getOptionsListShipment(className, id)).on('select2:open', {className: className}, function (evt) {
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
                            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-' + evt.data.className + '">ADD NEW</a></div>');
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                                'width': '100%',
                                'border-radius': '0'
                            });
                        }
                    );
                }
            });
        }
        //date
        $('.input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    }
</script>

<script>
    //this script is for changing burger-menu in mobile display
    $(function () {
        if ($(this).width() < 769) {
            $('body').addClass('fixed-nav');
            $('#topnav').removeClass('navbar-static-top white-bg');
            $('#topnav').addClass('navbar-fixed-top');
        } else {
            $('body').removeClass('fixed-nav');
            $('#topnav').removeClass('navbar-fixed-top');
            $('#topnav').addClass('navbar-static-top white-bg');

        }
        $(window).bind("resize", function () {
            if ($(this).width() < 769) {
                $('body').addClass('fixed-nav');
                $('#topnav').removeClass('navbar-static-top white-bg');
                $('#topnav').addClass('navbar-fixed-top');
            } else {
                $('body').removeClass('fixed-nav');
                $('#topnav').removeClass('navbar-fixed-top');
                $('#topnav').addClass('navbar-static-top white-bg');
            }
        });

    });
</script>


@stack('scripts')
@yield('module')
</body>
</html>
