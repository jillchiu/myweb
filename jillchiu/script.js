/* index.php part */
//index know me more & view source code button
$(document).ready(function(){
	$(".index_button").mouseover(function(){
		$(this).css({"background-color":"#4CAF50",
					"color":"white"});
	});
	$(".index_button").mouseout(function(){
		$(this).css({"background-color":"#e7e7e7", 
					"color":"black"});
	});
});

//index pic arrow(left)
$(function(){
	$("#prev").click(function(){
		if($("#pic123").attr("src")==="index_pic1.jpg"){
			$("#pic123").attr("src", "index_pic3.jpg");
			$("#btn1").attr("class", "null");
			$("#btn3").attr("class", "light");
		}else if($("#pic123").attr("src")==="index_pic2.jpg"){
			$("#pic123").attr("src", "index_pic1.jpg");
			$("#btn2").attr("class", "null");
			$("#btn1").attr("class", "light");
		}else if($("#pic123").attr("src")==="index_pic3.jpg"){
			$("#pic123").attr("src", "index_pic2.jpg");
			$("#btn3").attr("class", "null");
			$("#btn2").attr("class", "light");
		};
	});
});

//index pic arrow(right)
$(function(){
	$("#next").click(function(){
		switch($("#pic123").attr("src")){
			case "index_pic1.jpg":
				$("#pic123").attr("src", "index_pic2.jpg");
				$("#btn1").attr("class", "null");
				$("#btn2").attr("class", "light");
				break;
			case "index_pic2.jpg":
				$("#pic123").attr("src", "index_pic3.jpg");
				$("#btn2").attr("class", "null");
				$("#btn3").attr("class", "light");
				break;
			case "index_pic3.jpg":
				$("#pic123").attr("src", "index_pic1.jpg");
				$("#btn3").attr("class", "null");
				$("#btn1").attr("class", "light");
				break;
		};
	});
});

//index buttons 切換
$(function(){
	
	$("#btn1").click(function(){
		switch($("#pic123").attr("src")){
			case "index_pic1.jpg":
				break;
			case "index_pic2.jpg":
				$("#btn2").attr("class", "null");
				break;
			case "index_pic3.jpg":
				$("#btn3").attr("class", "null");
				break;
		};
		$("#btn1").attr("class", "light");
		$("#pic123").attr("src", "index_pic1.jpg");
	});
	
	$("#btn2").click(function(){
		switch($("#pic123").attr("src")){
			case "index_pic1.jpg":
				$("#btn1").attr("class", "null");
				break;
			case "index_pic2.jpg":
				break;
			case "index_pic3.jpg":
				$("#btn3").attr("class", "null");
				break;
		};
		$("#btn2").attr("class", "light");
		$("#pic123").attr("src", "index_pic2.jpg");
	});
	
	$("#btn3").click(function(){
		switch($("#pic123").attr("src")){
			case "index_pic1.jpg":
				$("#btn1").attr("class", "null");
				break;
			case "index_pic2.jpg":
				$("#btn2").attr("class", "null");
				break;
			case "index_pic3.jpg":
				break;
		};
		$("#btn3").attr("class", "light");
		$("#pic123").attr("src", "index_pic3.jpg");
	});
	
});

//index pictures auto play
$(function(){
	
	//4sec/1pic
	myInterval = setInterval(autoplay, 4000);
	
	function autoplay() {
	  switch($("#pic123").attr("src")){
			case "index_pic1.jpg":
				$("#pic123").attr("src", "index_pic2.jpg");
				$("#btn1").attr("class", "null");
				$("#btn2").attr("class", "light");
				break;
			case "index_pic2.jpg":
				$("#pic123").attr("src", "index_pic3.jpg");
				$("#btn2").attr("class", "null");
				$("#btn3").attr("class", "light");
				break;
			case "index_pic3.jpg":
				$("#pic123").attr("src", "index_pic1.jpg");
				$("#btn3").attr("class", "null");
				$("#btn1").attr("class", "light");
				break;
		};
	}
	//when mouse on picture, stop loop
	$("#pic123").mouseover(function(){
		clearInterval(myInterval)
	});
	//when mouse left picture, restart loop
	$("#pic123").mouseout(function(){
	   myInterval = setInterval(autoplay, 4000)
	});
	
});

