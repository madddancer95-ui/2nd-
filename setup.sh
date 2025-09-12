#!/bin/bash

# Apex Tattooz WordPress + Claude Setup Script
# Run this after cloning the repository

set -e

echo "🚀 Setting up Apex Tattooz WordPress + Claude Integration..."
echo

# Check if we're in the right directory
if [ ! -f "README.md" ]; then
    echo "❌ Please run this script from the project root directory"
    exit 1
fi

# Initialize git if not already done
if [ ! -d ".git" ]; then
    echo "📦 Initializing Git repository..."
    git init
    git remote add origin https://github.com/madddancer95-ui/2nd-.git
fi

# Create .env from template
if [ ! -f ".env" ]; then
    echo "⚙️  Creating .env file from template..."
    cp .env.example .env
    echo "✅ Created .env file - please edit it with your credentials"
else
    echo "✅ .env file already exists"
fi

# Set up Python virtual environment
echo "🐍 Setting up Python environment..."
if [ ! -d "venv" ]; then
    python3 -m venv venv
    echo "✅ Created Python virtual environment"
fi

# Activate virtual environment and install dependencies
source venv/bin/activate
pip install --upgrade pip

# Create requirements.txt if it doesn't exist
if [ ! -f "requirements.txt" ]; then
    echo "📝 Creating requirements.txt..."
    cat > requirements.txt << EOF
anthropic>=0.7.0
python-dotenv>=0.19.0
requests>=2.28.0
beautifulsoup4>=4.11.0
markdown>=3.4.0
EOF
fi

pip install -r requirements.txt
echo "✅ Installed Python dependencies"

# Make scripts executable
echo "🔧 Making scripts executable..."
chmod +x claude/scripts/chat.py
chmod +x automation/deploy/*.sh 2>/dev/null || true
chmod +x automation/backup/*.sh 2>/dev/null || true

# Create sample WordPress theme structure
echo "🎨 Creating sample WordPress theme structure..."
mkdir -p wordpress/themes/apex-tattooz
mkdir -p wordpress/plugins/apex-custom

# Create sample theme files if they don't exist
if [ ! -f "wordpress/themes/apex-tattooz/style.css" ]; then
    cat > wordpress/themes/apex-tattooz/style.css << 'EOF'
/*
Theme Name: Apex Tattooz
Description: Custom WordPress theme for Apex Tattooz
Version: 1.0.0
Author: Apex Tattooz Team
*/

/* Theme styles will go here */
.apex-hero {
    background: linear-gradient(135deg, #1a1a1a 0%, #333 100%);
    color: white;
    padding: 4rem 0;
    text-align: center;
}

.apex-hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    font-weight: bold;
}

.apex-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
}
EOF
fi

if [ ! -f "wordpress/themes/apex-tattooz/index.php" ]; then
    cat > wordpress/themes/apex-tattooz/index.php << 'EOF'
<?php
/**
 * Apex Tattooz Theme
 * Main template file
 */
get_header(); ?>

<main class="main-content">
    <div class="apex-hero">
        <div class="container">
            <h1>Apex Tattooz</h1>
            <p>Professional Tattoo Artists in Delhi</p>
        </div>
    </div>
    
    <?php if (have_posts()) : ?>
        <div class="content-area">
            <div class="container">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <h2><?php the_title(); ?></h2>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
EOF
fi

# Create a sample prompt library
echo "📚 Creating sample prompt library..."
mkdir -p claude/prompts

if [ ! -f "claude/prompts/seo-optimization.md" ]; then
    cat > claude/prompts/seo-optimization.md << 'EOF'
# SEO Optimization Prompt

**Description:** Optimize content for search engines with focus on tattoo keywords  
**Created:** $(date +%Y-%m-%d)  
**Project:** Apex Tattooz

---

## Prompt Template

```
Please optimize the following content for SEO, focusing on tattoo-related keywords for Delhi market:

[CONTENT TO OPTIMIZE]

Requirements:
- Include relevant tattoo keywords naturally
- Optimize for local Delhi searches  
- Maintain engaging, human-readable content
- Suggest meta description and title tags
- Include internal linking suggestions
```

## Usage

```bash
python claude/scripts/chat.py "seo-optimization" "$(cat claude/prompts/seo-optimization.md | grep -A 1000 '```' | tail -n +2 | head -n -1)"
```

---

*Saved to Apex Tattooz Prompt Library*
EOF
fi

# Test the Claude logging system
echo "🧪 Testing Claude logging system..."
cd "$(dirname "$0")"
python3 claude/scripts/chat.py "setup-test" "Testing the Claude logging system during setup" "System setup completed successfully!" --tags setup test

echo
echo "✅ Setup completed successfully!"
echo
echo "📋 Next Steps:"
echo "1. Edit .env file with your credentials:"
echo "   nano .env"
echo
echo "2. Add GitHub Secrets for deployment:"
echo "   - SSH_PRIVATE_KEY (your deploy key)"  
echo "   - SSH_USER (your server username)"
echo "   - SERVER_HOST (your server IP/domain)"
echo "   - WP_PATH (path to WordPress on server)"
echo
echo "3. Test Claude logging:"
echo "   python claude/scripts/chat.py 'test-session' 'Hello Claude!'"
echo
echo "4. Start developing:"
echo "   - Edit files in wordpress/themes/apex-tattooz/"
echo "   - Commit and push to deploy automatically"
echo
echo "5. View conversation logs:"
echo "   python claude/scripts/chat.py --list"
echo
echo "🎉 Happy coding!"