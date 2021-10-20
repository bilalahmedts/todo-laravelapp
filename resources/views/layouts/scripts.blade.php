<script src="{{ URL('theme/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL('theme/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ URL('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL('theme/js/demo/datatables-demo.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.editTaskButton').on('click', function() {
            $('#editTask').modal('show');
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            $('#taskId').val(data[1]);
            $('#taskName').val(data[2]);
        });
    });
</script>
