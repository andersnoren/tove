=== Tove ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 5.8
Requires PHP: 5.6
Tested up to: 5.8
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Make sure the Gutenberg plugin (version 11.5 or newer) is active
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

Version 0.2.4 (2021-10-XX)
-------------------------
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