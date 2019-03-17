<?php 

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

if (get_option('allow-svg')) {
	add_filter('upload_mimes', 'cc_mime_types');
}

function font_awesome() {
	echo '<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>';
}

if (get_option('add-font-awesome')) {
	add_action( 'admin_head', 'font_awesome');
	add_action( 'wp_head', 'font_awesome' );
}

function chrome_bar_color() {
	echo '<meta name="theme-color" content="#' . get_option('chrome-bar-color') . '">';
}

if (get_option('chrome-bar-color') != "") {
	add_action( 'admin_head', 'chrome_bar_color');
	add_action( 'wp_head', 'chrome_bar_color' );
}

function addGoogleAnalytics() { ?>
	<script>(function(a,b,c){const d=a.history,e=document,f=navigator||{},g=localStorage,h=encodeURIComponent,i=d.pushState,j=()=>Math.random().toString(36),k=()=>(g.cid||(g.cid=j()),g.cid),l=a=>{var b=[];for(var c in a)a.hasOwnProperty(c)&&void 0!==a[c]&&b.push(h(c)+"="+h(a[c]));return b.join("&")},m=(d,g,h,i,j,m,n)=>{const o=l({v:"1",ds:"web",aip:c.anonymizeIp?1:void 0,tid:b,cid:k(),t:d||"pageview",sd:c.colorDepth&&screen.colorDepth?`${screen.colorDepth}-bits`:void 0,dr:e.referrer||void 0,dt:e.title,dl:e.location.origin+e.location.pathname+e.location.search,ul:c.language?(f.language||"").toLowerCase():void 0,de:c.characterSet?e.characterSet:void 0,sr:c.screenSize?`${(a.screen||{}).width}x${(a.screen||{}).height}`:void 0,vp:c.screenSize&&a.visualViewport?`${(a.visualViewport||{}).width}x${(a.visualViewport||{}).height}`:void 0,ec:g||void 0,ea:h||void 0,el:i||void 0,ev:j||void 0,exd:m||void 0,exf:"undefined"!=typeof n&&!1==!!n?0:void 0});if(f.sendBeacon)f.sendBeacon("https://www.google-analytics.com/collect",o);else{var p=new XMLHttpRequest;p.open("POST","https://www.google-analytics.com/collect",!0),p.send(o)}};d.pushState=function(a){return"function"==typeof d.onpushstate&&d.onpushstate({state:a}),setTimeout(m,c.delay||10),i.apply(d,arguments)},m(),a.ma={trackEvent:(a,b,c,d)=>m("event",a,b,c,d),trackException:(a,b)=>m("exception",null,null,null,null,a,b)}})(window,"<?php echo get_option('g-analytics-id'); ?>",{anonymizeIp:!0,colorDepth:!0,characterSet:!0,screenSize:!0,language:!0});</script><?php
}

if (get_option('g-analytics-id') != "") {
	add_action( 'wp_footer', 'g-analytics-id');
}
?>