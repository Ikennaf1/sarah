<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$display_name = get_option('display_name');
$admin_email = get_bloginfo('admin_email');
$admin_user = get_user_by( 'email', $admin_email );
$admin_name = $admin_user
    ? $admin_user->get('first_name') . ' ' . $admin_user->get('last_name')
    : 'Unknown';
$name = $display_name ? $display_name : $admin_name;

$user_bio = get_option('user_bio');
$tagline = get_bloginfo('description');
$bio = $user_bio ? $user_bio : $tagline;

$cta = get_option('cta_text');
$cta = !empty($cta)
    ? $cta
    : 'Book me';

$user_title = get_option('user_title');
$user_title = !empty($user_title)
    ? $user_title
    : 'Copywriter';

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
    <div id="primary" <?php astra_primary_class(); ?>>

    <div class="flex flex-col gap-16 mb-16">
        <div class="">
            <div class="hero-section">
                <div class="hero-flex-1 hero-texts">
                    <div class="flex flex-col gap-8">
                        <h1 class="name-hero "><?= $name ?></h1>
                        <span class="title-hero"><?= $user_title ?></span>
                        <p class="text"><?= $bio ?></p>
                        <span class="hero-cta">
                            <a href="#" onclick="handleBookMePopUp()">
                                <span class="hero-cta-btn hero-cta-btn-book-me primary-bg-color"><?= $cta ?></span>
                            </a>
                            <!-- <a href="#" onclick="handleQuestionMePopUp()">
                                <span class="hero-cta-btn hero-cta-btn-question-me bordered-links">Ask me a question</span>
                            </a> -->
                        </span>
                    </div>
                </div>
                <!-- Hero image -->
                <div class="hero-flex-1 hero-pic">
                    <div class="hero-profile-picture">
                        <img
                            src="/wp-content/uploads/profile-picture.jpg"
                            alt="<?= $name ?>"
                            srcset=""
                            style="width: 100%; height: 100%; object-position: center; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

		<?php
		astra_primary_content_top();

		astra_content_loop();

		astra_pagination();

		astra_primary_content_bottom();
		?>
	</div><!-- #primary -->
<?php
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
