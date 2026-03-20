<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="wrap puzzleme-admin-page">
    <h1><?php echo esc_html('PuzzleMe for WordPress'); ?></h1>
    <p class="puzzleme-subtitle">
        <?php echo esc_html('Publish crossword, sudoku, quiz, and other PuzzleMe games using shortcodes.'); ?>
    </p>

    <div class="puzzleme-admin-hero-grid">
        <section class="puzzleme-card puzzleme-newsletter-callout">
            <div class="puzzleme-card-header">
                <h2><?php echo esc_html('Stay Updated with PuzzleMe'); ?></h2>
                <span class="puzzleme-card-icon puzzleme-card-icon-envelope">
                    <img src="<?php echo esc_url($puzzleme_media_url . 'envelope.svg'); ?>" alt="" width="48" height="48">
                </span>
            </div>
            <p><?php echo esc_html('Sign up to our newsletter to receive occasional puzzle ideas, tips, and product updates. You can unsubscribe at any time.'); ?></p>
            <p>
                <a class="button puzzleme-dark-button" href="<?php echo esc_url(PuzzleMe_Admin::URL_PUZZLEBUZZ); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo esc_html('Sign me up'); ?>
                </a>
            </p>
        </section>

        <section class="puzzleme-card puzzleme-quickstart-card">
            <div class="puzzleme-card-header">
                <h2><?php echo esc_html('Quick start'); ?></h2>
                <span class="puzzleme-card-icon puzzleme-card-icon-thunderbolt">
                    <img src="<?php echo esc_url($puzzleme_media_url . 'thunderbolt.svg'); ?>" alt="" width="48" height="48">
                </span>
            </div>
            <ol>
                <li><?php echo esc_html('Try the demo shortcodes below to see how a puzzle fits on your site.'); ?></li>
                <li><?php echo esc_html('Log in to PuzzleMe and create your own game.'); ?></li>
                <li><?php echo esc_html('Open the Publish page for the puzzle (or a series of puzzles) in your PuzzleMe dashboard.'); ?></li>
                <li><?php echo esc_html('Copy the WordPress shortcode and paste it into a post or page.'); ?></li>
            </ol>
        </section>
    </div>

    <div class="puzzleme-admin-content-grid">
        <section class="puzzleme-card puzzleme-shortcode-card">
            <div class="puzzleme-card-header">
                <h2><?php echo esc_html('Demo Shortcodes'); ?></h2>
                <span class="puzzleme-card-icon puzzleme-card-icon-monitor">
                    <img src="<?php echo esc_url($puzzleme_media_url . 'monitor.svg'); ?>" alt="" width="48" height="48">
                </span>
            </div>
        <p><?php echo esc_html('Use the exact shortcode copied from the PuzzleMe publish page. Here are some demo shortcodes you can try out to check the embedding.'); ?></p>

            <div class="puzzleme-shortcode-grid">
                <div class="puzzleme-shortcode-item">
                    <h3><?php echo esc_html('Demo crossword'); ?></h3>
                    <div class="puzzleme-shortcode-box">
                        <pre><code>[puzzleme basepath='https://puzzleme.amuselabs.com/pmm/' set='demo-crossword' id='82e56966' type='crossword']</code></pre>
                        <button type="button" class="button puzzleme-copy-shortcode" aria-label="<?php echo esc_attr('Copy crossword shortcode'); ?>">
                            <?php echo esc_html('Copy'); ?>
                        </button>
                    </div>
                </div>

                <div class="puzzleme-shortcode-item">
                    <h3><?php echo esc_html('Puzzle list'); ?></h3>
                    <div class="puzzleme-shortcode-box">
                        <pre><code>[puzzleme basepath='https://puzzleme.amuselabs.com/pmm/' set='demo' type='date-picker']</code></pre>
                        <button type="button" class="button puzzleme-copy-shortcode" aria-label="<?php echo esc_attr('Copy date picker shortcode'); ?>">
                            <?php echo esc_html('Copy'); ?>
                        </button>
                    </div>
                </div>
            </div>

<!--
        <h3><?php echo esc_html('With Embed Parameters'); ?></h3>
        <div class="puzzleme-shortcode-box">
            <pre><code>[puzzleme basepath='https://puzzleme.amuselabs.com/pmm/' set='demo-jigsaw' id='3059b9ac' type='jigsaw' embedparams='name=1&email=1']</code></pre>
            <button type="button" class="button puzzleme-copy-shortcode" aria-label="<?php echo esc_attr('Copy shortcode with embed parameters'); ?>">
                <?php echo esc_html('Copy'); ?>
            </button>
        </div>
-->

        </section>

        <section class="puzzleme-card puzzleme-links-card">
            <div class="puzzleme-card-header">
                <h2><?php echo esc_html('Useful Links'); ?></h2>
                <span class="puzzleme-card-icon puzzleme-card-icon-link">
                    <img src="<?php echo esc_url($puzzleme_media_url . 'link.svg'); ?>" alt="" width="48" height="48">
                </span>
            </div>
            <ul>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_LOGIN); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('PuzzleMe Login'); ?></a></li>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_SUPPORTED_GAMES); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Supported Games'); ?></a></li>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_CONTACT); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Contact Support'); ?></a></li>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_PRICING); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Pricing (for extra features)'); ?></a></li>
            </ul>
        </section>
    </div>

    <section class="puzzleme-card puzzleme-review-callout">
        <div class="puzzleme-card-header">
            <h2><?php echo esc_html('Enjoying the PuzzleMe plugin?'); ?></h2>
            <span class="puzzleme-card-icon puzzleme-card-icon-heart">
                <img src="<?php echo esc_url($puzzleme_media_url . 'heart.svg'); ?>" alt="" width="48" height="48">
            </span>
        </div>
        <p><?php echo esc_html('We’d love to hear your feedback! Your support helps us keep improving and building new features.'); ?></p>
        <p>
            <a class="button puzzleme-dark-button" href="<?php echo esc_url(PuzzleMe_Admin::URL_REVIEW); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html('Rate us'); ?>
            </a>
        </p>
    </section>

    <p class="puzzleme-admin-footer-note">
        <a href="<?php echo esc_url(PuzzleMe_Admin::URL_PRIVACY); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Privacy Policy'); ?></a>
    </p>
</div>
