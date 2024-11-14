=== Membersphere ===
Contributors: chukwudionyekwere, glonyekwere
Donate link: https://ko-fi.com/chuddytech
Tags: woocommerce, payment gateway, membersphere, memberstack, membership
Requires at least: 6.3
Requires PHP: 7.4
Tested up to: 6.6
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
A WordPress plugin that lets Wordpress users easily integrate Memberstack to their websites.

## Disclaimer
Use at your own risk. This plugin is provided as-is without any warranty. I am not responsible for any data loss, conflicts, or issues that may arise from using this plugin. Make sure to test the plugin thoroughly on a staging or development site before deploying it to a live production site.

## Author
This plugin was developed by Chukwudi Onyekwere.

## Description

This plugin allows you integrate Memberstack to your Wordpress website. You can also use the shortcodes in this plugin within your WordPress site. The shortcodes cover Action, Prices and Modals, while other data attributes like the Auth, Forms and Content which are originally for Webflow websites, also work on Wordpress too :) You can find them here: https://docs.memberstack.com/hc/en-us/articles/7252466484635-All-Webflow-Package-Data-Attributes



## Requirements

- WordPress 5.0 or higher


## Installation

1. Download the plugin ZIP file from this GitHub repository.
2. Log in to your WordPress dashboard.
3. Go to "Plugins" > "Add New".
4. Click on the "Upload Plugin" button and choose the downloaded ZIP file.
5. Click "Install Now" and then "Activate" the plugin.

## Configuration

