# RC-Meting

A WordPress wrapper plugin for [MetingJS](https://github.com/metowolf/MetingJS).

# Installation

- Download the [latest release](https://github.com/lirc572/RC-Meting-WP/releases/latest) as a zip file
- Upload the zip file as a plugin to WordPress admin area
- Activate the plugin

# Usage

Add the following shortcode to where you want a Meting player to be placed at:

```
[rc-meting auto="https://music.163.com/#/playlist?id=5309067037"]
```

Refer to [rc-meting-class.php](https://github.com/lirc572/RC-Meting-WP/blob/78023b4e4d7b0f14420868ac483e87bad3155090/include/rc-meting-class.php#L26-L32) for supported attributes.

Refer to [MetingJS Options](https://github.com/metowolf/MetingJS#option) for how to set these attributes.
