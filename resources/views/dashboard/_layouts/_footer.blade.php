<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">{{ now()->year }} &copy; Copyright <a class="text-bold-800 grey darken-2"
                href="" target="_blank">Roshen</a></span>
    </div>
</footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('dashboard/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/libs/pace.min.js') }}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('dashboard/js/libs/Chart.min.js') }}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('dashboard/js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    {{-- <script src="{{ asset('dashboard/js/views/main.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/js/views/charts.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" ></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                placeholder: 'Type here',
                tabsize: 2,
                height: 100,
                focus: true
            });

            $('#summernote2').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                placeholder: 'Type here',
                tabsize: 2,
                height: 100,
                focus: true
            });

            $('#summernote3').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                placeholder: 'Type here',
                tabsize: 2,
                height: 100,
                focus: true
            });

            $('#summernote4').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                placeholder: 'Type Your Post here',
                tabsize: 2,
                height: 100,
                focus: true
            });

            $('#summernote5').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                placeholder: 'Type Your Post here',
                tabsize: 2,
                height: 100,
                focus: true
            });

            // $('#summernote6').summernote({
            //     toolbar: [
            //         // [groupName, [list of button]]
            //         ['style', ['bold', 'italic', 'underline', 'clear']],
            //         ['font', ['strikethrough', 'superscript', 'subscript']],
            //         ['fontsize', ['fontsize']],
            //         ['color', ['color']],
            //         ['para', ['ul', 'ol', 'paragraph']]
            //     ],
            //     placeholder: 'Type Your Post here',
            //     tabsize: 2,
            //     height: 100,
            //     focus: true
            // });
        });
    </script>

    @extends('dashboard._layouts._noty')
    {{-- @yield('scripts') --}}
    @yield('scripts')
