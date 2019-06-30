</div>
<div style='clear:both'>

<hr />
<h2>Cutie fluffballs crying out for love !</h2>

<div style="float:left;width:100%">
<?
foreach ($data['footer'] as $post)  
{ 
	?>		
	<div style="float:left;width:18%;padding:1%">
		<a href="<?='http://www.tidyrounds.com/cutiefluffball/gallery/'.$post['link'];?>">
		<h5><?=$post['title'];?></h5>
		<img src='<?='/cutiefluffball/img/' . $post['img'];?>' style='width:100%'>
		<p><?=$post['content'];?></p>
		</a>
	</div>
	<?
} 
?>	
</div>

	</body>
</html>
