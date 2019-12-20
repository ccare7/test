//返回顶部
var fh_top=document.querySelector(".fh_top");
window.onscroll = function() {
				var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
				if(scrollTop > 300) {
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
//导航
var scrollFunc = function(e) {
	e = e || window.event;
	var scH = document.documentElement.scrollTop;
	var scre = window.innerHeight;
	var scollH = scH + scre;
	//导航栏高度
	var navHeight=document.querySelector(".nav");
	var navH=document.querySelector(".nav").offsetHeight;
	var nav2=document.querySelector(".nav2");
	
	if (e.wheelDelta) { //判断浏览器IE，谷歌滑轮事件
		if (e.wheelDelta > 0) { //当滑轮向上滚动时
			
			if(scH<navH){
				$(".nav2").slideUp(10);
			}
		}
		if (e.wheelDelta < 0) { //当滑轮向下滚动时
			if( scH>navH){
					$(".nav2").slideDown(1000);
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