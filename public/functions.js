$(document).ready(function() {


    //New Element on Submission
    $('body').on('submit', '#create-list', function(e) {
        var task_container, latest_task;
        $(this).each(function() {
            var task = $(this).find('.task') //<-- Should return all input elements in that specific form.
            task_container = "<div class='input-group mb-3 task-container'>" +
                "<div class='input-group-prepend'>" +
                '<span class="input-group-text">' +
                '<i class="fa fa-ellipsis-v" aria-hidden="true"></i>' +
                '<i class="fa fa-ellipsis-v" aria-hidden="true"></i>' +
                '</span>' +
                '</div>' +
                '<input type="text" disabled class="form-control task" name="task[]" value="' + task[0].value + '" aria-label="text description">' +
                '<div class="input-group-append" >' +
                '<span class="input-group-text bg-danger text-white">' +
                '<i class="fa fa-times " aria-hidden="true"></i>' +
                '</span>' +
                '</div>' +
                "</div>";
            latest_task = task[0].value;
        });
        $('#task-list').prepend(task_container);
        $(this).trigger('reset');

        //Store in database

        $.ajax({
            url: "main.php",
            data: 'task=' + latest_task + "&action=store"
        });

        e.preventDefault(); //rest code
    });

    // Delete
    $('#task-list').on('click', '.input-group-append', function(e) {
            var task_container = $(this).parent();
            var id = task_container.attr('id');
            console.log(id);
            $.ajax({
                url: "main.php",
                data: 'id=' + id + "&action=delete",
                success: function(response) {
                    task_container.remove();
                }
            });

        })
        // Edit
    $('#task-list').on('click', '.task-container', function() {
        var currentTask = $(this).find('.task');
        currentTask.prop('disabled', false);
        currentTask.focus();
    });
    $('#create-list').on('click', '.task-container', function() {
        var currentTask = $(this).find('.task');
        currentTask.prop('disabled', false);
        currentTask.focus();
    });
    // Disable Edit
    $('#task-list').on("focusout", '.task', function() {
        $(this).prop('disabled', true);

        var id = $(this).parent().attr('id');
        var edit_text = $(this)[0].value;
        console.log(edit_text);
        $.ajax({
            url: "main.php",
            data: 'id=' + id + '&edit_text="' + edit_text + '"' + "&action=edit",
        })
    });
    $('#create-list').on("focusout", '.task', function() {
        $(this).prop('disabled', true);
    });
    // Init Sortable, Dragable
    $("#task-list").sortable();





});