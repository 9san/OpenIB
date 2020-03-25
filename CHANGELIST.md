# Changelist

#### Release 1.0.3 - 2020.03.25
- Ensured static themes only rebuild on 'all' (oops)
- Ukko now excludes all NSFW boards
- Cleaned up sitemap and ukko indexed_only code
- Fixed major ukko rebuild bug (oops my bad)
- $config['dir']['res'] = 'thread/' should now change everything, including javascript. Please report bugs if you find any, I will not be messing with this function.
- RSS feed fixed with $config['site_uri'], (RSS should have absolute paths), cool-php-captcha also uses this.
- board specific extra_config.php now named instance-config.php
- PDF icon added by request
- Multifile desktop min-width increased to 180px
- Multifile size now set to "each" by default, allowing up to 10MB per file each post, no longer 10MB per post
- BBCode now available for most markdown. See [9san FAQ#how-do-i-format-my-text](https://9san.ch/faq#how-do-i-format-my-text)
- More mobile fixes ^_^
- Board Owner created static pages now have boardlists
- Unix download button added to $config['download_original']

#### Release 1.0.2 - 2020.03.22
- Fixed search.php potential bug with board named "none"
- Fixed post-hover admin capcode
- $config['download_original']: link next to image size/ratio
- Reply div flexibility now works regardless of OP thumb width (bye calc, hello table)
- Server path for static theme now optional
- More mobile bugs fixed
- Fixed post/file deletion breaking bug
- Post-menu report from Overboard

#### Release 1.0.1 - 2020.03.12
- Install.sql torlist bug workaround
- Youtube resolution fixes
- Option to reset thread bump after last post deleted. Thanks, [John Clever](https://github.com/vichan-devel/vichan/pull/353) from vichan-devel!
- Auto-reload.js error icon on pruned thread.
- Various fixes (dio, dashboard, etc)

#### Release 1.0b - 2020.03.08
- Active development!
- Open source
- Disable board creation toggle!
- Various security fixes
- Various bug fixes
- Improved multi-file layout
- Improved mobile feel
- Improved overall design
- Ukko indexed boards only
- Sitemap indexed boards only
- Custom assets fixes
- Custom sage text
- Global/Blotter/Board Announcements
- Global post-form show toggle
- Global force SFW boards toggle
- End-user blotter & footer toggle
- Global or board banner toggle
- Keyboard shortcuts
- Optional dereferrer script
