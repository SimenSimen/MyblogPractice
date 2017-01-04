<?php 
@session_start();
require_once('php/userlog.php');
?>
<?php require_once'php/articles.php'; 
$datas = get_publish_articles();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Blog</title>
	<link rel="icon" href="img/icon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="js/jscript.js"></script>

	<?php if(isset($_GET['fail']) || isset($_GET['post']) || isset($_GET['regist']))
	{	
		@$lg = $_GET['fail'];
		@$post = $_GET['post'];
		@$regist = $_GET['regist'];
		if($lg)
			{
				echo '<script>alert("請輸入正確的帳號密碼。");</script>';
			}
		switch ($post) {
			case 'true':
				echo '<script>alert("發佈成功!");</script>';
				break;
			
			case 'false':
				echo '<script>alert("發佈失敗!");</script>';
				break;
		}
		switch ($regist) {
			case 'true':
				echo '<script>alert("註冊成功!");</script>';
				break;
			
			case 'false':
				echo '<script>alert("註冊失敗，帳號或暱稱重複!");</script>';
				break;
		}
	}
?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<?php require_once 'php/top_nav.php' ?>
	<div id="article_page" class="container-fluid">
		<div class="mid">
			<div class="row">
				<div class="col-xs-1 col-md-2">
				</div>
				<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">			
				<?php if(!empty($datas) && !isset($_GET['post_id'])): ?>		
					<?php foreach ($datas as $articles):?> 
					<div class="panel panel-info" >
  						<div class="panel-heading">
  							<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
  							<a href="?post_id=<?php echo $articles['id'];?>" ><span><?php echo $articles['article_title']; ?></span></a>
  							<div class="paneltitle pull-right visible-lg-block">
  								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
 								<span class="label label-default">文章作者："<?php echo get_user_id($articles['user_id']);?>"</span>
 								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
 								<span class="label label-warning">發佈時間：<?php echo $articles['create_date'] ;?></span>
 							</div>
  						</div>
  						<div class="panel-body">
 					<?php if(strlen($articles['content'])>300)
 						{
 							echo mb_substr($articles['content'],"0","300","UTF-8")."....";
 						}
 						else
 						{
 							echo $articles['content'];
	 					}?>	   
							<div class="pull-right hidden-lg">
								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								<span class="label label-warning">發佈時間：<?php echo $articles['create_date'];?></span>
							</div>					  	
						</div>  						
					</div>			
					<div class="container-fluid ">					
					<?php if($login && $user_id == $articles['user_id']): ?>
						<a type="button" class="btn btn-danger btn-xs edit-btn" href="editpage.php?post_id=<?php echo $articles['id'];?>"><span class="glyphicon glyphicon-pencil"></span> 文章編輯</a>
					<?php endif; ?>
						<div class="article-info hidden-lg pull-right">
	  						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    						<span class="label label-default">文章作者："<?php echo get_user_id($articles['user_id']);?>"</span>					
						</div>		
					</div>
					<?php endforeach; ?>
					<?php elseif(isset($_GET['post_id'])): ?>
						<?php $sb_article = get_article($_GET['post_id']);?>
					<div id="sb_article" class="panel panel-info" >
  						<div class="panel-heading">
  							<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
  							<span><?php echo $sb_article['article_title']; ?></span>
  							<div class="paneltitle pull-right visible-lg-block">
  								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    							<span class="label label-default">文章作者："<?php echo get_user_id($sb_article['user_id']);?>"</span>
    							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
    							<span class="label label-warning">發佈時間：<?php echo $sb_article['create_date'];?></span>
    						</div>
  						</div>
  						<div class="panel-body">
    							<?php echo $sb_article['content']; ?>	  	
						</div>  						
					</div>	
  				<?php endif; ?>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-inverse navbar-fixed-bottom hidden-lg">
		<div class="container">
			<div class="row">
				<div class="col-xs-10">		
					<form class="navbar-form navbar-left" action="php/login.php" method="POST" >
						<div class="form-group">
							<label class="sr-only" for="">Account</label>
							<input type="text" class="form-control input-sm"  placeholder="Account" name="account" data-validation="letternumeric" data-validation-error-msg=" " >
						</div>
						<div class="form-group">
							<label class="sr-only" for="">Password</label>
							<input type="password" class="form-control input-sm"  placeholder="Password" name="password" data-validation="letternumeric" data-validation-error-msg=" ">
						</div>
						<button type="submit" class="btn btn-default btn-sm">登入</button>
					</form>	
				</div>
				<div class="col-xs-2">
					<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
				</div>
			</div>
		</div>
	</nav>
	<div id="resumepage" class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="thumbnail">
					<a href="contact.php" target="_blank">
					<img src="img/photo.jpg">
				<div class="caption">
					<h2 class="text-center">劉子靖 / Simen</h2>
				</div>
					  </a>
					<p class="text-center">Learn by doing</p>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>基本資料 (待業中)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>生日</td>
							<td><h3>1993/06/14</h3><small>雙子座</small></td>
						</tr>
						<tr>
							<td>身高/體重</td>
							<td><h3> 168 / 72 </h3><small>cm / kg</small></td>
						</tr>
						<tr>
							<td>役期 / 婚姻</td>
							<td><h3>2016/6/03役畢 / 未婚</h3><small>補充兵 </small></td>
						</tr>
						<tr>
							<td>聯絡資訊</td>
							<td><h3>FaceBook、Email</h3><small>decisiveboy20@hotmail.com.tw</small></td>
						</tr>

					</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<h2>學經歷</h2>
				<br>
				<p>簡短自我介紹：我是一個簡單樸實，努力向學的人</p>
				<table class="table table-hover">
					<thead>
					</thead>
					<tbody>
						<tr class="text-center">
							<td>高中:</td>
							<td><h3>國立大里高中</h3><small>2008/09~2011/06(中興大學附屬中學)</small></td>
						</tr>
						<tr class="text-center">
							<td>大學:</td>
							<td><h3>國立高雄應用科技大學</h3><small>2011/09~2016/01電機工程系畢業</small></td>
						</tr>
						<tr class="text-center">
							<td>工作經歷:</td>
							<td><h3>711門市人員</h3><small>2015/07~2016/06在學打工大約一年</small></td>
						</tr>
					</tbody>
					</table>
				<h2>專長、技能</h2>
				<table class="table table-hover">
					<thead>						
					</thead>
					<tbody>
						<tr class="text-center">
							<td>語文能力</td>
							<td><h3>英文</h3><small>聽(中等)、說(中等)、讀(中等)、寫(中等)</small></td>
						</tr>
						<tr class="text-center">
							<td>使用工具</td>
							<td><h3>Windows,<code>Javascript、php、Html、css、jquery<code></h3></td>
						</tr>
						<tr class="text-center">
							<td>資料輸入</td>
							<td><h3>Office</h3><small>excel、word、powerpoint</small></td>
						</tr>
						<tr class="text-center">
							<td>其他</td>
							<td><h3>中文打字、英文打字</h3><small>80~120/m、20~50/m</small></td>
						</tr>
					</tbody>	
				</table>
				<h2>自傳</h2>
				<table class="table table-hover">
					<thead></thead>
					<tbody>
						<tr class="autobiography">
							<td>中文自傳</td>
							<td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我認為從小我就是一個樂觀、樸實簡約的人，學習能力快、反應迅速讓我不論是在課業還是娛樂上都得心應手。很小的時候我就是單親家庭，也因為如此，父親教導我獨立自主的能力，而這讓我成長的過程相當順利，遇到問題便有處理的能力。另外在求學過程中我也學會、了解到發問的重要性，所謂不恥下問更讓自己與時俱進，這也許是我學習能力強的原因。</h3></td>
						</tr>
					</tbody>	
				</table>
			</div>
			<div class="col-md-4">
				<table class="table table-hover">
					<tbody>
						<tr class="autobiography">
						    <td></td>
							<td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;也因為學習能力強，造就了本身一些不太好的習慣，例如：常常對某些稍微沒有難度的事情興趣缺缺、三分鐘熱度、沒有比較專精的技能。直到大學畢業我才稍微意識到自己的缺點。為了改正這個缺點，並且更努力的精進自己，我開始投入了程式設計的課程進行自學，一方面是因為對電腦軟體的興趣；二來是如果能將興趣當成職業發展，我相信我的能力、檔次能夠快速的進步。</h3><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作為我學習能力的佐證大概可以提到在學期間再7-11打工的情況，不論是同事、老闆、以及公司區組幹部的評價，都是對我讚譽有加。以目前7-11所提供的服務來說，一個店員要學習至成熟大約要半年的時間，而我大概只花了兩個月。以及，一直至大學畢業以來，我從沒有進過補習班，比起同期的同班同學，學測拿到了63分的成績，雖說不是很理想，但是除了比較弱勢的科目(社會)，其他都有13級分以上。</h3><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;因此，不論是我的學習能力、工作態度、評價，都有相當的表現，我會盡力做好每一件事。</h3></td>
						</tr>
						<tr>
							<td>英文自傳</td>
							<td><h3>&nbsp;&nbsp;&nbsp;I'm optimistic,happy,showing lots of curiosity and a person learning well. I try my best to do everything and finish well. And I realize that if you got some problem or questions, you should just look for solutions or find the anwsers. This thought makes me be improving better and better.  <h3></td>
						</tr>
					</tbody>			
				</table>
			</div>
		</div>
	</div>
	<div id="piecespage" class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="#" target="_blank">
						<img src="img/piece1.png" class="img-thumbnail">
						<div class="caption">
							<h3><p class="text-center">My Blog</p></h3>
						</div>
					</a>
				</div>
			</div>
		<?php for($i=0;$i<11;$i++): ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="img/continue.png" target="_blank">
						<img src="img/continue.png" class="img-thumbnail">
						<div class="caption">
							<h3><p class="text-center">To be continued</p></h3>
						</div>
					</a>
				</div>
			</div>
		<?php endfor; ?>
		</div>
	</div>
	<?php if(!$login):?>
	<?php include_once('registpage.php'); ?> 
	<?php elseif($login):?>
	<?php include_once('postpage.php'); ?>
	<?php endif; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3 col-xs-offset-5">
				<div id="copyright">&copy;CopyRight <?php echo date('Y'); ?></div>
			</div>
		</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="js/jsform.js"></script>
</body>
</html>