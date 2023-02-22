=== Tove ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 6.1
Requires PHP: 5.6
Tested up to: 6.1
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Make sure the Gutenberg plugin (version 12.1 or newer) is active
3. Activate the theme


== Licenses ==

Tove is derived from the TT1 Blocks theme, Copyright (c) 2020 WordPress.org. 
TT1 Blocks is distributed under the terms of the GNU GPL version 2.0.

Screenshot assets: Coffee cup logo, hero image and illustrations by Anders Norén
License: Creative Commons Zero (CC0), https://creativecommons.org/publicdomain/zero/1.0/

Coffee cup logo typeface: DM Mono
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://fonts.google.com/specimen/DM+Mono/

All placeholder illustrations (in /assets/images/illustrations/) by Anders Norén
License: Creative Commons Zero (CC0), https://creativecommons.org/publicdomain/zero/1.0/

Tove bundles the following third-party resources:

DM Sans font
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://fonts.google.com/specimen/DM+Sans/

Code from Blockbase
Copyright (c) 2021 Automattic Inc.
License: GPLv2, https://www.gnu.org/licenses/gpl-2.0.html
Source: https://wordpress.org/themes/blockbase/
Included as part of:
	- tove_get_google_fonts_url(), for building a Google Fonts request URL from fonts set in theme.json

== Special Thanks ==

To theme.json trailblazers helping Tove find her way, including:

– Carolina Nymark and fullsiteediting.com
– Ellen and Manuel at Elma Studio
– Ana at Anariel Design
– Rich Tabor
– The Automattic theme wranglers

== Changelog ==

Version 0.8 (2023-02-22)
-------------------------
- Merged all CSS files in /assets/css/ into style.css.
	- Moved a bunch of styles to theme.json.
	- Updated the enqueue structure to load style.css as an editor style, and on the front-end.
	- Unified the shaded block style to remove redundant CSS.
- Added WordPress 6.1 support.
	- Theme.json: Added spacingSizes.
	- Theme.json: Added element styles for button, heading, caption, and link, and removed the CSS it replaces.
	- Enabled fluid font sizes in theme.json.
	- Enabled useRootPaddingAwareAlignments in theme.json.
	- Enabled blockGap in theme.json.
	- Updated "Requires at least" and "Tested up to" to 6.1.
- Added the loop.html template part.
- Simplified the comments, and removed a bunch of custom comments styles.
- Columns Block: Removed the horizontal separators block style, since it can't be done reliably in WordPress 6.1.
- Footer patterns: Adjusted spacing for new features.

Version 0.7.1 (2022-10-07)
-------------------------
- Removed index.php, since it's no longer needed to pass the WordPress.org automatic theme review.

Version 0.7 (2022-09-27)
-------------------------
- Moved the block patterns to the /patterns/ folder, and bumped "Requires at least" to WordPress 6.0.
- Updated footer.html and header.html to use `<!-- wp:pattern /-->` to include the default pattern for the respective template part.
- Added the comments.html template part, and replaced `<!-- wp:post-comments /-->` with the new `<!-- wp:comments-query-loop -->` block.
- Removed comments styling that is no longer needed after this change.

Version 0.6 (2022-06-29)
-------------------------
- Updated Tove to use local fonts with the new fontFamily theme.json setting. This replaces the old PHP based Google Fonts solution.
- Bumped "Tested up to" to 6.0.

Version 0.5 (2021-12-10)
-------------------------
- Gutenberg 12.1:
	- Renamed the block-templates folder to templates, and the block-template-parts folder to parts.
	- Updated theme.json to v2.
	- Added the theme.json schema.
	- Opted in to the new "appearanceTools" theme.json setting.
	- Updated targeting of alignwide elements outside of the post content.
	- Updated justification property of navigation block in header block patterns.
	- Updated header and footer template patterns to work with new Core markup structure and Tove styles.
	- Updated navigation json in block patterns.
	- Updated theme description to indicate that Gutenberg 12.1 is required.

Version 0.4.2 (2021-11-06)
-------------------------
- Gutenberg 11.8:
	- Updated block patterns and template files to use the new margin controls instead of theme specific margin classes, where possible.
	- Comments block: Updated to work with the new markup structure and the new Gutenberg styles.
	- Query Pagination block: Updated in index.html and bundled patterns to use flex controls, added arrows by default.
