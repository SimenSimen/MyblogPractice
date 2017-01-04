<div id="postpage" class="container-fluid">	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<h2><p class="text-center">My Blog ★ 發佈新文章</p></h2><br><br>
			<form class="form-horizontal" action="php/post.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-3" for="article_title">請輸入標題:</label>
					<div class="col-sm-6">
						<input class="form-control" id="article_title" placeholder="請輸入標題" data-validation="length" data-validation-length="min2-25" data-validation-error-msg="標題限制在2-25字內" name="article_title">
					</div>
				</div>
				<div class="form-group"> 
					<label for="the-textarea"><h3>文章內容</h3></label><br/>
					<p class="text-danger">還剩下 <span id="max-length-element">5000</span> 個字</p>
					<textarea class="form-control" name="content" id="the-textarea" rows="25" placeholder="請輸入點甚麼......"></textarea>
				</div>
				<div class="form-group">
					<button type="sumbit" class="btn btn-primary btn-block" name="public" value="1">發佈</button>
					<button type="sumbit" class="btn btn-primary btn-block" name="public" value="0">儲存</button>
				</div>
			</form>
		</div>	
	</div>
</div>