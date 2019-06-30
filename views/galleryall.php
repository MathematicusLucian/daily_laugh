<div style='float:left;width:70%'>
<h2>Gallery</h2>
<?
foreach ($data['article'] as $post)  
{ 
	?>		
	<a href="<?='gallery/'.$post['link'];?>">
	<h4><?=$post['title'];?></h4>
	<img src='<?='/cutiefluffball/img/' . $post['img'];?>' style='width:60%'>
	<p><?=$post['content'];?></p>
	</a>
	<?
} 
?>	
</div>