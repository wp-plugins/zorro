=== Plugin Name ===
Contributors: tricd
Tags: security, spam
Requires at least: 3.8
Tested up to: 4.1.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Zorro plugin help you to basically secure your WordPress installation.

== Description ==

With Zorro you will enable some basic security settings for your WordPress installation. The current version adds
the following features:

* removes version indicator from html head and rss feed
* removes version parameter from enqueued styles and scripts
* disables text from login screen which can used to brute force usernames
* removes pingback, super cache and x powered by header
* adds x-frame-option with SAMEORIGIN policy

More features will hopefully come in future versions

== Installation ==

You can just download to plugin through the WordPress Plugin Repository or install it manually:

1. Upload `zorro.php` to the `/wp-content/plugins/zorro` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Done.

== Frequently Asked Questions ==

= Does this plugin secures me 100%? =

No. It just helps you to add some basic security settings. Depending on your plugins and themes you might be at risk anyway.


== Changelog ==

= 0.1 =
* Initial release with some basic settings