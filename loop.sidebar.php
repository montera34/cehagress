		<li class="topslim">
			<h3 class="tit3 fontup"><a href="<?php the_permalink(); ?>" title="Más información" rel="bookmark"><?php the_title(); ?></a></h3>
			<span class="muted">
				<?php  echo $item_date; ?>
			</span>
			<p><?php the_excerpt_rss(); ?></p>
		</li>

