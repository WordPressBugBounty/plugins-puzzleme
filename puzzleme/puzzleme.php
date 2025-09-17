<?php
/*
   Plugin Name: PuzzleMe for WordPress
   Version: 1.2.2
   Description: Embed PuzzleMe puzzles in your posts and pages with a shortcode
   Author: Amuse Labs
   Author URI: https://www.amuselabs.com/
   License: GPLv2 or later
   License URI: https://www.gnu.org/licenses/gpl-2.0.html
   */

function load_puzzle_scripts() {

    global $puzzleme_base_path;

    $footer_script_HTML = '
    
    <script nowprocket data-no-minify="1" src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script nowprocket data-no-minify="1" id="pm-script" src="' . $puzzleme_base_path . 'js/puzzleme-embed.js"></script>
    <script nowprocket>
    PM_Config.PM_BasePath = "' . $puzzleme_base_path . '";
    </script>

    ';
    echo($footer_script_HTML);
}


function puzzleme_iframe_generator($attributes)
{

    global $puzzleme_base_path;

    if (isset($attributes['basepath'])) {
        $puzzleme_base_path = esc_url_raw($attributes['basepath']);
    } else if (defined('PuzzleMe_BasePath')) {
        $puzzleme_base_path = PuzzleMe_BasePath;
    } else {
        $puzzleme_base_path = 'https://puzzleme.amuselabs.com/pmm/';
    }

    add_action('wp_footer', 'load_puzzle_scripts');

    $allowedHTMLtags = array(
        'div' => array(
            'class' => true,
            'data-id' => true,
            'data-set' => true,
            'data-puzzletype' => true,
            'data-height' => true,
            'data-mobileMargin' => true,
            'data-embedparams' => true,
            'data-page' => true,
            'style' => true
        ),
        'script' => array(
            'id' => true,
            'src' => true,
            'nowprocket' => true
        ),
        'a' => array(
            'href' => true,
            'target' => true,
            'style' => true,
            'title' => true,
            'rel' => true
        )
    );
    
    $attributionHTMLTags = array(
        'a' => array(
            'href' => true,
            'target' => true,
            'style' => true
        )
    );

    $valid_embed_types = array('crossword', 'sudoku', 'wordsearch', 'quiz', 'krisskross', 'wordf', 'codeword', 'wordrow', 'jigsaw', 'date-picker');

    $embed_html = '

        <div class="pm-embed-div" $id data-set="$set" $embed_type data-height="700px" data-mobileMargin="10px" $embed_params></div>

        ';
    
    $embed_html_attributions = '
        <div style="position: relative; text-align: center;">
            <div class="pm-embed-div" $id data-set="$set" $embed_type data-height="700px" data-mobileMargin="10px" $embed_params></div>
            <div class="pm-attribution-div" style="font-family: sans-serif; font-size: 12px; color:#666666; padding-top: 5px; width: 100%;">$attribution_text</div>
        </div>
        ';

    $embed_variables = array(
        '$embed_type' => '',
        '$set' => '',
        '$embed_params' => '',
        '$id' => '',
        '$attribution_text' => '',
    );

    if (empty($attributes)) {
        return "Parameters are missing in the shortcode. Please copy the correct shortcode from your PuzzleMe dashboard.";
    } else {
        if (isset($attributes['set'])) {
            if (isset($attributes['type'])) {
                if (in_array($attributes['type'], $valid_embed_types)) {

                    $embed_variables['$embed_type'] = sanitize_text_field($attributes['type']);
                    $embed_variables['$set'] = sanitize_text_field($attributes['set']);
                    if (isset($attributes['embedparams'])) {
                        $embed_variables['$embed_params'] = 'data-embedparams="embed=wp&' . sanitize_text_field($attributes['embedparams']) . '"';
                    } else {
                         $embed_variables['$embed_params'] = 'data-embedparams="embed=wp"' ;
                    }
                    if ($attributes['type'] != 'date-picker') {
                        $embed_variables['$embed_type'] = 'data-puzzleType="' . sanitize_text_field($attributes['type']) . '"';
                        if (isset($attributes['id'])) {
                            $embed_variables['$id'] = 'data-id="' . sanitize_text_field($attributes['id']) . '"';
                        } else {
                            return "Puzzle ID is missing in the shortcode. Please use the correct shortcode from your PuzzleMe dashboard.";
                        }
                    } else {
                        $embed_variables['$embed_type'] = 'data-page="date-picker"';
                    }
                    if (isset($attributes['attribution'])) {
                        $embed_variables['$attribution_text'] = wp_kses($attributes['attribution'], $attributionHTMLTags);
                        return wp_kses(strtr($embed_html_attributions, $embed_variables), $allowedHTMLtags);
                    } else {
                        return wp_kses(strtr($embed_html, $embed_variables), $allowedHTMLtags);
                    }

                } else {
                    return "Invalid puzzle type is present in the shortcode. Please use the correct shortcode from your PuzzleMe dashboard.";
                }

            } else {
                return "Puzzle type is missing in the shortcode. Please use the correct shortcode from your PuzzleMe dashboard.";
            }

        } else {
            return "Set is missing in the shortcode. Please use the correct shortcode from your PuzzleMe dashboard.";
        }
    }
}

add_shortcode('puzzleme', 'puzzleme_iframe_generator');

?>