#!/usr/bin/env python3
"""
Apex Tattooz Claude Chat Logger
Logs conversations with Claude AI for project memory and searchability
"""

import os
import sys
import json
import argparse
from datetime import datetime
from pathlib import Path
from typing import Optional

# Add parent directory to path for imports
sys.path.append(str(Path(__file__).parent.parent))

class ClaudeChatLogger:
    def __init__(self, project_root: Optional[str] = None):
        self.project_root = Path(project_root) if project_root else Path(__file__).parent.parent.parent
        self.logs_dir = self.project_root / "claude" / "logs"
        self.prompts_dir = self.project_root / "claude" / "prompts"
        
        # Create directories
        self.logs_dir.mkdir(parents=True, exist_ok=True)
        self.prompts_dir.mkdir(parents=True, exist_ok=True)
        
        # Create security files
        self._create_security_files()
    
    def _create_security_files(self):
        """Create .htaccess and index.html for security"""
        htaccess_content = """
# Deny all access to Claude logs
<Files "*">
    Require all denied
</Files>
<IfModule mod_authz_core.c>
    Require all denied
</IfModule>
"""
        # Write .htaccess in logs directory
        with open(self.logs_dir / ".htaccess", "w") as f:
            f.write(htaccess_content)
        
        # Write index.html to prevent directory browsing
        index_content = "<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><h1>Access Denied</h1></body></html>"
        with open(self.logs_dir / "index.html", "w") as f:
            f.write(index_content)
    
    def log_conversation(self, title: str, prompt: str, response: str = "", 
                        tags: list = None, project_phase: str = "development"):
        """Log a conversation with Claude"""
        timestamp = datetime.now()
        date_str = timestamp.strftime("%Y-%m-%d_%H-%M-%S")
        
        # Clean title for filename
        clean_title = "".join(c for c in title if c.isalnum() or c in ('-', '_')).lower()
        
        # Create markdown file
        md_filename = f"{date_str}_{clean_title}.md"
        md_path = self.logs_dir / md_filename
        
        # Create JSON file for machine reading
        json_filename = f"{date_str}_{clean_title}.json"
        json_path = self.logs_dir / json_filename
        
        # Markdown content
        md_content = f"""# {title}

**Date:** {timestamp.strftime("%B %d, %Y at %I:%M %p")}  
**Project:** Apex Tattooz WordPress  
**Phase:** {project_phase}  
**Tags:** {', '.join(tags) if tags else 'none'}

---

## 🎯 Prompt

```
{prompt}
```

## 🤖 Claude Response

{response}

## 📊 Metadata

- **Session ID:** {date_str}_{clean_title}
- **Timestamp:** {timestamp.isoformat()}
- **Character Count:** {len(response)} chars
- **Word Count:** {len(response.split())} words

---

*Logged automatically by Apex Tattooz Claude Integration*
"""

        # JSON data
        json_data = {
            "session_id": f"{date_str}_{clean_title}",
            "timestamp": timestamp.isoformat(),
            "title": title,
            "prompt": prompt,
            "response": response,
            "tags": tags or [],
            "project": "apex-tattooz",
            "project_phase": project_phase,
            "metadata": {
                "char_count": len(response),
                "word_count": len(response.split()),
                "date_created": date_str
            }
        }
        
        # Write files
        with open(md_path, "w", encoding="utf-8") as f:
            f.write(md_content)
        
        with open(json_path, "w", encoding="utf-8") as f:
            json.dump(json_data, f, indent=2, ensure_ascii=False)
        
        return md_path, json_path
    
    def save_prompt_template(self, name: str, content: str, description: str = ""):
        """Save a reusable prompt template"""
        clean_name = "".join(c for c in name if c.isalnum() or c in ('-', '_')).lower()
        template_path = self.prompts_dir / f"{clean_name}.md"
        
        template_content = f"""# {name}

**Description:** {description}  
**Created:** {datetime.now().strftime("%Y-%m-%d")}  
**Project:** Apex Tattooz

---

## Prompt Template

```
{content}
```

## Usage

```bash
python claude/scripts/chat.py "session-name" "$(cat claude/prompts/{clean_name}.md | grep -A 1000 '```' | tail -n +2 | head -n -1)"
```

---

*Saved to Apex Tattooz Prompt Library*
"""
        
        with open(template_path, "w", encoding="utf-8") as f:
            f.write(template_content)
        
        return template_path
    
    def list_conversations(self, limit: int = 10):
        """List recent conversations"""
        json_files = sorted(self.logs_dir.glob("*.json"), reverse=True)[:limit]
        
        if not json_files:
            print("📝 No conversations found.")
            return
        
        print(f"📚 Last {len(json_files)} conversations:\n")
        
        for json_file in json_files:
            try:
                with open(json_file, "r", encoding="utf-8") as f:
                    data = json.load(f)
                
                title = data.get("title", "Untitled")
                timestamp = datetime.fromisoformat(data.get("timestamp", ""))
                tags = ", ".join(data.get("tags", []))
                word_count = data.get("metadata", {}).get("word_count", 0)
                
                print(f"📄 {title}")
                print(f"   📅 {timestamp.strftime('%m/%d/%Y %I:%M %p')}")
                print(f"   🏷️  {tags if tags else 'No tags'}")
                print(f"   📊 {word_count} words")
                print(f"   📁 {json_file.stem}")
                print()
                
            except Exception as e:
                print(f"❌ Error reading {json_file.name}: {e}")
    
    def search_conversations(self, query: str):
        """Search through conversations"""
        json_files = list(self.logs_dir.glob("*.json"))
        matches = []
        
        for json_file in json_files:
            try:
                with open(json_file, "r", encoding="utf-8") as f:
                    data = json.load(f)
                
                # Search in title, prompt, response, and tags
                searchable_text = " ".join([
                    data.get("title", ""),
                    data.get("prompt", ""),
                    data.get("response", ""),
                    " ".join(data.get("tags", []))
                ]).lower()
                
                if query.lower() in searchable_text:
                    matches.append((json_file, data))
                    
            except Exception as e:
                continue
        
        if not matches:
            print(f"🔍 No conversations found containing '{query}'")
            return
        
        print(f"🔍 Found {len(matches)} conversations containing '{query}':\n")
        
        for json_file, data in matches:
            title = data.get("title", "Untitled")
            timestamp = datetime.fromisoformat(data.get("timestamp", ""))
            print(f"📄 {title}")
            print(f"   📅 {timestamp.strftime('%m/%d/%Y %I:%M %p')}")
            print(f"   📁 {json_file.stem}")
            print()

