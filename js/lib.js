/**
 * Global var
 */
var BASE_URL = '/zf/private';
var BASE_IMG_PATH = '/zf/www/images';

//Default options for the blockUI
var blockOptions = {
    message : '<img src="/zf/www/images/loadinganimation.gif" />',
    css : {border : '0', 'background-color' : 'transparent', "width" : "220px", "height" : "19px"},
    overlayCSS : {'background-color' : 'white'}
};

//Extend  JQuery with the redraw function to force the browser to redraw a node
(function($) {
    $.fn.redraw = function() {
        return this.each(function() {
            if($.browser.msie){
                this.style.zoom = 2;
                this.style.visibility = 'hidden';
                this.style.display = 'none';
                
                this.style.zoom = 1;
                this.style.visibility = 'visible';
                this.style.display = 'block';
            }
            
            var n = document.createTextNode(' ');
            this.appendChild(n);
            (function(){n.parentNode.removeChild(n)})();
        });
    };

    // EG: Somehow the unautocomplete function from autocomplete plugin doesn't remove the old autocomplete event
    // It works fine in the old jquery version that is used for VFE
    // this is just a workaround, by overwrite the unautocomplete function and manually remove the old autocomplete events
    // this workaround can be removed if we find a more elegant solution. (perhaps new version of autocomplete plugin or jquery)
    $.fn.unautocomplete = function() {
        this.trigger("unautocomplete");
        this.unbind('.autocomplete');
        return;
    }
})(jQuery);

String.prototype.ucFirst = function () {
	return this.substr(0,1).toUpperCase() + this.substr(1,this.length);
}

$(document).ready(function() { 
	var options = {
		target: '#list',
		beforeSubmit: disableButtons,	
		success: function() { 
			resetProperties(); enableButtons();
		}
	};
	$('#searchForm').ajaxForm(options);
});

function in_array(needle, haystack) {
	for (idx = 0; idx < haystack.length; idx++) {
		if (haystack[idx] == needle) {
			return true;
		}
	}
	return false;
}

function resetProperties() {
	$('#properties').html('');
}

function disableButtons(setprogress) {
	$("input.button").attr("disabled", "disabled");
	$("button.button").attr("disabled", "disabled");
	
	if(setprogress === undefined) {
		setprogress = true;
	}
	
	if(setprogress) {
		document.body.style.cursor = 'progress';	
	}
}

function enableButtons() {
	$("input.button").attr("disabled", "");
	$("button.button").attr("disabled", "");
	document.body.style.cursor = 'default';		
}


$.extend($.fn.Tooltip.defaults, {
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - "
});

function loadThickbox() {
    $("a.thickbox_max_height").each(function(index) {
        // Change the height-value for thickbox links with the thickbox_max_height class to the 
        var maxHeight = $(window).height() - 60;
        var url = $(this).attr('href');
        var height = url.replace(/^.*height=([0-9]+).*$/, "$1");
        if (height > maxHeight) {
            url = url.replace(/height=[0-9]+/, 'height=' + maxHeight);
            $(this).attr('href', url);
        }
    });
    var selector = 'a.thickbox, area.thickbox, input.thickbox, a.thickbox_nobg';
    $(selector).unbind('click');
	tb_init(selector);
}


/**
 * Displays autocomplete company search field
 * in left search pane on window onload
 */
$(document).ready(function() {
	if (objectExist($("#acCompanySearch"))) {
		$("#acCompanySearch").autocomplete("/zf/private/company/searchdynamic", { 
			minChars:2, 
			matchSubset:1, 
			matchContains:1, 
			cacheLength:20, 
			formatItem:formatItem,
			selectOnly:1, 
			max:100
		});
		$("#acCompanySearch").result(function(event, data, formatted) {
			$('#companyIdSearch').val(data[2]);
			autocompleteOnSearchCallback(data);
		});
	}
});

/**
 * Function that loads the autocompleter on the properties tab
 */
