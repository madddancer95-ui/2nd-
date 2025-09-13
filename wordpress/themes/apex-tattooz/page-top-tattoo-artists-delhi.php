<?php
/**
 * Template Name: Top Tattoo Artists Delhi
 * Description: Custom page template for top tattoo artists in Delhi
 */

get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="page-hero" style="background: linear-gradient(135deg, #0f0f0f 0%, #181818 100%); padding: 5rem 0; text-align: center;">
        <div class="container">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 4rem; color: #ffffff; margin-bottom: 1.5rem;">
                <?php the_title(); ?>
            </h1>
            <p style="font-size: 1.4rem; color: #cccccc; margin-bottom: 2rem; max-width: 700px; margin-left: auto; margin-right: auto;">
                Discover Delhi's most skilled tattoo artists at Apex Tattooz. Award-winning professionals specializing in custom designs, portraits, and traditional art.
            </p>
            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-bottom: 2rem;">
                <div style="background: rgba(255, 60, 0, 0.1); padding: 1rem 1.5rem; border-radius: 25px;">
                    🏆 Top 10 Artists
                </div>
                <div style="background: rgba(255, 60, 0, 0.1); padding: 1rem 1.5rem; border-radius: 25px;">
                    ⭐ 4.8/5 Rating
                </div>
                <div style="background: rgba(255, 60, 0, 0.1); padding: 1rem 1.5rem; border-radius: 25px;">
                    🎨 15+ Years Experience
                </div>
            </div>
        </div>
    </section>

    <!-- Lead Artist Section -->
    <section class="lead-artist" style="background: #181818; padding: 5rem 0;">
        <div class="container">
            <h2 style="font-family: 'Playfair Display', serif; color: #ffffff; text-align: center; font-size: 3rem; margin-bottom: 4rem;">
                Meet Delhi's #1 Tattoo Artist
            </h2>
            
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 4rem; align-items: center; max-width: 1200px; margin: 0 auto;">
                <div style="text-align: center;">
                    <div style="width: 300px; height: 300px; border-radius: 50%; background: linear-gradient(45deg, #ff3c00, #e63900); padding: 5px; margin: 0 auto 2rem;">
                        <div style="width: 100%; height: 100%; border-radius: 50%; background: #0f0f0f; display: flex; align-items: center; justify-content: center; font-size: 6rem;">
                            👨‍🎨
                        </div>
                    </div>
                    <h3 style="color: #ff3c00; font-size: 2.5rem; margin-bottom: 1rem; font-family: 'Playfair Display', serif;">Jamie Luna</h3>
                    <p style="color: #cccccc; font-size: 1.2rem; margin-bottom: 2rem;">Lead Artist & Co-Founder</p>
                    <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 2rem;">
                        <span style="background: rgba(255, 60, 0, 0.1); padding: 0.7rem 1.5rem; border-radius: 20px;">15+ Years</span>
                        <span style="background: rgba(255, 60, 0, 0.1); padding: 0.7rem 1.5rem; border-radius: 20px;">1000+ Tattoos</span>
                    </div>
                </div>
                
                <div>
                    <h4 style="color: #ff3c00; margin-bottom: 2rem; font-size: 1.8rem;">Why Jamie is Delhi's Top Artist</h4>
                    <ul style="color: #cccccc; margin-bottom: 3rem; list-style: none; padding: 0; font-size: 1.1rem; line-height: 2;">
                        <li style="margin-bottom: 1rem;">🎨 <strong>Hyper-realistic portraits</strong> - Celebrity-level detail</li>
                        <li style="margin-bottom: 1rem;">🕉️ <strong>Traditional Indian art</strong> - Cultural authenticity</li>
                        <li style="margin-bottom: 1rem;">🖤 <strong>Black & grey mastery</strong> - Award-winning technique</li>
                        <li style="margin-bottom: 1rem;">✨ <strong>Custom designs</strong> - Your vision, perfectly executed</li>
                    </ul>
                    
                    <a href="https://wa.me/91XXXXXXXXXX?text=Hi%20I%20want%20to%20book%20with%20Jamie%20Luna" 
                       style="background: linear-gradient(45deg, #ff3c00, #e63900); color: white; padding: 1.2rem 2.5rem; text-decoration: none; border-radius: 50px; font-weight: 600; display: inline-block; font-size: 1.1rem;">
                        📅 Book with Jamie Luna
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Top 10 Artists Grid -->
    <section class="artists-grid" style="background: #0f0f0f; padding: 5rem 0;">
        <div class="container">
            <h2 style="font-family: 'Playfair Display', serif; color: #ffffff; text-align: center; font-size: 3rem; margin-bottom: 4rem;">
                Delhi's Top 10 Tattoo Artists
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 3rem; margin-bottom: 4rem;">
                
                <!-- Artist Cards -->
                <?php for($i = 1; $i <= 10; $i++): ?>
                <div style="background: linear-gradient(135deg, #181818 0%, #1a1a1a 100%); padding: 2.5rem; border-radius: 15px; text-align: center; border: 1px solid rgba(255, 60, 0, 0.1);">
                    <div style="font-size: 4rem; margin-bottom: 1.5rem;">🎨</div>
                    <h3 style="color: #ff3c00; margin-bottom: 1rem; font-family: 'Playfair Display', serif;">Artist #<?php echo $i; ?></h3>
                    <p style="color: #cccccc; line-height: 1.6; margin-bottom: 2rem;">
                        Specialized in <?php echo ($i % 3 == 0) ? 'portrait tattoos' : (($i % 2 == 0) ? 'traditional designs' : 'custom artwork'); ?> with exceptional attention to detail and artistic excellence.
                    </p>
                    <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 2rem;">
                        <span style="background: rgba(255, 60, 0, 0.1); padding: 0.5rem 1rem; border-radius: 15px; font-size: 0.9rem;"><?php echo rand(5, 12); ?>+ Years</span>
                        <span style="background: rgba(255, 60, 0, 0.1); padding: 0.5rem 1rem; border-radius: 15px; font-size: 0.9rem;"><?php echo rand(200, 800); ?>+ Tattoos</span>
                    </div>
                    <a href="https://wa.me/91XXXXXXXXXX?text=Hi%20I%20want%20to%20book%20with%20Artist%20<?php echo $i; ?>" 
                       style="background: linear-gradient(45deg, #ff3c00, #e63900); color: white; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 25px; font-size: 0.9rem; display: inline-block;">
                        Book Artist #<?php echo $i; ?>
                    </a>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="why-choose" style="background: #181818; padding: 5rem 0;">
        <div class="container">
            <h2 style="font-family: 'Playfair Display', serif; color: #ffffff; text-align: center; font-size: 3rem; margin-bottom: 4rem;">
                Why Delhi Chooses Apex Tattooz Artists
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1.5rem;">🏆</div>
                    <h3 style="color: #ff3c00; margin-bottom: 1rem;">Award-Winning Artists</h3>
                    <p style="color: #cccccc;">Recognized experts with national and international awards for tattoo artistry.</p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1.5rem;">🎨</div>
                    <h3 style="color: #ff3c00; margin-bottom: 1rem;">Custom Design Masters</h3>
                    <p style="color: #cccccc;">Each artist creates unique, personalized designs that tell your story perfectly.</p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1.5rem;">🏥</div>
                    <h3 style="color: #ff3c00; margin-bottom: 1rem;">Hygiene Experts</h3>
                    <p style="color: #cccccc;">Medical-grade sterilization and safety protocols followed by every artist.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="background: #0f0f0f; padding: 5rem 0; text-align: center;">
        <div class="container">
            <h2 style="font-family: 'Playfair Display', serif; color: #ffffff; font-size: 3rem; margin-bottom: 2rem;">
                Ready to Work with Delhi's Best?
            </h2>
            <p style="color: #cccccc; font-size: 1.2rem; margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Choose your preferred artist and book a consultation to bring your tattoo vision to life.
            </p>
            <a href="https://wa.me/91XXXXXXXXXX?text=Hi%20I%20want%20to%20book%20with%20Delhi%27s%20top%20tattoo%20artists" 
               style="background: linear-gradient(45deg, #ff3c00, #e63900); color: white; padding: 1.5rem 3rem; text-decoration: none; border-radius: 50px; font-weight: 600; display: inline-block; font-size: 1.2rem;">
                📱 Book Your Artist Now
            </a>
        </div>
    </section>
</main>

<!-- Enhanced Schema for Artists Page -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Top 10 Tattoo Artists in Delhi - Apex Tattooz",
    "description": "Meet Delhi's most skilled tattoo artists at Apex Tattooz. Award-winning professionals specializing in custom designs, portraits, and traditional art.",
    "url": "<?php echo get_permalink(); ?>",
    "mainEntity": {
        "@type": "TattooParlor",
        "name": "Apex Tattooz",
        "employee": [
            {
                "@type": "Person",
                "name": "Jamie Luna",
                "jobTitle": "Lead Tattoo Artist",
                "hasCredential": "15+ Years Experience",
                "knowsAbout": ["Portrait Tattoos", "Traditional Indian Art", "Custom Designs"]
            }
        ],
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.8",
            "reviewCount": "150"
        }
    }
}
</script>

<?php get_footer(); ?>