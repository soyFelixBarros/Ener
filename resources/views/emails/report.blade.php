<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!-- If you delete this meta tag, the ground will open and swallow you. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resumen {{ $dayAndMonth }}</title>
<style type="text/css">
	/* ------------------------------------- 
		GLOBAL 
------------------------------------- */
* { 
	margin:0;
	padding:0;
}
* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

img { 
	max-width: 100%; 
}
.collapse {
	margin:0;
	padding:0;
}
body {
	-webkit-font-smoothing:antialiased; 
	-webkit-text-size-adjust:none; 
	width: 100%!important; 
	height: 100%;
}


/* ------------------------------------- 
		ELEMENTS 
------------------------------------- */
a { color: #0366d6; text-decoration: none;}

.btn {
	text-decoration:none;
	color: #FFF;
	background-color: #666;
	padding:10px 16px;
	font-weight:bold;
	margin-right:10px;
	text-align:center;
	cursor:pointer;
	display: inline-block;
}

p.callout {
	padding:15px;
	background-color:#ECF8FF;
	margin-bottom: 15px;
}
.callout a {
	font-weight:bold;
	color: #2BA6CB;
}

table.social {
/* 	padding:15px; */
	background-color: #eee;
	
}
.social .soc-btn {
	padding: 3px 7px;
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color: #FFF;font-weight:bold;
	display:block;
	text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.li { background-color: #0076b4!important; }
a.gp { background-color: #DB4A39!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
	display:block;
	width:100%;
}

/* ------------------------------------- 
		HEADER 
------------------------------------- */
table.head-wrap { width: 100%; margin-bottom: 10px; border-bottom: 1px solid #DDDDDD;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}


/* ------------------------------------- 
		BODY 
------------------------------------- */
table.body-wrap { width: 100%;}


/* ------------------------------------- 
		FOOTER 
------------------------------------- */
table.footer-wrap { width: 100%;	clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
	font-size:10px;
	font-weight: bold;
	
}


/* ------------------------------------- 
		TYPOGRAPHY 
------------------------------------- */
h1,h2,h3,h4,h5,h6 {
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;}
h4 { font-weight:500; font-size: 20px; line-height: 1.2;}
h5 { font-weight:600; font-size: 16px; line-height: 1.25; margin-top: -2px; margin-bottom: 6px;}
h6 { font-weight:100!important; font-size: 12px; color:#657786; margin-bottom: 5px;}

.collapse { margin:0!important;}

p, ul { 
	margin-bottom: 10px; 
	font-weight: normal; 
	font-size:14px; 
	line-height:1.6;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
	margin-left:5px;
	list-style-position: inside;
}

/* ------------------------------------- 
		SIDEBAR 
------------------------------------- */
ul.sidebar {
	background:#ebebeb;
	display:block;
	list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
	text-decoration:none;
	color: #666;
	padding:10px 16px;
/* 	font-weight:bold; */
	margin-right:10px;
/* 	text-align:center; */
	cursor:pointer;
	border-bottom: 1px solid #777777;
	border-top: 1px solid #FFFFFF;
	display:block;
	margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



/* --------------------------------------------------- 
		RESPONSIVENESS
		Nuke it from orbit. It's the only way to be sure. 
------------------------------------------------------ */

/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
.container {
	display:block!important;
	max-width:800px!important;
	margin:0 auto!important; /* makes it centered */
	clear:both!important;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
	padding:15px;
	max-width:800px;
	margin:0 auto;
	display:block; 
}

/* Let's make sure tables in the content area are 100% wide */
.content table { width: 100%; }


/* Odds and ends */
.column {
	width: 300px;
	float:left;
}
.column tr td { padding: 10px 15px 0 15px; }
.column-wrap { 
	padding:0!important; 
	margin:0 auto; 
	max-width:800px!important;
}
.column table { width:100%;}
.column.contact {
	width: 372px;
}
.column.imagen {
	width: 90px;
	min-width: 89px;
}
.column.imagen img {border: 1px solid #ccc;}

/* Be sure to place a .clear element after each set of columns, just to be safe */
.clear { display: block; clear: both; }


/* ------------------------------------------- 
		PHONE
		For clients that support media queries.
		Nothing fancy. 
-------------------------------------------- */
@media only screen and (max-width: 800px) {
	
	a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

	div[class="column"] { width: auto!important; float:none!important;}
	
	table.social div[class="column"] {
		width:auto!important;
	}

}
</style>
</head>
 
<body bgcolor="#f5f8fa" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#FFFFFF">
	<tr>
		<td></td>
		<td class="header container" align="">
			
			<!-- /content -->
			<div class="content">
				<table bgcolor="#FFFFFF" >
					<tr>
						<td>Resumen</td>
						<td align="right"><i>{{ $dayAndMonth }}</i></td>
					</tr>
				</table>
			</div><!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table class="body-wrap" bgcolor="">
	<tr>
		<td></td>
		<td class="container" align="" bgcolor="#FFFFFF">

			@foreach ($posts as $post)
			<div class="content">
				<table bgcolor="">
					<tr>
						<td class="small" width="27%" style="vertical-align: top; padding-right:15px;">
							@if ($post->image !== null)
							<a href="{{ $post->url }}" target="_blank"><img src="{{ asset('uploads/images/'.$post->image) }}" width="180" style="border:1px solid #CCCCCC;" /></a>
							@endif
						</td>
						<td style="vertical-align: top;">
							<h5><a href="{{ $post->url }}" target="_blank">{{ $post->title }}</a></h5>
							<h6>{{ $post->newspaper->name }}</h6>
							@if ($post->summary)
							<p>{{ $post->summary }}</p>
							@endif
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			@endforeach
			
			<!-- content -->
			<div class="content">
				<table bgcolor="">
					<tr>
						<td>
							
							<!-- social & contact -->
							<table bgcolor="#eee" class="" width="100%">
								<tr>
									<td>

										<div class="column imagen">
											<table bgcolor="" cellpadding="" align="left">
												<tr>
													<td>
														<img src="{{ asset('images/felix.jpg') }}" />
													</td>
												</tr>
											</table>
										</div><!-- .column -->

										<div class="column contact">
											<table bgcolor="" cellpadding="" align="left">
												<tr>
													<td>
														<strong>Felix Barros</strong>				
														<p>Teléfono: <strong>(362) 406 0798</strong><br/>
														Correo: <strong><a href="emailto:soyfelixbarros@gmail.com">soyfelixbarros@gmail.com</a></strong></p>
													</td>
												</tr>
											</table>
										</div><!-- .column -->

										<div class="column social">
											<table bgcolor="" cellpadding="" align="right">
												<tr>
													<td>
														<p>
															<a href="https://ar.linkedin.com/in/soyfelixbarros" target="_blank" class="soc-btn li">LinkedIn</a>
															<a href="https://twitter.com/soyFelixBarros" target="_blank" class="soc-btn tw">Twitter</a>
														</p>
													</td>
												</tr>
											</table>
										</div><!-- .column -->
										
										<div class="clear"></div>
	
									</td>
								</tr>
							</table><!-- /social & contact -->
							
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			

		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content">
					<table>
						<tr>
							<td align="center">
								<p>¿Deseas dejar de recibir estos correos? <a href="#"><unsubscribe>Click aquí</unsubscribe></a></p>
							</td>
						</tr>
					</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>