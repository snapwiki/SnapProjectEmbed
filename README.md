# Snap! Project Embed

MediaWiki extension for embedding Snap! projects

# Usage

Loading a project default width and height:
`<snap project="project-name" user="user">`
Loading a project with custom width and height:
`<snap project="project-name" user="user" width="width" height="height">`

# Installation

1. Clone this repository with Git using the following command:

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
