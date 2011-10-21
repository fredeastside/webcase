<?php if(!is_array($search_result)) : ?>
<h2><?php echo $search_result; ?></h2>
<?php else:
 foreach($search_result as $search_number => $data):
?>
<div style="margin-bottom: 15px;">
 <h3>
	<?php if($data['number'] == 1):?>
		<a href="/article/<?php echo $data['id']; ?>.html"><?php echo $data['title']; ?></a>
	<?php else:?>
		<a href="/new/<?php echo $data['id']; ?>.html"><?php echo $data['title']; ?></a>
	<?php endif;?>
</h3>
     <p><?php echo $data['content']; ?></p>
</div>
<?php endforeach; endif;?>