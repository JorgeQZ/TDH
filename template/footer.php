


<footer>
    <div class="grid-columns">
        <div class="column">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="column">
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="column">
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer-bottom">
        <?php if ( is_active_sidebar( 'footer-dr' ) ) : ?>
            <div class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer-dr' ); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>