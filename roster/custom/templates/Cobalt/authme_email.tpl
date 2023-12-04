{include file='header.tpl'} {include file='navbar.tpl'}
<div class="container">
    {if isset($ERRORS)}
        <div class="alert alert-danger">
            {foreach from=$ERRORS item=error} {$error}
            <br /> {/foreach}
        </div>
    {/if}
    <div class="alert alert-success">
        {$AUTHME_INFO}
    </div>
    <div class="card">
        <div class="card-header header-theme">{$CONNECT_WITH_AUTHME}</div>
        <div class="card-body">

            <form class="form" action="" method="post" id="form-authme-email">
                {assign var=counter value=1}
                {foreach $FIELDS as $field_key => $field}
                    <div class="form-group">
                        {if $field.type eq 1}
                            <input class="form-control" type="text" name="{$field_key}" id="{$field_key}" value="{$field.value}"
                                placeholder="{$field.placeholder}" tabindex="{$counter++}" {if $field.required} required{/if}>
                        {else if $field.type eq 2}
                            <textarea class="form-control" name="{$field_key}" id="{$field_key}"
                                placeholder="{$field.placeholder}" tabindex="{$counter++}"></textarea>
                        {else if $field.type eq 3}
                            <input class="form-control" type="date" name="{$field_key}" id="{$field_key}" value="{$field.value}"
                                tabindex="{$counter++}">
                        {else if $field.type eq 4}
                            <input class="form-control" type="password" name="{$field_key}" id="{$field_key}"
                                value="{$field.value}" placeholder="{$field.placeholder}" tabindex="{$counter++}"
                                {if $field.required} required{/if}>
                        {else if $field.type eq 5}
                            <select class="form-control" name="{$field_key}" id="{$field_key}" {if
                        $field.required}required{/if}>
                            {foreach from=$field.options item=option}
                                <option value="{$option.value}" {if $option.value eq $field.value} selected{/if}>
                                    {$option.option}</option>
                            {/foreach}
                        </select>
                    {else if $field.type eq 6}
                        <input class="form-control" type="number" name="{$field_key}" id="{$field_key}"
                            value="{$field.value}" placeholder="{$field.name}" tabindex="{$counter++}" {if $field.required}
                            required{/if}>
                    {else if $field.type eq 7}
                        <input class="form-control" type="email" name="{$field_key}" id="{$field_key}"
                            value="{$field.value}" placeholder="{$field.placeholder}" tabindex="{$counter++}"
                            {if $field.required} required{/if}>
                    {else if $field.type eq 8}
                        {foreach from=$field.options item=option}
                            <div class="form-group">
                                <div class="form-control" tabindex="{$counter++}">
                                    <input type="radio" name="{$field_key}" value="{$option.value}" {if $field.value eq
                                    $option.value}checked{/if} {if $field.required}required{/if}>
                                    <label>{$option.option}</label>
                                </div>
                            </div>
                        {/foreach}
                    {else if $field.type eq 9}
                        {foreach from=$field.options item=option}
                            <div class="form-group">
                                <div class="form-control">
                                    <input type="checkbox" name="{$field_key}[]" value="{$option.value}" {if
                                is_array($field.value) && in_array($option.value, $field.value)}checked{/if}
                                    tabindex="{$counter++}">
                                <label>{$option.option}</label>
                            </div>
                        </div>
                    {/foreach}
                    {/if}
                </div>
                {/foreach}
                <div class="form-group">
                    <input type="checkbox" name="authme_sync_password" id="authme_sync_password" tabindex="{$counter++}"
                        {if $AUTHME_SYNC_PASSWORD_CHECKED}checked{/if}>
                    <label for="authme_sync_password">
                        {$AUTHME_SYNC_PASSWORD}
                        <div class="ui icon label mini" data-toggle="tooltip" data-trigger="hover"
                            data-original-title="{$AUTHME_SYNC_PASSWORD_INFO}">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>
                    </label>
                </div>
                <div class="field">
                    <input type="hidden" name="token" value="{$TOKEN}">
                    <button type="submit" class="btn btn-theme">{$SUBMIT}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{include file='footer.tpl'}