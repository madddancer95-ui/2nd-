<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php if (is_page('top-tattoo-artists-delhi')): ?>
    <!-- SEO for Top Tattoo Artists Delhi Page -->
    <title>Top 10 Tattoo Artists in Delhi 2025 | Best Tattoo Studio Delhi NCR</title>
    <meta name="description" content="Meet Delhi's top 10 tattoo artists at Apex Tattooz. Award-winning professionals specializing in custom designs, portraits & traditional art. Book now!">
    <meta name="keywords" content="top tattoo artists delhi, best tattoo artist delhi, professional tattoo artist, delhi tattoo studio, custom tattoo design delhi">
    <link rel="canonical" href="<?php echo get_permalink(); ?>">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Top 10 Tattoo Artists in Delhi 2025 | Apex Tattooz">
    <meta property="og:description" content="Meet Delhi's most skilled tattoo artists. Award-winning professionals with 15+ years experience.">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:type" content="website">
    <?php else: ?>
    <!-- Default SEO -->
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>
    
    <!-- Local Business Tags -->
    <meta name="geo.region" content="IN-DL">
    <meta name="geo.placename" content="Delhi">
    <meta name="geo.position" content="28.6871;77.2056">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header" style="background: #0f0f0f; padding: 1rem 0;">
    <nav class="main-navigation" style="background: #181818; border-bottom: 3px solid #ff3c00;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1 style="font-family: 'Playfair Display', serif; margin: 0; color: #fff; font-size: 2rem;">
                        <a href="<?php echo home_url('/'); ?>" style="color: #fff; text-decoration: none;">
                            Apex Tattooz
                        </a>
                    </h1>
                    <p style="margin: 0; color: #ccc; font-size: 14px;">Delhi's Premium Tattoo Studio</p>
                </div>
                <div>
                    <a href="https://wa.me/91XXXXXXXXXX" style="background: #ff3c00; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 25px; font-size: 14px;">
                        📱 Book Now
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>