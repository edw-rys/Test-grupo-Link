<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Libros</title>

    @yield('styles_cdn')
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">

    <style>
        .modal-dialog {
            max-width: 100% !important;
        }

        @media(min-width: 736px) {
            .modal-dialog {
                max-width: 70% !important;
            }
        }

        @media(min-width: 906px) {
            .modal-dialog {
                max-width: 50% !important;
            }
        }

        @media(max-width: 406px) {
            .modal-dialog {
                max-width: 100% !important;
            }
        }

        .relative {
            position: relative;
        }
        .c-pointer{
            cursor: pointer;
        }
        #b1,
        #b2 {
            overflow-y: scroll;
        }

        #b1::-webkit-scrollbar,
        #b2::-webkit-scrollbar {
            width: 9px;
        }

        #b1::-webkit-scrollbar-thumb,
        #b2::-webkit-scrollbar-thumb {
            background: #fec947;
            border-radius: 5px;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atlantis.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/tooltip.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/demo.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/checkstyle.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')
    </script>
    <script src="{{ asset('js/errors.js') }}"></script>
    @yield('other_styles')

</head>

<body>

    <div class="container">
        <div class="content">

            @yield('section')
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright ml-auto">
                {{ \Carbon\Carbon::now()->year }}, desarrollado por <a href="https://www.github.com/edw-rys"
                    target="_blank">Edw Rys </a>
            </div>
        </div>
    </footer>
    <!-- End Custom template -->
    </div>
    {{-- Ajax Modal --}}
    <div class="modal fade bs-modal-md in" id="modal-component" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header" style="background: #0073a0">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                        style="background: red;border-radius: 10px;padding: 7px">
                        <i style="color: #fff" class="fas fa-times"></i>
                        {{-- <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span> --}}
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    Loading...
                </div>
                {{-- <div class="modal-footer"></div> --}}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->.
    </div>
    {{-- Ajax Modal Ends --}}

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/i18n/es.js"></script>
    @yield('scripts_cdn')
    @yield('scripts')


    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/moment.js') }}"></script> --}}
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        $.modalVid = function(selector = 'id') {

            // Reset modal when it hides
            $(selector).on('hidden.bs.modal', function() {
                $(this).find('.modal-body').html('Loading...');
                $(this).find('.modal-footer').html(
                    '<button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>'
                    );
                $(this).data('bs.modal', null);
            });

            $('#modal-body').html(`
        <div class="modal-body">
                              <div class="card-header" id="headingSecretaria">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" 
                                        data-target="#collapseSecretaria" aria-expanded="true" aria-controls="collapseSecretaria">
                                        Sistemas
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSecretaria" class="collapse show" aria-labelledby="headingSecretaria" data-parent="#videotutorialesAccordion">
                                <div class="card-body">
                                    <ul>
                                        <li>Sistemas Autoadmin-Insumos Reasignación: <a href="https://drive.google.com/file/d/1JLIb6nvrAATaPCOlV3bzWxg5ryeo7XrR/view?usp=sharing" target="_blank">https://drive.google.com/file/d/1JLIb6nvrAATaPCOlV3bzWxg5ryeo7XrR/view?usp=sharing</a></li>
                                        <li>Sistemas-HPD Integración LIRANKA Ajustes 2: <a href="https://drive.google.com/file/d/1Z7pEShe66VCue13IILeiR7TGlE2JsX3p/view?usp=sharing" target=\"_blank\">https://drive.google.com/file/d/1Z7pEShe66VCue13IILeiR7TGlE2JsX3p/view?usp=sharing</a></li>
                                    </ul>
                                </div>
                            </div>
        `);
            $('#modal-component').modal('show');
        };

        $(document).ready(function() {
            $('.select2').select2();
            $.toast = toastr;

        });
        /**
         * Notificar errores globales HTTP
         * @argument params
         */
        function notifyErrorGlobal(params) {
            if (params.status == 500) {
                $.notify({
                    icon: 'flaticon-hands-1',
                    title: 'Error interno',
                    message: '',
                }, {
                    type: 'info',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                });
            }
            $.notify({
                icon: 'flaticon-hands-1',
                title: params.responseJSON.message,
                message: '',
            }, {
                type: 'warning',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        }



        function getCategories() {
            $.easyAjax({
                url: '{{route('book.categories.index')}}',
                type: "GET",
                success: function (response) {
                    console.log(response);
                    var data = response.data;
                    // var html = `<option value="">Todos</option>`;
                    var html = ``;
                    for (const ctg of data) {
                        html+=`<option value="${ctg.category_id}">${ctg.name}</option>`;
                    }
                    $('#category_id').html(html).trigger('change');
                },
                error: function (error) {
                    showErrors(error);
                },
            });
        }
        function templateBook(book) {
            return `
            <div class="col-md-4 col-12 col-xl-3">
                <div class="card p-3 c-pointer cursor-pointer" onclick="openBook(${book.ID})">
                    <img src="${book.thumbnail}" alt="${book.title}">
                    <div class="card-body">
                        <h5 class="card-title">${book.title}</h5>
                    </div>
                </div>
                
            </div>
            `;
        }

    </script>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Atlantis JS -->
    {{-- <script src="{{ asset('js/atlantis.min.js') }}"></script> --}}

    @yield('fina_scripts')

</body>

</html>
