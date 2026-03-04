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

    <div class="puzzleme-admin-grid">
        <section class="puzzleme-card">
            <h2><?php echo esc_html('Quick Start'); ?></h2>
            <ol>
                <li><?php echo esc_html('Log in to PuzzleMe and create your game.'); ?></li>
                <li><?php echo esc_html('Open the Publish page for the puzzle/picker in your PuzzleMe dashboard.'); ?></li>
                <li><?php echo esc_html('Copy the WordPress shortcode and paste it into a post or page.'); ?></li>
            </ol>
        </section>

        <section class="puzzleme-card">
            <h2><?php echo esc_html('Useful Links'); ?></h2>
            <ul>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_LOGIN); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('PuzzleMe Login'); ?></a></li>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_SUPPORTED_GAMES); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Supported Games'); ?></a></li>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_PRICING); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Pricing'); ?></a></li>
                <li><a href="<?php echo esc_url(PuzzleMe_Admin::URL_CONTACT); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Contact Support'); ?></a></li>
            </ul>
        </section>
    </div>

    <section class="puzzleme-card puzzleme-shortcode-card">
        <h2><?php echo esc_html('Shortcode Examples'); ?></h2>
        <p><?php echo esc_html('Use the exact shortcode copied from PuzzleMe. Examples below are for reference.'); ?></p>

        <h3><?php echo esc_html('Crossword'); ?></h3>
        <div class="puzzleme-shortcode-box">
            <pre><code>[puzzleme basepath='https://puzzleme.amuselabs.com/pmm/' set='demo-crossword' id='82e56966' type='crossword']</code></pre>
            <button type="button" class="button puzzleme-copy-shortcode" aria-label="<?php echo esc_attr('Copy crossword shortcode'); ?>">
                <?php echo esc_html('Copy'); ?>
            </button>
        </div>

        <h3><?php echo esc_html('Date Picker'); ?></h3>
        <div class="puzzleme-shortcode-box">
            <pre><code>[puzzleme basepath='https://puzzleme.amuselabs.com/pmm/' set='demo' type='date-picker']</code></pre>
            <button type="button" class="button puzzleme-copy-shortcode" aria-label="<?php echo esc_attr('Copy date picker shortcode'); ?>">
                <?php echo esc_html('Copy'); ?>
            </button>
        </div>

        <h3><?php echo esc_html('With Embed Parameters'); ?></h3>
        <div class="puzzleme-shortcode-box">
            <pre><code>[puzzleme basepath='https://puzzleme.amuselabs.com/pmm/' set='demo-jigsaw' id='3059b9ac' type='jigsaw' embedparams='name=1&email=1']</code></pre>
            <button type="button" class="button puzzleme-copy-shortcode" aria-label="<?php echo esc_attr('Copy shortcode with embed parameters'); ?>">
                <?php echo esc_html('Copy'); ?>
            </button>
        </div>

    </section>

    <section class="puzzleme-card puzzleme-review-callout">
        <h2><?php echo esc_html('Enjoying PuzzleMe?'); ?></h2>
        <p>
            <?php echo esc_html('Enjoying the PuzzleMe plugin? Please rate us on the WordPress '); ?><a href="<?php echo esc_url(PuzzleMe_Admin::URL_REVIEW); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('plugin directory'); ?></a><?php echo esc_html(' and share your valuable feedback as we strive to enhance your experience further.'); ?>
        </p>
    </section>
</div>
