{if !$sys.useauth || $userdata.loggedin} 

{if $section == "settings"}
    {include "api/api_settings.tpl"}
{/if}


{* DEBUG OUTPUT *}
{if $sys.debug.apidebugout }
    {if $sys.debug.apirouting}
        <h1>{$section} - {$mod}</h1>
    {/if}
    {foreach $debug as $msg}
        <hr><pre>{$msg}</pre><hr>
    {/foreach}
{/if}



{else}
<h1>NOT AUTHENTIFICATED</h1>
{/if}
    