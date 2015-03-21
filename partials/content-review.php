<?php
	$args = array(
		"post_type" => "review",
		"meta_key" => 'vintage',
		"orderby" => "meta_value_num",
		'posts_per_page' => 500,
		'post_status' => 'publish',
	);

	$reviewQuery = new WP_Query($args);
	$currentYear = date('Y');
	$i = 0;
	$j = 0;
	$reviewList = array();
	$vintageList = array();
	while ( $reviewQuery->have_posts() ) : $reviewQuery->the_post();
		is_numeric(get_field("vintage")) == true ? $vintageList[get_field("vintage")] = get_field("vintage") : $vintageList[get_field("vintage")] = "&mdash;";
		$reviewList[$i]["vintage"] = get_field("vintage");
		$reviewList[$i]["title"] = get_the_title();
		$reviewList[$i]["score"] = get_field("score");
		$reviewList[$i]["publication"] = get_field("publication");
		$reviewList[$i]["award_title"] = get_field("award_title");
		$reviewList[$i]["reviewer"] = get_field("reviewer");
		$reviewList[$i]["stars"] = get_field("stars");
		$reviewList[$i]["puffs"] = get_field("puffs");
		$reviewList[$i]["content"] = get_the_content();
		$i++; 
	endwhile; wp_reset_query();
?>
<h3>Jump to vintage</h3>

<ul class="col-center sub-menu menu tag-list">
	<?php foreach ($vintageList as $key => $val) { ?>
		<li><a href="#<?php echo $key;?>"><?php echo $vintageList[$key];?></a></li>
	<?php } ?>
</ul>

<?php foreach ($reviewList as $review) { ?>
	<?php if ( $review["vintage"] < $currentYear ) { ?>
		<?php $currentYear = $review["vintage"]; ?>
		<?php if ($j > 0) { ?>
		</div>
		<?php } ?>
		<h2 id="<?php echo $currentYear;?>"><?php echo $vintageList[$currentYear];?></h2>
		<div class="accordion">
	<?php } ?>
	<h5>
		<?php echo $review["title"];?>
		<span>
			<?php if ( $review["score"] ) { ?>
				<?php echo $review["score"];?>, 
			<?php } ?>
			<?php if ( $review["publication"] ) {?>
				<?php echo $review["publication"];?>
			<?php } ?>
		</span>
	</h5>
	<div>
		<?php if ( $review["award_title"] ) {?>
		<h6><?php echo $review["award_title"]; ?></h6>
		<?php } ?>
		<p><?php if ( $review["reviewer"]) { echo  $review["reviewer"] . ', '; }?><?php the_date();?></p>
		<?php if ( $review["stars"] ) { ?>
		<p><?php echo $review["stars"]; ?></p>
		<?php } ?>
		<?php if ( $review["puffs"] ) { ?>
		<p><?php echo $review["puffs"]; ?></p>
		<?php } ?>
		<?php if ( $review["content"] ) { ?><p>&ldquo;<?php echo $review["content"]; ?>&rdquo;</p><?php } ?>
	</div>
	<?php $j++;?> 
<?php } ?>
<?php if ( count($reviewList) == $i) {?>
</div>
<?php } ?>