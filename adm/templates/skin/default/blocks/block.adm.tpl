{if $bEnable}
	<div class="block block-type-blogs" id="block_adm">
		<header class="block-header">
			<h3>{$aLang.plugin.adm.adm_block_header}</h3>
		</header>
		
		{$aLang.plugin.adm.adm_block_users}: {$iAdmCount}<br />	
		{$aLang.plugin.adm.adm_block_send}: {$iSendCount}<br />	
		{$aLang.plugin.adm.adm_block_recive}: {$iReciveCount}<br />	
		
		<br />
		<a href="/adm/">{$aLang.plugin.adm.adm_block_link}</a>
		
	</div>
{/if}