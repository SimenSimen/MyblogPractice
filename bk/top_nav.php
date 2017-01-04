

<header class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-3" >
				<div class="navbar-header "> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
					</button> 
					<a class="navbar-brand" href="http://localhost/myblog">My Blog</a>
				</div>	
			</div>
			<div class="col-sm-4">
				<nav class="collapse navbar-collapse" id="collapse-nav">
					<ul class="nav navbar-nav">
						<li role="presentation" <?php if($page == 1) {echo "class='active'";} ?>><a href="?page=1">會員資料</a></li>
					 	<li role="presentation" <?php if($page == 2) {echo "class='active'";} ?>><a href="?page=2">文章管理</a></li>	
					</ul>					
					<ul class="nav navbar-nav navbar-right visible-xs-block">
						<hr class="visible-xs-block">
						<li role="presentation"><a href="#"> 會員暱稱：<?php echo $nickname ;?></a></li>
						<a type="button" class="btn btn-success" href="../index.php">回到首頁</a>						
						<a type="button" class="btn btn-danger navbar-btn" href="../php/login.php">登出</a>		
					</ul>
				</nav>
			</div>
			<div class="col-sm-5">
				<ul class="nav navbar-nav hidden-xs">
					<hr class="visible-xs-block">
					<li role="presentation"><a href="#"> 會員暱稱：<?php echo $nickname ;?></a></li>
					<a type="button" class="btn btn-success" href="../index.php">回到首頁</a>						
					<a type="button" class="btn btn-danger navbar-btn" href="../php/login.php">登出</a>		
				</ul>
			</div>	
		</div>
	</div>
</header>