function loadAutoCompleterCompany() {
	if (objectExist($("#acCompanyProp"))) {
		$("#acCompanyProp").autocomplete("/zf/private/company/searchdynamic", { 
			minChars:2, 
			matchSubset:1, 
			matchContains:1, 
			cacheLength:20, 
			formatItem:formatItem, 
			selectOnly:1 
		});
		$("#acCompanyProp").result(function(event, data, formatted) {
			$('#companyIdProp').val(data[2]);
			autocompleteOnPropertiesCallback(data);			
		});
	}	
}

/**
 * Defines which label is shown in autocomplete field
 */
function formatItem(row) {
	return row[1];
}

function autocompleteOnPropertiesCallback(data) {
	// dummy function
}

function autocompleteOnSearchCallback(data) {
	// dummy function
}

function objectExist(object) {
	if (object.length == 0) {
		return false
	} else {
		return true
	}
}

/*
 */
$.fn.ifEmpty = function(f) {
	if(this.length == 0) f.apply(this);
	return this;
}


/**
 * Reset search form with work around to get hidden field emtpy
 */
function resetSearchForm(keepHidden) {
	if (keepHidden) {
		// keep some hidden fields set to their value.
		hiddenFields = $('#searchForm :input[type=hidden]');
		for (i = 0; i < hiddenFields.length; ++i) {
			hiddenField = $(hiddenFields.get(i));
			hiddenFieldId = hiddenField.attr('id');
			found = false;
			for (j = 0; !found && j < keepHidden.length; ++j) {
				if (keepHidden[j] == hiddenFieldId) {
					found = true;
				}
			}
			if (!found) {
				hiddenField.val('');
			}
		}
	} else {
		// set hidden fields value to empty
		$('#searchForm :input[type=hidden]').val('');
	}
	$('#searchForm').clearForm();
}

/**
 * Start an export from the search form.
 */
function exportSearchForm() {
    $.download($('#searchForm').attr('action') + 'export', $('#searchForm').serializeArray());
}

/**
 * Show properties by in left pane 
 * by activating record in list pane
 */
var alreadyBusyGettingProperties = -1;

function getProperties(tr, id, controller, message, mode, currentTab) {
	if ( alreadyBusyGettingProperties == id ) {
		return;
	}
	
	// can be used in funcs called from here, as in propertoesCallback...
	global_id = id;
	
	alreadyBusyGettingProperties = id;
	
	if (currentTab == null || currentTab == '') {
		currentTab = 'general';
	}
	if ((mode == 'view' || mode == 'itemview') && message == '' && tr != '') {
		highlightRow(tr);
	}	
	deleteEmptyRows();
	var url = BASE_URL + '/' + controller + '/showProperties';
	var rand = Math.random(9999);
	var queryString = 'id=' + id + '&currentTab=' + currentTab + '&message=' + message + '&mode=' + mode + '&rand=' + rand;
	$('#properties').html('');
	$.post(url, queryString, function(data) {
		$('#properties').html(data);
		$('a[id=toolTip]').Tooltip();
		loadThickbox();
		loadAutoCompleterCompany();
		
		propertiesCallback();
		enableButtons();
		getActivatedDivContent(currentTab); // function to enable custom button disabling, default: dummy function
		if (message != '' && $('#messageBox')) {
			$('#messageBox').addClass('clean-ok');
			$('#messageBox').show();
		}
		alreadyBusyGettingProperties = -1;
		setTimeout(function () {$('#properties').focus(); }, 50);
	});
}

/**
 * Show properties by in left pane 
 * by activating record in list pane
 */
function getHistory(controller, className, groupId, rowId) {
	var url = BASE_URL + '/' + controller + '/showHistory';
	var rand = Math.random(9999);
	var queryString = 'className=' + className + '&groupId=' + groupId + '&rowId=' + rowId + '&rand=' + rand;
	$.post(url, queryString, function(data) {
		$('#historyContent').html(data);
	});
}

function propertiesCallback() {
	// function can be overwritten in js controller class
}

/**
 *
 *
 */
function deleteItem(id, controller) {
	var url = BASE_URL + '/' + controller + '/confirmDelete';
	var rand = Math.random(9999);
	var queryString = 'id=' + id + '&controller=' + controller + '&rand=' + rand;
	$.post(url, queryString, function(data){
		handleConfirmDelete(data);
	});
}

/**
 * Show new 
 */
