/*****

Image Cross Fade Redux
Version 1.0
Last revision: 02.15.2006
steve@slayeroffice.com

Please leave this notice intact. 

Rewrite of old code found here: http://slayeroffice.com/code/imageCrossFade/index.html

--

Heavily modified by Simon Smith
Modification: 10.01.2009
code-ks@killswtch.net

Added constants to define behaviour
Renamed functions
Added start/stop functionality
Added auto-abort for slow computers

*****/


window.addEventListener ? window.addEventListener("load", xfade_init, false) : window.attachEvent("onload", xfade_init);

var d=document, imgs = new Array(), current=0, xfadePath='', xfadeLastTime=0;

var xfadeInitialised = false;
var xfadeFrameInterval = 150;
var xfadeFadeIncrement = 0.025;
var xfadeAnimateAbortThreshold = 2;
var xfadeNextImageDelay = 2000;

function xfade_init() {
	if(!d.getElementById || !d.createElement)return;
	
	if (getCookie('xfadeAborted') == '1' || getCookie('xfadeDisabled') == '1') {
		d.getElementById("enableAnimationButton").style.display = 'block';
		d.getElementById("disableAnimationButton").style.display = 'none';
		return;
	} else {
		d.getElementById("enableAnimationButton").style.display = 'none';
		d.getElementById("disableAnimationButton").style.display = 'block';
	}
	
	// DON'T FORGET TO GRAB THIS FILE AND PLACE IT ON YOUR SERVER IN THE SAME DIRECTORY AS THE JAVASCRIPT!
	// http://slayeroffice.com/code/imageCrossFade/xfade2.css
	css = d.createElement("link");
	css.setAttribute("href", xfadePath + "xfade2.css");
	css.setAttribute("rel","stylesheet");
	css.setAttribute("type","text/css");
	d.getElementsByTagName("head")[0].appendChild(css);
	
	d.getElementById("imageContainer").style.display = 'block';

	imgs = d.getElementById("imageContainer").getElementsByTagName("img");
	for(i=1;i<imgs.length;i++) imgs[i].xOpacity = 0;
	imgs[0].style.display = "block";
	imgs[0].xOpacity = .99;
	
	xfadeInitialised = true;
	
	setTimeout(xfade_animate, xfadeNextImageDelay);
}

function xfade_abort() {
	xfadeLastTime = 0;
	
	setCookie('xfadeAborted', '1', 7);
	
	document.getElementById('animateAbortWarning').style.display = 'block';
	document.getElementById("enableAnimationButton").style.display = 'block';
	document.getElementById("disableAnimationButton").style.display = 'none';
}

function xfade_disable() {
	xfadeLastTime = 0;
	
	setCookie('xfadeDisabled', '1', 7);
	
	document.getElementById("enableAnimationButton").style.display = 'block';
	document.getElementById("disableAnimationButton").style.display = 'none';
}

function xfade_enable() {
	xfadeLastTime = 0;
	
	setCookie('xfadeDisabled', '0', 7);
	setCookie('xfadeAborted', '0', 7);
	
	document.getElementById('animateAbortWarning').style.display = 'none';
	document.getElementById("enableAnimationButton").style.display = 'none';
	document.getElementById("disableAnimationButton").style.display = 'block';
	
	if (xfadeInitialised) {
		setTimeout(xfade_animate, xfadeNextImageDelay);
	} else {
		xfade_init();
	}
}

function xfade_toggle() {
	if (getCookie('xfadeAborted') == '1' || getCookie('xfadeDisabled') == '1') {
		xfade_enable();
	} else {
		xfade_disable();
	}
}

function xfade_animate() {
	if (getCookie('xfadeDisabled') == '1') return;

	var date = new Date();
	
	if (xfadeLastTime > 0 && (date.getTime() - xfadeLastTime) > xfadeFrameInterval * xfadeAnimateAbortThreshold) {
		//Stop crossfading if the computer is a bit slow
		xfade_abort();
		return;
	}
	
	cOpacity = imgs[current].xOpacity;
	nIndex = imgs[current+1]?current+1:0;

	nOpacity = imgs[nIndex].xOpacity;
	
	cOpacity-= xfadeFadeIncrement; 
	nOpacity+= xfadeFadeIncrement;
	
	imgs[nIndex].style.display = "block";
	imgs[current].xOpacity = cOpacity;
	imgs[nIndex].xOpacity = nOpacity;
	
	setOpacity(imgs[current]); 
	setOpacity(imgs[nIndex]);
	
	if(cOpacity<=0) {
		imgs[current].style.display = "none";
		current = nIndex;
		xfadeLastTime = 0;
		setTimeout(xfade_animate, xfadeNextImageDelay);
	} else {
		xfadeLastTime = date.getTime();
		setTimeout(xfade_animate, xfadeFrameInterval);
	}
	
	function setOpacity(obj) {
		if(obj.xOpacity>.99) {
			obj.xOpacity = .99;
			return;
		}
		obj.style.opacity = obj.xOpacity;
		obj.style.MozOpacity = obj.xOpacity;
		obj.style.filter = "alpha(opacity=" + (obj.xOpacity*100) + ")";
	}
	
}

function setCookie(c_name, value, expiredays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function getCookie(c_name) {
	if (document.cookie.length > 0) {
		c_start = document.cookie.indexOf(c_name + "=");
		if (c_start!=-1) { 
	    	c_start = c_start + c_name.length+1; 
	    	c_end=document.cookie.indexOf(";",c_start);
	    	if (c_end==-1) c_end=document.cookie.length;
	    	return unescape(document.cookie.substring(c_start,c_end));
	    } 
	}
	return null;
}