<div style='float:left;width:30%'>


<h2>The Top Ten</h2>

<div style="float:left;width:60%;padding-left:20%;padding-right:20%">
<?
foreach ($data['sidebar'] as $post)  
{ 
	?>		
		<a href="<?='http://www.tidyrounds.com/cutiefluffball/gallery/'.$post['link'];?>">
		<strong><?=$post['title'];?></strong>
		</a>
	<br />
	<?
} 
?>	
</div>
<div style='clear:both'></div>

<h2>Some Cracking Shots !</h2>

<div style="float:left;width:60%;padding-left:20%;padding-right:20%">

<?
foreach ($data['sidebar'] as $post)  
{ 
	?>		
	<div style="float:left;width:46%;padding-left:2%;padding-right:2%">
		<a href="<?='http://www.tidyrounds.com/cutiefluffball/gallery/'.$post['link'];?>">
			<img src='<?='/cutiefluffball/img/' . $post['img'];?>' style='width:100%'>
		</a>
	</div>
	<?
} 
?>	
	
</div>
<div style='clear:both'></div>

<h2>Top Vid !</h2>

<div style="float:left;width:60%;padding-left:20%;padding-right:20%">
<?
foreach ($data['sidebar'] as $post)  
{ 
	?>		
		<a href="<?='http://www.tidyrounds.com/cutiefluffball/gallery/'.$post['link'];?>">
		<h4><?=$post['title'];?></h4>
		<img src='<?='/cutiefluffball/img/' . $post['img'];?>' style='width:100%'>
		</a>
	<hr />
	<?
} 
?>	
</div>
<div style='clear:both'></div>


</div>