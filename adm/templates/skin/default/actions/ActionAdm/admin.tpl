{assign var="sidebarPosition" value='left'}
{include file='header.tpl'}
<h2 class="page-header">{$aLang.plugin.adm.adm_admin_header}</h2>


<a href="/adm/make_adm">{$aLang.plugin.adm.adm_admin_make_pair}</a>


<table class="table table-users">
	<thead>
		<tr>
			<th class="cell-name cell-tab">
				<div class="cell-tab-inner">{$aLang.plugin.adm.adm_admin_user}</div>
			</th>
			<th class="cell-name cell-tab">
				<div class="cell-tab-inner">{$aLang.plugin.adm.adm_admin_address}</div>
			</th>
			<th class="cell-name cell-tab">
				<div class="cell-tab-inner">{$aLang.plugin.adm.adm_admin_name}</div>
			</th>
			<th class="cell-name cell-tab">
				<div class="cell-tab-inner">{$aLang.plugin.adm.adm_admin_reciver_user}</div>
			</th>			
			<th class="cell-name cell-tab">
				<div class="cell-tab-inner">{$aLang.plugin.adm.adm_admin_is_send}</div>
			</th>						
			<th class="cell-name cell-tab">
				<div class="cell-tab-inner">{$aLang.plugin.adm.adm_admin_is_recive}</div>
			</th>
		</tr>
	</thead>

	<tbody>
	{foreach from=$aAdmList item=oAdm}
	{assign var="oAdmUser" value=$oAdm->getUser()}
	{assign var="oReciverUser" value=$oAdm->getReciveUser()}
	<tr>
		<td>
			<a href="{$oAdmUser->getUserWebPath()}"><img src="{$oAdmUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>
			<div class="name {if !$oAdmUser->getProfileName()}no-realname{/if}">
				<p class="username word-wrap"><a href="{$oAdmUser->getUserWebPath()}">{$oAdmUser->getLogin()}</a></p>
				{if $oAdmUser->getProfileName()}<p class="realname">{$oAdmUser->getProfileName()}</p>{/if}
			</div>
		</td>
		<td>
			{$oAdm->getAddress()}
		</td>
		<td>
			{$oAdm->getName()}
		</td>				
		<td>
			{if $oReciverUser}
				<a href="{$oReciverUser->getUserWebPath()}"><img src="{$oReciverUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>
				<div class="name {if !$oReciverUser->getProfileName()}no-realname{/if}">
					<p class="username word-wrap"><a href="{$oReciverUser->getUserWebPath()}">{$oReciverUser->getLogin()}</a></p>
					{if $oReciverUser->getProfileName()}<p class="realname">{$oReciverUser->getProfileName()}</p>{/if}
				</div>			
			{/if}
		</td>		
		<td>
			{$oAdm->getIsGiftSend()}
		</td>	
		<td>
			{$oAdm->getIsGiftRecive()}
		</td>					
	</tr>
	{/foreach}
	</tbody>
</table>

{include file='footer.tpl'}