function newItem(controller) {
	deleteEmptyRows();
	newEmptyLine();
	var url = BASE_URL + '/' + controller + '/displayNewItem';
	var rand = Math.random(9999);
	var queryString = 'mode=new' + '&rand=' + rand;
	$.ajax({
		type: 'POST',
		url: url,
		data: queryString, 
		success: function(data){
			try { $('#properties').html(data); } catch(ex) {}			
			try { $('a[id=toolTip]').Tooltip(); } catch(ex) {}
			try { loadAutoCompleterCompany(); } catch(ex) {}
			try { propertiesCallback(); } catch(ex) {}
		}	
	});
}


function handleConfirmDelete(response) {
	var json = eval('(' + response + ')');
	var deleteMessage = json.deleteMessage;
	var id = json.id;
	var controller = json.controller;
	
	// check if the id is empty, then there is an error
	if (id == '') {
		var messageList = new Array();
		if (typeof deleteMessage == 'object') {
			messageList = deleteMessage;
		} else {
		messageList.push(deleteMessage);
		}
		showMessages(messageList, 'error');
	} else {		
		if (deleteMessage.substring(0,1) == 1) {
			alert(deleteMessage.substring(1));
		} else {	
			var name=confirm(deleteMessage);
			if (name==true){
				var url = BASE_URL + '/' + controller + '/deleteItem';
				var rand = Math.random(9999);
				var queryString = 'id=' + id + '&rand=' + rand;
				$.post(url, queryString, function(data){
					handleDelete(data);
				});
			}	
		}
	}
}

/**
 *
 *
 */
function handleDelete(response) {
	var id = response;
	var listTable = document.getElementById('listRows');
	if (isObject(listTable)) {
		var trs = listTable.getElementsByTagName("tr");
		for (var j = 0; j < trs.length; j++) {
			var idd = trs[j].id;
			if (idd*1 == id*1 ) {
				listTable.deleteRow(trs[j].rowIndex)
			}	
		} 
	}
	$('#properties').html('');
}


function showSearchOptions(divname) {	
	$('#'+divname+'').toggle();
}

/**
 * Save item from edit pane
 */
function saveItem(controller, action) {
	disableButtons();
	var url = BASE_URL + '/' + controller + '/save';
	var rand = Math.random(9999);
	var queryString = $('#edit').formSerialize() + '&action=' + action + '&rand=' + rand;
	$.post(url, queryString, function(data) {
		handleUpdateProperties(data);
	});
}

function getListRow(controller, id)
{
	var url = BASE_URL + '/' + controller + '/listrow';
	var rand = Math.random(9999);
	var queryString = 'id=' + id + '&rand=' + rand;
	$.post(url, queryString, function(data) {
		handleListRow(data);
	});
}

function highlightRow(tr) {
	// reset rows with class selectedRow
	$('.selectedRow').removeClass('selectedRow');
	// highlight current selected row
	$(tr).addClass('selectedRow');
}

/**
 * emptyAtTop determines whether 'new items' are initially displayed at
 * the top or bottom of a tablescrollist
 */
var emptyAtTop = false;

function setEmptyAtTop(empty)
{
	emptyAtTop = empty;
}

function newEmptyLine() {
	var tbl = document.getElementById('listRows');
	if (isObject(tbl)) {
		var newRow = null;
		if (emptyAtTop) {
			newRow = tbl.tBodies[0].insertRow(0);
		} else {
			newRow = tbl.tBodies[0].insertRow(-1);
		}
		newRow.className = 'standard';
		newRow.id = 'new';

		var rowindex = 0;
		if (emptyAtTop) {
			rowindex = 1;
		}
		for (var i = 0; i < tbl.tBodies[0].rows[rowindex].cells.length; i++) {
			var newCell = newRow.insertCell(i);
			newCell.innerHTML = '..';
		}

		var tblDiv = document.getElementById('scrollList');
		if (isObject(tblDiv)) {
			if (emptyAtTop) {
				tblDiv.scrollTop = 0;
			} else {
				tblDiv.scrollTop = tblDiv.scrollHeight;
			}
		}
		highlightRow(newRow);
	}
}

