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

## Ready your Gmail account

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

### Gmail SMTP Server

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

- https://www.youtube.com/watch?v=uDA2uonPBNg
- https://www.youtube.com/watch?v=KDcAvJ_jURk

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

8. Checkout

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Checkout1.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Checkout2.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Checkout3.PNG)
![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/Checkout4.PNG)

# User accounts

WooCommerce LogIn & SignUp Forms Plugin: https://wordpress.org/plugins/woocommerce-login-and-registration/

- https://www.youtube.com/watch?v=uDA2uonPBNg
- https://www.youtube.com/watch?v=kVkhbMP7Hjw <sup>Lite</sup>sup>

![](https://raw.githubusercontent.com/atabegruslan/archi_portfolio/master/Illustrations/SignUp.PNG)

Only show this menu item when user is not logged in: 
- https://www.wpexplorer.com/custom-menus-wordpress-users/
- https://wordpress.org/plugins/user-menus/

# Create product from frontend

https://wordpress.org/plugins/ns-add-product-frontend/

**Tweek**: This plugin's free version haven't been up to date with Chrome. You will see error in console `-webkit-appearance: button' for elements other than <button> and <input type=button/color/reset/submit> is deprecated`

So you need to go into `\wp-content\plugins\ns-add-product-frontend\ns-frontend-add-product-page.php` and change all the `span.dashicons.dashicons-arrow-down.ns-pointer` into `button.dashicons.dashicons-arrow-down.ns-pointer`.

## Other ways of doing this

- https://wedevs.com/docs/wp-user-frontend-pro/tutorials/upload-to-woocommerce-with-wpuf/
- https://webcusp.com/frontend-product-posting-in-wocommerce/
- https://barn2.co.uk/woocommerce-frontend-product-submission/
- https://wedevs.com/blog/87206/why-and-how-to-add-frontend-submission-for-woocommerce
- https://toolset.com/learn/create-an-ecommerce-wordpress-site/how-to-create-a-front-end-form-for-adding-woocommerce-products/
- https://wpfrontendadmin.com/create-woocommerce-products-from-the-frontend/
- https://www.youtube.com/watch?v=ZQxY644tkp8
- https://www.youtube.com/watch?v=Ws1UyxSxkas
- https://www.youtube.com/watch?v=ygjLIWlFHK4
- https://stackoverflow.com/questions/54226639/how-to-create-a-woocommerce-product-from-frontend-form-submission-with-form-vali
	- https://docs.woocommerce.com/document/installed-taxonomies-post-types/
	- FYI, when product is posted from backend, this is what gets passed:

```
Request URL: {Domain}/wp-admin/post.php
Request Method: POST

Content-Type: application/x-www-form-urlencoded

_wpnonce: 81b1d469eb
_wp_http_referer: /portfolio/wp-admin/post.php?post=162&action=edit
user_ID: 1
action: editpost
originalaction: editpost
post_author: 1
post_type: product
original_post_status: publish
referredby: http://localhost/portfolio/wp-admin/edit.php?post_type=product
_wp_original_http_referer: http://localhost/portfolio/wp-admin/edit.php?post_type=product
post_ID: 162
meta-box-order-nonce: 4de1eab490
closedpostboxesnonce: cddb408837
original_post_title: Osaka Entry Tee Superdry
post_title: Osaka Entry Tee Superdry
samplepermalinknonce: ee58018059
_acfnonce: 97fe464bb5
_acfchanged: 0
content: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis massa nec velit commodo lobortis. Quisque diam lacus, tincidunt vitae eros porta, sagittis rhoncus est. Quisque sed justo a erat lobortis gravida. Suspendisse nibh neque, hendrerit vel nisi at, ultrices adipiscing justo. Nunc ullamcorper molestie felis at pharetra.

Osaka Entry Tee NOK 399, Superdry - NELLY.COM

Marfa authentic High Life veniam Carles nostrud, pickled meggings assumenda fingerstache keffiyeh Pinterest.
wp-preview: 
hidden_post_status: publish
post_status: publish
hidden_post_password: 
hidden_post_visibility: public
visibility: public
post_password: 
mm: 08
jj: 10
aa: 2014
hh: 10
mn: 06
ss: 55
hidden_mm: 08
cur_mm: 02
hidden_jj: 10
cur_jj: 27
hidden_aa: 2014
cur_aa: 2020
hidden_hh: 10
cur_hh: 16
hidden_mn: 06
cur_mn: 30
current_visibility: visible
current_featured: no
_visibility: visible
original_publish: Update
save: Update
tax_input[product_cat][]: 0
tax_input[product_cat][]: 22
tax_input[product_cat][]: 23
newproduct_cat: New category name
newproduct_cat_parent: -1
_ajax_nonce-add-product_cat: 23cfd30297
tax_input[product_tag]: jeans, man, t-shirt, white
newtag[product_tag]: 
_thumbnail_id: -1
woocommerce_meta_nonce: 17de15b1f5
_wp_http_referer: /portfolio/wp-admin/post.php?post=162&action=edit
product_image_gallery: 
product-type: simple
woocommerce_meta_nonce: 17de15b1f5
_wp_http_referer: /portfolio/wp-admin/post.php?post=162&action=edit
_product_url: 
_button_text: 
_regular_price: 29
_sale_price: 
_sale_price_dates_from: 
_sale_price_dates_to: 
_download_limit: 
_download_expiry: 
_sku: 
_stock: 0
_original_stock: 0
_backorders: no
_low_stock_amount: 
_stock_status: instock
_weight: 
_length: 
_width: 
_height: 
product_shipping_class: -1
attribute_taxonomy: 
_purchase_note: 
menu_order: 0
comment_status: open
_bubble_new: 
_bubble_text: 
_custom_tab_title: 
_custom_tab: 
_product_video: 
_product_video_size: 
_product_video_placement: 
_top_content: 
_bottom_content: 
meta[275][key]: total_sales
_ajax_nonce: 4bf0e4b0e2
meta[275][value]: 156
metakeyselect: #NONE#
metakeyinput: 
metavalue: 
_ajax_nonce-add-meta: 68799e533d
post_name: osaka-entry-tee-superdry
excerpt: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis massa nec velit commodo lobortis. Quisque diam lacus, tincidunt vitae eros porta, sagittis rhoncus est. Quisque sed justo a erat lobortis gravida.
add_comment_nonce: cf01df012b
_ajax_fetch_list_nonce: 840c9acbb4
_wp_http_referer: /portfolio/wp-admin/post.php?post=162&action=edit
```
