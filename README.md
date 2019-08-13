
The CoinSimple Magento plugin allows e-commerce stores to accept bitcoin through CoinSimple.

<!--more-->

## Requirements

**A Business ID and API key from CoinSimple.com**. To find your information, go to your [CoinSimple.com](http://coinsimple.com) dashboard, select your business, and go to "Settings". You will find your *Business ID* and *API key* under "Busines Information" and "API Credentials".

## Installation

*Do not attempt to install this plugin through the "Magento Connect Manager". Use the following instructions, instead.*

1. [Download a zip file of the plugin](https://github.com/coinsimple/coinsimple-magento/archive/v1.zip). Extract the zip file.
2. Copy the contents of the zip file under in the root of your Magento installation.

At this point the plugin is installed and activated but it still needs to be enabled and configured.

## Configuration

1. Log in to your Magento site as administration and click on "Settings" and then "Configuration".

  ![Select "Settings" and then "Configuration"](/media/magento/magento-plugin-settings-configuration.png)

2. In the screen that appears click on "Payment Methods" on the left.

  ![Click on "Payment Methods"](/media/magento/magento-plugin-settings-configuration-payment_methods.png)

5. Select "Yes" in the "Enabled" dropdown menu and enter your CoinSimple.com business ID and CoinSimple API key in the appropriate fields. Also, enter the URL of the page that your customers will be directed to after they make their payment.

  ![Business ID, API key and callback URL](/media/magento/magento-plugin-settings-configuration-payment_methods-coinsimple.png)

5. Click "Save Config".

## Use

- When a buyer selects "Bitcoin" as their payment method, an invoice is generated at CoinSimple.
- After the buyer pays, CoinSimple directs the buyer to the page that you selected in your Settings above.

## Support

### CoinSimple Support

* If you are having a problem with this plugin, please use [this Github issues page](https://github.com/coinsimple/coinsimple-magento/issues) to report your problem.

## Magento Support

* [Homepage](http://magento.com)
* [Documentation](http://docs.magentocommerce.com)
* [Community Edition Support Forums](https://www.magentocommerce.com/support/ce/)

### Troubleshooting

* This plugin requires PHP 5.4 or higher to function correctly. Contact your webhosting provider or server administrator if you are unsure which version is installed on your web server.
* Ensure a valid SSL certificate is installed on your server. Also ensure your root CA cert is updated. If your CA cert is not current, you will see curl SSL verification errors.
* Verify that your web server is not blocking POSTs from servers it may not recognize. Double check this on your firewall as well, if one is being used.
* Check the system error log file (usually the web server error log) for any errors during CoinSimple payment attempts. If you contact CoinSimple support, they will ask to see the log file to help diagnose the problem.
* If all else fails, send an email describing your issue in detail to [support@coinsimple.com](mailto:support@coinsimple.com). In your support request, please provide:
	* Magento version
	* PHP version
	* Other plugins installed
	* Configuration settings for the CoinSimple plugin
	* Screenshot of error messages, if any


## Contribute

To contribute to this project, please fork and submit a pull request.


## About CoinSimple

CoinSimple allows consultants and online merchants to **easily** accept bitcoins either through a bitcoin payment processor ([BitPay](http://bitpay.com), [Coinbase](http://coinbase.com), [GoCoin](http://gocoin.com)) or directly to their deterministic wallet ([Electrum](http://electrum.org), [Armory](http://bitcoinarmory.com), [Trezor](http://www.bitcointrezor.com/)) or to any non-deterministic bitcoin wallet. One can use the [CoinSimple web app](https://coinsimple.com) to issue invoices directly, Wordpress eCommerce (see [demo site](http://wordpress.coinsimple.com) or [plugin page](https://github.com/coinsimple/coinsimple-wpecommerce)), WooCommerce (see [demo site](http://woocommerce.coinsimple.com) or [plugin page](https://github.com/coinsimple/coinsimple-woocommerce)), Magento (see [demo site](http://magento.coinsimple.com) or [plugin page](https://github.com/coinsimple/coinsimple-magento)), to sell products through the respective online stores, or a "Pay in Bitcoin" button on any webpage to accept donations, payments or even sell products.

For more information about CoinSimple, please visit [CoinSimple.com](https://coinsimple.com).


## License

The MIT License (MIT)

Copyright (c) 2014-2015 CoinSimple

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
