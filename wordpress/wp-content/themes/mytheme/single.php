<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row">
    <div class="card col-9 mx-auto  mb-3" id="<?php the_id(); ?>">
        <h6>
            <?php the_time(get_option('date_format')); ?>
        </h6>
        <?php the_post_thumbnail('large', array("class" => "card-img-top")); ?>
        <div class="card-body">
            <h5 class="card-title">
                <?php the_title(); ?>
            </h5>
            <?php the_content(''); ?>
        </div>
    </div>
    <div class="col-3 bg-light" style="direction: rtl;unicode-bidi: embed;">
        <div class="sidebar">
            <?php dynamic_sidebar('sidebar-1') ?>
        </div>
    </div>
</div>
<?php endwhile;
endif; ?>
<?php comments_template('comments.php'); ?>
</div>
<?php get_footer(); ?>