<?php
/**
  * Plugin Name:   add-ga
  * Description:   adds google analytics to the site
  * Author:        Doxi
  * Author URI:    http://doxi.io
  * Version:       1.0
  * Licence:       GPL2
  * Contributors:  Spike
  *
  */


add_action('wp_footer', 'add_doxi_analytics');
// if override function exists load it up instead
if(function_exists('override_add_doxi_analytics')) {

    function add_doxi_analytics() {
        override_add_doxi_analytics();
    }

// fallback to original function
} else {

    function add_doxi_analytics() {
	$blog = get_blog_details();
        echo '
	<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

      ga("create", "UA-66473329-1", "auto", {"allowLinker" : true});
      if (document.location.host=="www.soothing.dental"){ga("require", "linker");ga("linker:autoLink", ["soothing.doxi.io"], true, true);};
      ga("send", {
        "hitType": "pageview",
        "page" : window.location.pathname + window.location.search,
        "title" : document.title
      });
        </script>
        <script>
      window.intercomSettings = {
      app_id: "e6dx8ayb"
      };
        </script>
        <script>(function(){if (document.location.host!="www.soothing.dental"){return};var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic("reattach_activator");ic("update",intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement("script");s.type="text/javascript";s.async=true;s.src="https://widget.intercom.io/widget/e6dx8ayb";var x=d.getElementsByTagName("script")[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent("onload",l);}else{w.addEventListener("load",l,false);}}})()</script>
        ';
    }

}
?>
