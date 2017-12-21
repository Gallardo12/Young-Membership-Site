(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('select').material_select();
    $('.parallax').parallax();
    $('.collapsible').collapsible();
    $('.materialboxed').materialbox();
    $('.tooltipped').tooltip({delay: 50});
    $('.carousel').carousel();
    $('.dropdown-button').dropdown({
      	inDuration: 300,
      	outDuration: 225,
      	constrainWidth: false, // Does not change width of dropdown to that of the activator
      	hover: false, // Activate on hover
      	gutter: 0, // Spacing from edge
      	belowOrigin: false, // Displays dropdown below the button
      	alignment: 'left', // Displays dropdown with edge aligned to the left of button
      	stopPropagation: false // Stops event propagation
    });
    $('.dropdown-button1').dropdown({
      	inDuration: 300,
      	outDuration: 225,
      	constrainWidth: false, // Does not change width of dropdown to that of the activator
      	hover: true, // Activate on hover
      	gutter: 0, // Spacing from edge
      	belowOrigin: false, // Displays dropdown below the button
      	alignment: 'left', // Displays dropdown with edge aligned to the left of button
      	stopPropagation: false // Stops event propagation
    });
  }); // end of document ready
})(jQuery); // end of jQuery name space