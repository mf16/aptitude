<style type="text/css">
body{
	background-color: #EBEBEB;
}
/*STICKY FOOTER - START*/
	* {
	  margin: 0;
	}
	html, body {
	  height: 100%;
	}
	.page-wrap {
	  min-height: 100%;
	  /* equal to footer height */
	  margin-bottom: -90px; 
	}
	.page-wrap:after {
	  content: "";
	  display: block;
	}
	.site-footer, .page-wrap:after {
	  /* .push must be the same height as footer */
	  height: 90px; 
	}
	footer{
		font-family: nexabold;
		z-index: 0;
		background-color: #EBEBEB !important;
		box-shadow: -2px -1px 2px rgba(0, 0, 0, 0.0);
	}
	footer>section>img {
		width: 10px;
		margin-top: -3px;
	}
/*STICKY FOOTER - END*/


h1{
	font-size: 60px;
	font-family: minion pro;
	color:#F79234;
	text-transform:uppercase;
	letter-spacing:2px;
}
.chapter-number>img{
	width: 100%;
}
.pretestWrapper{
	background-color: #EBEBEB;
}
.text-body{
	padding-left: 0px !important;
	margin-top:5px;
}
.material-body{
	padding-left: 0px;
	padding-top: 8%;
	padding-right: 25px;
}
.no-padding{
	padding:0px;
}
.section-number{
	font-size: 20px;
	font-family: nexabold;
	color: #606163;
	text-transform: uppercase;
	letter-spacing:4px;
	padding-bottom:30px;
}
.section-title{
	margin-bottom: 0px;
}
.prequizTitle{
	font-size: 34px;
	font-family: nexabold;
	color: #606163;
	text-transform: uppercase;
	letter-spacing: 6px;
	padding-bottom: 30px;
}
.prequizExplanation{
	margin-top:130px;
}
p{
	font-family: open sans;
	font-size: 14px;
	color: #606163;
}
.readyButton{
	padding: 11px;
	font-weight: 800;
	text-transform: uppercase;
	letter-spacing: 2px;
	background-color: #F79234;
	border: 0px;
	color: #EBEBEB;
	width: 100%;
	margin-top: 25px;
	max-width: 294px;
}



/* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
/* Styles */
	h1{
		font-size: 45px;
	}
	.material-body{
		padding-top: 3%;
	}
}

/* Smartphones (landscape) ----------- */
@media only screen and (min-width : 321px) {
/* Styles */
}

/* Smartphones (portrait) ----------- */
@media only screen and (max-width : 320px) {
/* Styles */
}

/* iPads (portrait and landscape) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
/* Styles */
}

/* iPads (landscape) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) {
/* Styles */
}

/* iPads (portrait) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) {

}

/* Desktops and laptops ----------- */
@media only screen and (min-width : 1224px) {
/* Styles */
}

/* Large screens ----------- */
@media only screen and (min-width : 1824px) {
/* Styles */
}

button{
	-webkit-transition: background-color .3s;  /* For Safari 3.1 to 6.0 */
    transition: background-color .3s;
	outline: none;
}
</style>

<div id="workArea"></div>
<!-- wrapper -->
<div class="page-wrap pretestWrapper">
	<section id="headerSpacerSmall"></section>
		<section class="container loader">
		</section>
		<section class="body">
			<section class="row-fluid">
				<section class="col-xs-12 text-body">
					<section class="col-sm-2 col-xs-2 no-padding">
						<div class="chapter-number">
							<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/chapter-arrow.png"/>
						</div>
					</section>
					<section class="col-md-10 material-body col-sm-offset-1 col-xs-offset-1 col-md-offset-0">
						<section class="row-fluid section-title-container">
							<h1 class="section-title">sets of numbers</h1>
							<span class="section-number">PREQUIZ</span><br>
						</section>
						<section class="row-fluid prequizExplanation">
							<span class="prequizTitle">WELCOME TO THE PREQUIZ!</span>
							<p>This quiz is to help re-evaluate what you have already learned before you move onto the next chapter.</p>
							<br>
							<button class="readyButton col-md-3 col-xs-12">I'm Ready</button>
						</section>
					</section>
				</section>
			</section>
		</section>
	</section>
</div>
<footer class="site-footer">
  <section class="col-xs-4"><img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>
  <section class="col-xs-8 text-right" style="padding-right:45px;">SKIP PREQUIZ <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/right-arrow.png"  style="margin-left: 7px;"></section>

</footer>

<script type="text/javascript">
	var $readyButton = $('.readyButton');
	$readyButton.click(function() {
		$readyButton.css('background-color', '#BEBEBE');
		$.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'] ?>includes/math-1050/5/1/ajaxElements/prequiz.php",success:function(result){
			$("#div1").html(result);
		}});
	});
	
</script>