var swiper = new Swiper('.swiper-container', {
				pagination: '.swiper-pagination',
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				paginationClickable: true,
				spaceBetween: 30,
				centeredSlides: true,
				loop:true,
				autoplay: 2500,
				autoplayDisableOnInteraction: false
			});

var scrollFunc = function(e) {
	e = e || window.event;
	var os = document.querySelectorAll(".bar-ce-left");
//	var ui = document.querySelectorAll(".bar-img-anm");
	var Ofset = document.querySelectorAll(".bar-ce-left")[0].offsetHeight;
//	 console.log(Ofset);
	var scH = document.documentElement.scrollTop;
	// console.log(scH);
	var scre = window.innerHeight;
	// console.log(scre);
	var scollH = scH + scre;
	//导航栏高度
	var navHeight=document.querySelector(".nav");
	var navH=document.querySelector(".nav").offsetHeight;
	var nav2=document.querySelector(".nav2");
//	console.log(navHeight);
	
	if (e.wheelDelta) { //判断浏览器IE，谷歌滑轮事件
		if (e.wheelDelta > 0) { //当滑轮向上滚动时
			
			if(scH<navH){
//		     console.log(scH);
//			 console.log(e.wheelDelta);
				$(".nav2").slideUp(10);
			}
		}
		if (e.wheelDelta < 0) { //当滑轮向下滚动时
			// console.log(e.wheelDelta);
//			console.log(scollH);
			for (var i = 0; i < 4; i++) {
				let cs = i;
				if (scH >= 329) {
					os[i].style.transition = "all 1.5s";
					os[cs].style.transitionDelay = cs / 4 + "s";
					os[i].style.transform = "translateY(-10px)";
					os[i].style.display = "block";
					os[i].style.opacity = "1";
				}
			}
			if( scH>navH){
					$(".nav2").slideDown(1000);
			}
			if(scH>800){
				console.log(scH);
					$(".con2 img").animate({
						width: '304px',
						height: '203px',
						opacity: "1"
					});
			}
			if(scH>900){
//				console.log(scH);
					$(".con3 img").animate({
						width: '304px',
						height: '190px',
						opacity: "1"
					});
			}
			
		}
	}
}
//给页面绑定滑轮滚动事件
if (document.addEventListener) { //火狐使用DOMMouseScroll绑定
	document.addEventListener('DOMMouseScroll', scrollFunc, false);
}
//其他浏览器直接绑定滚动事件
window.onmousewheel = document.onmousewheel = scrollFunc;
//返回顶部
var fh_H=document.getElementsByClassName("banner")[0];
var fh_top=document.querySelector(".fh_top");
window.onscroll = function() {
				var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
				if(scrollTop > fh_H.offsetHeight) {
					fh_top.style.display = "block"
				} else {
					fh_top.style.display = "none"
				}
			}

fh_top.onclick=()=>{
				var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
				var timer= setInterval(function() {
					if(scrollTop > 0) {
						scrollTop = document.body.scrollTop = document.documentElement.scrollTop = scrollTop - 5;
					} else {
						clearInterval(timer);
						$(".nav2").slideUp(10);
					}

				}, 1)
			}