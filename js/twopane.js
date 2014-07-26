$().ready(function() {
	
	// Vertical splitter. The min/max/starting sizes for the left (A) pane
	// are set here. All values are in pixels.
	$("#pageContent").splitter({		
		type: "v", 
		minSizeLeft: 0, sizeLeft: _getSplitbarPosition("pagecontent"), maxSizeLeft: 1000,
		accessKey: "|"
	})
	
	// Manually set the outer splitter's height to fill the browser window.
	// This must be re-done any time the browser window is resized.
	$(window).bind("resize", function(){
		var $ms = $("#pageContent");
		var top = $ms.offset().top;		// from dimensions.js
		var wh = $(window).height();
		// Account for margin or border on the splitter container
		var mrg = parseInt($ms.css("marginBottom")) || 0;
		var brd = parseInt($ms.css("borderBottomWidth")) || 0;
		$ms.css("height", (wh-top-mrg-brd)+"px");
		// IE fires resize for splitter; others don't so do it here
		if ( !jQuery.browser.msie )
			$ms.trigger("resize");		
	}).trigger("resize");
	
	// Show the maximize button
	_showButton();
	
	// Bind button show to each ajax call
	$("#right-pane").ajaxComplete(function(event,request, settings){
		   _showButton();
	 });
});


/**
 * @name		_showButton
 * @access		private
 * @abstract	Show the minimize or maximize button based on the
 * 				current state
 * @return
 */
function _showButton()
{
	if($("#left-pane").width() > 0)
	{
		// Properties are maximized
		_showMaximizeButton();
	}
	else 
	{
		// Properties are minimized
		_showMinimizeButton();
	}
}


/**
 * @name		_showMaximizeButton
 * @access		private
 * @abstract	Show the maximize button
 * @return
 */
function _showMaximizeButton()
{
	// Add element to maximize properties window
	$(".btn_minimize").css("display", "none");
	if($(".btn_maximize").length != 0) {
		$(".btn_maximize").css("display", "block");
	} else { 
		$("#right-pane").append('<a id="btn_maximize" class="btn_maximize" onmouseover="hover(\'in\', this)" onmouseout="hover(\'out\', this)" onclick="maximizeProperties()" title="Maximize"><img src="/zf/www/images/icons/maximize.gif" alt="Maximize" /></a>');	
	}
}


/**
 * @name		_showMinimizeButton
 * @access		private
 * @abstract	Show the minimize button
 * @return
 */
function _showMinimizeButton()
{
	// Add element to maximize properties window
	$(".btn_maximize").css("display", "none");
	if($(".btn_minimize").length != 0) {
		$(".btn_minimize").css("display", "block");
	} else { 
		$("#right-pane").append('<a class="btn_minimize" id="btn_minimize" onmouseover="hover(\'in\', this)" onmouseout="hover(\'out\', this)" onclick="minimizeProperties()" title="Minimize"><img src="/zf/www/images/icons/minimize.gif" alt="Minimize" /></a>');	
	}
}


/**
 * @name		hover
 * @abstract	Hover action
 * @return
 */
function hover(action, sender)
{

	var img_no_ext = $('#' + sender.id + ' img').attr('src').substring(0, $('#' + sender.id + ' img').attr('src').lastIndexOf('.'));
	var ext = $('#' + sender.id + ' img').attr('src').substring($('#' + sender.id + ' img').attr('src').lastIndexOf('.'));
	var hashover = $('#' + sender.id + ' img').attr('src').indexOf("_hover");

	switch(action)
	{
		case 'in':
			if(hashover < 0) {
				$('#' + sender.id + ' img').attr('src', img_no_ext + '_hover' + ext);
			}
			break;
			
		case 'out':
			if(hashover >= 0) {
			    var img_no_hover = img_no_ext.substring(0, img_no_ext.lastIndexOf('_'));
			    $('#' + sender.id + ' img').attr('src', img_no_hover + ext);
			}
			break;
	}
}


/**
 * @name		maximizeProperties
 * @abstract	Maximize the properties div
 * @return
 */
function maximizeProperties()
{	  
	 // Set cookie with current size
	 _saveSplitbarStatus();
	
	 // Maximize properties
	 $("#pageContent").trigger("resize", [ 0.00001 ] );
	  
	 // Show the minimize button instead of the maximize button
	 _showMinimizeButton();
}


/**
 * @name		minimizeProperties
 * @abstract	Minimize the properties div
 * @return
 */
function minimizeProperties()
{	  
	 // Minimize properties
	 $("#pageContent").trigger("resize", [ _getSplitbarPosition("H") ] );

	 // Show the maximize button instead of the minimize button
	 _showMaximizeButton();
}


/**
 * @name		saveSplitbarStatus
 * @access		private
 * @abstract	Save the splitbar position in a cookie
 * @return
 */
function _saveSplitbarStatus()
{
	try {
		// Get the splitbar position
		var position_pagecontent = $("#left-pane").width();
		
		
		var position = $.cookie("splitbarposition");
		// Split values
		var positionarray = position.split(';');
		var position_rightpane = positionarray[1];
		// Show correct button
		_showButton();
		
		// Save to cookie
		$.cookie("splitbarposition", position_pagecontent + ";" + position_rightpane, { expires: 365 });				
		
	}
	catch(ex) {
		// Do not fail on error
	}
}


/**
 * @name		restoreSplitbarStatus
 * @access		private
 * @abstract	Restore the splitbar position if a cookie exists
 * @return
 */
function _restoreSplitbarStatus()
{
	try {
		// Check if cookie exists
		if($.cookie("splitbarposition")) {
			
			var position = $.cookie("splitbarposition");
			// Split values
			var positionarray = position.split(';');
			var position_pagecontent = positionarray[0];
			// Reset position
			$("#pageContent").trigger("resize", [ position_pagecontent ] );
		}
	}
	catch(ex) {
		// Do not fail on error
	}
}


/**
 * @name		restoreSplitbarStatus
 * @access		private
 * @abstract	Restore the splitbar position if a cookie exists
 * @return
 */
function _getSplitbarPosition(which)
{
	var default_pagecontent = 200;
	var returnvalue = default_pagecontent;
	
	try {
		// Check if cookie exists
		if($.cookie("splitbarposition")) {
			
			var position = $.cookie("splitbarposition");
			// Split values
			var positionarray = position.split(';');
			var position_pagecontent = positionarray[0];
			
		}			
	}
	catch(ex) {
		// Do not fail on error
	}
	
	
	switch(which)
	{
		case "pagecontent":
			returnvalue = (position_pagecontent > 0) ? position_pagecontent : default_pagecontent;
			break;	
			
		default:
			returnvalue = default_pagecontent;
			break;
	}		
	return returnvalue;
}