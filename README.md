# Apex Tattooz WordPress + Claude Integration

Complete automation setup for WordPress development with Claude AI logging and GitHub Actions deployment.

## 🚀 Features

- **WordPress Development**: Organized theme/plugin structure
- **Claude Integration**: Automatic conversation logging and memory
- **GitHub Actions**: Automated deployment with SSH
- **Security**: Encrypted secrets, backup systems
- **Memory System**: Searchable chat logs and project history

## 📁 Structure

```
├── wordpress/          # WordPress files (theme/plugins)
├── automation/         # Deployment & backup scripts  
├── claude/            # Claude integration & logs
├── .github/workflows/ # GitHub Actions
└── docs/             # Documentation
```

## 🛠 Setup Instructions

1. **Clone & Initialize**
   ```bash
   git clone https://github.com/yourusername/apex-tattooz-wp-claude.git
   cd apex-tattooz-wp-claude
   cp .env.example .env
   ```

2. **Configure Secrets**
   - Add GitHub Secrets for deployment
   - Set ANTHROPIC_API_KEY in .env

3. **Deploy**
   ```bash
   git add .
   git commit -m "Initial setup"
   git push
   ```

## 📝 Daily Workflow

```bash
# 1. Chat with Claude & log
python claude/scripts/chat.py "feature-name" "prompt here"

# 2. Edit files
# 3. Deploy
git add . && git commit -m "update: description" && git push
```

## 🔒 Security

- All secrets in GitHub Secrets or .env (gitignored)
- Claude logs protected from web access
- SSH keys for deployment
- Regular backups before deployment

---
*Generated for Apex Tattooz WordPress automation*