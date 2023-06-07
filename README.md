# Memberstack 2.0 Plugin

A WordPress plugin that lets Wordpress users easily integrate Memberstack to their websites.

## Disclaimer
Use at your own risk. This plugin is provided as-is without any warranty. I am not responsible for any data loss, conflicts, or issues that may arise from using this plugin. Make sure to test the plugin thoroughly on a staging or development site before deploying it to a live production site.

## Author
This plugin was developed by Chukwudi Onyekwere.

## Description

The Memberstack Plugin allows you integrate Memberstack to your Wordpress website. You can also use the shortcodes in this plugin within your WordPress site. The shortcodes cover Action, Prices and Modals, while other data attributes like the Auth, Forms and Content which are originally for Webflow website also work on Wordpress too :) You can find them here: https://docs.memberstack.com/hc/en-us/articles/7252466484635-All-Webflow-Package-Data-Attributes



## Requirements

- WordPress 5.0 or higher


## Installation

1. Download the plugin ZIP file from the GitHub repository.
2. Log in to your WordPress dashboard.
3. Go to "Plugins" > "Add New".
4. Click on the "Upload Plugin" button and choose the downloaded ZIP file.
5. Click "Install Now" and then "Activate" the plugin.

## Configuration

1. Go to the Memberstack Integration Settings page under the Settings menu in the WordPress admin area.
2. Enter your Memberstack App ID in the provided field. (You can get your App ID from your Memberstack dashboard (https://app.memberstack.com/), then head over to the settings > application page.)
3. Save the settings


## Shortcodes

The plugin provides several shortcodes that you can use in your content to control access and display Memberstack-related elements. Here are the available shortcodes:

   [ms_login_modal]: Displays a login modal. Example: [ms_login_modal href="#my-link" class="my-class" button="true"]Log in[/ms_login_modal]
   
   [ms_signup_modal]: Displays a signup modal. Example: [ms_signup_modal href="#my-link" class="my-class" button="false"]Sign up[/ms_signup_modal]
   
   [ms_logout]: Displays a logout button.  Example: [ms_logout href="#my-link" class="my-class" button="true"]Logout[/ms_logout]
   
   [ms_profile]: Displays a link to the user's profile. Example: [ms_profile href="#my-link" class="my-class" button="false"] Profile [/ms_profile]
   
   [ms_customer_portal]: Displays a link to the customer portal. Example: [ms_customer_portal href="#my-link" class="my-class" button="true"] Open Customer Portal[/ms_customer_portal]
   
   [ms_forgot_password]: Displays a forgot password link. Example: [ms_forgot_password href="#my-link" class="my-class" button="true"] Forgot Password [/ms_forgot_password]
   
   [ms_content_members]: Wraps content that should be visible to logged-in members only. Example: [ms_content_members]This content will only be visible to logged-in members.[/ms_content_members]
   
   [ms_content_non_members]: Wraps content that should be visible to logged-out users only. Example: [ms_content_non_members]This content will be visible to logged-out members.[/ms_content_non_members]
   
   [ms_resend_verification_email]: Displays a resend verification email link. Example: [ms_resend_verification_email class="button" button="true"]Update Price[/ms_resend_verification_email]
   
   [ms_login_redirect]: Redirects the member to their Login Redirect Url. Example: [ms_login_redirect href="/pagelinkgoeshere" class="button" button="false"]Update Price[/ms_login_redirect]
   
   [ms_add_price]: Adds a paid plan to a member. Example: [ms_add_price href="#" class="button" button="true" price_id="prc_your_price_id"]Add Price[/ms_add_price]
   
   [ms_update_price]: Updates/replaces a paid plan. Example: [ms_update_price href="#" class="button" button="true" price_id="prc_your_price_id"]Update Price[/ms_update_price]
   
   [ms_remove_price]: Clear out any previously selected plans. Example: [ms_remove_price href="#" class="button" button="false"]Remove all[/ms_remove_price]
   
   The shortcodes cover Action, Prices and Modals, while other data attributes like the Auth, Forms and Content which are originally for Webflow website also work on Wordpress too :) You can find them here: https://docs.memberstack.com/hc/en-us/articles/7252466484635-All-Webflow-Package-Data-Attributes

## Contributing

Contributions to this plugin are welcome. If you encounter any issues or have suggestions for improvements, please submit an issue or create a pull request on the GitHub repository. 
