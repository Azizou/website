<link rel="icon" href="../../favicon.ico">

<title>Navbar Template for Bootstrap</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="navbar.css" rel="stylesheet">

<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->

<link href="font-awesome-4.1.0/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">

<style>

	.equal, .equal > div[class*='col-'] {
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    flex:1 0 auto;}

     /* Sticky footer styles
    -------------------------------------------------- */
    html {
      position: relative;
      min-height: 100%;
    }
    
    body
	{
	  padding: 0;
	  /*margin-bottom: 60px;*/
	  margin-top: 20px;
	  color: #3B3B3B;
	  height:100%;
	  min-height:100%;
	  background-color: #BFBFBF;
	  background-image: url('images/Page-BgGlare.png');
	  background-repeat: no-repeat;
	  background-attachment: scroll;
	  background-position: top left;
	  /*min-width: 900px;*/
	  min-width: 100%;
	}
	
    #footer {
      position: relative;
      bottom: 0;
      padding-top: 10px;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 60px;
      background-color: #f5f5f5;
    }

    #btn-debug {
		top: 10px;
    }

    #console-debug {
        position: absolute;
        top: 179px;
        left: 0px;
        width: 20%;
        height: 700px;
        overflow: scroll;
        background-color: #FFFFFF;
        box-shadow: 2px 2px 5px #CCCCCC;
    }

    #console-debug pre {
      
        
    }
    #pi_siteHead { background: #454552 repeat-x 0px 0px; height: 87px; }
	#pi_siteHeadcontent { background:#454552 url('images/sammri_logo2.jpg') no-repeat 20px 0px; 
	margin: 0 auto;
	 width: 1000px; 
	 height: 87px; 
	 font-size: 14pt; }
	 /*make the menu sub-menu items drop down on mouse hover */
	ul.nav li.dropdown:hover > ul.dropdown-menu{
    display: block;
    margin: 0;
  }


</style>