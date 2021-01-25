<?php
/*
    Copyright (C) 2020 R4356th and GrahamSH
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
    
    Embedding Snap! projects in MediaWiki using <snap> tag
*/

if (!defined('MEDIAWIKI')) {
    die( 'Snap! Project Embed requires MediaWiki 1.35 or later to run.' );
}
class EmbedSnap{ 
	// Register <snap> and <snap-project> tags
	public static function parserEmbedSnap (&$parser) {
	    $parser->setHook('snap', array(__CLASS__,'renderEmbedSnap'));
	    $parser->setHook('snap-project', array(__CLASS__,'renderEmbedSnap'));
	    return true;
	}
	
	public static function renderEmbedSnap ($input, $argv, $parser) { // Function to render the iframes for the <snap> tags
		$project = '';
		$user = '';
		$width = $width_max = 930;
		$height = $height_max = 600;
		$edit = '';
		$taa = '';
		$pause = '';
		$hide = '';
		$elementtorender = '';
	
		if ( !empty( $argv['project'])) { // Arguments passed to the parser
			$project=$argv['project'];
		} elseif (!empty($input)){
			$project=$input;
		}
		if ( !empty( $argv['user'])) {
			$user = $argv['user'];
		} elseif (!empty($input)) {
			$user = $input;
		}
		if ( !empty( $argv['edit'])) {
			$edit = $argv['edit'];
		} elseif (!empty($input)) {
			$edit = $input;
		} else {
			$edit = 'true'; 
		}
		if ( !empty( $argv['taa'])) {
			$taa = $argv['taa'];
		} elseif (!empty($input)) {
			$taa = $input;
		} else {
			$taa = 'true'; 
		}
		if ( !empty( $argv['pause'])) {
			$pause = $argv['pause'];
		} elseif (!empty($input)) {
			$pause = $input;
		} else {
			$pause = 'true'; 
		}
		if ( !empty( $argv['hide'])) {
			$hide = $argv['hide'];
		} elseif ( !empty($input)) {
			$hide = $input;
		} else {
			// Show the project by default
			$hide = 'false';
		}
                
		// Logic to deal with height and width
		if (
			!empty( $argv['width'] ) &&
			settype( $argv['width'], 'integer' ) &&
			( $width_max >= $argv['width'] )
		) 
		{
			$width = $argv['width'];
		}
		else {
			$width = 480;
		}
		if (
			!empty( $argv['height'] ) &&
			settype( $argv['height'], 'integer' ) &&
			( $height_max >= $argv['height'] )
		)
		{
			$height = $argv['height'];
		}
		else {
			$height = 390;
		}
        
		$iframe = Html::element( 'iframe', [
			'class' => 'snap-project',
			'allowfullscreen',
			'allow' => 'geolocation; microphone; camera',
			'frameborder' => '0',
			'allowtransparency' => 'true',
			'width' => $width,
			'height' => $height,
			'src' => 'https://snap.berkeley.edu/embed?project=' . $project . '&user=' . $user . '&showTitle=' . $taa . '&showAuthor=' . $taa . '&editButton=' . $edit . '&pauseButton=' . $pause,
		]);
		
		if ($hide == 'true') {
			$elementtorender = Html::openElement('details') . Html::openElement('summary') . Html::closeElement('summary') . $iframe . Html::closeElement('details');
		} elseif ( $hide == 'false') {
			$elementtorender = $iframe;
		}
		if (!empty($project)) { 
			if (!empty($user)) { 
			return ( // If both user and project values are given, it renders the proper iframe.
				$elementtorender
			);
			} else {
				// If the user value is empty it can't render the iframe and returns an error instead. 
				return wfMessage( 'error-username' )->text();
			}
		} else {
			// If the project value is empty, then it also can't render the iframe and returns an error instead.
			return wfMessage( 'error-project' )->text();
		}
	}
}
