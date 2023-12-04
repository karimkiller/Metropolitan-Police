{include file='header.tpl'}
{include file='navbar.tpl'}
<div class="container">
{if count($ERRORS)}
	<div class="alert alert-danger">
		{foreach from=$ERRORS item=error}
			<li>{$error}</li>
		{/foreach}
	</div>
{/if}

{if count($SUCCESS)}
	<div class="alert alert-success">
		{foreach from=$SUCCESS item=ok}
			<li>{$ok}</li>
		{/foreach}
	</div>
{/if}

<div class="row">
	<div class="col-md-3">
		<div class="card" id="nav-resources">
			<div class="card-header header-theme">{$CATEGORIES}</div>
			<div class="card-body">
						{foreach from=$CATEGORIES_LIST item=category}
							<form action="" method="post">
								<button type="submit" name="id" value="{$category.id}"
									class="shop btn btn-theme btn-block{if $ACTIVE_CATEGORY === $category.id} active{/if}" style="margin-bottom: 10px">{$category.name}</button>
							</form>
						{/foreach}
			</div>
		</div>


	</div>

	<div class="col-md-9">

		<div class="card">
			<div class="card-header header-theme">{$CATEGORY_DESCRIPTION}</div>
		</div>

		<div class="row">

			{foreach from=$PRODUCT_LIST item=product}
				<div class="col-md-4" style="margin-bottom: 10px">
					<div class="card p-0">
						<div class="card-body">
						<img src="{$product.img}" class="img-fluid" style="border-radius: 5px; margin-bottom: 10px;">
							<strong class="text-center" style="font-size: 1.3rem;">{$product.name}</strong><hr />
							
								<span style="margin-top: 6px; display: inline-block">{$product.price} {$CURRENCY}</span>
								<button class="btn btn-theme float-right" title="info" type="button" data-toggle="modal"
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
									<div class="modal-title" style="width: 100%">{$product.name}
										<strong class="float-right" id="new_price{$product.id}">{$product.price}
											{$CURRENCY}</strong>
									</div>
								</div>
								<div class="modal-body">
									{$product.description}
								</div>
								<div class="modal-footer">
									<input type="hidden" name="product_id" value="{$product.id}">
									<input type="hidden" name="token" value="{$TOKEN}">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">{$CLOSE}</button>
									{if $product.type === 2}
										<input type="number"
											oninput="calc(this.value, '{$product.eco_count}', '{$product.id}', '{$product.price}')"
											class="form-control" placeholder="{$COUNT_TITLE}" id="product_count" name="product_count" value="1">
										<span id="eco_info{$product.id}"></span>
									{/if}
									<button type="submit" class="btn btn-theme">{$TO_BUY}</button>
								</div>
							</div>
						</div>
					</div>

				</form>
			{/foreach}

		</div>
	</div>
</div>


</div>
{include file='footer.tpl'}