function deleteEmptyRows () {
	var listTable = document.getElementById('listRows');
	if (isObject(listTable)) {
		var trs = listTable.getElementsByTagName('tr');
		for (var j = 0; j < trs.length; j++) {
			if ( trs[j].id == 'new' ) { 
				listTable.deleteRow(trs[j].rowIndex);
			}
		} 
	}
}

function fillEmptyLine(id, cellList, controller) {
	var tbl = document.getElementById('listRows');
	var emptyRow = document.getElementById('new');
	if (isObject(emptyRow)) {
		if (typeof(cellList) == 'string')	{ // Assume full replace of old row
			$('#new').replaceWith(cellList);
		} else {
			emptyRow.id = id;
			emptyRow.setAttribute('onMouseOver','showHighlight(this)');
			emptyRow.setAttribute('onMouseOut','removeHighlight(this)');
			emptyRow.setAttribute('onClick','getProperties(this, \'' + id + '\', \'' + controller + '\', \'\', \'view\', $(\'#currentTab\').val())');
			for (var i = 0; i <	tbl.tBodies[0].rows[0].cells.length; i++) {
				if (cellList.length > i) {
					emptyRow.cells[i].innerHTML = cellList[i];
				}
				else {
					emptyRow.cells[i].innerHTML = '';
				}
			}
		}
	}
}

function updateLine(id, cellList, controller) {
	var tbl = document.getElementById('listRows');
	var updatedRow = document.getElementById(id);
	if (isObject(updatedRow)) {
		if (typeof(cellList) == 'string')	{ // Assume full replace of old row
			dropdown = 1;
			while ($('#'+id+'_'+dropdown).size()) {
				$('#'+id+'_'+dropdown).replaceWith('');
				++dropdown;
			}
			$('#'+id).replaceWith(cellList);
		} else {
			updatedRow.setAttribute('onMouseOver','showHighlight(this)');
			updatedRow.setAttribute('onMouseOut','removeHighlight(this)');
			updatedRow.setAttribute('onClick','getProperties(this, \'' + id + '\', \'' + controller + '\', \'\', \'view\', $(\'#currentTab\').val())');
			for (var i = 0; i <	tbl.tBodies[0].rows[0].cells.length; i++) {
				if (cellList.length > i) {
					if (cellList[i] != 'no_change') {			
						updatedRow.cells[i].innerHTML = cellList[i];
					}
				}
				else {
					updatedRow.cells[i].innerHTML = '';
				}
			}
		}
	}
}

function showHighlight(tr) {
	$(tr).addClass('rowHover');
}

function showHighlightNoClick(tr) {
	$(tr).addClass('rowHoverNoClick');
}

function removeHighlight(tr) {
	$(tr).removeClass('rowHover');
}

function removeHighlightNoClick(tr) {
	$(tr).removeClass('rowHoverNoClick');
}

function showHiddenHighlight(td) {
	$(td.parentNode).removeClass('rowHover');
	$(td.parentNode).addClass('hiddenHover');
}

function removeHiddenHighlight(td) {
	$(td.parentNode).removeClass('hiddenHover');
}

function showMessages(messageList, messageType) {
	if (messageList.length > 0) {
		switch(messageType) {
			case 'error':
				$('#messageBox').addClass('clean-error');
				break;
			
			case 'ok':
				$('#messageBox').addClass('clean-ok');	
				break;
				
			default:
				$('#messageBox').addClass('clean-yellow');	
				break;
		}
		
		messages = formatMessages(messageList);
		$('#messageBox').html(messages);
		$('#messageBox').show();
	}
}

function showErrors(errorFields) {
	if (document.getElementById('edit') != null) {
		var elem = document.getElementById('edit').elements;
		if (isObject(elem)) {
			// first make all red fields normal again	
			$('#edit').find('.required').removeClass('error');
			$('#edit').find('.optional').removeClass('error');	
			
			$('.listblock .listrow').removeClass('error');
			
			// Remove errorTab class
			$('a.errorTab, li.errorTab').removeClass('errorTab');
	
			// make the errorfields red
			for (var j = 0; j < errorFields.length; j++) {
				$('#' + errorFields[j]).parents('.required').addClass('error');
				$('#' + errorFields[j]).parents('.optional').addClass('error');
				
				// if the error occured in a grouplist we have to do something special
				if ($('.listblock #' + errorFields[j]).length > 0){
				    $('.listblock #' + errorFields[j]).parents('.listrow').addClass('error');
				}
				
				// Highlight the tab
				tab = findTabByElementId(errorFields[j]);
				if(tab != null) {
					$(tab).addClass('errorTab');
				}
			}
		}
	}
}


