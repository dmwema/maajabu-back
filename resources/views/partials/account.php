<?php
global $current_user, $homey_local;
wp_get_current_user();
$userID = $current_user->ID;
$first_name = $current_user->first_name;
$last_name = $current_user->last_name;
$display_name = $current_user->display_name;

$enable_wallet = homey_option('enable_wallet');


$homey_author = homey_get_author_by_id('36', '36', 'img-circle', $userID);
$author_photo = $homey_author['photo'];


$dashboard = homey_get_template_link_dash('template/dashboard.php');
$dashboard_profile = homey_get_template_link_dash('template/dashboard-profile.php');
$dashboard_listings = homey_get_template_link_dash('template/dashboard-listings.php');
$dashboard_add_listing = homey_get_template_link_dash('template/dashboard-submission.php');
$dashboard_favorites = homey_get_template_link_dash('template/dashboard-favorites.php');
$dashboard_search = homey_get_template_link_dash('template/dashboard-saved-searches.php');
$dashboard_reservations = homey_get_template_link_dash('template/dashboard-reservations.php');
$dashboard_host_reservations = homey_get_template_link_dash('template/dashboard-reservations2.php');
$dashboard_messages = homey_get_template_link_dash('template/dashboard-messages.php');
$dashboard_invoices = homey_get_template_link_dash('template/dashboard-invoices.php');

$dashboard_wallet = homey_get_template_link_dash('template/dashboard-wallet.php');
$earnings_page_link = add_query_arg('dpage', 'earnings', $dashboard_wallet);
$payout_request_link = add_query_arg('dpage', 'payout-request', $dashboard_wallet);
$payouts_page_link = add_query_arg('dpage', 'payouts', $dashboard_wallet);
$payouts_setup_page = add_query_arg('dpage', 'payment-method', $dashboard_wallet);

$all_users = add_query_arg('dpage', 'users', $dashboard);

$home_link = home_url('/');

$reservation_payment = homey_option('reservation_payment');

?>
<!-- Comme on connecte un Utilisateur en Arrière Plan, On ne doit pas Afficher l'icône de connexion qui indique que l'utilisateur est connecté-->

