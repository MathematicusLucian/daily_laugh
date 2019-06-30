<div style='float:left;width:70%'>
<?
foreach ($data['article'] as $post)  
{ 
	?>		
	<h4><a href="<?=$post['author'];?>"><?=$post['title'];?></a></h4>
	<p><?=$post['content'];?></p>
	<?
} 
?>	
</div>