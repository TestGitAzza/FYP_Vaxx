<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Calendar</title>
    <link rel="stylesheet" type='text/css' href='./themes/standard.css'/>
	 <style type="text/css">
	.mfp-list-view.standard .mfp-header-group {
	  width: auto;
	  padding: 0px 5px;
	}
	</style>
	
	
  </head>
  <body>

	<div style="float:left; margin-left: 10px">
     Month View: <input type="checkbox" checked id="monthView" /> </div>
	 <div style="float:left; margin-left: 10px">
     List View: <input type="checkbox" id="listView" /></div>
	
      <div style="position: absolute; top:50px; width: 800px; height: 600px";>
        <div id="calendar" style="height: 100%; width:100%"></div>
      </div>
   

    <script data-main="JS/main.js" src="JS/require.js"></script>
  </body>
</html>
