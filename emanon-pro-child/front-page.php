<?php
/**
* Template home
* @package WordPress
* @subpackage Emanon_Pro
* @since Emanon Pro 1.0
*/
get_header(); ?>

<?php emanon_firstview(); ?>
<div class="content">
	<div class="container">
		<main>
			<?php echo do_shortcode('[metaslider id="3285"]'); ?>
			<div id="post-list-section" class="col-main clearfix">
				<div class="entry-header">
					<h2>
						<span>最新情報</span><span class="yk-sub-title">-blog-</span>
					</h2>
				</div>
				<ul class="post-meta clearfix">
					<?php //最新記事の投稿
						if ( have_posts() ) :
							while( have_posts() ) : the_post();
					?>
					<article class="archive-list">
					<a href="<?php the_permalink(); ?>" class="yk-post-list">
					<li>
							<time class="date published updated" datetime="<?php the_time('Y-n-j'); ?>"><?php the_time('Y年n月j日'); ?></time>
							<?php the_title( '<h3 class="archive-header-title">', '</h3>' ); ?>
					</li>
					</a>
					</article>
						<?php
							endwhile; 
						endif;
						?>
				</ul>
				<div class="read-more"><a href="<?php get_template_directory(); ?>/blog" class="btn-border btn-mid">もっと見る</a></div>
		    </div>

		    <div id="post-list-section" class="col-main clearfix">
				<div class="entry-header">
					<h2>
						<span>ツルタがご提供するサービス</span><span class="yk-sub-title">-service-</span>
					</h2>
				</div>
				<?php echo do_shortcode('[metaslider id="3298"]'); ?>
				<div class="read-more"><a href="<?php get_template_directory(); ?>/services" class="btn-border btn-mid">サービス一覧</a></div>
			</div>

			<div id="post-list-section" class="col-main clearfix">
				<div class="entry-header">
					<h2>
						<span>店舗一覧</span><span class="yk-sub-title">-store-</span>
					</h2>
				</div>
				
				<div class="read-more"><a href="<?php get_template_directory(); ?>/stores" class="btn-border btn-mid">店舗一覧</a></div>
			</div>

		    <div id="post-list-section" class="col-main clearfix">
				<div class="entry-header">
					<h2>
						<span>取扱商品</span><span class="yk-sub-title">-bland-</span>
					</h2>
				</div>
		    	<?php echo do_shortcode('[metaslider id="3299"]'); ?>
		    	<div class="read-more"><a href="<?php get_template_directory(); ?>/services" class="btn-border btn-mid">取扱商品一覧</a></div>
			</div>
			<div id="post-list-section" class="col-main yk-recuruit clearfix">
				<div class="yk-top-imglink">
					<a href="<?php get_template_directory(); ?>/about/recruit">採用情報</a>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer(); ?>