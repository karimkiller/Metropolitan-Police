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

<style type="text/css">
	.shop {
		color: #66A3D2;
		transition: 0.5s;
		width: 100%;
	}

	.shop:hover {
		transform: scale(0.9);
	}

	.main-btn {
		outline: none;
		border: 0px;
		box-sizing: none;
		background-color: transparent;
	}

	.main-btn:focus {
		outline: none;
	}
</style>

<div class="row justify-content-center">
	<div class="col-md-3">
		<div class="card card-default" id="nav-resources">
			<div class="card-header">
				<i class="fa fa-shopping-basket" aria-hidden="true"></i> {$CATEGORIES}
			</div>
			<div class="card-body">
				<ul class="nav nav-pills flex-column">

					<li class="nav-item">
						{foreach from=$CATEGORIES_LIST item=category}
							<form action="" method="post">
								<button type="submit" name="id" value="{$category.id}"
									class="shop nav-link main-btn{if $ACTIVE_CATEGORY === $category.id} active{/if}">{$category.name}</button>
							</form>
						{/foreach}
					</li>

				</ul>
			</div>
		</div>


	</div>

	<div class="col-md-9">

		<h5 class="text-center text-info">{$CATEGORY_DESCRIPTION}</h5>

		<div class="row justify-content-center">

			{foreach from=$PRODUCT_LIST item=product}
				<div class="col-md-3" style="margin: 10px">
					<div class="card p-0 shop">
						<div class="view overlay">
							<img src="{$product.img}" class="card-img-top img-fluid"><br>
						</div>

						<div class="card-body text-center">
							<p style="margin: 5px">
								<strong class="text-primary">{$product.name}</strong>
							</p>
							<p class="font-weight-bold text-success">
								<strong>{$product.price} {$CURRENCY}</strong>
							</p><br>
							<button class="btn btn-info btn-rounded btn-sm" title="info" type="button" data-toggle="modal"
								data-target="#info_product{$product.id}">{$INFO}</button>

						</div>
					</div>
				</div>

				<form action="{$BUY_LINK}" method="post">
					<!-- Modal -->
					<div class="modal fade" id="info_product{$product.id}" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title">{$product.name}</h2>
									<div class="modal-title">
										<strong class="text-right" id="new_price{$product.id}">{$product.price}</strong><strong>
											{$CURRENCY}</strong>
									</div>
								</div>
								<div class="modal-body">
									{$product.description}
								</div>
								<div class="modal-footer">
									<input type="hidden" name="product_id" value="{$product.id}">
									<input type="hidden" name="token" value="{$TOKEN}">
									<button type="button" class="btn btn-danger" data-dismiss="modal">{$CLOSE}</button>
									{if $product.type === 2}
										<input type="number"
											oninput="calc(this.value, '{$product.eco_count}', '{$product.id}', '{$product.price}')"
											class="form-control" placeholder="{$COUNT_TITLE}" id="product_count" name="product_count" value="1">
										<span id="eco_info{$product.id}"></span>
									{/if}
									<button type="submit" class="btn btn-success">{$TO_BUY}</button>
								</div>
							</div>
						</div>
					</div>

				</form>
			{/foreach}

		</div>
	</div>
</div>

{include file='footer.tpl'}