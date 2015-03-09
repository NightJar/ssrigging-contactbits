# SilverStripe Contact Bits
Easily fits your SiteConfig/Page/DataObject with generic contact info, saving you a bunch of boring typing.

##Requirements
* Silverstripe 3.0

##Installation
* Simply drop into silverstripe root (using whatever method)
* `dev/build`
* ?flush=all

##Usage
Apply the extension to your DataObject (of whatever type), then `dev/build` & relax.

###Example
This is a usecase for a small local business and requires the __cms__ module.
In *mysite/_config.php* add:
```php
Object::add_extension('SiteConfig', 'ContactBits');
ContactBits::hide(array(
	'TollFree',
	'Fax',
	'Postal'
));
```
Which can then be rendered in the site's footer simply via *templates/Page.ss*: `<% include ContactBits %>`

##About
This is a common need on websites, and the pattern of inclusion is usually the same; if they're filled in, use them in the template, otherwise don't. This made for not only very similar looking SiteConfig extensions to appear in each site, but a lot of if statements in the template.
This module helps speed things up.

##Notes
- Don't forget to run `dev/build` to apply your new db fields after adding the extension to your object.
