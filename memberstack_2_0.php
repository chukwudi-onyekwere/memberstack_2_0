<?php
/*
Plugin Name: Membersphere 1.0
Description: Integrates WordPress with Memberstack to control access to content.
Version: 1.0
Author: Chukwudi Onyekwere
*/

// Add settings page
function memberstack_settings_page() {
    ?>
    <div class="wrap">
        <h1>Memberstack Integration Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'memberstack_settings' ); ?>
            <?php do_settings_sections( 'memberstack_settings' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Memberstack App ID:</th>
                    <td><input type="text" style="width: 80%;" name="memberstack_app_id" value="<?php echo esc_attr( get_option('memberstack_app_id' ) ); ?>" /></td>
                </tr>
				<tr>
					<th scope="row" colspan="2"> SHORTCODES (You can modify the id, classes, price_id)</th>
				</tr>
				<tr>
					<th> Login Modal:</th>
                    <td>[ms_login_modal href="#my-link" class="my-class" button="true"]Log in[/ms_login_modal]</td>
				</tr>
				<tr>
					<th> Signup Modal:</th>
					<td>[ms_signup_modal href="#my-link" class="my-class" button="true"]Sign up[/ms_signup_modal]</td>
				</tr>
				<tr>
					<th> Logout Modal:</th>
					<td>[ms_logout href="#my-link" class="my-class" button="true"]Logout[/ms_logout]</td>
				</tr>
				<tr>
					<th> Profile Modal:</th>
					<td>[ms_profile href="#my-link" class="my-class" button="true"] Profile [/ms_profile]</td>
				</tr>
				<tr>
					<th> Customer Portal:</th>
					<td>[ms_customer_portal href="#my-link" class="my-class" button="true"] Open Customer Portal[/ms_customer_portal]</td>
				</tr>
				<tr>
					<th> Forgot Password:</th>
					<td>[ms_forgot_password href="#my-link" class="my-class" button="true"] Forgot Password [/ms_forgot_password]</td>
				</tr>	
                <tr>
                    <th> Show content to Logged-In Members:</th>
                    <td>[ms_content_members]This content will only be visible to logged-in members.[/ms_content_members]</td>
                </tr>
                <tr>
                    <th> Show content to Logged-out Members:</th>
                    <td>[ms_content_non_members]This content will be visible to logged-out members.[/ms_content_non_members]</td>
                </tr>	
                <tr>
                    <th> Resend Verification Email:</th>
                    <td>[ms_resend_verification_email class="button" button="true"]Resend Verification Email[/ms_resend_verification_email]</td>
                </tr>	
                <tr>
                    <th> Redirect the member to their Login Redirect Url:</th>
                    <td>[ms_login_redirect href="/pagelinkgoeshere" class="button" button="false"]Update Price[/ms_login_redirect]</td>
                </tr>	
                <tr>
                    <th> Add a paid plan to a member:</th>
                    <td>[ms_add_price href="#" class="button" button="true" price_id="prc_your_price_id"]Update Price[/ms_add_price]</td>
                </tr>	
                <tr>
                    <th> Update/replace a paid plan:</th>
                    <td>[ms_update_price href="#" class="button" button="true" price_id="prc_your_price_id"]Update Price[/ms_update_price]</td>
                </tr>	
                <tr>
                    <th>Clear out any previously selected plans:</th>
                    <td>[ms_remove_price href="#" class="button" button="false"]Remove all[/ms_remove_price]</td>
                </tr>
                <tr>
                    <th>Add Free Plan:</th>
                    <td>[ms_add_free_plan plan_id="YOUR_PLAN_ID" button="true"]Add Free Plan[/ms_add_free_plan]</td>
                </tr>
                <tr>
                    <th>Remove Free Plan:</th>
                    <td>[ms_remove_free_plan plan_id="YOUR_PLAN_ID" button="true"]Remove Free Plan[/ms_remove_free_plan]</td>
                </tr>
                <tr>
                    <th> Authentication Provider:</th>
                    <td>[ms_auth_provider provider="google"]Continue with Google[/ms_auth_provider]</td>
                </tr>
                <tr>
                    <th> Manage Providers:</th>
                    <td>[ms_auth_manage_providers] 
                        [ms_auth_provider provider="google"]Connect Google[/ms_auth_provider] 
                    [/ms_auth_manage_providers]</td>
                </tr>
                <tr>
                    <th> Auth Connected Text:</th>
                    <td>[ms_auth_connected_text text="Disconnect Google"]Connect Google[/ms_auth_connected_text]</td>
                </tr>
                <tr>
                    <th> Auth Disconnect Element:</th>
                    <td>[ms_auth_provider provider="google"] 
                        [ms_auth_disconnect]X[/ms_auth_disconnect] 
                        Connect Google 
                    [/ms_auth_provider]</td>
                </tr>	
                <tr>
                    <th> Commenting Section:</th>
                    <td>[data-ms-channel="your_channel_id"]</td>
                </tr>
                <tr>
                    <th> Manage Post Items:</th>
                    <td>[data-ms-post="showThreads/edit/delete/content/isModerator/ownerProfileImage/hidden"]</td>
                </tr>
                <tr>
                    <th> Manage Threads and Replies:</th>
                    <td>[data-ms-thread="container/item/loadMore/content/sort"]</td>
                </tr>
                <tr>
                    <th> Custom Loader:</th>
                    <td>[ms_loader] Loading Image icon goes here... [/ms_loader]</td>
                </tr>
                <tr>
                    <th> Data Binding Style:</th>
                    <td>[ms_bind_style cssProperty="display" value="block"]Please Update Payment[/ms_bind_style]</td>
                </tr>
                <tr>
                    <th> Data Binding Class:</th>
                    <td>[ms_bind_class className="admin-panel"]Admin Panel[/ms_bind_class]</td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register settings
function memberstack_register_settings() {
    register_setting( 'memberstack_settings', 'memberstack_app_id' );
}
add_action( 'admin_init', 'memberstack_register_settings' );

// Add Memberstack script to header
function memberstack_script() {
    $ms_app_id = get_option( 'memberstack_app_id' );
    if ( ! empty( $ms_app_id ) ) {
        echo '<script data-memberstack-app="' . $ms_app_id . '" src="https://static.memberstack.com/scripts/v1/memberstack.js" type="text/javascript"></script>';
    }
}
add_action( 'wp_head', 'memberstack_script' );

// Add settings link to plugin page
function memberstack_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=memberstack-settings">Settings</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'memberstack_settings_link' );

// Add settings page to menu
function memberstack_settings_menu() {
    add_options_page( 'Memberstack Integration Settings', 'Memberstack', 'manage_options', 'memberstack-settings', 'memberstack_settings_page' );
}
add_action( 'admin_menu', 'memberstack_settings_menu' );

// Data Bind Style shortcode
function ms_bind_style_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'cssProperty' => '',
        'value' => '',
    ), $atts );

    if ( empty( $atts['cssProperty'] ) || empty( $atts['value'] ) ) {
        return ''; // Return empty if cssProperty or value is not specified
    }

    $style_attr = 'data-ms-bind:style="' . esc_attr( $atts['cssProperty'] ) . ':' . esc_attr( $atts['value'] ) . '"';
    return '<div ' . $style_attr . '>' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_bind_style', 'ms_bind_style_shortcode' );

