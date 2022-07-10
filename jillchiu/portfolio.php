<?php include "header.php" ?>

<html>
<title>Portfolio</title>
<style>
/* change the the dots' colors of the navigation(fullpage) */
#fp-nav ul li a span, .fp-slidesNav ul li a span {
    background: red !important;
}
</style>
<body>
	<div id="fullpage_portfolio">

		<div class="section" id="section1_portfolio">
			<div class="welcome_portfolio">
				<h1>This page shows all my portfolios.</h1>
				<p>(up to 2022/05/09)</p>
				<p>&dArr;</p>
			</div>
		</div>
		
		<div class="section" id="section2_portfolio">
			<div class="slide" data-anchor="slide1">
				<img src="portfolio_first_p1.jpg" width="80%" height="80%"/>
				<h3>This is my first website I coded for my final year project in university.<br/>
				A <mark>hotel booking system</mark> mainly coding by <mark>HTML, CSS, PHP, MySQL, JSON and XML</mark>.<br/>
				And this is the home page for the website.</h3>
			</div>
			<div class="slide" data-anchor="slide2">
				<img src="portfolio_first_p2.jpg" width="80%" height="80%"/>
				<h3>After <mark>register and login</mark>, system will show different menus for the different users (general user and administrator).<br/>
				All users can use the <mark>searching</mark> function.</h3>
			</div>
			<div class="slide" data-anchor="slide3">
				<img src="portfolio_first_p3.jpg" width="80%" height="80%"/>
				<h3>For the general user, they can <mark>take bookings and edit</mark> their bookings.</h3>
			</div>
			<div class="slide" data-anchor="slide4">
				<img src="portfolio_first_p4.jpg" width="80%" height="80%"/>
				<h3>For the administrator, they can <mark>edit the booking, maintain the system and generate</mark> the reports.</h3>
			</div>
			<div class="slide" data-anchor="slide5">
				<h3>If you feel interested, you can click <mark><a href="https://github.com/jillchiu/myweb/tree/main/Final%20Year%20Project">here</a></mark> to view source code.</h3>
			</div>
		</div>
		
		<div class="section" id="section3_portfolio">
			<div class="slide" data-anchor="slide1">
				<img src="portfolio_second_p1.jpg" width="80%" height="80%"/>
				<h3>This is my second website (this website) I coded for introduce myself.<br/>
				It is mainly conding by <mark>JavaScript(jQuery), PHP, HTML, CSS and MySQL</mark>.<br/>
				And this is the home page for the website.<br/>
				<mark>fullpage and animate</mark> are also used in this page.</h3>
			</div>
			<div class="slide" data-anchor="slide2">
				<img src="portfolio_second_p2.jpg" width="80%" height="80%"/>
				<h3>This page is about my habits.<br/>
				Pictures can be viewed in <mark>origin size</mark> after <mark>clicking</mark> them.</h3>
			</div>
			<div class="slide" data-anchor="slide3">
				<img src="portfolio_second_p3.jpg" width="80%" height="80%"/>
				<h3>This page is related to my resume.<br/>
				If you feel interested after looking, you can <a href="mailto:jillll0329@gmail.com"><mark>contact me</mark></a> to take the full version resume.</h3>
			</div>
			<div class="slide" data-anchor="slide4">
				<img src="portfolio_second_p4.jpg" width="80%" height="80%"/>
				<h3>This page is for <mark>contacting</mark> me through the <mark>database</mark>. Also you can contact me by <a href="mailto:jillll0329@gmail.com"><mark>email</mark></a> too.<br/>
				System will <mark>checking</mark> the data you entered and it will show different messages by pop up window if you entered incorrectly.<br/></h3>
			</div>
			<div class="slide" data-anchor="slide5">
				<img src="portfolio_second_p5.jpg" width="80%" height="80%"/>
				<h4>Your identity will be showed in <mark>navigation bar</mark>. This function is through the <mark>database and cookie</mark>.<br/>
				When you <mark>click</mark> your identity, you can use the <mark>register and login</mark> function. You can <mark>update</mark> your personal information and <mark>reset</mark> your password.<br/>
				System will <mark>checking</mark> the data you entered and it will show different messages by pop up window if you entered incorrectly.<br/></h4>
			</div>
			<div class="slide" data-anchor="slide6">
				<h3>If you feel interested, you can click <mark><a href="https://github.com/jillchiu/myweb/tree/main/jillchiu">here</a></mark> to view source code.<br/>
				This website will be <mark>updated irregularly</mark>.</h3>		
			</div>
		</div>
		
		<div class="section" id="section4_portfolio">
			<h3 class="end_portfolio">That's all for my portfolios.<br/>
			If you feel interested, you can click <a href="https://github.com/jillchiu/myweb"><mark>here</mark></a> to view source code.</h3>
		</div>
		
	</div>
</body>

<?php include "footer.php" ?>