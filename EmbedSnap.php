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
    
    Embedding Snap! projects in MediaWiki using <snap> Tag
*/

if (!defined('MEDIAWIKI')) {
    die();
}
class EmbedSnap{
	public static function parserEmbedSnap (&$parser) {
	    $parser->setHook('snap', array(__CLASS__,'renderEmbedSnap'));
	    return true;
	}
	
	function renderEmbedSnap ($input, $argv, $parser) {
		$project = '';
		$user = '';
		$width = $width_max = 930;
		$height = $height_max = 600;
	
		if ( !empty( $argv['project'])) {
			$project=$argv['project'];
		} elseif (!empty($input)){
			$project=$input;
		}
		if ( !empty( $argv['user'])) {
			$user = $argv['user'];
		} elseif (!empty($input)) {
			$user = $input;
		}
		$project = htmlspecialchars($project, ENT_QUOTES);
		$user = htmlspecialchars($user, ENT_QUOTES);
		if (
			!empty( $argv['width'] ) &&
			settype( $argv['width'], 'integer' ) &&
			( $width_max >= $argv['width'] )
		)
		{
			$width = $argv['width'];
		}
		if (
			!empty( $argv['height'] ) &&
			settype( $argv['height'], 'integer' ) &&
			( $height_max >= $argv['height'] )
		)
		{
			$height = $argv['height'];
		}
		if (!empty($project)) {
			if (!empty($user)) {
			return (
				"<div style=\"max-width:{$width}px\">"
				. "<div style=\"position:relative;padding-top:"
				. $height / $width * 100
				. "%\">"
				. "<iframe "
				. "allowfullscreen "
				. "allow = \"geolocation; microphone; camera\" "
				. "frameborder=\"0\" "
				. "allowtransparency=\"true\" "
				. "width=\"100%\" height=\"100%\" "
				. "src=\"https://snap.berkeley.edu/embed?project={$project}&user={$user}&showTitle=true&showAuthor=true&editButton=true&pauseButton=true\" "
				. ">"
				. "</iframe>"
				. "</div></div>"
			);
			} else {
				return "";
			}
		} else {
			return "";
		}
	}
}
