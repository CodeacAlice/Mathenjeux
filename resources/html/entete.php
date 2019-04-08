<div id="entete">
	<div id="logo"><?php echo file_get_contents($level."assets/icons/logo.svg"); ?></div>
	<div>
		<h1><?= $titre ?></h1>
		<?php if (isset($sstitre)) { ?>
		<h2><?= $sstitre ?></h2>
		<?php } ?>
	</div>
	<div id="triangle1" class="tri"><?php echo file_get_contents($level."assets/icons/triangle.svg"); ?></div>
	<div id="triangle2" class="tri"><?php echo file_get_contents($level."assets/icons/triangle2.svg"); ?></div>
</div>