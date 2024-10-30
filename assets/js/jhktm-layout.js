// jQuery(document).ready(function() {
//     jQuery(".team-main-title").click(function() {
//         jQuery(".popup").fadeIn(500);
//       });
//       jQuery(".close").click(function() {
//         jQuery(".popup").fadeOut(500);
//       });
      
//   });

// jQuery(document).ready(function() {
//   jQuery(".jhktm-title").click(function() {
//     jQuery(".jhktm-detail-overlay, .jhktm-detail-panel").fadeIn(500).style("display", "block");
//   })
//   jQuery(".jhktm-detail-panel-close").click(function() {
//     jQuery(".jhktm-detail-overlay, .jhktm-detail-panel").fadeOut(500).style("display", "none");
//   })

// });

// jQuery(document).ready(function() {
//   jQuery('.jhktm-title').click(function() {
//     var titleId = jQuery(this).attr('id');
//     console.log(titleId); 
//     if(){
      
//     }
//     jQuery(".jhktm-detail-overlay, .jhktm-detail-panel").fadeIn(500);
//     });
// });

// jQuery(document).ready(function($) {
//   var titleIds = [];
//   jQuery('.jhktm-title').each(function() {
//     var titleId = jQuery(this).attr('id');
//     titleIds.push(titleId);
//   });
//   console.log(titleIds);
// });

jQuery(document).ready(function() {
  // Attach click event handler to elements with class jhktm-title
  jQuery('.jhktm-title').click(function() {
      // Extract the ID from the clicked element
      var memberId = jQuery(this).attr('id').split('-')[1];
      
      // Construct the ID of the corresponding popup
      var popupId = 'popup-' + memberId;
      
      // Toggle the visibility of the popup with the constructed ID
      jQuery('#' + popupId).fadeIn(500);
      jQuery('body').css('overflow', 'hidden');

  });
  jQuery('.jhktm-detail-panel-close').click(function() {
    jQuery(this).closest('.jhktm-detail-popup').fadeOut(500);
    jQuery('body').css('overflow', 'auto');
  });
});