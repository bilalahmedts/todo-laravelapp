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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.editTaskButton', function() {
            var taskId = $(this).val();
            $('#editTask').modal('show');
            $.ajax({
                type: "GET",
                url: "/" + taskId,
                success: function(response) {
                    $('#taskId').val(response.task.taskId);
                    $('#taskName').val(response.task.taskName);
                }



            });
        });
    });
</script>
