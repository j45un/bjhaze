<div class="sidebar-widget">
	<div class="sidebar-div block">
		<h4 class="sidebar-title">Links</h4>
	</div>
	<ul class="sidebar-list">
	<?php foreach ($links as $key => $link):?>
		<li><a href="<?php echo $link;?>" target="_blank"><?php echo $key;?></a></li>
	<?php endforeach;?>
	</ul>
</div>