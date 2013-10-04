
Module: ReevooMark


Description
===========
For ReevooMark customers who want to quickly and easily integrate Reevoo 
content in to their site, server-side.


Requirements
============

* A Reevoo account (http://www.reevoo.com)
* libraries (2.x)


Installation
============

1. Download the Reevoomark library 
from https://github.com/reevoo/reevoomark-php-api.git
The library should be placed in the libraries directory
within the site you are working. That may be 'default' or 'all' like the
following: sites/all/libraries or sites/default/libraries. 
The end result should be 
sites/.../libraries/reevoomark-php-api/lib/reevoo_mark.php.
  Or use the provide reevoomark.make file.

2. Download and enable the module.

3. Configure at Administer > Configuration > System > ReevooMark
 (requires 'Administer ReevooMark settings' permission)
Your retailer id from Reevoo is required in the configuration.

4. Implement hook_reevoomark_sku_alter() if your product sku is not 
the node id of the product.


Implementation
==============

Blocks are provided to show the Reevoo data,
so use your preferred method for placing on of the following blocks:
 - ReevooMark first two reviews
 - ReevooMark embeddable reviews
 - ReevooMark offers
 - ReevooMark overall score
 - ReevooMark best price


