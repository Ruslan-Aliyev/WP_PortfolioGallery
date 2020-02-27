# Page builders

## Elementor plugin

Free, but limited

## Flatsome theme (and its UX builder)

Install and go through the setup wizard.

Can only skip optional steps. Can't skip anything else, or otherwise things like UX builder won't work.

# Articulating sections

## Custom widgets

https://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/

## UX Blocks (within Flatsome theme)

# Migration

migrate featured images https://wordpress.org/plugins/export-featured-images/

# Enabling emailing and setup contact form

- https://wpcred.com/how-to-setup-wordpress-smtp-server-for-sending-emails-in-flatsome-woocommerce-theme/
- https://www.youtube.com/watch?v=9Sbr9cyHZT4

## Ready SMTP Server

https://www.arclab.com/en/kb/email/how-to-enable-imap-pop3-smtp-gmail-account.html

### Enable IMAP and/or POP3

1. Go to the "Settings", e.g. click on the "Gears" icon and select "Settings".
2. Click on "Forwarding and POP/IMAP".
3. Enable "IMAP Access" and/or "POP Download"

Enable Third-Party Mail Clients

- See: https://support.google.com/accounts/answer/6010255?hl=en for details.
The page contains a link to enable "Less secure apps" in MyAccount.
- You can also enable "Less secure apps" (third-party mail clients) from:
"MyAccount" > "Sign-in & security" > "Connected apps & sites" > "Allow less secure apps"

### Gmail your Gmail account

- Server: smtp.gmail.com
- Encryption/Authentication: StartTLS
- Port: 587

## Ready Post SMTP Plugin

https://wordpress.org/plugins/post-smtp/

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Email1.PNG)

## Ready contact form

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Contact1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Contact2.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Contact3.PNG)

# WooCommerce - Paypal

https://www.youtube.com/watch?v=uDA2uonPBNg

1. SignUp to Paypal: https://www.paypal.com/en/webapps/mpp/country-worldwide , https://www.paypal.com/vn/signin

2. Auto-generate sandbox Paypal accounts: https://developer.paypal.com/developer/accounts/ . The default business is the seller. The default personal is the buyer.

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/PaypalCreds1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/PaypalCreds2.PNG)

3. Go to WooCommerce settings and setup Paypal. Copy over Paypal's sandbox seller account's credentials.

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/SetupPaypal1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/SetupPaypal2.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/SetupPaypal3.PNG)

4. Create a product

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/product1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/product2.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/product3.PNG)

5. Make a page, Add the Add-to-cart button to that page

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/addToCart.PNG)

6. Show that page

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/LinkToBuyPage1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/LinkToBuyPage2.PNG)

7. When it's time to pay by Paypal, use Paypal's sandbox buyer account's username & secret.

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Buying1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Buying2.PNG)

# User accounts

WooCommerce LogIn & SignUp Forms Plugin: https://wordpress.org/plugins/woocommerce-login-and-registration/

https://www.youtube.com/watch?v=uDA2uonPBNg
