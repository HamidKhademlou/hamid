<?php get_header(); ?>
<div class="container-fluid">
	<div class="row">
		<?php if (have_posts()) :
		$postCount = 1;
		$args = new WP_Query(array('orderby' => 'title', 'order' => 'ASC', 'cat' => $_GET['cat']));
		while ($args->have_posts()) :
			$postCount++;
			$args->the_post();
			 ?>
		<?php if ($postCount == 2) : ?>
		<div class="card col-11 colsm-11 mx-auto p-1 border-light" style="background-color: <?php the_field('dl_box'); ?>">
			<?php the_post_thumbnail('large', array("class" => "card-img-top")); ?>
			<div class="card-body">
				<?php the_category(' '); ?>
				<!-- <?php the_title(); ?> -->
				<?php the_content(); ?>
			</div>
		</div>
		<?php else : ?>
		<div class="card col-5 col-sm-5 mx-auto p-1 border-light" style="background-color: <?php the_field('dl_box'); ?>">
			<?php the_post_thumbnail('large', array("class" => "card-img-top")); ?>
			<div class="card-body">
				<?php the_category( ', ' ); ?>
				<!-- <?php the_title(); ?> -->
				<?php the_content(); ?>
				<!-- <?php the_content(''); ?> -->
				<!-- <div style="display:flex; justify-content:center">
							<div>
								<a href="<?php the_permalink(); ?>" class=" mb-1">more</a>
							</div>
						</div> -->
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>

		<!-- <?php 
	$args = new WP_Query(array('orderby' => 'title', 'order' => 'ASC', 'cat' => 3));
	$args = new WP_Query(array('orderby' => 'title', 'order' => 'ASC'));

	while ($args->have_posts()) :
		$args->the_post(); ?>
		<div class="card col-4 mx-auto p-1" style="background-color: <?php the_field('dl_box'); ?>">
			<div class="card-body">
				<?php the_post_thumbnail('thumbnail', array("class" => "card-img-top")); ?>
				<?php the_title(); ?>
				<?php the_content(''); ?>
				<div style="display:flex; justify-content:center">
					<div>
						<a href="<?php the_permalink(); ?>" class=" btn btn-primary mb-1">more</a>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?> -->

		<!-- <div class="col-9">
			<div class="content">
				<?php while (have_posts()) :
				the_post(); ?>
				<div class="card mb-3" id="<?php the_id(); ?>">
					<h6>
						<?php the_time(get_option('date_format')); ?>
					</h6>
					<?php the_post_thumbnail('thumbnail', array("class" => "card-img-top")); ?>
					<div class="card-body">
						<h5 class="card-title">
							<?php the_title(); ?>
						</h5>
						<?php the_content(''); ?>
						<a href="<?php the_permalink(); ?>" class="btn btn-primary mb-1">more</a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div> -->

	</div>
</div>

<?php get_footer(); ?>