function findTabByElementId(elementId)
{
	if(elementId.indexOf('[') > 0) {
		// Trim [] off index
		elementId = elementId.substring(0, elementId.indexOf('['));
	}
	
	var inputelement = $('#'+elementId);
	
	// Find new tab
	element = $(inputelement).parents().filter('.ui-tabs-panel');
		
	if($(element).length != 0)
	{
		// Found
		return $('a[href="#'+$(element).attr('id')+'"]');		
	}
	else {
		
		// Find old tab
		element = $(inputelement).parents().filter('.tabDisplay');
		
		if($(element).length != 0) {
			id = $(element).attr('id');
			
			// Tabname tab_name => name
			tabname = $(element).attr('id').substring(id.indexOf('_')+1);
						
			return $('#'+tabname);
		} 
		else {

			return null	
		}
	}
}


function cancelEdit(id, controller, currentTab) {
	cancelEditCallback();
	getProperties('', id, controller, '', 'view', currentTab);
}

function cancelInsert(id) {
	cancelInsertCallback();
	deleteEmptyRows();
	$('#properties').html('');
}

function formatMessages(messageList)
{
	var messages = '<ul class="standard">';
	// loop through message list
	for (i = 0; i < messageList.length; i++) {
		messages = messages + '<li>' + messageList[i] + '</li>';
	}
	messages = messages + '</ul>'
	return messages;
}

function handleUpdateProperties(response, stayineditmodus) {
	try {
		var json = eval('(' + response + ')');
		var controller	= json.controller;
		var messageType	= json.messageType;
		var messageList	= json.messageList;
		var errorFields	= json.errorFields;
		var id = json.id;
		var status = json.status;
		var listRow = json.listRow;
		var currentTab = json.currentTab;
		var modus = 'view';
		if(stayineditmodus !== undefined && stayineditmodus == true) {
			modus = 'edit';
		}
		if (status == 'updated') {
			updateLine(id, listRow, controller);
			eval(json.script);
			getProperties('', id, controller, formatMessages(messageList), modus, currentTab);
			saveCallback();
		} else if (status == 'inserted') {
			fillEmptyLine(id, listRow, controller);
			eval(json.script);
			getProperties('', id, controller, formatMessages(messageList), modus, currentTab);		
			saveCallback();
		}
		else {
			showMessages(messageList, messageType);
			showErrors(errorFields);
			errorCallback();
			enableButtons();
		}
	} catch(ex) {
		alert('Error in handleUpdateProperties function.' + "\n\n" + ex + "\n\n" + response);
        errorCallback();
		enableButtons();
	}
}

function handleListRow(response) {
	try {
		var json = eval('(' + response + ')');
		var controller	= json.controller;
		var id = json.id;
		var listRow = json.listRow;
		updateLine(id, listRow, controller);
		eval(json.script);
	} catch (ex) {
		alert('Error in handleListRow function.' + "\n\n" + ex + "\n\n" + response);
	}
}

function saveCallback()
{
}

function errorCallback()
{
}

function cancelInsertCallback()
{
}

function cancelEditCallback()
{
}

function activateTab(li) {
	
	// hide all divs related to the tabs
	var tabsB = document.getElementById('tabsB');
	var tabHeaders = tabsB.getElementsByTagName('li');
	if (isObject(tabHeaders)) {
		// reset all styles for the tabs
		for ( var i=0; i < tabHeaders.length; i++ ) {
			var tabHeader = tabHeaders[i];
			$('#tab_'+tabHeader.id).hide();
			$('#link_'+tabHeader.id).removeClass();
			$('#span_'+tabHeader.id).removeClass();

			if ( !isObject(li) && li == tabHeader.id ) {
				li = tabHeader;
			}
		}
	}

	// display current activated tab
	$('#tab_'+li.id).show();
	$('#link_'+li.id).addClass('current');
	$('#span_'+li.id).addClass('current');	
	getActivatedDivContent(li.id);
	// set the current tab in a hidden field
	$('#currentTab').val(li.id);
}

