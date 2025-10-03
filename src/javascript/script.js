$(document).ready(function() {
    $('.edit-button').on('click', function() {
        var task = $(this).closest('.task');
        var editForm = task.find('.edit-task');
        editForm.toggleClass('hidden');
    });

    $('.progress').on('change', function() {
        var taskId = $(this).data('task-id');
        var completo = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: 'action/update-progress.php',
            type: 'POST',
            data: {
                id: taskId,
                completo: completo
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    location.reload();
                } else {
                    alert('Erro ao atualizar progresso');
                }
            },
            error: function() {
                alert('Erro ao atualizar progresso');
            }
        });
    });
});
