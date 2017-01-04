<div id="registpage" class="container-fluid">	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">			
			<h2>My Blog ★ 註冊新帳號</h2>
			<form action="php/regist.php" method="POST">
				<div class="form-group">
					<label for="acct">請輸入帳號:</label>
					<input type="text" class="form-control" id="acct" placeholder="Enter Account" name="account" data-validation="length alphanumeric" data-validation-length="min8" data-validation-error-msg="*請輸入至少8個英文+數字字元">
				</div>
				<div class="form-group">
					<label for="pwd">請輸入密碼:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password_confirmation" data-validation-length="min8" data-validation-error-msg="*至少8個字英文+數字字元" data-validation="length alphanumeric">
				</div>
				<div class="form-group">
					<label for="pwd">請確認密碼:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Confirmation" name="password" data-validation="confirmation" data-validation-error-msg="*密碼輸入不正確">
				</div>
				<div class="form-group">
					<label for="sell">請選取性別:</label>
					<select class="form-control" id="sel1" name="gentle">
						<option value="1">男</option>
						<option value="0">女</option>
					</select>
				</div>
				<div class="form-group">
					<label for="nick">請輸入暱稱:</label>	
					<input type="text" class="form-control" id="nick" placeholder="Enter Nickname" name="nickname" data-validation="length" data-validation-length="min2-8" data-validation-error-msg="請輸入2-8個字">			
				</div>
				
					<label for="the-textarea">請簡短的自我介紹:</label><br/>
					<p class="text-danger">還剩下 <span id="max-length-element">100</span> 個字</p>
					<textarea class="form-control" name="intro" id="the-textarea" rows="10"></textarea>
					<button type="submit" class="btn btn-default">註冊</button>
			</form>
		</div>	
	</div>
</div>