function resetMessageBox() {
	$('#messageBox').html('');
	$('#messageBox').removeClass('clean-error');
	$('#messageBox').removeClass('clean-yellow');	
}

function getActivatedDivContent(tabId) {

}

function sortList(controller, orderBy, filter) {
	disableButtons();
	var url = BASE_URL + '/' + controller + '/search';
	var rand = Math.random(9999);
	var queryString = 'filter=' + filter + '&orderBy=' + orderBy + '&rand=' + rand;
	$.post(url, queryString, function(data){
		$('#list').html(data);
		enableButtons();
	});
}

function gotoPage(page, controller, filter, orderBy) {
	$('#list').html('');
	$('#listLoading').show();
	var url = BASE_URL + '/' + controller + '/search';
	var rand = Math.random(9999);
	var queryString = 'page=' + page + '&filter=' + filter + '&orderBy=' + orderBy + '&rand=' + rand;
	$.post(url, queryString, function(data) {
		$('#listLoading').hide();
		$('#list').html(data);
	});
}

function addOption(theSel, theText, theValue) {
	var newOpt = new Option(theText, theValue);
	var selLength = theSel.length;
	theSel.options[selLength] = newOpt;
}

function deleteOption(theSel, theIndex) { 
	var selLength = theSel.length;
	if(selLength > 0) {
		theSel.options[theIndex] = null;
	}
}


function moveOptions(theSelFrom, theSelTo) {
	var selLength = theSelFrom.length;
	var selectedText = new Array();
	var selectedValues = new Array();
	var selectedCount = 0;
	var i;

	// Find the selected Options in reverse order
	// and delete them from the 'from' Select.
	for(i=selLength-1; i>=0; i--) {
		if(theSelFrom.options[i].selected) {
			selectedText[selectedCount] = theSelFrom.options[i].text;
			selectedValues[selectedCount] = theSelFrom.options[i].value;
			deleteOption(theSelFrom, i);
			selectedCount++;
		}
	}

	// Add the selected text/values in reverse order.
	// This will add the Options to the 'to' Select
	// in the same order as they were in the 'from' Select.
	for(i=selectedCount-1; i>=0; i--) {
		addOption(theSelTo, selectedText[i], selectedValues[i]);
	}
}



function deleteOptions(theSel) {
	var selLength = theSel.length;
	var j;
	// find the selected option(s) and delete them
	for(j=selLength-1; j>=0; j--) {
		if(theSel.options[j].selected) {
			if (theSel.options[j].value != 0) {			
				checkDependency(theSel.options[j].value, theSel, j);
			}
		}
	}
}

function checkDependency() {
	alert('need to be overriden');
	deleteOption(theSel, j);
}

