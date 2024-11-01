<?php
/**
 * Plugin Name: Weekly Shabbat Times
 * Plugin URI: http://aaronreimann.com
 * Description: Grabs JSON string from hebcal.com and enables shortcodes display the information dynamically
 * Version: 1.1.0
 * Author: areimann, jfennell
 */

namespace Hebcal;

define( 'HEBCAL', __FILE__ );

class HebCal_Plugin {

	static function load() {
		// for the shortcode
		add_shortcode( 'hebcal_sc', array( __CLASS__, 'retreiveItems' ) );

		// so we can use the shortcode in the_title(); of pages/posts
		add_filter( 'the_title', array( __CLASS__, 'shortcode_title' ), 10, 1 );
	}

	static function fetch( $zip, $longitude, $latitude, $tzid ) {
		$json_obj = get_transient( 'hebcal_json' );
		if ( ! $json_obj ) {

			if ( $zip != NULL ) {
                $url = 'https://www.hebcal.com/shabbat/?cfg=json&zip=' . $zip;
            } else {
                $url = 'https://www.hebcal.com/shabbat/?cfg=json&geo=pos&longitude=' . $longitude . '&latitude=' . $latitude . '&tzid=' .$tzid;
            }

			$json_string = file_get_contents( $url );

			$json_obj = json_decode( $json_string );

			set_transient( 'hebcal_json', $json_obj, 60 * 15 );
		}

		return $json_obj;
	}

	static function retreiveItems( $atts ) {
		$atts = shortcode_atts( array(
			'param'    => 'title',
			'category' => 'parashat',
			'zip'      => '',
            'longitude' => '',
            'latitude' => '',
            'tzid' => ''
		), $atts );

		$json_obj = self::fetch( $atts['zip'], $atts['longitude'], $atts['latitude'], $atts['tzid'] );


		$string = '';

		if ( property_exists( $json_obj, 'items' ) ) {

			foreach ( $json_obj->items as $item ) {

				/*
				 * if the shortcode's category equals current items category then set the var and return that
				 */
				if ( $item->category == $atts['category'] ) {
					$string = $item->{$atts['param']};
				}

			}

		}

		return $string;
	}

	static function shortcode_title( $title ) {
		return do_shortcode( $title );
	}

}

HebCal_Plugin::load();