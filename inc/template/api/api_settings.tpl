{if $mod == "table"}
  <h4>Settings<h4>      
  <button class="button" type="button" onclick="fSettingsNew();">New Setting</button>
    <table class="stack">
    <thead>
      <tr>
        <th width="30%">Setting</th>
        <th width="20%">Value</th>
        <th class="text-right" width="40%">Description</th>
        <th class="text-right" width="20%">Action</th>
      </tr>
    </thead>
    <tbody>
    {foreach $data as $set=>$det}

      <tr>
    <td><h6>{$set}</h6>{if $det.locked == "1"}<h6><small>Systemsetting</small></h6> {/if}</td>
        <td><h6>{$det.value}</h6></td>
        <td class="text-right"><h6>{$det.hint}</h6></td>
        <td><form method="post"><button class="button" type="button" onclick="fSettingsEdit({$det.id});">Edit</button></form></td>
      </tr>
  
    {/foreach}
    </tbody>
  </table>
  
  


{/if}
{if $mod == "form"}


  <div class="grid-x grid-padding-x">
  <div class="large-12 cell">
    <form class="log-in-form" method="post">
    <h4 class="text-center">{if $data.id|isset}Edit Setting{else}New Setting{/if}</h4>
      <h2>{if $data.setting_key|isset}{$data.setting_key}{/if}</h2><h3>{if $data.setting_hint|isset}{$data.setting_hint}{/if}</h3>

      {if $data.id|isset}
          {if $data.setting_syslock == "1"}
          <input name="setting_key" id="setting_key" type="hidden" value="{$data.setting_key}">
          {else}
            <label for="settings_key"><h4>Setting</h4>
            <input name="setting_key" id="setting_key" type="text" value="{$data.setting_key}" >
            </label>          
          {/if}
      {else}
        <label for="settings_key"><h4>Setting</h4>
        <input name="setting_key" id="setting_key" type="text" value="" placeholder="Your new setting">
        </label>
      {/if}
      <label for="settings_hint"><h4>Hint</h4>      
      <input name="setting_hint" id="setting_hint" type="text" value="{if $data.setting_hint|isset}{$data.setting_hint}{/if}">
      </label>  
      <input name="id" id="id" type="hidden" value="{if $data.id|isset}{$data.id}{else}-1{/if}">
        <label for="settings_value"><h4>Value</h4>  
      <input name="setting_value" id="setting_value" type="text" value="{if $data.setting_value|isset}{$data.setting_value}{/if}">
      </label>

      <p><button type="button" class="button expanded" onclick="fSettingsSave();">Save Changes</button></p>
    </form>
  </div>
</div>







{/if}