function addOptions(tabName, theField, theSel) {
	// first delete all '|' and '#' character since we use them later as delimiters
	newField = theField.value.replace(/\|/g,"");
	newField = newField.replace(/\#/g,"");
	newField = newField.replace(/(^\s+|\s+$)/g, "");
	// first check if the field is not empty
	if(newField!='') {
		var selLength = theSel.length;
		var i;
		var exist = false;
		// check if the value doesn't already exist
		for(i=selLength-1; i>=0; i--) {
			if(newField.toLowerCase()==theSel.options[i].text.toLowerCase()) {
				exist = true;
			}
		}
		// if it does not exist, add it to the list
		if(exist==false){
			addOption(theSel, newField, 'new');
			$('#' + tabName + '_error_empty').hide();
			$('#' + tabName + '_error_exist').hide();
			theField.value = '';			
		} else {		
			$('#' + tabName + '_error_empty').hide();
			$('#' + tabName + '_error_exist').show();
		}
	} else {
		$('#' + tabName + '_error_exist').hide()
		$('#' + tabName + '_error_empty').show()
	}
}

function fillOptionField(theField, theSel) {
	// fill the field with the selected value, ready to update/add
	var selLength = theSel.length;
	var i;
	for(i=selLength-1; i>=0; i--) {
		// if this is the selected value
		if(theSel.options[i].selected) {
			// if it is the 'new' field, it becomes empty, else the value is inserted
			if(theSel.options[i].value == 0) {
				theField.text = 'new';
				theField.value = '';
			} else {
				theField.value = theSel.options[i].text;
				theField.text = theSel.options[i].text;
			}
			// give the field the focus on your screen
			theField.focus();
		}
	}
}

function setButtons(deleteButton, addButton, updateButton, theSel) {
	var selLength = theSel.length;
	var i;
	for(i=selLength-1; i>=0; i--) {
		// search which line is selected
		if(theSel.options[i].selected) {
			// if it is the 'new' line, only the add button is enabled, else only the delete and update button
			if(theSel.options[i].value == 0) {
				deleteButton.disabled = true;
				addButton.disabled = false;
				updateButton.disabled = true;
			} else {
				deleteButton.disabled = false;
				addButton.disabled = true;
				updateButton.disabled = false;
			}
		}
	}
}

function updateOptions(tabName, theField, theSel) {
	updatedField = theField.value.replace(/\|/g,"");
	updatedField = updatedField.replace(/\#/g,"");
	updatedField = updatedField.replace(/(^\s+|\s+$)/g, "");
	var selLength = theSel.length;
	var i;
	var j = 0;
	var exist = false;
	// check if the new value is not empty
	if(updatedField!='') {
		// check if the value doesn't already exist and check which one is selected
		for(i=selLength-1; i>=0; i--) {
			if(theSel.options[i].selected) {
				j = i;	
			} else if(updatedField.toLowerCase()==theSel.options[i].text.toLowerCase()) {
				exist = true;
			}
		}
		// if it doesn't exist, update it
		if(exist==false) {
			theSel.options[j].text = updatedField;
			$('#' + tabName + '_error_empty').hide();
			$('#' + tabName + '_error_exist').hide();
		} else {
			$('#' + tabName + '_error_empty').hide();
			$('#' + tabName + '_error_exist').show();
		}
	} else {
		$('#' + tabName + '_error_exist').hide();
		$('#' + tabName + '_error_empty').show();
	}
}


function placeInHidden(delim, selStr, hidStr) {
	var selObj = document.getElementById(selStr);
	if (!isObject(selObj)) {
		return;
	}

	var hideObj = document.getElementById(hidStr);
	if (!isObject(hideObj)) {
		return;
	}

	hideObj.value = '';
	for (var i=0; i<selObj.options.length; i++) {
		hideObj.value = hideObj.value == '' ? selObj.options[i].value : hideObj.value + delim + selObj.options[i].value;
	}
}

function placeInHiddenTextId(delim, delim2, selStr, hidStr) {
	var selObj = document.getElementById(selStr);
	if (selObj == null) {
		return;
	}

	var hideObj = document.getElementById(hidStr);
	if (hideObj == null) {
		return;
	}

	hideObj.value = '';
	for (var i=0; i<selObj.options.length; i++) {
		hideObj.value = hideObj.value == '' ? selObj.options[i].text : hideObj.value + delim + selObj.options[i].value + delim2 + selObj.options[i].text;
	}
}

function showSelectionList(field, response) {
	try {
		var json = eval('(' + response + ')');
		var selectField = document.getElementById(field);
		if (isObject(selectField)) {
			// reset options
			selectField.options.length = 0;
			for (t in json) {
				var option = document.createElement('option');
				option.text = json[t];
				option.value = t;
				try {
					selectField.add(option, null); // standards compliant; doesn't work in IE
				}
				catch(ex) {
					selectField.add(option); // IE only
				}
			}
		}
	} catch(ex) {
		alert(ex);
	}
}

function showTabWhenSelected(checkbox, tab) {
	if (checkbox == 1) {
		$("li[id = "+tab+"]").show();
	} else {
		$("li[id = "+tab+"]").hide();
	}
}

function showTabWhenOneSelected(checkboxes, tab) {
	show = false;
	for (i = 0; i < checkboxes.length; ++i) {
		if (checkboxes[i] == 1) {
			show = true;
		}
	}

	if (show) {
		$("li[id = "+tab+"]").show();
	} else {
		$("li[id = "+tab+"]").hide();
	}
}

function showDivWhenSelected(checkbox, div) {
	if (checkbox == 1) {
		$("div[id = "+div+"]").show();
	} else {
		$("div[id = "+div+"]").hide();
	}
}

function changeTabOnChange(value, changeArray, hideTab, showTab) {
	found = false;
	for (i=0; i < changeArray.length; i++) {
		if (value == changeArray[i]) {
			$("li[id = "+hideTab+"]").hide();
			$("li[id = "+showTab+"]").show();
			found = true;
		}
	}
	if (!found){
		$("li[id = "+hideTab+"]").show();
		$("li[id = "+showTab+"]").hide();
	}
}

function isArray(mixed_var) {
	if(mixed_var && typeof(mixed_var) == 'object') {
		var fnname = (/\W*function\s+([\w\$]+)\s*\(/).exec(mixed_var.constructor);
		return (fnname && fnname[1] == 'Array'); 
	}
	
	return false; 
}

function isObject(a) {
	return (typeof a == 'object' && !!a) || isFunction(a);
}


function isFunction(a) {
	return typeof a == 'function';
}

function emptyHiddenField(containingDivId, hiddenField) {
	if ($("div[id="+containingDivId+"] input[class=ac_input]").val() == '') {
		hiddenField.value = '';
	}
}

function hideDetails(id, details) {
	$("div[id="+details+"]").hide('fast');
	$("li[id="+id+"] div[id="+details+"]").show('fast');
}

function hideMessages()
{
	$('#messageBox').attr('style', '');
	$('#messageBox').removeClass('clean-error');
	$('#messageBox').removeClass('clean-yellow');
	$('#messageBox').removeClass('clean-ok');
	
	$('.errorTab').removeClass('errorTab');
}

function setCheckboxWhenTrue(checked, checkboxName) {
	if (checked) {
		$("input[name="+checkboxName+"]").attr('checked','checked');
	}
}

function unsetCheckboxWhenFalse(checked, checkboxName) {
	if (checked != 1) {
		$("input[name="+checkboxName+"]").attr('checked','');
	}
}

function call_func_args(func, params, context){
	if ((typeof(context) == 'undefined' || context == 'this') && typeof(this[func]) == 'function' ) {
		var func = this[func];
		func.apply(this, params);
	}
	else if ((typeof(context) == 'undefined' || context == 'self') && typeof(self[func]) == 'function') {
		var func = self[func];
		func.apply(self, params);
	}
	else if ((typeof(context) == 'undefined' || context == 'parent') && typeof(parent[func]) == 'function') {
		var func = parent[func];
		func.apply(parent, params);
	}
	else {
		throw new Error(func + ' is not a valid function');
	}
}

function panelFold(panel) {
	if ($(panel).parent().hasClass('fold_closed')) {
		$(panel).parent().addClass('fold_open');
		$(panel).parent().removeClass('fold_closed');
	} else {
		$(panel).parent().addClass('fold_closed');
		$(panel).parent().removeClass('fold_open');
	}
}

function changeCheckboxXValue(href) {
	$(href).parent().children('a#yes').toggle();
	$(href).parent().children('a#no').toggle();

	if ($(href).parent().children('input').val() == 1) {
		$(href).parent().children('input').val('');
	} else {
		$(href).parent().children('input').val(1);
	}
} 

// extend jquery with a ':Contains' selector (which in case insensitive, while ':contains' is case sensitive.
jQuery.extend(jQuery.expr[':'], {
	Contains : "jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase())>=0"
});

String.prototype.trim = function (charlist) {
    var whitespace, l = 0, i = 0;
    str = this;
    
    if (!charlist) {
        // default list
        whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    } else {
        // preg_quote custom list
        charlist += '';
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
    }
    
    l = str.length;
    for (i = 0; i < l; i++) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(i);
            break;
        }
    }
    
    l = str.length;
    for (i = l - 1; i >= 0; i--) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    
    return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}