//popup picture control
$(function(){
	$("#pic123").click(function(){
		$("#popup").css("display", "block");
		$("#popup_img").attr("src", $(this).attr("src"));
		
		$("#close").click(function(){
			$("#popup").css("display", "none");
			$("#popup_img").attr("class", "zoom-in");
		});
		
	});
});

//index my personality part1
$(function(){
	$("#subtitle_1").click(function(){
		if($("#detail_1").css("display")==="none"){
			$("#detail_1").css("display", "block");
		}else{
			$("#detail_1").css("display", "none");
		};
	});	
});

//index my personality part2
$(function(){
	$("#subtitle_2").click(function(){
		$(".intro_part2_detail_2").toggle(1000);
	});	
});

//index my personality part3
$(function(){
	$("#subtitle_3").click(function(){
		if($("#detail_3").css("display")==="none"){
			$("#detail_3").slideDown();
		}else{
			$("#detail_3").slideUp();
		};
	});	
});

/*
function sub1(){
	var x = document.getElementById("detail_1");
	if (x.style.display==="none"){
		x.style.display="block";
	} else {
		x.style.display="none";
	}
}
*/

/* header show clock */
setInterval(function(){
		
		$date = new Date(); //Tue Jan 25 2022 12:15:50 GMT+0900 (日本標準時間)
		$month = ($date.getMonth()<9)? "0"+($date.getMonth()+1) : ($date.getMonth()+1); //2022/02/01 23:38修正
		$day = ($date.getDate()<10)? "0"+$date.getDate() : $date.getDate(); //2022/02/01 23:38修正
		$hour = ""+$date.getHours();	//""未知
		$minute = ($date.getMinutes()<10)? "0"+$date.getMinutes() : $date.getMinutes();	//""無效
		$second = ($date.getSeconds()<10)? "0"+$date.getSeconds() : $date.getSeconds();	//""無效
		
		const $weeks = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		$week = $weeks[$date.getDay()];
		
		$complete = $week + " " + $day + "/" + $month + "/" + $date.getFullYear() + " " + $hour + ":" + $minute + ":" + $second;
		
		$("#clock").text($complete);
	
}, 1000);


/* contact.php part */

//回復輸入了的數據
function callback($name, $email, $message){
	$("#name").val($name);
	$("#email").val($email);
	$("#message").val($message);
};

//confirm before reset
function reset_confirm(){
	let text = "Are you sure clear all data you inputed ?";
		if (confirm(text) == true){
			document.getElementById("name").value = "";
			document.getElementById("email").value = "";
			document.getElementById("message").value = "";
			//document.forms["contact"].reset();
			$("#name").css("box-shadow", "");
			$("#email").css("box-shadow", "");
			$("#message").css("box-shadow", "");
			alert("Data has been cleared.");
		}else{
			alert("Canceled.");
		};
};

/*
$(function(){
	$("#reset").click(function(){
		let $text = "Clear all?";
		if (confirm($text) == true){
			document.forms["contact"].reset();
			alert("all cleared");
		}else{
			alert("canceled");
		};
	});
});
*/

//check url, if = contact(.php), 離開頁面前提示輸入資料會消失 
$(function(){
	$position = $(location).attr("href");
	$position_confirm = $position.search(/contact/);
	
	if($position_confirm != -1){
		$(window).bind("beforeunload", function(){
			
			if(($("#name").val())!=="" || ($("#email").val())!=="" || ($("#message").val())!==""){
				return "stop!";
			};
		
		});
	};
});

/* about.php part */

//popup picture control
$(function(){
	$(".about_img").click(function(){
		$("#popup").css("display", "block");
		$("#popup_img").attr("src", $(this).attr("src"));
		
		$("#close").click(function(){
			$("#popup").css("display", "none");
			$("#popup_img").attr("class", "zoom-in");
		});
		
	});
});

//after popup, can view the picture in limit size or original size
$(function(){
	$("#popup_img").click(function(){
		if($(this).attr("class")=="zoom-in"){
			$(this).attr("class", "zoom-out")
		}else{
			$(this).attr("class", "zoom-in")
		}
	});
});
