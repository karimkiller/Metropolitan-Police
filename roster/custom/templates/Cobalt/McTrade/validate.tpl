{include file='header.tpl'}
{include file='navbar.tpl'}

<div class="container">

{if isset($ERRORS)}
	<div class="alert alert-danger">
		{foreach from=$ERRORS item=error}
		<li>{$error}</li>
		{/foreach}
	</div>
{/if}

{if isset($SUCCESS)}
	<div class="alert alert-success">
		{$SUCCESS}
	</div>
{/if}
	
<div class="card">
    <div class="card-body">

	    {if $VALIDATION != true}
	        <div class="alert alert-warning">{$VALIDATION_INFO} {$VALIDATION_CODE}</div>
	        <div class="alert alert-danger">{$IS_VALIDATION}</div>
	    {else}
	        <div class="alert alert-warning">{$VERIFITED}</div>
	    {/if}

    </div>
</div>

</div>

{include file='footer.tpl'}