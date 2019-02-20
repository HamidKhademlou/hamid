<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
    </div>
</div>
<?php endwhile;endif; ?>

<?php get_footer(); ?>