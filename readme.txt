=== Weekly Shabbat Times ===
Contributors: areimann, jfennell
Donate link: http://aaronreimann.com
Tags: Shabbat
Requires at least: 4.7
Tested up to: 5.6.2
Stable 1.1.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin creates shortcode to display the Shabbat portion titles, candle lighting times, Havdalah times, etc. of the current week.

== Installation ==

1. Unzip and upload the plugin into the plugins directory and then activate it.
2. Grab a shortcode example and place it in the content of a page
3. View the page

== Frequently Asked Questions ==

= What does it do? =

It simple gives a few shortcodes to display the Shabbat lighting times. Watch the video to see what it does:
[youtube https://www.youtube.com/watch?v=ztzHENB9g7Y]

= Why did you write this plugin? =

My synagogue needed to display the current Portion on the website and I couldn't find a good plugin to do this. This allows me to display the shortcode in the title of a post/page or within the content of a page/post.

= How do I use it? =

Example shortcodes using Zip Code:

[hebcal_sc category="parashat" param="title" zip="30066"]
[hebcal_sc category="parashat" param="hebrew" zip="30066"]
[hebcal_sc category="roshchodesh" param="title" zip="30066"]
[hebcal_sc category="roshchodesh" param="hebrew" zip="30066"]
[hebcal_sc category="candles" param="title" zip="30066"]
[hebcal_sc category="candles" param="hebrew" zip="30066"]

Example shortcode using Longitude, Latitude, and Time Zone ID:

[hebcal_sc category="candles" param="title" longitude="-84.500434" latitude="34.024356" tzid="America/New_York"]

You can get a list of timezone ID's by going to [https://en.wikipedia.org/wiki/List_of_tz_database_time_zones]https://en.wikipedia.org/wiki/List_of_tz_database_time_zones


= Possible categories from the feed =
 * holiday
 * roshchodesh
 * candles
 * parashat
 * havdalah

= Thanks =

Thanks goes to the team at Hebcal.com. The plugin just grabs the information from the JSON feed by hebcal.com.

== Changelog ==

= 1.1.0 =
* Adds longitude and latitude to the shortcode so you can drop in your longitude, latitude, and timezone ID.

= 1.0.0 =
* Initial release

== Upgrade Notice ==

