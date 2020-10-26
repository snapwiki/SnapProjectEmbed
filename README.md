# Snap! Project Embed

A MediaWiki extension for embedding Snap! projects

# Usage

Loading a project default width and height:
`<snap project="project-name" user="user">`
Loading a project with custom width and height:
`<snap project="project-name" user="user" width="width" height="height">`

# Installation

1. Clone this repository with Git into your "Extensions" folder using the following command:

```Bash
git clone https://github.com/snapwiki/SnapProjectEmbed.git
```

2. Update LocalSettings.php to add the following line:

```PHP
wfLoadExtension('SnapProjectEmbed');
```

3. Go to Special:Version in your wiki and look at the "Installed extensions" section. It should now list SnapProjectEmbed and its version, license and contributors.

# Credits

A big thank you to @GrahamSH for all his help and mw-embedScratch contributors which was our design inspiration.

# Legal

SnapProjectEmbed - A MediaWiki extension that allows embedding Snap! projects.

Copyright (C) 2020 R4356th

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <https://www.gnu.org/licenses/>.