1. Go to the Memberstack Integration Settings page under the Settings menu in the WordPress admin area.
2. Enter your Memberstack App ID in the provided field. (You can get your App ID from your Memberstack dashboard https://app.memberstack.com/, then head over to the settings > application page to copy the app ID.)
3. Save the settings


## Shortcodes

The plugin provides several shortcodes that you can use in your content to control access and display Memberstack-related elements. Here are the available shortcodes:

  Login Modal: Displays a login modal.
  Example: [ms_login_modal href="#my-link" class="my-class" button="true"]Log in[/ms_login_modal]

  Signup Modal: Displays a signup modal.
  Example: [ms_signup_modal href="#my-link" class="my-class" button="false"]Sign up[/ms_signup_modal]

  Logout: Displays a logout button.
  Example: [ms_logout href="#my-link" class="my-class" button="true"]Logout[/ms_logout]

  Profile: Displays a link to the user's profile.
  Example: [ms_profile href="#my-link" class="my-class" button="false"]Profile[/ms_profile]

  Customer Portal: Displays a link to the customer portal.
  Example: [ms_customer_portal href="#my-link" class="my-class" button="true"]Open Customer Portal[/ms_customer_portal]

  Forgot Password: Displays a forgot password link.
  Example: [ms_forgot_password href="#my-link" class="my-class" button="true"]Forgot Password[/ms_forgot_password]

  Content for Logged-In Members: Wraps content that should be visible to logged-in members only.
  Example: [ms_content_members]This content will only be visible to logged-in members.[/ms_content_members]

  Content for Logged-Out Members: Wraps content that should be visible to logged-out users only.
  Example: [ms_content_non_members]This content will be visible to logged-out members.[/ms_content_non_members]

  Resend Verification Email: Displays a resend verification email link.
  Example: [ms_resend_verification_email class="button" button="true"]Resend Verification Email[/ms_resend_verification_email]

  Login Redirect: Redirects the member to their specified Login Redirect URL.
  Example: [ms_login_redirect href="/pagelinkgoeshere" class="button" button="false"]Update Price[/ms_login_redirect]

  Add Paid Plan: Adds a paid plan to a member's account.
  Example: [ms_add_price href="#" class="button" button="true" price_id="prc_your_price_id"]Add Price[/ms_add_price]

  Update Paid Plan: Updates or replaces an existing paid plan.
  Example: [ms_update_price href="#" class="button" button="true" price_id="prc_your_price_id"]Update Price[/ms_update_price]

  Remove All Plans: Clears out any previously selected plans.
  Example: [ms_remove_price href="#" class="button" button="false"]Remove all[/ms_remove_price]

  Add Free Plan: Adds a free plan to the member's account.
  Example: [ms_add_free_plan plan_id="YOUR_PLAN_ID" button="true"]Add Free Plan[/ms_add_free_plan]

  Remove Free Plan: Removes a free plan from the member's account.
  Example: [ms_remove_free_plan plan_id="YOUR_PLAN_ID" button="true"]Remove Free Plan[/ms_remove_free_plan]

  Authentication Provider: Displays a login option for an authentication provider (e.g., Google).
  Example: [ms_auth_provider provider="google"]Continue with Google[/ms_auth_provider]

  Manage Providers: Manages linked authentication providers, such as Google.
  Example: [ms_auth_manage_providers] [ms_auth_provider provider="google"]Connect Google[/ms_auth_provider] [/ms_auth_manage_providers]

  Auth Connected Text: Customizable text to show when a provider is connected.
  Example: [ms_auth_connected_text text="Disconnect Google"]Connect Google[/ms_auth_connected_text]

  Auth Disconnect Element: Disconnects the linked authentication provider.
  Example: [ms_auth_provider provider="google"] [ms_auth_disconnect]X[/ms_auth_disconnect] Connect Google [/ms_auth_provider]

  Commenting Section: Adds a section for comments using a specific channel ID.
  Example: [data-ms-channel="your_channel_id"]

  Manage Post Items: Allows for managing post items like showing threads, editing, deleting, etc.
  Example: [data-ms-post="showThreads/edit/delete/content/isModerator/ownerProfileImage/hidden"]

  Manage Threads and Replies: Manages threads and replies with options like sorting and loading more items.
  Example: [data-ms-thread="container/item/loadMore/content/sort"]

  Custom Loader: Displays a loading icon or text.
  Example: [ms_loader] Loading Image icon goes here... [/ms_loader]

  Data Binding Style: Binds a CSS style to an element dynamically.
  Example: [ms_bind_style cssProperty="display" value="block"]Please Update Payment[/ms_bind_style]

  Data Binding Class: Binds a CSS class to an element dynamically.
  Example: [ms_bind_class className="admin-panel"]Admin Panel[/ms_bind_class]

   
   
   The shortcodes cover Action, Prices and Modals, while other data attributes like the Auth, Forms and Content which are originally for Webflow websites, also work on Wordpress too :) You can find them here: https://docs.memberstack.com/hc/en-us/articles/7252466484635-All-Webflow-Package-Data-Attributes


## Contributions 

Contributions to this plugin are welcome. If you encounter any issues or have suggestions for improvements, please submit an issue or create a pull request on the GitHub repository. 


=== Frequently Asked Questions ===
= How does Dealique work? =
Dealique is an escrow payment gateway that securely holds funds until the transaction is completed. It ensures that both buyers and sellers are protected throughout the transaction process.

= What do I need to set up Dealique? =
You need to sign up for a Dealique account and obtain your API key. Once you have your API key, you can configure it in the Dealique settings within your WooCommerce setup.

= Is Dealique secure? =
Yes, Dealique uses industry-standard security measures to protect transactions and personal information.

=== Changelog ===
= 1.0 =
* Initial release of the Dealique Escrow Payment Gateway plugin.

=== Upgrade Notice ===
= 1.0 =
This is the initial release. There are no upgrade notices for this version.

=== Screenshots ===
1. **Dealique Payment Settings**  
   A screenshot showing the settings page where users can configure their Dealique API key and other options.

2. **Checkout Page**  
   A screenshot of the WooCommerce checkout page displaying the Dealique payment option.

3. **Transaction Confirmation**  
   A screenshot showing the confirmation page after a successful transaction with Dealique.
