<?php
/**
 * Kunena Component
 * @package Kunena.Template.Default20
 * @subpackage User
 *
 * @copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

JHTML::_('behavior.tooltip');
?>
<div class="box-module">
	<div class="block-wrapper box-color box-border box-border_radius">	
		<div class="userprofile block">
			<div class="headerbox-wrapper">
				<div class="header">
					<?php if (!empty($this->editLink)) echo $this->editLink ?>
					<h2 class="header"><a href="#" rel="kmod-detailsbox"><?php echo JText::_('COM_KUNENA_USER_PROFILE').' '.$this->escape($this->name) ?></a></h2>
				</div>
			</div>
			<div class="detailsbox-wrapper">
				<div class="kdetailsbox kmod-userbox" id="kmod-detailsbox">
					<?php $this->displaySummary(); ?>
					<div class="clrline"></div>
					<?php $this->displayTab(); ?>
					<div class="clr"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="spacer"></div>
<script type="text/javascript">
// <![CDATA[
window.addEvent('domready', function(){ $$('dl.tabs').each(function(tabs){ new KunenaTabs(tabs); }); });
// ]]>
</script>