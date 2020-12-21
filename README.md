# RC-Meting

![release](https://github.com/lirc572/RC-Meting-WP/workflows/Create%20Release/badge.svg)

A WordPress wrapper plugin for [MetingJS](https://github.com/metowolf/MetingJS).

# Demo

[RC-Meting Demo](https://lirc572.com/2020/12/21/rc-meting/)

# Installation

- Download the [latest release](https://github.com/lirc572/RC-Meting-WP/releases/latest) as a zip file
- Upload the zip file as a plugin to WordPress admin area
- Activate the plugin

# Usage

Set default options in `Admin -> Settings -> RC Meting`.

Add the following shortcode to where you want a Meting player to be placed at:

```
[rc-meting no_referer=true auto="https://music.163.com/#/playlist?id=5309067037"]
```

Refer to `Admin -> Settings -> RC Meting` for supported attributes.

Refer to [MetingJS Options](https://github.com/metowolf/MetingJS#option) for how to set these attributes.

# Additional Information

> if the `no_referer` option is set to `true`, a meta tag will be added to the head section of the webpage to prevent sending the Referer header.
> It is noticed that if referer header is sent, sometimes Netease api will return 403.
> However, enabling this option will affect all requests made on the web page. Hence you should only enable this option if you know what you are doing.

> `autoplay` does not work due to [an issue with Aplayer](https://github.com/DIYgod/APlayer/issues/281)

> `fixed` mode is currently not displayed correctly
