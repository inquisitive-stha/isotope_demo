<!DOCTYPE html>
<html>
<head>
<title>jQuery Isotope</title>
<link rel="stylesheet" href="css/style.css">
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="js/jquery.isotope.js" type="text/javascript"></script> 
</head>
<?php
mysql_connect("localhost","root","");
mysql_select_db("mapsdb");
$sql = "SELECT * FROM maps_business_category";
$rs = mysql_query($sql);
$b_category = array();
while($row=mysql_fetch_assoc($rs))
{
	$b_category[]=$row;
}
	$sql = "SELECT * FROM maps_business";
	$rs = mysql_query($sql);
	$business = array();
	while($row=mysql_fetch_assoc($rs))
	{
		$business[]=$row;
	}

?>

<body>


<h1>jQuery Isotope</h1>
 
<div class="portfolioFilter">

	<a href="#" data-filter="*" class="current">All Business</a>
	<?php foreach($b_category as $k=>$v){
		?>
	<a href="#" data-filter=".<?php echo str_replace(" ", "_",$v['title']);?>"><?php echo $v['title'];?></a>
	<?php } ?>
</div>

<div class="portfolioContainer">


	<?php foreach($business as $d=>$s){
	?>
	<?php foreach($b_category as $k=>$v){
	?>
	
		
		
	<div class="<?php echo str_replace(" ", "_",$v['title']);?>">

			<?php 
					if($v['id']==$s['business_cat_id'])
					{
						echo $s['title'];
					}
			?>

	</div>
	<?php } ?>
	<?php } ?>
	
	
	
	
</div>
 
<script type="text/javascript">

$(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});

</script>
 
 

 

 
</body>

</html>