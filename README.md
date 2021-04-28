[![Build Status](https://img.shields.io/github/workflow/status/snapwiki/SnapProjectEmbed/Check%20PHP?style=flat-square)](https://github.com/snapwiki/SnapProjectEmbed/actions)
[![code style: prettier](https://img.shields.io/badge/code_style-prettier-ff69b4.svg?style=flat-square)](https://github.com/prettier/prettier)

# Snap! Project Embed

A MediaWiki extension for embedding Snap! projects

# Usage

- Loading a project with Snap<i>!</i>'s default width and height:
  `<snap project="project-name" user="user" />`
- Loading a project with custom width and height:
- `<snap project="project-name" user="user" width="width" height="height" />`
- Loading a project without showing the title and author of the project (defaults to true):
  `<snap project="project-name" user="user" width="width" taa="false" />`
- Loading a project without the edit button (defaults to true):
  `<snap project="project-name" user="user" edit="false" />`
- Loading a project without the pause button (defaults to true):
  `<snap project="project-name" user="user" pause="false" />`
- Loading a project inside a HTML details tag to make it visible only after an arrow has been clicked (defaults to false):
  `<snap project="project-name" user="user" hide="true" />`

You can also use the extension like this- `<snap project="project-name" user="user"></snap>`. Additionally, instead of using the `<snap>` tag, you can also use the `<snap-project>` tag.

# Filesystem

```bash
.
└── 📂 i18n # Translations for extension
    └── 📜 en.json # English translation and strings
    └── 📜 bn.json # Bengali translation and strings
    └── 📜 it.json # Italian translation and strings
    └── 📜 eo.json #  Esperanto translation and strings
└── 📜 extension.json # Extension manifest
└── 📜 EmbedSnap.php # Main extension parser
```

# Installation

1. Clone this repository with Git into your "Extensions" folder using the following command:

```Bash
git clone https://github.com/snapwiki/SnapProjectEmbed.git
```

2. Update LocalSettings.php to add the following line:

```PHP
wfLoadExtension( 'SnapProjectEmbed' );
```

3. Go to Special:Version in your wiki and look at the "Installed extensions" section. It should now list SnapProjectEmbed and its version, license and contributors.

# Credits

A big thank you to mw-embedScratch contributors which was our design inspiration.

# Legal

SnapProjectEmbed - A MediaWiki extension that allows embedding Snap! projects.

Copyright (C) 2020-2021 R4356th and GrahamSH

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

# Old Versions

The current version of Snap! Project Embed is 2.0.0. If you would like to use an older version, please switch to its respective branch-

1.1.0: v1.1
2.0.0: v2
2.1.0: v2.1
