{include file='header.tpl'} {include file='navbar.tpl'}
<div class="container">
    {if isset($ERRORS)}
        <div class="alert alert-danger">
            {foreach from=$ERRORS item=error} {$error}
            <br /> {/foreach}
        </div>
    {/if}
    <div class="card">
        <div class="card-header header-theme">{$TWO_FACTOR_AUTH}</div>
        <div class="card-body">
            {if isset($TFA_SCAN_CODE_TEXT)}
            <p>{$TFA_SCAN_CODE_TEXT}</p>
            <img class="mb-3" src="{$IMG_SRC}">
            <p>{$TFA_CODE_TEXT}</p>
            <b>{$TFA_CODE}</b><br />
            <a href="{$LINK}" class="btn btn-theme mt-4">{$NEXT}</a>
            <form action="{$CANCEL_LINK}" method="post">
                    <input type="hidden" name="token" value="{$TOKEN}">
                    <button type="submit" class="btn btn-secondary mt-4">{$CANCEL}</button>
            </form>
            {else}
            {if isset($ERROR)}
                <div class="alert alert-danger">
                    {$ERROR}
                </div>
            {/if}
            <p>{$TFA_ENTER_CODE}</p>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="tfa_code">
                </div>
                <div class="form-group">
                    <input type="hidden" name="token" value="{$TOKEN}">
                    <input type="submit" class="btn btn-theme" value="{$SUBMIT}">
                    <form action="{$CANCEL_LINK}" method="post">
                        <input type="hidden" name="token" value="{$TOKEN}">
                        <button type="submit" class="btn btn-secondary mt-4">{$CANCEL}</button>
                    </form>
                </div>
            </form>
            {/if}
        </div>
    </div>
</div>
{include file='footer.tpl'}