var IFMGT_iframehide="no";	//Should script hide iframe from browsers that don't support this script (non IE5+/NS6+ browsers. Recommended):
var IFMGT_getFFVersion=navigator.userAgent.substring(navigator.userAgent.indexOf("Firefox")).split("/")[1];
var IFMGT_FFextraHeight=parseFloat(IFMGT_getFFVersion)>=0.1? 40 : 30 //extra height in px to add to iframe in FireFox 1.0+ browsers
var IFMGT_maxFrameHeight = -1; //Set a default, and override it by passing vars. -1 is no limit
var IFMGR_ConstantToRemoveScroll = 20; //Add this to final values to remove a scroll that is useless

function IFMGR_SetInternalVars(maxHeight, frameIDs)
{
	IFMGT_maxFrameHeight = maxHeight;
	IFMGT_iframeids = frameIDs.slice(); //pass as value instead of reference, otherwise value is lost on return
}

if (window.addEventListener)
	window.addEventListener("load", IFMGT_resizeCaller, false);
else if (window.attachEvent)
	window.attachEvent("onload", IFMGT_resizeCaller);
else
	window.onload=IFMGT_resizeCaller;

function IFMGT_resizeCaller() {
	for (i=0; i<IFMGT_iframeids.length; i++){
		if (document.getElementById)
			IFMGT_resizeIframe(IFMGT_iframeids[i]);
		//reveal iframe for lower end browsers? (see var above):
		if (IFMGT_iframehide=="no") {
		    var tempobj = document.getElementById(IFMGT_iframeids[i]);
		    if (tempobj != null) {
		        tempobj.style.display = "block";
		    }
		}
	}
}	
function IFMGT_resizeIframe(frameid){
	var currentfr = document.getElementById(frameid);
	if (currentfr && !window.opera){
		currentfr.style.display="block"
		if (currentfr.contentDocument && currentfr.contentDocument.body.offsetHeight) {	//ns6 syntax
			if(currentfr.contentDocument.body.offsetHeight > IFMGT_maxFrameHeight && IFMGT_maxFrameHeight > 0) {
			    //If it is within a few pixels, just add them to remove the scroll
			    if (currentfr.contentDocument.body.offsetHeight < (IFMGT_maxFrameHeight + IFMGR_ConstantToRemoveScroll)) {
			        currentfr.height = IFMGT_maxFrameHeight + IFMGR_ConstantToRemoveScroll;
			    }
			    else {
			        currentfr.height = IFMGT_maxFrameHeight;
			    }
			}
			else
			{
			    currentfr.height = currentfr.contentDocument.body.offsetHeight + IFMGT_FFextraHeight + IFMGR_ConstantToRemoveScroll; 
			}
		} else if (currentfr.Document && currentfr.Document.body.scrollHeight) {		//ie5+ syntax
			if(currentfr.Document.body.scrollHeight > IFMGT_maxFrameHeight && IFMGT_maxFrameHeight > 0)
			{
			    //If it is within a few pixels, just add them to remove the scroll
			    if (currentfr.Document.body.scrollHeight < (IFMGT_maxFrameHeight + IFMGR_ConstantToRemoveScroll)) {
			        currentfr.height = IFMGT_maxFrameHeight + IFMGR_ConstantToRemoveScroll;
			    }
			    else {
			        currentfr.height = IFMGT_maxFrameHeight;
			    }
			}
			else
			{
			    currentfr.height = currentfr.Document.body.scrollHeight + IFMGR_ConstantToRemoveScroll;
			}
		}
		if (currentfr.addEventListener) {
			currentfr.addEventListener("load", IFMGT_readjustIframe, false);
			currentfr.addEventListener("resize", IFMGT_readjustIframe, false);
		} else if (currentfr.attachEvent) {
			currentfr.detachEvent("onload", IFMGT_readjustIframe); // Bug fix line
			currentfr.attachEvent("onload", IFMGT_readjustIframe);
			currentfr.attachEvent("resize", IFMGT_readjustIframe);
		}
	}
}
function IFMGT_readjustIframe(loadevt) {
	var crossevt=(window.event)? event : loadevt;
	var iframeroot=(crossevt.currentTarget)? crossevt.currentTarget : crossevt.srcElement;
	if (iframeroot)
		IFMGT_resizeIframe(iframeroot.id);
}
/* iframe height control
include this file and set iframeids on your main container page (not the iframe page)

example:
	In order to call this functionality, start by making a call to IFMGR_SetInternalVars,
	passing a max height in pixels (or -1 for no max) and an array of IDs to adjust (iframes).
	Make sure to import this file in the website before using a <script></script> tag to make the call,
	such as this:
	
	<script type="text/javascript" src="/javascript/product_finder_iframe_height.js"></script>
	<script type="text/javascript">
	    IFMGR_SetInternalVars(300, ["scorecard_iframe"]);
	</script>
	
	//NOTE::This method still works, but is outdated.  Please use the above for future calls.
	//Input the IDs of the IFRAMES you wish to dynamically resize to match its content height:
	var IFMGT_iframeids=["pricing_iframe"];	//Separate each ID with a comma. Examples: ["myframe1", "myframe2"] or ["myframe"] or [] for none:
*/