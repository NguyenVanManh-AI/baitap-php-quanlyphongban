<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.scroll-left {
	width: 76%;
	height: 80px;	
	overflow: hidden;
	position: relative;
	background: #cce5ff;
	color: orange;
	border: 1px solid #b8daff;
}
.scroll-left p {
	font-size: 35px;
	font-weight: bold;
	position: absolute;
	color:#007bff;
	width: 100%;
	height: 100%;
	margin: 0;
	line-height: 80px;
	align-items: center;
	text-align: center;
	/* Starting position */
	transform:translateX(100%);
	/* Apply animation to this element */
	animation: scroll-left 15s linear infinite;
}
/* Move it (define the animation) */
@keyframes scroll-left {
	0%   {
		transform: translateX(100%); 		
	}
	100% {
		transform: translateX(-100%); 
	}
}
</style>

<div style="display: flex;margin:30px;margin-top:0px;margin-bottom:20px">
	<div style="width: 10%;">
		<img  style="height: 80px;" src="https://www.dammio.com/wp-content/uploads/2017/01/php-mascot.jpg">
	</div>
	<div class="scroll-left"  style="width: 80%;">
		<p>CHƯƠNG TRÌNH QUẢN LÝ PHÒNG BAN</p>
	</div>
	<div style="width: 10%;">
		<img style="height: 80px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/711px-PHP-logo.svg.png?20180502235434">
	</div>
</div>

</html>



