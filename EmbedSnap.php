<?php
/*
    Copyright (C) 2020 R4356th
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
    die();
}
class EmbedSnap{ 
	public static function parserEmbedSnap (&$parser) {
	    $parser->setHook('snap', array(__CLASS__,'renderEmbedSnap')); // Hook for the <snap> tags
	    return true;
	}
	
	function renderEmbedSnap ($input, $argv, $parser) { // Function to render the iframes for the <snap> tags
		$project = '';
		$user = '';
		$width = $width_max = 930;
		$height = $height_max = 600;
	
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
		$project = htmlspecialchars($project, ENT_QUOTES); // Cleaning up inputs
		$user = htmlspecialchars($user, ENT_QUOTES);
		if (
			!empty( $argv['width'] ) &&
			settype( $argv['width'], 'integer' ) &&
			( $width_max >= $argv['width'] )
		) // Logic to deal with height and width
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
		if (!empty($project)) { 
			if (!empty($user)) { 
			return ( // If both user and project values are given, it renders the proper iframe.
				"<div style=\"max-width:{$width}px\">"
				. "<div>"
				. "<iframe "
				. "allowfullscreen "
				. "allow = \"geolocation; microphone; camera\" "
				. "frameborder=\"0\" "
				. "allowtransparency=\"true\" "
				. "width=\"{$width}\" height=\"{$height}\" "
				. "src=\"https://snap.berkeley.edu/embed?project={$project}&user={$user}&showTitle=true&showAuthor=true&editButton=true&pauseButton=true\" "
				. ">"
				. "</iframe>"
				. "</div></div>"
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
