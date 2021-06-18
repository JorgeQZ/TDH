


<footer>
    <div class="container">
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
    </div>

    <div class="footer-bottom">
        <div class="container">
            <?php if ( is_active_sidebar( 'footer-dr' ) ) : ?>
                <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer-dr' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>