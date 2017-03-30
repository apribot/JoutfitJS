<?php


$page = $_POST['jean']['page'];



$pre = array('Twill',
'Textile',
'Weft',
'Warp',
'Cotton',
'Indigo',
'16Ounce',
'Comb',
'Whisker',
'Stack',
'Loom',
'Shuttle',
'Indigofera',
'Tinctoria',
'SlimFit',
'StoneWashed',
'Western',
'Canadian',
'Carpenters');

$suff = array('Capris',
'Hat',
'Jacket',
'Jeans',
'Overalls',
'Belt',
'Handbag',
'Tote',
'Shirt',
'Shorts',
'Skirt',
'Suit',
'Swimsuit',
'Dungaree',
'MomJeans',
'Vest',
'Cumberbun',
'Headband',
'Socks');

$preK = array_rand($pre, 4);
$suffK = array_rand($suff, 4);





$dat = array (
	'about'=> array(
		'title'=> '<center>
                        <p class="joutfitlogo">
                            <img  src="assets/joutfitlogo.png">
                            <br>
                            JOUTFIT 
                        </p>
                        <br>
                        <p>
                        Denim For The Modern Web
                        </p>
                   </center>',
		'content'=>'<center><p>Design multipurpose, flexible, acid-washed web applications.</p></center>'
	),

	'examples'=>array(
		'title'=> 'Examples',
		'content'=>'
Make a HTML
<pre class="prettyprint linenums codefix">

&lt;html&gt;
	&lt;head&gt;
		&lt;script src="includes/js/jquery.min.js"&gt;&lt;/script&gt;
		&lt;script src="joutfit.js"&gt;&lt;/script&gt;
		
		&lt;script&gt;
        
		// set location of controller
		joutfit.controllerURL = "mycontroller.php";

		// wait for DOM to be ready
		$(function() {

			// bind joutfit request to an action
			$( "#mybutton" ).click(function() {

				// request content associated with \'mypage\'
				joutfit.get({page: "mypage"}, function() {

			    	// set a callback if you are so inclined
			        alert(\'Content loaded!\');
			    });
			});
		});
		&lt;/script&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;div joutfit="mytitle"&gt;&lt;/div&gt;
		&lt;div joutfit="mycontainer"&gt;&lt;/div&gt;
		&lt;button id="mybutton" value="Load content!"&gt;
	&lt;/body&gt;
&lt;/html&gt;
</pre>
<Br><Br>
And make a controller
<pre class="prettyprint linenums codefix">
&lt;?php

// joutfit post data is under the key name \'jean\'
$page = $_POST[\'jean\'][\'page\'];

// self explanatory?
$dat = array (
	\'mypage\'=> array(
		\'mytitle\'=> \'The Title\',
		\'mycontent\'=>\'Some content!\'
	)
); 

echo json_encode($dat[$page]);

</pre>
'
	),

	'download'=>array(
		'title'=> 'Download',
		'content'=>"<table class='dltable'>
		<tr><td><b>Joutfit.js v1.2.1</b></td><td>{$pre[$preK[0]]}-{$suff[$suffK[0]]}</td><td><a href='joutfit.js'>Download</a></td></tr>
		<tr><td><b>Joutfit.js v1.2</b></td><td>{$pre[$preK[1]]}-{$suff[$suffK[1]]}</td><td><a href='joutfit.js'>Download</a></td></tr>
		<tr><td><b>Joutfit.js v1.19</b></td><td>{$pre[$preK[2]]}-{$suff[$suffK[2]]}</td><td><a href='joutfit.js'>Download</a></td></tr>
		<tr><td><b>Joutfit.js v1.18.7</b></td><td>{$pre[$preK[3]]}-{$suff[$suffK[3]]}</td><td><a href='joutfit.js'>Download</a></td></tr></table>"
	)
);

echo json_encode($dat[$page]);
