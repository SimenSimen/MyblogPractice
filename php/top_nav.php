<header class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="row" >
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" >
				<div class="navbar-header "> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
					</button> 
					<a class="navbar-brand" href="../myblog">My Blog</a>
				</div>	
			</div>
			<div class="col-sm-10 col-md-8 col-lg-4">
				<nav class="collapse navbar-collapse" id="collapse-nav">
					<ul class="nav navbar-nav">
						<li role="presentation" class="active"><a href="<?php if(isset($_GET['post_id'])){echo "../myblog#article_page" ;}else{echo "#article_page";}?>">文章列表</a></li>
					 	<li role="presentation"><a href="<?php if(isset($_GET['post_id'])){echo "../myblog#resumepage" ;}else{echo "#resumepage";}?>">我的履歷</a></li>
					 	<li role="presentation"><a href="<?php if(isset($_GET['post_id'])){echo "../myblog#piecespage" ;}else{echo "#piecespage";}?>">我的作品</a></li>
					 	<?php if($login) :?>
					 	<li role="presentation"><a href="<?php if(isset($_GET['post_id'])){echo "../myblog#postpage" ;}else{echo "#postpage";}?>">發表新文章</a></li>
						<?php elseif(!$login): ?>
						<li role="presentation"><a href="contact.php">給作者的話</a></li>
						<?php endif;?>
					</ul>
					<?php if(!$login): ?>
					<ul class="nav navbar-nav navbar-right hidden-lg">
			     		<li role="presentation"><a href="#registpage"><span class="glyphicon glyphicon-user"></span> 註冊新帳號</a></li>
			     		<li role="presentation" ><a id="loginbtn"><span class="glyphicon glyphicon-log-in"></span> 會員登入</a></li>
					</ul>
					<?php endif; ?>
					<?php if($login) :?>
						<hr class="visible-xs-block">
					<ul class="nav navbar-nav navbar-right hidden-lg">
			    		<li role="presentation"><a href="#"> 使用者：<?php echo $nickname ;?></a></li>	
			    		<a type="button" class="btn btn-success" href="bk/backend.php">進入後台</a>					
						<a type="button" class="btn btn-danger navbar-btn" href="php/login.php">登出</a>		
					</ul>
					<?php endif;?>
				</nav>
			</div>		
			<div class="col-lg-6 visible-lg-block" >
				<?php if($login): ?>
				<nav class="nav navbar-nav">
					<ul class="nav navbar-nav ">
			    		<li role="presentation"><a href="#">歡迎回來 ,<?php echo $nickname ;?>!</a></li>								
						<a type="button" class="btn btn-success navbar-btn" href="bk/backend.php">進入後台</a>
						<a type="button" class="btn btn-danger navbar-btn" href="php/login.php">登出</a>						
					</ul>
				</nav>
				<nav class="nav navbar-nav">
					
				</nav>
				<?php elseif(!$login): ?>
				<form class="navbar-form navbar-left" action="php/login.php" method="POST" >
					<div class="form-group">
						<label class="sr-only" for="">Account</label>
							<input type="text" class="form-control input-sm" placeholder="Account" name="account" data-validation="letternumeric" data-validation-error-msg=" " >
					</div>
					<div class="form-group">
						<label class="sr-only" for="">Password</label>
							<input type="password" class="form-control input-sm" placeholder="Password" name="password" data-validation="letternumeric" data-validation-error-msg=" ">
					</div>
					<button type="submit" class="btn btn-default btn-sm">登入</button>
				</form>	
				<nav class="nav navbar-nav navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="#registpage"><span class="glyphicon glyphicon-user"></span>註冊新帳號</a></li>
					</ul>
				</nav>	
				<?php endif; ?>		
			</div>	
		</div>
	</div>
</header>


