$().ready(function() {

	// Vertical splitter. The min/max/starting sizes for the left (A) pane
	// are set here. All values are in pixels.
	$("#pageContent").splitter({
		type: "v", 
		minSizeLeft: 0, sizeLeft: _getSplitbarPosition("pagecontent"), maxSizeLeft: 1000,
		accessKey: "|"
	})
	
	// Horizontal splitter, nested in the right pane of the vertical splitter.
	$("#right-pane").splitter({
		type: "h",
		minSizeTop: 0, sizeTop: _getSplitbarPosition("rightpane"), maxSizeTop: 1000,
		accessKey: "_"
	});
	
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
	$("#properties").ajaxComplete(function(event,request, settings){
		   _showButton();
		   _maximizeList();
	 });
});


function splitterResizeCallback()
{
	_saveSplitbarStatus();
	_maximizeList();
}


/**
 * @name		_showButton
 * @access		private
 * @abstract	Show the minimize or maximize button based on the
 * 				current state
 * @return
 */
function _showButton()
{
	if($("#left-pane").width() > 0 || $("#list").height() > 0)
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
		$("#properties").append('<a id="btn_maximize" class="btn_maximize" onmouseover="hover(\'in\', this)" onmouseout="hover(\'out\', this)" onclick="maximizeProperties()" title="Maximize"><img src="/zf/www/images/icons/maximize.gif" alt="Maximize" /></a>');	
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
		$("#properties").append('<a class="btn_minimize" id="btn_minimize" onmouseover="hover(\'in\', this)" onmouseout="hover(\'out\', this)" onclick="minimizeProperties()" title="Minimize"><img src="/zf/www/images/icons/minimize.gif" alt="Minimize" /></a>');	
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
	 $("#right-pane").trigger("resize", [ 0.00001 ]);	
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
	 $("#right-pane").trigger("resize", [ _getSplitbarPosition("rightpane") ]);
	 $("#pageContent").trigger("resize", [ _getSplitbarPosition("pagecontent") ] );

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
		var position_rightpane = $("#list").height();
		
		// Show correct button
		_showButton();

		// Save to cookie
		$.cookie("splitbarposition", position_pagecontent + ";" + position_rightpane , { expires: 365 });				
		
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
			var position_rightpane = positionarray[1];
			
			// Reset position
			$("#right-pane").trigger("resize", [ position_rightpane ]);
			$("#pageContent").trigger("resize", [ position_pagecontent ] );
		}
	}
	catch(ex) {
		// Do not fail on error
	}
}


function _maximizeList()
{
	// Maximize list
	try {		
		$('#list').find('#scrollList').height($('#list').height() - $('#list .listHeader').height());
	}
	catch(ex) {
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
	var default_rightpane = 200;
	var returnvalue = default_pagecontent;
	
	try {
		// Check if cookie exists
		if($.cookie("splitbarposition")) {
			
			var position = $.cookie("splitbarposition");
			// Split values
			var positionarray = position.split(';');
			var position_pagecontent = positionarray[0];
			var position_rightpane = positionarray[1];
			
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
			
		case "rightpane":
			returnvalue = (position_rightpane > 0) ? position_rightpane : default_rightpane;
			break;	
			
		default:
			returnvalue = default_pagecontent;
			break;
	}		
	
	return returnvalue;
}