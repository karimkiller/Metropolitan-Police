{include file='header.tpl'}
{include file='navbar.tpl'}

{if count($ERRORS)}
	<div class="container alert alert-danger">
		{foreach from=$ERRORS item=error}
			<li>{$error}</li>
		{/foreach}
	</div>
{/if}

{if count($SUCCESS)}
	<div class="container alert alert-success">
		{foreach from=$SUCCESS item=ok}
			<li>{$ok}</li>
		{/foreach}
	</div>
{/if}

<div class="row justify-content-center">
	<div class="col-md-3">
		{include file='user/navigation.tpl'}
	</div>
	<div class="col-md-9">
		<h3>{$MC_TITLE}</h3>
		<div class="card-body">
			<div class="row">
				<div class="col-md-9 btn-group text-left">
					<a href="{$PAY_URL}" class="btn btn-primary">{$PAY}</a>
				</div>
				<div class="col-md-3 btn-group text-right">
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{$TRANSFER_MONEY}</a>
				</div>
			</div>
			<br>
			<table class="table">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				<thead>
					<tr>
						<th>{$MC_ACCOUNT} </th>
						<th class="text-right"><span class="text-warning">{$USER_DATA->mc_name}</span></th>
					</tr>
				</thead>
				<thead>
					<tr>
						<th>{$BALANCE} </th>
						<th class="text-right"><span class="text-warning">{$USER_DATA->bal}</span></th>
					</tr>
				</thead>
			</table>

		</div>
		<div class="row justify-content-center">

			<div class="p-4 text-center">{$BUY_TITLE}</div>
			{if count($PRODUCT_LOGS)}
				<div class="list-group">
					{foreach from=$PRODUCT_LOGS item=log}
						<table class="table">
							<colgroup>
								<col width="50%">
								<col width="10%">
								<col width="30%">
								<col width="10%">
							</colgroup>
							<thead>
								<tr>
									<th class="{if $log['status'] != 1}text-danger{/if}"><span>{$log['product_name']}</span></th>
									<th class="{if $log['status'] != 1}text-danger{/if}">
										<span>{if $log['status'] != 1}error{else}success{/if}</span>
									</th>
									<th class="{if $log['status'] != 1}text-danger{/if} text-right"><span>{$log['datetime']}</span>
									</th>
									<th class="{if $log['status'] != 1}text-danger{/if} text-right">
										<span>{$log['product_price']}</span>
									</th>
								</tr>
							</thead>
						</table>
					{/foreach}
				</div>
			{/if}


		</div>
	</div>
</div>


{include file='footer.tpl'}

<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">{$TRANSFER_MONEY}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="trade_bal_send">{$BALANCE} {$USER_DATA->bal}</label>
						<input type="number" id="trade_bal_send" name="trade_bal_send" class="form-control"
							placeholder="{$COUNT_TITLE}">
					</div>

					<div class="form-group">
						<label for="to_user">{$RECIPIENT}</label>
						<input class="form-control" list="users_list" name="to_user" id="to_user">

						<datalist id="users_list">
							{foreach from=$USERS_LIST item=user}
								<option value="{$user['mc_name']}">
								{/foreach}
						</datalist>
					</div>

					<div class="form-group">
						<input type="hidden" name="token" value="{$TOKEN}">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">{$CLOSE}</button>
					<button type="submit" class="btn btn-primary">{$SUBMIT}</button>
				</div>
			</form>
		</div>
	</div>
</div>