- Patterns: Improved spacing settings after adding blockGap in 0.4.

Version 0.4.1 (2021-10-30)
-------------------------
- Gutenberg 11.8:
	- tove_setup(): Removed add_theme_support() calls no longer needed thanks to Gutenberg updates.
	- Fixed an issue with centered Site Logo block in Gutenberg 11.8 (thanks, @kense20xx).
	- Updated theme description to mention requirement of Gutenberg 11.8.
- Cleaned up the CSS a bit.

Version 0.4 (2021-10-16)
-------------------------
- Gutenberg 11.7:
	- Navigation block: Updated spacing in the modal to work with new Core styles.
	- Query Pagination block: Updated to match new markup structure.
	- Opted into blockGap to get support for the "Block Spacing" setting for columns and other blocks.
		- Removed the "No Gutter" columns block style, since columns now support the "Block Spacing" setting.
		- Moved the --wp--style--block-gap CSS variable overwrite for the block from blocks.css to theme.json.
- Dumped the entire Base Margins code block in blocks.css, since blockGap and theme.json margins will handle that instead.
- Post thumbnail block: Added a base vertical margin in theme.json.
- Separator block: Moved margins to theme.json.
- Query Loop block: Dumped a bunch of structural columns styles in blocks.css in anticipation of blockGap support here as well. 
- Buttons block: Added blockGap variable in theme.json, and changed blocks.css to use it until the Site Editor controls for it are in place in Core.
- Navigation block: Fixed the sub menu hover helper pseudo being visible on mobile.
- Paragraph block: Switched to blockGap.
- Updated theme description to mention requirement of Gutenberg 11.7.
- Block Patterns:
	- restaurant-opening-hours-big.php: Removed no margin classes to handle changes caused by blockGap support.

Version 0.3 (2021-10-08)
-------------------------
- Typography:
	- In theme.json, moved all typography related custom properties to the new typography key.
	- Updated font sizes to use clamp(), based on the approach [suggested by Rich Tabor](https://richtabor.com/fluid-type-scale-theme-json/), and removed the CSS for it from shared.css.
- Fixed non-alignfull sections missing a horizontal margin in the Site Editor preview since 0.2.3.
- Fixed the navigation button being styled incorrectly in the Site Editor preview after style updates in Gutenberg 11.6.

Version 0.2.3 (2021-10-07)
-------------------------
- Fixed alignfull sections having a horizontal margin in the Site Editor preview since 0.2.

Version 0.2.2 (2021-10-06)
-------------------------
- Post Content block:
	- Only give children a width attribute when the Post Content block is set to full alignment, preventing extra margins when the block is used outside of the singular content context.
	- Added a base vertical margin to the block.

Version 0.2.1 (2021-10-05)
-------------------------
- single.html and page.html: Fixed the alignment of the post header and featured image after 2.0.0 style updates.

Version 0.2 (2021-10-03)
-------------------------
- Reworked the styles setting the base block width and horizontal margins.
	- Updated them to work with the Site Editor markup and moved them to shared.css.
	- Updated to work with the template part focus mode in Gutenberg 11.6.
	- Updated the targeting to work with blocks being added outside of the header, main and footer elements.
	- Updated the template files to work with the new structure (by setting layout to inherit on main), and simplified some nested groups.
	- Adjusted handling of .wp-block-template-part with background color.
- Fixed the $dependencies variable being misspelled when enqueuing styles.
- Navigation block:
	- Fixed an issue with excessive vertical margins.
	- Updated styles to match new markup in 11.6.
	– Reduced theme navigation styles overall.

Version 0.1.5 (2021-09-30)
-------------------------
- Query Block: Fixed subsequent list items having a top margin in the editor preview (thanks, Helen!).

Version 0.1.4 (2021-09-28)
-------------------------
- Fixed the Query Pagination block in single.html extending to the edge of the screen.

Version 0.1.3 (2021-09-20)
-------------------------
- Added demo link to the style.css theme description.
- Removed the enqueue of style.css on the front-end, since it doesn't contain any actual CSS.

Version 0.1.2 (2021-09-17)
-------------------------
- Fixes to the blog block patterns and the default blog page template.
- Social Links block: Tweaked margins of the "Logos Only" style.

Version 0.1.1 (2021-09-17)
-------------------------
- Removed non-Full Site Editing code required to pass the automatic upload check.

Version 0.1 (2021-09-17)
-------------------------