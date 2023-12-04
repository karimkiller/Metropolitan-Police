{include file='header.tpl'}
{include file='navbar.tpl'}

<div class="card-body">

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


	{if $VALIDATION != true}
	<p class="text-center text-warning font-weight-bold h3">{$VALIDATION_INFO} {$VALIDATION_CODE}</p>
	<p class="text-center text-danger font-weight-bold h4">{$IS_VALIDATION}</p>
	{else}
	<p class="text-center text-warning font-weight-bold h3">{$VERIFITED}</p>
	{/if}


</div>

{include file='footer.tpl'}