$(document).ready(function() {
    // Load details when an option is clicked
    $('.option-card').click(function() {
        let content = $(this).data('content');
        let details = {
            projects: $("#projects").val(),
            experience: $("#experience").val(),
            certificates: $("#certificates").val(),
            skills: $("#skills").val()
        };
        $('#details-content').text(details[content]);
    });

    // Save changes when the "Save changes" button is clicked
    $('#saveChanges').click(function() {
        // Update profile details
        $('#user-name').text($('#name').val());
        $('#user-role').text($('#role').val());
        $('#user-job').text($('#job').val());

        // Update profile image if a new one is selected
        const fileInput = $('#profileImage')[0];
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profile-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }

        // Close the modal
        $('#editModal').modal('hide');
    });
});