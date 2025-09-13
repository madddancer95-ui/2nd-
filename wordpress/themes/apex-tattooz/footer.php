<footer style="background: #0f0f0f; color: #fff; padding: 3rem 0 1rem; margin-top: 5rem;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div>
                <h3 style="color: #ff3c00; margin-bottom: 1rem; font-family: 'Playfair Display', serif;">Apex Tattooz</h3>
                <p style="color: #ccc; line-height: 1.6; margin-bottom: 1rem;">Delhi's premier tattoo studio with award-winning artists and international hygiene standards.</p>
                <div>
                    <strong style="color: #ff3c00;">📍 Address:</strong><br>
                    <span style="color: #ccc;">GTB Nagar, Delhi 110009</span>
                </div>
            </div>
            <div>
                <h4 style="color: #ff3c00; margin-bottom: 1rem;">Quick Links</h4>
                <ul style="list-style: none; padding: 0; color: #ccc;">
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/'); ?>" style="color: #ccc; text-decoration: none;">Home</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/top-tattoo-artists-delhi/'); ?>" style="color: #ccc; text-decoration: none;">Top Artists</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="#" style="color: #ccc; text-decoration: none;">Gallery</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="#" style="color: #ccc; text-decoration: none;">Pricing</a></li>
                </ul>
            </div>
            <div>
                <h4 style="color: #ff3c00; margin-bottom: 1rem;">Contact Info</h4>
                <div style="color: #ccc;">
                    <p><strong>📞 Phone:</strong> +91-XXXXX-XXXXX</p>
                    <p><strong>🕒 Hours:</strong> Mon-Sun: 10AM-9PM</p>
                    <p><strong>📧 Email:</strong> info@apextattooz.com</p>
                </div>
            </div>
        </div>
        <div style="border-top: 1px solid #333; padding-top: 1rem; text-align: center; color: #888; font-size: 14px;">
            <p>&copy; <?php echo date('Y'); ?> Apex Tattooz. All rights reserved. | Delhi's Best Tattoo Studio</p>
        </div>
    </div>
</footer>

<!-- WhatsApp Float Button -->
<a href="https://wa.me/91XXXXXXXXXX?text=Hi%20I%20want%20to%20book%20a%20tattoo%20consultation" 
   style="position: fixed; width: 60px; height: 60px; bottom: 40px; right: 40px; background-color: #25d366; color: #FFF; border-radius: 50px; text-align: center; font-size: 30px; box-shadow: 2px 2px 3px #999; z-index: 100; transition: all 0.3s; display: flex; align-items: center; justify-content: center; text-decoration: none;"
   target="_blank">
   💬
</a>

<?php wp_footer(); ?>
</body>
</html>