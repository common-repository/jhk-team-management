
// jQuery(document).ready(function($) {
//     // Add color picker to the input field with the class 'my-color-field'
//     $('.wp-color-picker').wpColorPicker();
// });

jQuery(document).ready(function($) {
    // Function to update the shortcode
    function updateShortcode() {
        var group = $('#group').val();
        var designation = $('#designation').val();
        var department = $('#department').val();
        var orderby = $('#orderby').val();
        var otherinfo = $('#otherinfo').val();
        var socialinfo = $('#socialinfo').val();
        var contentlayout = $('#contentlayout').val();

        // Build the shortcode
        var shortcode = '[jhk_team_management group="' + group + '" designation="' + designation + '" department="' + department + '" orderby="' + orderby + '" otherinfo="' + otherinfo + '" contentlayout="' + contentlayout + '" socialinfo="' + socialinfo + '"]';

        // Update the output box
        $('#jhk_tm_shortcode_outputbox').text(shortcode);
    }

    // Event listeners for form changes
    $('#group, #designation, #department, #orderby, #otherinfo, #socialinfo, #contentlayout').on('change', function() {
        updateShortcode();
    });

    // Initialize color pickers using wpColorPicker
    // $('#bg_color, #social_color').wpColorPicker({
    //     change: function(event, ui) {
    //         // Introduce a delay to ensure color picker update is complete
    //         setTimeout(updateShortcode, 100);
    //     }
    // });

    // Initial update
    updateShortcode();
});


