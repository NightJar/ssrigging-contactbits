# SilverStripe Contact Bits
Easily fits your SiteConfig/Page/DataObject with generic contact info, saving you a bunch of boring typing.

##Requirements
* Silverstripe 3.1

##Installation
* Simply drop into silverstripe root (using whatever method)
* `dev/build`
* `?flush=all`

##Usage
Apply the extension to your DataObject (of whatever type), then `dev/build` & relax.

###Example
This is a usecase for a small local business and requires the __cms__ module.
*mysite/_config/contactbits.yml*:
```yml
SiteConfig:
  extensions:
    - ContactBits
	
ContactBits:
  hide:
    - TollFree
    - Fax
    - Postal
));
```
Which can then be rendered in the site's footer simply via *templates/Page.ss*: `<% include ContactBits %>`

##About
This is a common need on websites, and the pattern of inclusion is usually the same; if they're filled in, use them in the template, otherwise don't. This made for not only very similar looking SiteConfig extensions to appear in each site, but a lot of if statements in the template.
This module helps speed things up.

##Notes
- Don't forget to run `dev/build` to apply your new db fields after adding the extension to your object.
- Different configurations (ie. of hidden fields) can be created through subclassing the extension and applying the different (sub)classes to their different intended 'owners'. Everything still works as intended. This allows for eg. in a corporate group a 'main' toll free number and no postal info applied to SiteConfig, _and_ a DataObject for each branch with post info but local phone numbers only.