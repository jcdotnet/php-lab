=== Buddyfence ===
Contributors: jcrr
Tags: buddypress, private, members, security, redirect  
Donate link: https://www.paypal.me/jcrr
Requires at least: 4.0
Tested up to: 6.0
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to restrict not logged-in users from accessing BuddyPress pages


== Description ==

Buddypress pages are public by default. This plugin allows you to restrict not logged-in users from accessing these pages.

If an anonymous user tries to access these pages, they will be redirected either to the login page, or to the homepage, or even to a custom page. 

The plugin also allows to display on these pages a template with a message to log in instead of directly redirecting them elsewhere.


== Features ==

- Very easy to use, you only have to choose which pages want to retrict to anonymous users (not logged-in users).
- Small and lightweight plugin (around 10-15kb).
- No CSS, no scripts. No requests to static files.
- Fully translated into Spanish.

== Support == 

Need help? Any bugs to report? Any suggestions? Please contact me.

You can help me too either by rating this plugin or by making a donation.


== Installation ==
1.1. From your WordPress dashboard: Plugins -> New Plugin, search for "Buddyfence" and click install.
1.2. From the WordPress directory: Download the plugin and copy the zip file to the "/wp-content/plugins/" folder of your WordPress installation.
2. Activate the plugin.
3. Go to the settings page (Settings -> Buddyfence) and that's it!


== Screenshots ==
1. plugin settings


== Changelog ==

= 1.2.2 date 2021-03-05 =

- Added redirections to custom / external URLs.

= 1.2.1 date 2019-10-24 =

- Developers update. Added the buddyfence_before_template and the buddyfence_after_template action hooks.

= 1.2.0 date 2018-11-08 =

- Added restrictions to user profiles.
- Added redirections to custom pages.
- Updated the es_ES translation. 

= 1.1.2 date 2018-02-11 =

- BuddyPress page with a login request template, new behavior: Upon logging in, users will be sent to the page where they were originally trying to access. 
  

= 1.1.1 date 2017-11-17 =

- Added new URL redirection options.
- Added CSS classes to the custom template so that you can style it.
- Compatible with PHP 7.1 and WordPress 4.9

= 1.1.0, date 2017-08-08 = 

- You can now display a "restricted area" message to anonymous users.    
- Translated into es_ES. ¡Ahora en español!

= 1.0.0, date 2017-07-30 = 

- Initial release.