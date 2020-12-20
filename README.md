# RC-Meting

![release](https://github.com/lirc572/RC-Meting-WP/workflows/Create%20Release/badge.svg)

A WordPress wrapper plugin for [MetingJS](https://github.com/metowolf/MetingJS).

# Installation

- Download the [latest release](https://github.com/lirc572/RC-Meting-WP/releases/latest) as a zip file
- Upload the zip file as a plugin to WordPress admin area
- Activate the plugin

# Usage

Add the following shortcode to where you want a Meting player to be placed at:

```
[rc-meting no_referer=true auto="https://music.163.com/#/playlist?id=5309067037"]
```

> Note: if the `no_referer` option is set to `true`, a meta tag will be added to the head section of the webpage to prevent sending the Referer header.
> It is noticed that if referer header is sent, sometimes Netease api will return 403.
> However, enabling this option will affect all requests made on the web page. Hence you should only enable this option if you know what you are doing.

Refer to [rc-meting-class.php](https://github.com/lirc572/RC-Meting-WP/blob/78023b4e4d7b0f14420868ac483e87bad3155090/include/rc-meting-class.php#L46-L64) for supported attributes.

Refer to [MetingJS Options](https://github.com/metowolf/MetingJS#option) for how to set these attributes.
