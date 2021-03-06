=== Maintenance Mode (Coming Soon Page) ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: maintenance, mode, coming, soon, page
Requires at least: 4.4
Tested up to: 4.9
Requires PHP: 7.0
Multisite support: No
Stable tag: 1.0.7
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: MTNCMD

Minimalistic plugin with a simple one-click on/off switch and zero settings to worry about, featuring default WordPress styling without any images.

== Description ==

Minimalistic plugin with a simple one-click on/off switch and zero settings to worry about, featuring default WordPress styling without any images.

* [**Join our FREE Facebook group for support**](https://www.facebook.com/groups/littlebizzy/)
* [**Want to help us out with a 5-star review? Thank you!**](https://wordpress.org/support/plugin/cf-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/maintenance-mode)
* [Plugin GitHub](https://github.com/littlebizzy/maintenance-mode)

Our related OSS projects:

* [SlickStack (LEMP stack automation)](https://slickstack.io)
* [WP Lite boilerplate](https://wplite.org)
* [Starter Theme](https://starter.littlebizzy.com)

#### The Long Version ####

One click activation!! Very easy to activate (single click) and lightweight design.

Very simple design with minimal database involvement. Only database usage is saving a few options to the wp_options table using transients which are cached in the Options API cache in WordPress.

Simply install the plugin, then go to Settings page and click Enable checkbox. Next, choose either Maintenance Mode (default) which issues a 503 HTTP header (site temporarily unavailable) or Coming Soon option wih 200 HTTP code.

Uninstalling this plugin will deleting all data from the database to avoid conflicts.

No images or heavy styling, simple default WordPress styling only.

For versions 1.0.X no WYSIWIG or customization of the messages, we may add in next version though.

#### Compatibility ####

This plugin has been designed for use on LEMP (Nginx) web servers with PHP 7.0 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and security reasons, we highly recommend against using WordPress Multisite for the vast majority of projects.

#### Defined Constants ####

The following defined constants are supported by this plugin:

* `define('DISABLE_NAG_NOTICES', true);`

#### Plugin Features ####

* Settings Page: No
* Premium Version Available: No)
* Includes Media (Images, Icons, Etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * Options: Yes
  * Creates New Tables: No
* Database Queries: Frontend + Backend (Options API)
* Must-Use Support: Yes (Use With [Autoloader](https://github.com/littlebizzy/autoloader))
* Multisite Support: No
* Uninstalls Data: Yes

#### WP Admin Notices ####

This plugin generates multiple [Admin Notices](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices) in the WP Admin dashboard. The first is a notice that fires during plugin activation which recommends several related free plugins that we believe will enhance this plugin's features; this notice will re-appear approximately once every 6 months as our code and recommendations evolve. The second is a notice that fires a few days after plugin activation which asks for a 5-star rating of this plugin on its WordPress.org profile page. This notice will re-appear approximately once every 9 months. These notices can be dismissed by clicking the **(x)** symbol in the upper right of the notice box. These notices may annoy or confuse certain users, but are appreciated by the majority of our userbase, who understand that these notices support our free contributions to the WordPress community while providing valuable (free) recommendations for optimizing their website.

If you feel that these notices are too annoying, than we encourage you to consider one or more of our upcoming premium plugins that combine several free plugin features into a single control panel, or even consider developing your own plugins for WordPress, if supporting free plugin authors is too frustrating for you. A final alternative would be to place the defined constant mentioned below inside of your `wp-config.php` file to manually hide this plugin's nag notices:

    define('DISABLE_NAG_NOTICES', true);

Note: This defined constant will only affect the notices mentioned above, and will not affect any other notices generated by this plugin or other plugins, such as one-time notices that communicate with admin-level users.

Code inspiration:

* [Lukas Juhas Maintenance Mode](https://wordpress.org/plugins/lj-maintenance-mode/)

#### Recommended Plugins ####

We invite you to check out a few other related free plugins that our team has also produced that you may find especially useful:

* [404 To Homepage](https://wordpress.org/plugins/404-to-homepage-littlebizzy/)
* [CloudFlare](https://wordpress.org/plugins/cf-littlebizzy/)
* [Delete Expired Transients](https://wordpress.org/plugins/delete-expired-transients-littlebizzy/)
* [Disable Admin-AJAX](https://wordpress.org/plugins/disable-admin-ajax-littlebizzy/)
* [Disable Author Pages](https://wordpress.org/plugins/disable-author-pages-littlebizzy/)
* [Disable Cart Fragments](https://wordpress.org/plugins/disable-cart-fragments-littlebizzy/)
* [Disable Embeds](https://wordpress.org/plugins/disable-embeds-littlebizzy/)
* [Disable Emojis](https://wordpress.org/plugins/disable-emojis-littlebizzy/)
* [Disable Empty Trash](https://wordpress.org/plugins/disable-empty-trash-littlebizzy/)
* [Disable Image Compression](https://wordpress.org/plugins/disable-image-compression-littlebizzy/)
* [Disable jQuery Migrate](https://wordpress.org/plugins/disable-jq-migrate-littlebizzy/)
* [Disable Search](https://wordpress.org/plugins/disable-search-littlebizzy/)
* [Disable WooCommerce Status](https://wordpress.org/plugins/disable-wc-status-littlebizzy/)
* [Disable WooCommerce Styles](https://wordpress.org/plugins/disable-wc-styles-littlebizzy/)
* [Disable XML-RPC](https://wordpress.org/plugins/disable-xml-rpc-littlebizzy/)
* [Download Media](https://wordpress.org/plugins/download-media-littlebizzy/)
* [Download Plugin](https://wordpress.org/plugins/download-plugin-littlebizzy/)
* [Download Theme](https://wordpress.org/plugins/download-theme-littlebizzy/)
* [Duplicate Post](https://wordpress.org/plugins/duplicate-post-littlebizzy/)
* [Export Database](https://wordpress.org/plugins/export-database-littlebizzy/)
* [Force HTTPS](https://wordpress.org/plugins/force-https-littlebizzy/)
* [Force Strong Hashing](https://wordpress.org/plugins/force-strong-hashing-littlebizzy/)
* [Google Analytics](https://wordpress.org/plugins/ga-littlebizzy/)
* [Header Cleanup](https://wordpress.org/plugins/header-cleanup-littlebizzy/)
* [Index Autoload](https://wordpress.org/plugins/index-autoload-littlebizzy/)
* [Maintenance Mode](https://wordpress.org/plugins/maintenance-mode-littlebizzy/)
* [Profile Change Alerts](https://wordpress.org/plugins/profile-change-alerts-littlebizzy/)
* [Remove Category Base](https://wordpress.org/plugins/remove-category-base-littlebizzy/)
* [Remove Query Strings](https://wordpress.org/plugins/remove-query-strings-littlebizzy/)
* [Server Status](https://wordpress.org/plugins/server-status-littlebizzy/)
* [StatCounter](https://wordpress.org/plugins/sc-littlebizzy/)
* [View Defined Constants](https://wordpress.org/plugins/view-defined-constants-littlebizzy/)
* [Virtual Robots.txt](https://wordpress.org/plugins/virtual-robotstxt-littlebizzy/)

#### Premium Plugins ####

We invite you to check out a few premium plugins that our team has also produced that you may find especially useful:

* [Speed Demon](https://www.littlebizzy.com/plugins/speed-demon)
* [SEO Genius](https://www.littlebizzy.com/plugins/seo-genius)
* [Great Migration](https://www.littlebizzy.com/plugins/great-migration)
* [Security Guard](https://www.littlebizzy.com/plugins/security-guard)
* [Genghis Khan](https://www.littlebizzy.com/plugins/genghis-khan)

#### Special Thanks ####

We thank the following groups for their generous contributions to the WordPress community which have particularly benefited us in developing our own free plugins and paid services:

* [Automattic](https://automattic.com)
* [Brad Touesnard](https://bradt.ca)
* [Daniel Auener](http://www.danielauener.com)
* [Delicious Brains](https://deliciousbrains.com)
* [Greg Rickaby](https://gregrickaby.com)
* [Matt Mullenweg](https://ma.tt)
* [Mika Epstein](https://halfelf.org)
* [Mike Garrett](https://mikengarrett.com)
* [Samuel Wood](http://ottopress.com)
* [Scott Reilly](http://coffee2code.com)
* [Jan Dembowski](https://profiles.wordpress.org/jdembowski)
* [Jeff Starr](https://perishablepress.com)
* [Jeff Chandler](https://jeffc.me)
* [Jeff Matson](https://jeffmatson.net)
* [John James Jacoby](https://jjj.blog)
* [Leland Fiegel](https://leland.me)
* [Rahul Bansal](https://profiles.wordpress.org/rahul286)
* [Roots](https://roots.io)
* [rtCamp](https://rtcamp.com)
* [Ryan Hellyer](https://geek.hellyer.kiwi)
* [WP Chat](https://wpchat.com)
* [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep the above mentioned goals in mind, thanks!

== Installation ==

1. Upload to `/wp-content/plugins/maintenance-mode-littlebizzy`
2. Activate via WP Admin > Plugins
3. Change settings at `/wp-admin/options-general.php?page=maintenance`

== FAQ ==

= What HTTP header codes does this plugin send? =

It issues a 503 for Maintenance Mode and a 200 for Coming Soon.

= Any custom CSS or images loaded in this plugin? =

No, it's very light and minimal, using default WordPress styling only.

= How can I change this plugin's settings? =

Visit the settings page to enable maintenance mode or preview how it will look.

    `/wp-admin/options-general.php?page=maintenance`

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, we kindly ask that you post your feedback on the wordpress.org support forums by tagging this plugin in your post. If needed, you may also contact our homepage.

== Changelog ==

= 1.0.7 =
* updated plugin meta

= 1.0.6 =
* added "Refresh" hyperlink to splash page (works with or without javascript enabled)
* tweaked splash page language
* updated plugin meta

= 1.0.5 =
* fixed splash page language error

= 1.0.4 =
* tweaked splash page language
* added warning for Multisite installations
* updated recommended plugins

= 1.0.3 =
* tested with WP 4.9
* added support for `DISABLE_NAG_NOTICES`
* updated recommended plugins
* added rating request notice
* optimized plugin code

= 1.0.2 =
* added recommended plugins notice

= 1.0.1 =
* tweaked settings page URI for simplicity
* tweaked preview link URI to avoid query string conflicts
* optimized plugin code

= 1.0.0 =
* initial release
* tested with PHP 7.0
