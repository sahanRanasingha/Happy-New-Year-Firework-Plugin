<?php
/**
 * Plugin Name: Happy New Year Firework
 * Description: Display fireworks for the New Year using fireworks-js.
 * Version: 1.0
 * Author: Sahan Ranasingha
 * Author URI: https://sahanranasingha.me
 * Plugin URI:  https://sahanranasingha.me/portfolio/happy-new-year-firework/
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function hny_firework_enqueue_assets() {
    wp_enqueue_script( 'fireworks-js', 'https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js', array(), '2.0', true );
    
    wp_enqueue_style( 'hny-firework-styles', plugin_dir_url( __FILE__ ) . 'assets/styles.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'hny_firework_enqueue_assets' );

function hny_firework_display_container() {
    echo '<div class="fireworks"></div>';
}
add_action( 'wp_footer', 'hny_firework_display_container' );

function hny_firework_initialize_script() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.fireworks');
            const fireworks = new Fireworks.default(container, {
                autoresize: true,
                opacity: 0.5,
                acceleration: 1.02,
                friction: 0.97,
                gravity: 1.5,
                particles: 60, 
                traceLength: 3,  
                traceSpeed: 10,  
                explosion: 5,    
                intensity: 30,   
                flickering: 50,  
                lineStyle: 'round',
                hue: {
                    min: 0,
                    max: 345
                },
                delay: {
                    min: 30,
                    max: 60
                },
                rocketsPoint: {
                    min: 50,
                    max: 50
                },
                lineWidth: {
                    explosion: {
                        min: 1,
                        max: 4
                    },
                    trace: {
                        min: 0.1,
                        max: 1
                    }
                },
                brightness: {
                    min: 50,
                    max: 80
                },
                decay: {
                    min: 0.015,
                    max: 0.03
                },
                mouse: {
                    click: false,
                    move: false,
                    max: 1
                }
            });
            fireworks.start();
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'hny_firework_initialize_script', 20 );
