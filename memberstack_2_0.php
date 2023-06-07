<?php
/*
Plugin Name: Memberstack 2.0
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
					<th scope="row" colspan="2"> SHORTCODES (You can modify the ID and Classes)</th>
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
					<td>[ms_add_price href="#" class="button" button="true" price_id="prc_your_price_id"]Update Price[/ms_add_price]</td>
				</tr>	
        <tr>
					<th>Clear out any previously selected plans:</th>
					<td>[[ms_remove_price href="#" class="button" button="false"]Remove all[/ms_remove_price]</td>
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
    
    $modal_attr = 'data-ms-modal="forgot_password"';
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
    
    $modal_attr = 'data-ms-action="customer_portal"';
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