// Custom Loader shortcode
function ms_custom_loader_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'style' => 'display: none;', // Default style to hide the loader
    ), $atts );

    $style_attr = esc_attr( $atts['style'] );
    return '<div data-ms-loader style="' . $style_attr . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_loader', 'ms_custom_loader_shortcode' );

// Commenting Section shortcode
function ms_commenting_section_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'channel' => '',
    ), $atts );

    if ( empty( $atts['channel'] ) ) {
        return ''; // Return empty if channel is not specified
    }

    $channel_attr = 'data-ms-channel="' . esc_attr( $atts['channel']) . '"';
    return '<div ' . $channel_attr . '>' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_commenting_section', 'ms_commenting_section_shortcode' );

// Individual Post shortcode
function ms_post_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'post' => '',
    ), $atts );

    if ( empty( $atts['post'] ) ) {
        return ''; // Return empty if post is not specified
    }

    $post_attr = 'data-ms-post="' . esc_attr( $atts['post']) . '"';
    return '<div ' . $post_attr . '>' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_post', 'ms_post_shortcode' );

// Thread Management shortcode
function ms_thread_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'thread' => '',
    ), $atts );

    if ( empty( $atts['thread'] ) ) {
        return ''; // Return empty if thread is not specified
    }

    $thread_attr = 'data-ms-thread="' . esc_attr( $atts['thread']) . '"';
    return '<div ' . $thread_attr . '>' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_thread', 'ms_thread_shortcode' );

// Authentication Provider shortcode
function ms_auth_provider_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'provider' => '',
        'href' => '#',
    ), $atts );

    if ( empty( $atts['provider'] ) ) {
        return ''; // Return empty if provider is not specified
    }

    $provider_attr = 'data-ms-auth-provider="' . esc_attr( $atts['provider'] ) . '"';
    return '<a ' . $provider_attr . ' href="' . esc_attr( $atts['href'] ) . '">' . do_shortcode( $content ) . '</a>';
}
add_shortcode( 'ms_auth_provider', 'ms_auth_provider_shortcode' );

