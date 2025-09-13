<?php get_header(); ?>

<main>
    <div style="background: #0f0f0f; color: #fff; padding: 5rem 0; text-align: center;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem; margin-bottom: 2rem;">
                Welcome to Apex Tattooz
            </h1>
            <p style="font-size: 1.2rem; color: #ccc; margin-bottom: 3rem;">
                Delhi's Premier Tattoo Studio with Award-Winning Artists
            </p>
            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                <a href="<?php echo home_url('/top-tattoo-artists-delhi/'); ?>" 
                   style="background: linear-gradient(45deg, #ff3c00, #e63900); color: white; padding: 1rem 2rem; text-decoration: none; border-radius: 25px; font-weight: 600;">
                    Meet Our Top Artists
                </a>
                <a href="https://wa.me/91XXXXXXXXXX" 
                   style="background: transparent; color: #ff3c00; padding: 1rem 2rem; text-decoration: none; border-radius: 25px; border: 2px solid #ff3c00;">
                    Book Consultation
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>