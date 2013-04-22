<?php
/*
Plugin Name: Makerspace
Version: 0.1-alpha
Description: Pulling Makerspace functions from the theme, and adding them to a plugin. This way if theme changes in the future, functions remain intact.
Author: Jake Spurlock
Author URI: http://jakespurlock.com
Plugin URI: http://makerspace.com
Text Domain: makerspace
Domain Path: /languages
*/

function mms_directory() {
	//get_leads($form_id, $sort_field_number=0, $sort_direction='DESC', $search='', $offset=0, $page_size=30, $star=null, $read=null, $is_numeric_sort = false, $start_date=null, $end_date=null, $status='active'){
	$entries = RGFormsModel::get_leads( 2, '1', 'ASC', '', '0', 1000 );
	$output = '<table class="gf_directory widefat fixed">
		<thead>
			<tr>
				<th style="text-align:left;">Makerspace Name</th>
				<th style="text-align:left;">City</th>
				<th style="text-align:left;">State</th>
			</tr>
		</thead>';
	$i = 1;
	error_reporting('E_ALL');
	foreach ($entries as $entry) {
		$output .= '<tr class="' . ( $i%2 ? 'odd':'even' ) . '">';
		$output .= '<td style="text-align:left;"><a href="' . esc_url( $entry['2'] ) . '">' . $entry['1'] . '</a></td>';
		$output .= '<td style="text-align:left;">' . $entry['11'] . '</td>';
		$output .= '<td style="text-align:left;">' . $entry['12'] . '</td>';
		$output .= '</tr>';
		$i++;
	}
	$output .= '</table>';
	return $output;
}