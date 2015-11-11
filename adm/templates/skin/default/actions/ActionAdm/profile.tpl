{assign var="sidebarPosition" value='left'}
{include file='header.tpl'}
<h2 class="page-header">{$aLang.plugin.adm.profile}</h2>
{if $bNoUserCurrent}
    {$aLang.plugin.adm.no_auth} <a href="/login">{$aLang.plugin.adm.no_auth_link}</a>
{else}

    {if !$oAdmProfile}
        <div class="adm_profile_info">
            {$aLang.plugin.adm.not_adm_profile}
        </div>
    {/if}

    {if $oAdmReciverProfile}
        <span class="adm_profile_info">
            {$aLang.plugin.adm.reciver_user}:<br />
            {$oAdmReciverProfile->getName()}<br />
            {$oAdmReciverProfile->getAddress()}
        </span>
        
        <form method="post" enctype="multipart/form-data" class="form-profile" id="adm_form_gift_state">
            <button type="submit"  name="submit_i_am_send_gift" class="button button-primary adm_button" {if $oAdmProfile->GetIsGiftSend() == 1} disabled="disabled"{/if}/>{$aLang.plugin.adm.i_am_send_gift}</button>
            <button type="submit"  name="submit_i_am_recive_gift" class="button button-primary adm_button" {if $oAdmProfile->GetIsGiftRecive() == 1} disabled="disabled"{/if}/>{$aLang.plugin.adm.i_am_recive_gift}</button>
        </form>
    {/if} 

    <form method="post" enctype="multipart/form-data" class="form-profile" id="adm_form">
        <table style="width:100%">
            <tr class="adm_profile">
                <td width="150px">
                {$aLang.plugin.adm.reciver_name}:
                </td>
                <td >
                    <input type="text" name="adm_profile_name" id="adm_profile_name" class="input-text input-width-full" value="{$sAdmName}" />
                </td>
            </tr>   
            <tr class="adm_profile">
                <td width="150px">
                {$aLang.plugin.adm.recive_addr}:
                </td>
                <td >
                    <input type="text" name="adm_profile_addr" id="adm_profile_addr" class="input-text input-width-full" value="{$sAdmAddress}" />
                </td>
            </tr>                   
        </table>
        
        <button type="submit"  name="submit_adm_profile" class="button button-primary" {if $oAdmReciverProfile} disabled="disabled" {/if}/>{if !$oAdmProfile}{$aLang.plugin.adm.create_profile}{else}{$aLang.plugin.adm.update_profile}{/if}</button>
        
    </form>
{/if}

{include file='footer.tpl'}