// Manage Providers shortcode
function ms_auth_manage_providers_shortcode( $atts, $content = '' ) {
    return '<div data-ms-auth="manage-providers">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_auth_manage_providers', 'ms_auth_manage_providers_shortcode' );

// Auth Connected Text shortcode
function ms_auth_connected_text_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'text' => '',
    ), $atts );

    return '<div data-ms-auth-connected-text="' . esc_attr( $atts['text'] ) . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_auth_connected_text', 'ms_auth_connected_text_shortcode' );

// Auth Disconnect shortcode
function ms_auth_disconnect_shortcode( $atts, $content = '' ) {
    return '<div data-ms-auth-disconnect>' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ms_auth_disconnect', 'ms_auth_disconnect_shortcode' );

function ms_add_free_plan_shortcode($atts, $content = null) {
    $plan_id = isset($atts['plan_id']) ? esc_attr($atts['plan_id']) : '';
    $button = isset($atts['button']) ? esc_attr($atts['button']) : 'false';

    if ($button === 'true') {
        return '<a data-ms-plan:add="' . $plan_id . '" href="#" class="button">' . do_shortcode($content) . '</a>';
    } else {
        return '<form data-ms-form="signup" data-ms-plan:add="' . $plan_id . '"><input type="submit" value="' . esc_html($content) . '"></form>';
    }
}
add_shortcode('ms_add_free_plan', 'ms_add_free_plan_shortcode');

function ms_remove_free_plan_shortcode($atts, $content = null) {
    $plan_id = isset($atts['plan_id']) ? esc_attr($atts['plan_id']) : '';

    return '<a data-ms-plan:remove="' . $plan_id . '" href="#">' . do_shortcode($content) . '</a>';
}
add_shortcode('ms_remove_free_plan', 'ms_remove_free_plan_shortcode');
// Shortcodes for content visibility based on Memberstack states
function ms_content_shortcode($state, $content = null) {
    return '<div data-ms-content="' . esc_attr($state) . '">' . do_shortcode($content) . '</div>';
}

function ms_content_verified_shortcode($atts, $content = null) {
    return ms_content_shortcode('verified', $content);
}
add_shortcode('ms_content_verified', 'ms_content_verified_shortcode');

function ms_content_unverified_shortcode($atts, $content = null) {
    return ms_content_shortcode('!verified', $content);
}
add_shortcode('ms_content_unverified', 'ms_content_unverified_shortcode');

function ms_content_trialing_shortcode($atts, $content = null) {
    return ms_content_shortcode('is-trialing', $content);
}
add_shortcode('ms_content_trialing', 'ms_content_trialing_shortcode');

function ms_content_not_trialing_shortcode($atts, $content = null) {
    return ms_content_shortcode('!is-trialing', $content);
}
add_shortcode('ms_content_not_trialing', 'ms_content_not_trialing_shortcode');

function ms_content_free_plans_shortcode($atts, $content = null) {
    return ms_content_shortcode('free-plans', $content);
}
add_shortcode('ms_content_free_plans', 'ms_content_free_plans_shortcode');

function ms_content_no_free_plans_shortcode($atts, $content = null) {
    return ms_content_shortcode('!free-plans', $content);
}
add_shortcode('ms_content_no_free_plans', 'ms_content_no_free_plans_shortcode');

function ms_content_paid_plans_shortcode($atts, $content = null) {
    return ms_content_shortcode('paid-plans', $content);
}
add_shortcode('ms_content_paid_plans', 'ms_content_paid_plans_shortcode');

function ms_content_no_paid_plans_shortcode($atts, $content = null) {
    return ms_content_shortcode('!paid-plans', $content);
}
add_shortcode('ms_content_no_paid_plans', 'ms_content_no_paid_plans_shortcode');

function ms_content_no_plans_shortcode($atts, $content = null) {
    return ms_content_shortcode('no-plans', $content);
}
add_shortcode('ms_content_no_plans', 'ms_content_no_plans_shortcode');

function ms_content_has_plans_shortcode($atts, $content = null) {
    return ms_content_shortcode('!no-plans', $content);
}
add_shortcode('ms_content_has_plans', 'ms_content_has_plans_shortcode');

function ms_content_has_password_shortcode($atts, $content = null) {
    return ms_content_shortcode('has-password', $content);
}
add_shortcode('ms_content_has_password', 'ms_content_has_password_shortcode');

function ms_content_no_password_shortcode($atts, $content = null) {
    return ms_content_shortcode('!has-password', $content);
}
add_shortcode('ms_content_no_password', 'ms_content_no_password_shortcode');

function ms_content_content_group_shortcode($atts, $content = null) {
    $content_group_id = isset($atts['id']) ? esc_attr($atts['id']) : '';
    return ms_content_shortcode('CONTENT_GROUP_ID', $content);
}
add_shortcode('ms_content_content_group', 'ms_content_content_group_shortcode');

function ms_content_no_content_group_shortcode($atts, $content = null) {
    $content_group_id = isset($atts['id']) ? esc_attr($atts['id']) : '';
    return ms_content_shortcode('!CONTENT_GROUP_ID', $content);
}
add_shortcode('ms_content_no_content_group', 'ms_content_no_content_group_shortcode');

//Shortcode to show an element only to loggedin members.
function ms_content_members_shortcode( $atts, $content = null ) {
        return '<div data-ms-content="members">' . do_shortcode( $content ) . '</div>';
    
}
add_shortcode( 'ms_content_members', 'ms_content_members_shortcode' );

//Shortocde to show an element only to loggedout members.
function ms_content_non_members_shortcode( $atts, $content = null ) {
        return '<div data-ms-content="!members">' . do_shortcode( $content ) . '</div>';
    
}
add_shortcode( 'ms_content_non_members', 'ms_content_non_members_shortcode' );


//Login Modal shortcode
function ms_login_modal_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $modal_attr = 'data-ms-modal="login"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_login_modal', 'ms_login_modal_shortcode' );