def main():
    parser = argparse.ArgumentParser(description="Apex Tattooz Claude Chat Logger")
    parser.add_argument("title", nargs="?", help="Conversation title/topic")
    parser.add_argument("prompt", nargs="?", help="Prompt to send to Claude")
    parser.add_argument("response", nargs="?", default="", help="Claude's response")
    
    parser.add_argument("--list", "-l", action="store_true", help="List recent conversations")
    parser.add_argument("--search", "-s", help="Search conversations")
    parser.add_argument("--tags", "-t", nargs="*", help="Add tags to conversation")
    parser.add_argument("--phase", "-p", default="development", help="Project phase")
    parser.add_argument("--save-prompt", help="Save as reusable prompt template")
    parser.add_argument("--limit", type=int, default=10, help="Limit for list command")
    
    args = parser.parse_args()
    
    logger = ClaudeChatLogger()
    
    if args.list:
        logger.list_conversations(args.limit)
        return
    
    if args.search:
        logger.search_conversations(args.search)
        return
    
    if not args.title or not args.prompt:
        print("❌ Error: title and prompt are required")
        print("Usage: python chat.py 'title' 'prompt' ['response']")
        print("       python chat.py --list")
        print("       python chat.py --search 'query'")
        sys.exit(1)
    
    # Save conversation
    if args.save_prompt:
        template_path = logger.save_prompt_template(args.save_prompt, args.prompt, f"Saved from {args.title}")
        print(f"💾 Saved prompt template: {template_path.name}")
    
    md_path, json_path = logger.log_conversation(
        args.title, 
        args.prompt, 
        args.response, 
        args.tags,
        args.phase
    )
    
    print(f"✅ Conversation logged:")
    print(f"   📝 Markdown: {md_path.name}")
    print(f"   🗃️  JSON: {json_path.name}")
    
    if args.tags:
        print(f"   🏷️  Tags: {', '.join(args.tags)}")

if __name__ == "__main__":
    main()