<!-- Comme on connecte un Utilisateur en Arrière Plan, On ne doit pas Afficher l'icône de connexion qui indique que l'utilisateur est connecté-->
<?php if (is_user_logged_in() && homey_is_renter() && (get_the_title() == 'Accueil' || get_the_title() == 'Qui sommes-nous' || get_the_title() == 'Contact')) {
    //Quand un utilisateur "Renter" est sur les pages 'Accueil',
    ob_start(); //Voir sa définition
    wp_logout();
    ob_end_clean();
} elseif (is_user_logged_in() && homey_is_renter()) {
    //wp_logout_url(home_url('/')):  && get_post_type() != 'listing'
    //wp_logout_url(home_url('/'))
    //wp_safe_redirect(wp_login_url());
    echo '
    <a href="' . wp_logout_url(home_url('/')) . '" class="btn btn-booking" style="color: #4f5962; font-size: 14px; font-family: Quicksand; text-transform: none; line-height: 80px; font-weight: 700;">Quitter</a>
    ';
} elseif (is_user_logged_in() && !homey_is_renter()) { ?>
    <div class="account-loggedin">
        <?php echo esc_html($display_name); ?>

        <span class="user-image">
        <?php echo homey_messages_notification('user-alert'); ?>
        <?php echo '' . $author_photo; ?>
    </span>
        <div class="account-dropdown">
            <ul>
                <?php
                if (!empty($dashboard)) {
                    echo '<li>
                        <a href="' . esc_url($dashboard) . '">
                            <i class="fa fa-home"></i> ' . $homey_local['m_dashboard_label'] . '
                        </a>
                    </li>';
                }

                if (!empty($dashboard_profile)) {
                    echo '<li>
                    <a href="' . esc_url($dashboard_profile) . '">
                        <i class="fa fa-user-o"></i> ' . $homey_local['m_profile_label'] . '
                    </a>
                </li>';

                }

                if (!homey_is_renter()) {
                    if (!empty($dashboard_listings)) {
                        echo '<li>
                        <a href="' . esc_url($dashboard_listings) . '"><i class="fa fa-th-list"></i> ' . $homey_local['m_listings_label'] . '</a>
                    </li>';
                    }

                    if (!empty($dashboard_add_listing)) {
                        echo '<li>
                        <a href="' . esc_url($dashboard_add_listing) . '"><i class="fa fa-plus-circle"></i> ' . $homey_local['m_add_listing_label'] . ' </a>
                    </li>';
                    }
                }


                if (!empty($dashboard_reservations)) {

                    if (homey_is_renter()) {
                        echo '<li>
                        <a href="' . esc_url($dashboard_reservations) . '"><i class="fa fa-calendar"></i>  ' . $homey_local['m_reservation_label'] . '</a>
                    </li>';
                    } elseif (homey_is_admin()) {
                        echo '<li>
                        <a href="' . esc_url($dashboard_reservations) . '"><i class="fa fa-calendar"></i>  ' . esc_html__('Bookings', 'homey') . '</a>
                    </li>';
                    } else {
                        echo '<li>
                        <a href="' . esc_url($dashboard_reservations) . '"><i class="fa fa-calendar"></i>  ' . esc_html__('My Bookings', 'homey') . '</a>
                    </li>';
                    }
                }

                if (!empty($dashboard_host_reservations) && !homey_is_renter()) {
                    echo '<li>
                    <a href="' . esc_url($dashboard_host_reservations) . '"><i class="fa fa-calendar"></i>  ' . esc_html__('My Reservations', 'homey') . '</a>
                </li>';
                }

                if ($enable_wallet != 0) {
                    if ($reservation_payment == 'percent' || $reservation_payment == 'full') {
                        if (homey_is_host()) {
                            if (!empty($dashboard_wallet)) {
                                echo '<li>
                                <a href="' . esc_url($dashboard_wallet) . '"><i class="fa fa-money"></i> ' . esc_html__('Wallet', 'homey') . '</a>
                            </li>';
                            }
                        }

                        if (homey_is_renter()) {
                            if (!empty($dashboard_wallet)) {
                                echo '<li>
                                <a href="' . esc_url($dashboard_wallet) . '"><i class="fa fa-money"></i> ' . esc_html__('Wallet', 'homey') . '</a>
                            </li>';
                            }
                        }

                        if (homey_is_admin()) {
                            if (!empty($dashboard_wallet)) {
                                echo '<li>
                                <a href="' . esc_url($payouts_page_link) . '"><i class="fa fa-money"></i> ' . esc_html__('Payouts', 'homey') . '</a>
                            </li>';
                            }
                        }
                    }
                }

                if (!empty($dashboard_favorites)) {
                    echo '<li>
                    <a href="' . esc_url($dashboard_favorites) . '"><i class="fa fa-heart-o"></i> ' . $homey_local['m_favorites_label'] . ' </a>
                </li>';
                }

                if (!empty($dashboard_invoices)) {
                    echo '<li>
                    <a href="' . esc_url($dashboard_invoices) . '"><i class="fa fa-file"></i> ' . $homey_local['m_invoices_label'] . ' </a>
                </li>';
                }

                if (homey_is_admin()) {
                    if (!empty($all_users)) {
                        echo '<li class="">
                        <a href="' . esc_url($all_users) . '"><i class="fa fa-users"></i> ' . esc_html__('Users', 'homey') . '</a>
                    </li>';
                    }
                }


                if (!empty($dashboard_messages)) {
                    echo '<li>
                    <a href="' . esc_url($dashboard_messages) . '"><i class="fa fa-comments-o"></i> ' . $homey_local['m_messages_label'] . '
                    ' . homey_messages_notification() . '
                    </a>
                </li>';
                }

                echo '<li>
                <a href="' . wp_logout_url(home_url('/')) . '"><i class="fa fa-sign-out"></i> ' . $homey_local['m_logout_label'] . ' </a>
            </li>';
                ?>
            </ul>
        </div>
    </div>

    <?php
//On ferme le "Else"
} ?>
