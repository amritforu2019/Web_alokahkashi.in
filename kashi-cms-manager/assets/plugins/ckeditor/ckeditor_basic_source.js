﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

// Compressed version of connect/ckeditor_base.js. See original for instructions.
/*jsl:ignore*/
if(!window.CKEDITOR)window.CKEDITOR=(function(){var a={timestamp:'',version:'3.6.6',revision:'7689',rnd:Math.floor(Math.random()*900)+100,_:{},status:'unloaded',basePath:(function(){var d=window.CKEDITOR_BASEPATH||'';if(!d){var e=document.getElementsByTagName('script');for(var f=0;f<e.length;f++){var g=e[f].src.match(/(^|.*[\\\/])ckeditor(?:_basic)?(?:_source)?.js(?:\?.*)?$/i);if(g){d=g[1];break;}}}if(d.indexOf(':/')==-1)if(d.indexOf('/')===0)d=location.href.match(/^.*?:\/\/[^\/]*/)[0]+d;else d=location.href.match(/^[^\?]*\/(?:)/)[0]+d;if(!d)throw 'The CKEditor installation path could not be automatically detected. Please set the global variable "CKEDITOR_BASEPATH" before creating editor instances.';return d;})(),getUrl:function(d){if(d.indexOf(':/')==-1&&d.indexOf('/')!==0)d=this.basePath+d;if(this.timestamp&&d.charAt(d.length-1)!='/'&&!/[&?]t=/.test(d))d+=(d.indexOf('?')>=0?'&':'?')+'t='+this.timestamp;return d;}},b=window.CKEDITOR_GETURL;if(b){var c=a.getUrl;a.getUrl=function(d){return b.call(a,d)||c.call(a,d);};}return a;})();
/*jsl:end*/

// Uncomment the following line to have a new timestamp generated for each
// request, having clear cache load of the editor code.
// CKEDITOR.timestamp = ( new Date() ).valueOf();

// Set the script name to be loaded by the loader.
CKEDITOR._autoLoad = 'core/ckeditor_basic';

// Include the loader script.
document.write(
	'<script type="text/javascript" src="' + CKEDITOR.getUrl( '_source/connect/loader.js' ) + '"></script>' );
