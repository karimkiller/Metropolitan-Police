<div class="card widget-card">
    <div class="card-header header-theme widget-header">{$LATEST_POSTS}</div>
    <div class="card-body">
        {foreach from=$LATEST_POSTS_ARRAY item=post name=latest_posts}
            <div class="widget-post-flex"{if not $smarty.foreach.latest_posts.last} style="margin-bottom: 15px"{/if}>
                <div class="post-avatar">
                    <img src="{$post.last_reply_avatar}" alt="{$post.last_reply_username}" />
                </div>
                <div class="post-info">
                    <a class="white-link" href="{$post.last_reply_link}">{$post.topic_title}</a><br />
                    <a class="username" href="{$post.last_reply_profile_link}" style="{$post.last_reply_style}" data-poload="{$USER_INFO_URL}{$post.last_reply_user_id}" data-html="true" data-placement="top">{$post.last_reply_username}</a><br />
                    <span data-toggle="tooltip" data-trigger="hover" data-original-title="{$post.last_reply}">{$post.last_reply_rough}</span>
                </div>
            </div>
        {/foreach}
    </div>
</div>

{*  
 *  R4M_
 *  21683
 *  95748
 *  1678515928
 *  7bd56630a6fc368b36dcd480eb9d635e
 *  2e0c0197244dd01fa91700e8b63894a4
 *}