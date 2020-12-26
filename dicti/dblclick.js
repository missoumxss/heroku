function setupExtDoubleClick(websiteUrl, dictionary, showFirstEntry, areaClass, maxAllowedWords, target) {
    setupDoubleClick(websiteUrl, dictionary, areaClass, maxAllowedWords, target,
        function(websiteUrl, dictionary, showFirstEntry, lookup) { return websiteUrl + "search/" + (dictionary ? dictionary + "/" : "") + (showFirstEntry ? "direct/" : "") + "?q=" + lookup; });
}

function setupDoubleClick(websiteUrl, dictionary, showFirstEntry, areaClass, maxAllowedWords, target, urlCallback) {
	//warning message for developers
	if (!websiteUrl || !dictionary) {
		alert("Please specify required parameters (websiteUrl and dictionary) to setupDoubleClick()")
		return;
	}
	
	//shows the definition layer
	var showLayer = function(e) {
        var translateDictionary = dictionary;
        var node = e.target || e.srcElement;
        while (node != null) {
            var lang = node.getAttribute("dict");
            if (lang) {
                translateDictionary = lang;
                break;
            }
            if (node.parentNode == node.ownerDocument) {
                break;
            }
            node = node.parentNode;
        }
        e.preventDefault();
        var lookup = getSelectedText();
        lookup = lookup.replace(/[\.\*\?;!()\+,\[:\]<>^_`\[\]{}~\\\/\"\'=]/g, " ");
        lookup = lookup.replace(/\s+/g, " ");
        if (lookup != null && lookup.replace("/\s/g", "").length > 0) {
        	//disable the double-click feature if the lookup string
        	//exceeds the maximum number of allowable words
        	if (maxAllowedWords && lookup.split(/[ -]/).length > maxAllowedWords)
				return;

        	//append the layer to the DOM only once
			if ($("#definition_layer").length == 0) {
	    		var imageUrl = websiteUrl + "external/images/doubleclick/definition-layer.gif";
				$("body").append("<div id='definition_layer' style='position:absolute; cursor:pointer;'><img src='" + imageUrl + "' alt='' title=''/></div>");
			}
			
			//move the layer at the cursor position
			$("#definition_layer").map(function() {
				$(this).css({'left' : e.pageX-30, 'top' : e.pageY-40});
			});
			
			//open the definition popup clicking on the layer
			$("#definition_layer").mouseup(function(e) {
				e.stopPropagation();
				openPopup(lookup, translateDictionary);
	         });
        } else {
        	$("#definition_layer").remove();
        }
	};

    //opens the definition popup
    var openPopup = function(lookup, translateDictionary) {
        var searchUrl;
        if (urlCallback)
            searchUrl = urlCallback(websiteUrl, translateDictionary, showFirstEntry, lookup);
        else
            searchUrl = websiteUrl + "search/" + (translateDictionary ? translateDictionary + "/" : "") + (showFirstEntry ? "direct/" : "") + "?q=" + lookup;
        
        if (target) {
            if (target == "self") {
                window.location.href = searchUrl;
                return;
            }
        	var popup = window.open(searchUrl, target, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=915,height=760,top=300,left=300");
        	if (popup)
        		popup.focus();
        } else {
        	window.open(searchUrl, 'cup_lookup');
        }
		/*window.location.href = searchUrl;*/
    };
	
	var area = areaClass ? "." + areaClass : "body";
	$(area).mouseup(showLayer);
}

/*
 * Cross-browser function to get selected text
 */

function getSelectedText(){
    if(window.getSelection)
        return window.getSelection().toString();
    else if(document.getSelection)
        return document.getSelection();
    else if(document.selection)
        return document.selection.createRange().text;
    return "";
}