//Signup Modal shortcode
function ms_signup_modal_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $modal_attr = 'data-ms-modal="signup"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_signup_modal', 'ms_signup_modal_shortcode' );

//Logout shortcode
function ms_logout_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $modal_attr = 'data-ms-action="logout"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_logout', 'ms_logout_shortcode' );

//Profile modal shortcode
function ms_profile_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $modal_attr = 'data-ms-modal="profile"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_profile', 'ms_profile_shortcode' );

//Forgot password modal shortcode
function ms_forgot_password_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $modal_attr = 'data-ms-modal="forgot-password"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_forgot_password', 'ms_forgot_password_shortcode' );


//Customer portal shortcode
function ms_customer_portal_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $modal_attr = 'data-ms-action="customer-portal"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $modal_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_customer_portal', 'ms_customer_portal_shortcode' );

//Resend Verification Email shortcode
function ms_resend_verification_email_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $action_attr = 'data-ms-action="resend-verification-email"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $action_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $action_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_resend_verification_email', 'ms_resend_verification_email_shortcode' );

//Login redirect shortcode
function ms_login_redirect_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'button' => false,
    ), $atts );
    
    $action_attr = 'data-ms-action="login-redirect"';
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
    
    if ( $atts['button'] ) {
        return '<button type="button" ' . $action_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $action_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_login_redirect', 'ms_login_redirect_shortcode' );


//Add Price shortcode
function ms_add_price_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'price_id' => '',
		'button' => false,
    ), $atts );
    
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
	$price_attr = 'data-ms-price:add="' . esc_attr( $atts['price_id'] ) . '"';
	if ( $atts['button'] ) {
        return '<button type="button" ' . $price_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $price_attr . ' ' . $class_attr . '>' . $content . '</a>';
    }
}
add_shortcode( 'ms_add_price', 'ms_add_price_shortcode' );


//Update Price Link
function ms_update_price_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
        'price_id' => '',
		'button' => false,
    ), $atts );
    
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
	$price_attr = 'data-ms-price:update="' . esc_attr( $atts['price_id'] ) . '"';
    if ( $atts['button'] ) {
        return '<button type="button" ' . $price_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $price_attr . ' ' . $class_attr . '>' . $content . '</a>';
	}
}
add_shortcode( 'ms_update_price', 'ms_update_price_shortcode' );

//Remove Price Link shortcode
function ms_remove_price_shortcode( $atts, $content = '' ) {
    $atts = shortcode_atts( array(
        'href' => '#',
        'class' => '',
		'button' => false,
    ), $atts );
    
    $class_attr = 'class="' . esc_attr( $atts['class'] ) . '"';
	$price_attr = 'data-ms-price:remove="all"';
    if ( $atts['button'] ) {
        return '<button type="button" ' . $price_attr . ' ' . $class_attr . '>' . $content . '</button>';
    } else {
        return '<a href="' . esc_attr( $atts['href'] ) . '" ' . $price_attr . ' ' . $class_attr . '>' . $content . '</a>';
	}
}
add_shortcode( 'ms_remove_price', 'ms_remove_price_shortcode' );
