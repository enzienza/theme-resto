<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="bg_dark">

	</div>
	<section id="single-event" class="container-fluid">



		<div class="container single-event-content">
			<h1 class="titre-h1"><?php the_title(); ?></h1>

			<div class="row">
				<div class="col-12">
					<?php the_content(); ?>
				</div>
			</div>

		</div>


	</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
