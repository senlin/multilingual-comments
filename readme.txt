=== Multilingual Comments WPML ===
Contributors: senlin
Tags: WPML, merge comments, all comments, all languages, combine comments
Donate link: https://so-wp.com/donations
Requires at least: 4.9
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.2.1
License: GPL-3.0+
License URI: https://www.gnu.org/licenses/gpl-3.0.txt

This plugin combines comments from all translations of the posts and pages using WPML.

== Description ==
This plugin combines comments from all translations of the posts and pages using WPML. Comments are internally still attached to the post or page in the language they were made on.
Naturally the WPML plugin is required to run.

This is a fixed version of the no longer maintained WPML Comment Merging plugin:
https://wordpress.or/plugins/wpml-comment-merging/ and https://github.com/JulioPotier/wpml-comments-merging

There are no Settings, it simply does what it says on the label.

This plugin was developed with the assistance of ChatGPT, an AI language model created by [OpenAI](https://www.openai.com/).

If you are looking to show comments in all languages on your website with WPML installed, I highly recommend installing the Multilingual Comments WPML plugin.

<hr>

I support this plugin exclusively through [Github](https://github.com/senlin/multilingual-comments-wpml/issues). Therefore, if you have any questions, need help and/or want to make a feature request, please open an issue here. You can also browse through open and closed issues to find what you are looking for and perhaps even help others.

Thanks for your understanding and cooperation.

If you like the Multilingual Comments WPML plugin, please consider leaving a [review](https://wordpress.org/support/view/plugin-reviews/multilingual-comments-wpml?rate=5#postform). Thanks!

Multilingual Comments WPML by [Pieter Bos](https://so-wp.com/plugin/multilingual-comments-wpml).

== Frequently Asked Questions ==

= Where are the Settings? =

You can stop looking, there are no settings. This plugin works out of the box.

= Why is the plugin showing an error message after activation? =

This plugin is an Addon for [WPML](https://wpml.org), the plugin that enables any WordPress website to become 100% multilingual. If you do not have WPML installed, this plugin is useless, so better not install it.

= I have an issue with this plugin, where can I get support? =

Please open an issue on [Github](https://github.com/senlin/multilingual-comments-wpml/issues)

== Screenshot ==
1. Multilingual Comments WPML 2 comments, 1 English and 1 in Portuguese

== Changelog ==

= 1.2.1 =

* date: May 22, 2024
* remove Requires Plugins header introduced in WP 6.5 (throwing error on WP.org, although works fine in site's Dashboards)
* remove tags in readme.txt, limit changed to 5 tags only (also throwing error on WP.org)

= 1.2 =

* date: May 22, 2024
* add condition to prevent $otherID returning `null` ([issue #4](https://github.com/senlin/multilingual-comments-wpml/issues/4#issuecomment-2069137039) props to [@Lindfyrsten](https://github.com/Lindfyrsten)
* add Requires Plugins header introduced in WP 6.5

= 1.1.2 =

* date: March 29, 2023
* update readme.txt
* add icon
* release on WP Plugins Directory

= 1.1.1 =

* date: March 19, 2023
* add readme.txt and screenshot
* update README.md

= 1.1.0 =

* date: March 1, 2023
* commit OOP version

= 1.0.0 =

* date: March 17, 2023
* initial commit
