<?php
    /**
     * Search page
     */
?>

<section class="section">
    
    <div class="container">
        <?php if (!have_posts()): ?>
            <?php # Empty Search results ?>
            
            <div class="no-results">
                <h2 class="leading-paragraph">
                    Sorry, no matching result found for "<?= get_search_query() ?>"
                </h2>
            </div>

        <?php else: ?>
            <h1 class="search-title">
                What we found:
            </h1>
        <?php endif ?>

        <div class="search-list">
        <?php while (have_posts()) : the_post(); $post = get_post(); ?>
            
            <div class="search-item">
                <a href="<?= get_permalink($post) ?>" 
                    class="search-item__link">
                    <div class="search-item__title">
                        <?= $post->post_title ?>
                    </div>
                </a>
            </div>


        <?php endwhile; ?>
    </div>

</section>

