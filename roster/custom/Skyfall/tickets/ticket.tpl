{include file='header.tpl'}
{include file='navbar.tpl'}
<style>
    .scale-in-center{ -webkit-animation:scale-in-center .5s cubic-bezier(.25,.46,.45,.94) both;animation:scale-in-center .5s cubic-bezier(.25,.46,.45,.94) both }
    @-webkit-keyframes scale-in-center{ 0% { -webkit-transform:scale(0);transform:scale(0);opacity:1 } 100% { -webkit-transform:scale(1);transform:scale(1);opacity:1 } }@keyframes scale-in-center{ 0% { -webkit-transform:scale(0);transform:scale(0);opacity:1 } 100% { -webkit-transform:scale(1);transform:scale(1);opacity:1 } }
    .status-icon{ border-radius: 100%;
        margin-top: 0.15rem;
        margin-right: 0.2rem;
        width: 2rem;
        font-size: 1.25rem;
        height: 2rem;
        line-height: 1.65;
        text-align: center;
    }
    label .status-icon {
        width: 1.5rem;
        font-size: 0.95rem;
        height: 1.5rem;
        line-height: 1.55;
    }
    .select2-dropdown {
        z-index: 50000000 !important;
    }
</style>

<!-- Core page -->
<div class="container" id="ticket">
    <div style="display:none;position: absolute;top: 0;left: 0;width: 100%;height: 100%;background: #1e7e34;z-index:500000;"></div>
    {if count($PERMISSIONS)}
    <div class="row">
        <div class="col-md-12">
            <!-- VueJS Assigned categories -->
            <assigned-categs></assigned-categs>
            <div class="float-right forum-btns">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle btn-theme text-white" data-toggle="dropdown" style="vertical-align:baseline;" aria-expanded="false">
                        {$ACTIONS} <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" tabindex="-1" role="menu">
                        {if isset($PERMISSIONS['categories']) && $PERMISSIONS['categories'] === true}
                            <li>
                                <a style="cursor: pointer" class="dropdown-item" id="categories" data-toggle="modal" data-target="#modal-edit-categ">{$EDIT_CATEG}</a>
                            </li>
                        {/if}
                        {if isset($PERMISSIONS['status']) && $PERMISSIONS['status'] === true}
                            <li>
                                <a style="cursor: pointer" class="dropdown-item" id="status" data-toggle="modal" data-target="#modal-edit-status">{$EDIT_STATUS}</a>
                            </li>
                        {/if}
                        {if isset($PERMISSIONS['assign']) && $PERMISSIONS['assign'] === true}
                            <li>
                                <a style="cursor: pointer" class="dropdown-item refreshAssign" id="assign" data-toggle="modal" data-target="#modal-assign">{$ASSIGN_TICKET}</a>
                            </li>
                        {/if}
                        {if isset($PERMISSIONS['delete']) && $PERMISSIONS['delete'] === true}
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a style="cursor: pointer" class="dropdown-item" id="delete" data-toggle="modal" data-target="#modal-delete">{$DELETE_TICKET}</a>
                            </li>
                        {/if}
                        <!-- <a class="item" data-toggle="modal" data-target="#modal-delete">Delete Topic</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/if}
    <h2 class="card">
        <div class="card-header header-theme" style="font-size: 15px">
            <status></status>
            <span style="display: inline-block; margin-bottom: 5px">{$TICKET[0]->title}</span><span style="display: inline-block; margin-top: 8px" class="float-right">{$STARTED_BY} <a href="/profile/{$TICKET[0]->username}/" style="">{$TICKET[0]->username}</a></span>
        </div>
    </h2>
    <!-- VueJS Answers -->
    <answers></answers>
    <!-- Reply -->
    <reply></reply>

    {include file='./ticket_include_modals.tpl'}

</div>

{include file='footer.tpl'}
{include file='./ticket_include_vue.tpl'}
{include file='./ticket_include_js.tpl'}
