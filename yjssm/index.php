<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap, from Twitter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link href="media/css/bootstrap.css" rel="stylesheet">
		<link href="media/css/bootstrap-responsive.css" rel="stylesheet">
		<script src="media/js/jquery-1.9.1.min.js"></script>
		<script src="media/js/bootstrap.min.js"></script>
		<style>
			body {font-family: '微软雅黑'}
			ul li {margin-top:8px;}
			.f-white{color:white;}
			.nav {margin:100px 0px 10px 300px;padding-top:20px;height:40px;}
			.thumbnail img {width: 140px; height: 140px;margin-top:13px;}
			a{color:orange}
			
		</style>
	</head>


	<body>

		<div class="container-fluid" style="background-color:#333">
			<div class="row-fluid" style="margin-buttom:0px">
				<img style="margin:0px 40px 10px 100px;width:193px;height:174px;float:left" src="media/img/logo.png">	
				<!--<div  style="font-size:20px;margin:100px 318px 10px 300px;padding-top:10px;height:40px;border-radius: 13px">-->
				<div  id="nav" class="nav" style="display:none">
					<a class="btn btn-large btn-inverse" href="#">首&nbsp;页</a>
					<a class="btn btn-large btn-inverse" href="#">产业资讯</a>
					<a class="btn btn-large btn-inverse" href="#">产品展示</a>
					<a class="btn btn-large btn-inverse" href="#">车间设备</a>
					<a class="btn btn-large btn-inverse" href="#">企业荣誉</a>
					<a class="btn btn-large btn-inverse" href="#">销售网络</a>
					<a class="btn btn-large btn-inverse" href="#">联系我们</a>
				</div>
				<div  id="ieNav" class="nav">
					<a href="#"><img src="media/img/nav/1.jpg"></img></a>
					<a href="#"><img style="width:100px;height:60px" src="media/img/nav/2.jpg"></img></a>
					<a href="#"><img src="media/img/nav/3.jpg"></img></a>
					<a href="#"><img src="media/img/nav/4.jpg"></img></a>
					<a href="#"><img src="media/img/nav/5.jpg"></img></a>
					<a href="#"><img src="media/img/nav/6.jpg"></img></a>
					<a href="#"><img src="media/img/nav/7.jpg"></img></a>
				</div>
			</div>	
		</div>

		<div class="row-fluid">
			<div class="span10 offset1" style="background-color:#eee;border-radius:5px;margin-top:10px;margin-bottom:10px;">
				<div class="span3" style="width:25%;height:250px;margin: 25px 10px 10px 40px;line-height: 30px;">	
					<h4 style="text-align:center">衡水永佳电动伸缩门配件厂</h4>公司已有十余年的发展历史，主要生产电动伸缩门配件（轮类，轮罩，机头轮，行走轮等），专业维修电动伸缩门，在市场经济的大潮下，本厂跻身国内大型专业生产厂家的行列，生产的铸铁轮，橡胶轮等产品被许多国家大中型重点工程所采用，取得了经济效益和社会效益的双丰收。
					<p style="text-align:right;color:orange"><a href="#">更多信息&gt;&gt;</a></p>
				</div>

				<div style="width:67%;float:left;display:block;margin:20px 10px 5px 10px">
				<div id="myCarousel" class="carousel slide" >
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="active item"><img style="width:700px;height:300px" src="http://www.bootcss.com/assets/img/bootstrap-mdo-sfmoma-01.jpg" alt=""></div>
						<div class="item"><img style="width:700px;height:300px" src="http://www.bootcss.com/assets/img/bootstrap-mdo-sfmoma-02.jpg" alt=""></div>
						<div class="item"><img style="width:700px;height:300px" src="http://www.bootcss.com/assets/img/bootstrap-mdo-sfmoma-03.jpg" alt=""></div>
					</div>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
				</div>
				</div>
				<script>
					$('.carousel').carousel();
				</script>
			</div>
		</div>	

		<div class="row-fluid">
			<ul class="thumbnails">
				<li class="span2 offset1">
				<div class="thumbnail" style="background-color: #eee;">
					<img src="media/img/1.png">
					<h5 style="text-align:center;"><a href="#" style="color:black">机头轮</a></h5>
				</div>
				</li>
					<li class="span2">
				<div class="thumbnail" style="background-color: #eee;">
					<img src="media/img/1.png">
					<h5 style="text-align:center;"><a href="#" style="color:black">机头轮</a></h5>
				</div>
				</li>
					<li class="span2">
				<div class="thumbnail" style="background-color: #eee;">
					<img src="media/img/1.png">
					<h5 style="text-align:center;"><a href="#" style="color:black">机头轮</a></h5>
				</div>
				</li>
					<li class="span2">
				<div class="thumbnail" style="background-color: #eee;">
					<img src="media/img/1.png">
					<h5 style="text-align:center;"><a href="#" style="color:black">机头轮</a></h5>
				</div>
				</li>
					<li class="span2">
				<div class="thumbnail" style="background-color: #eee;">
					<img src="media/img/1.png">
					<h5 style="text-align:center;"><a href="#" style="color:black">机头轮</a></h5>
				</div>
				</li>
			</ul>
			<div style="text-align:right"><a href="#">更多产品</a></div>
		</div>

		<div style="width:83%;height:1px;margin:0px auto;padding:0px;background-color:#D5D5D5;overflow:hidden;"></div>
		<div class="row-fluid">
			<div class="span10 offset1" style="margin-top:25px">
				<div class="span4">
					<a href="#" class="thumbnail"><img src="media/img/min1.png"></a>
				</div>
				<div class="span4">
					<a href="#" class="thumbnail"><img src="media/img/min1.png"></a>
				</div>
				<div class="span4">
					<a href="#" class="thumbnail"><img src="media/img/min1.png"></a>
				</div>

			</div>
		</div>
		<div class="row-fluid">
			<div class="span10 offset1" style="margin-top:10px">
				<div class="span4">
					<h5>行业咨询</h5>
					<ul>
						<li>的说法撒旦法撒法撒反对撒旦法撒旦法</li>
						<li>凡达斯蒂法撒旦法撒旦法玩儿玩儿微沃</li>
						<li>的说法撒旦法撒法撒反对撒旦法撒旦法</li>
						<li>的说法撒旦法撒法撒反对撒旦法撒旦法</li>
						<li>的说法撒旦法撒法撒反对撒旦法撒旦法</li>
						<li>凡达斯蒂法撒旦法撒旦法玩儿玩儿微沃</li>
					</ul>
					<p style="text-align:center"><a href="#">更多信息&gt;&gt;</a></p>

				</div>
				<div class="span4">
					<h5>销售网络</h5>
					<ul class="unstyled">
						<li>华东地区: 沈阳 大连 长春 黑龙江 鸡西</li>
						<li>华北地区：北京 天津 承德 秦皇岛 霸州</li>
						<li>华东地区：济南 济宁 南京 义乌</li>
						<li>华中地区：武汉 襄樊 异常 长沙</li>
						<li>华南地区：广州 深圳 珠海 厦门 海口</li>
						<li>西部地区: 兰州 西安 重庆 成都</li>
					</ul>
					<p style="text-align:center"><a href="#">更多信息&gt;&gt;</a></p>
				</div>
				<div class="span4">
					<h5>在线留言</h5>
					<textarea style="height:140px;width:96%" rows="5" placeholder="请记得留下您的联系方式"></textarea>
					<button class="btn" style="float:right;" type="submit">提交</button>
				</div>
			</div>

		</div>



		<div class="container-fluid" style="background-color:#333">
			<div class="row-fluid" style="padding-top:30px;padding-bottom:30px">
				<div class="span3 offset1 f-white">
					<h4>联系我们</h4>			
					<ul class="unstyled">
						<li>联系人：苏新栋</li>
						<li>电 话：0318-2125776：</li>
						<li>传 真：0318-2125776</li>
						<li>手 机：13831809536</li>
						<li>邮 箱：hsyongjia@126.com</li>
					</ul>	
				</div>
				<div class="span2 f-white">
					<h4>快速链接</h4>
					<ul class="unstyled">
						<li><a href="#"><i class="icon-align-left"></i>&nbsp;&nbsp;&nbsp;行业资讯</a></li>
						<li><a href="#"><i class="icon-align-left"></i>&nbsp;&nbsp;&nbsp;产品展示</a></li>
						<li><a href="#"><i class="icon-align-left"></i>&nbsp;&nbsp;&nbsp;车间设备</a></li>
						<li><a href="#"><i class="icon-align-left"></i>&nbsp;&nbsp;&nbsp;销售网络</a></li>
						<li><a href="#"><i class="icon-align-left"></i>&nbsp;&nbsp;&nbsp;联系我们</a></li>
					</ul>
				</div>
				<div class="span2 f-white">
					<h4>关于我们</h4>
					<a href="#" class="thumbnail"><img src="media/img/logo.png"></a>
				</div>
				<div class="span3 f-white">
					<p style="margin-top:40px">公司已有十余年的发展历史，主要生产电动伸缩门配件（轮类，轮罩，机头轮，行走轮等），专业维修电动伸缩门，在市场经济的大潮下，本厂跻身国内大型专业生产厂家的行列，生产的铸铁轮，橡胶轮等产品被许多国家大中型重点工程所采用，取得了经济效益和社会效益的双丰收</p>
				</div>
			</div>


		</div>
		<div class="container-fluid" style="background-color:black">
			<p style="text-align:center">
			CopyRight © www.yjssm.com     All Rights Reserved 版权所有：衡水永佳电动伸缩门配件厂
			</p>
		</div>
	</body>

	<script>
		$(function(){
		   var isIE = /msie/.test(navigator.userAgent.toLowerCase());	
		   if(isIE) {
			   $('#nav').remove();
		   }else{
		   $('#ieNav').remove();
		   $('#nav').css('display','block');
	   		} 
	})
	</script>
</html>

