<?php
// Database connection
$host     = "localhost";
$username = "u776627341_gtcscurrent";
$password = "Amit@Gusain@2000";
$database = "u776627341_gtcs_website";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = strtolower(str_replace([' ', '&', '!', '?', '.', ','], ['-', 'and', '', '', '', ''], $title));
    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $author_name = $_POST['author_name'];
    $reading_time = $_POST['reading_time'];
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $status = $_POST['status'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $tags = $_POST['tags'];
    
    // Handle featured image upload
    $featured_image = '';
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $target_dir = "uploads/blog/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
        $new_filename = $slug . '_featured.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $target_file)) {
            $featured_image = $target_file;
        }
    }
    
    // Handle author avatar upload
    $author_avatar = '';
    if (isset($_FILES['author_avatar']) && $_FILES['author_avatar']['error'] == 0) {
        $target_dir = "uploads/avatars/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = pathinfo($_FILES['author_avatar']['name'], PATHINFO_EXTENSION);
        $new_filename = strtolower(str_replace(' ', '_', $author_name)) . '_avatar.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        if (move_uploaded_file($_FILES['author_avatar']['tmp_name'], $target_file)) {
            $author_avatar = $target_file;
        }
    }
    
    // Insert into database
    $sql = "INSERT INTO blogs (title, slug, excerpt, content, featured_image, category, author_name, author_avatar, reading_time, is_featured, status, meta_title, meta_description, tags) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssissss", $title, $slug, $excerpt, $content, $featured_image, $category, $author_name, $author_avatar, $reading_time, $is_featured, $status, $meta_title, $meta_description, $tags);
    
    if ($stmt->execute()) {
        $success_message = "Blog post added successfully!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

// Fetch categories
$categories_result = $conn->query("SELECT * FROM blog_categories ORDER BY name");
$categories = [];
if ($categories_result->num_rows > 0) {
    while ($row = $categories_result->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        .admin-container {
            max-width: 100%;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .form-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            color: #333;
            margin-bottom: 2rem;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 0.75rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-upload-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }
        .file-upload-label {
            background: #f8f9fa;
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .file-upload-label:hover {
            border-color: #667eea;
            background: #f0f2ff;
        }
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            margin-top: 1rem;
        }
        
        /* Custom Text Editor Styles */
        .text-editor-container {
            border: 1px solid #ddd;
            border-radius: 10px;
            background: white;
        }
        
        .editor-toolbar {
            border-bottom: 1px solid #e9ecef;
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 10px 10px 0 0;
            display: flex;
            flex-wrap: wrap;
            gap: 0.25rem;
        }
        
        .editor-btn {
            padding: 0.5rem 0.75rem;
            border: none;
            background: transparent;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.9rem;
        }
        
        .editor-btn:hover {
            background: #e9ecef;
        }
        
        .editor-btn.active {
            background: #667eea;
            color: white;
        }
        
        #content {
            border: none;
            border-radius: 0 0 10px 10px;
            resize: vertical;
            min-height: 400px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }
        
        #content:focus {
            outline: none;
            box-shadow: none;
        }
        
        .editor-help {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        
        .word-count {
            font-size: 0.8rem;
            color: #6c757d;
            text-align: right;
            padding: 0.25rem 0.5rem;
            border-top: 1px solid #e9ecef;
        }
        
        .markdown-preview {
            display: none;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #f8f9fa;
            margin-top: 1rem;
            min-height: 200px;
        }
    </style>
</head>
<body style="background: #f8f9fa;">
    <div class="admin-container">
        <div class="form-card">
            <h2 class="form-title">
                <i class="ri-article-line"></i> Add New Blog Post
            </h2>
            
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success">
                    <i class="ri-check-line"></i> <?php echo $success_message; ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <i class="ri-error-warning-line"></i> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Blog Title *</label>
                            <input type="text" class="form-control" name="title" required 
                                   placeholder="Enter blog title" value="<?php echo $_POST['title'] ?? ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Excerpt *</label>
                            <textarea class="form-control" name="excerpt" rows="3" required 
                                      placeholder="Brief description of the blog post..."><?php echo $_POST['excerpt'] ?? ''; ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Content *</label>
                            <div class="text-editor-container">
                                <div class="editor-toolbar">
                                    <button type="button" class="editor-btn" onclick="insertText('**', '**')" title="Bold">
                                        <i class="ri-bold"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('*', '*')" title="Italic">
                                        <i class="ri-italic"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('~~', '~~')" title="Strikethrough">
                                        <i class="ri-strikethrough"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('`', '`')" title="Code">
                                        <i class="ri-code-line"></i>
                                    </button>
                                    <div style="border-left: 1px solid #ddd; height: 24px; margin: 0 0.5rem;"></div>
                                    <button type="button" class="editor-btn" onclick="insertText('# ', '')" title="Heading 1">
                                        H1
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('## ', '')" title="Heading 2">
                                        H2
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('### ', '')" title="Heading 3">
                                        H3
                                    </button>
                                    <div style="border-left: 1px solid #ddd; height: 24px; margin: 0 0.5rem;"></div>
                                    <button type="button" class="editor-btn" onclick="insertText('- ', '')" title="Bullet List">
                                        <i class="ri-list-unordered"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('1. ', '')" title="Numbered List">
                                        <i class="ri-list-ordered"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('> ', '')" title="Quote">
                                        <i class="ri-double-quotes-l"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('[Link Text](', ')')" title="Link">
                                        <i class="ri-link"></i>
                                    </button>
                                    <button type="button" class="editor-btn" onclick="insertText('![Alt Text](', ')')" title="Image">
                                        <i class="ri-image-line"></i>
                                    </button>
                                    <div style="border-left: 1px solid #ddd; height: 24px; margin: 0 0.5rem;"></div>
                                    <button type="button" class="editor-btn" onclick="togglePreview()" title="Preview">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </div>
                                <textarea class="form-control" name="content" id="content" required 
                                          placeholder="Write your blog content here... You can use Markdown formatting."><?php echo $_POST['content'] ?? ''; ?></textarea>
                                <div class="word-count">
                                    <span id="wordCount">0</span> words | <span id="charCount">0</span> characters
                                </div>
                            </div>
                            <div class="editor-help">
                                <strong>Markdown Tips:</strong> Use **bold**, *italic*, # Heading, - List items, [Link](url), ![Image](url), `code`, > Quote
                            </div>
                            <div class="markdown-preview" id="markdownPreview"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Featured Image</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="featured_image" name="featured_image" accept="image/*">
                                <label for="featured_image" class="file-upload-label">
                                    <i class="ri-image-line" style="font-size: 2rem; color: #667eea;"></i>
                                    <div style="margin-top: 1rem;">
                                        <strong>Choose Featured Image</strong>
                                        <div style="color: #6c757d; font-size: 0.9rem;">JPG, PNG, GIF up to 5MB</div>
                                    </div>
                                </label>
                            </div>
                            <div id="featured_image_preview"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Category *</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['name']; ?>" 
                                            <?php echo (($_POST['category'] ?? '') == $category['name']) ? 'selected' : ''; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Author Name *</label>
                            <input type="text" class="form-control" name="author_name" required 
                                   placeholder="Author name" value="<?php echo $_POST['author_name'] ?? ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Author Avatar</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="author_avatar" name="author_avatar" accept="image/*">
                                <label for="author_avatar" class="file-upload-label">
                                    <i class="ri-user-line" style="font-size: 1.5rem; color: #667eea;"></i>
                                    <div style="margin-top: 0.5rem;">
                                        <strong>Author Avatar</strong>
                                    </div>
                                </label>
                            </div>
                            <div id="author_avatar_preview"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Reading Time (minutes)</label>
                            <input type="number" class="form-control" name="reading_time" min="1" max="60" 
                                   placeholder="5" value="<?php echo $_POST['reading_time'] ?? '5'; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="draft" <?php echo (($_POST['status'] ?? 'draft') == 'draft') ? 'selected' : ''; ?>>Draft</option>
                                <option value="published" <?php echo (($_POST['status'] ?? '') == 'published') ? 'selected' : ''; ?>>Published</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" 
                                       <?php echo (isset($_POST['is_featured'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="is_featured">
                                    Featured Post
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" 
                                   placeholder="JavaScript,React,Web Development" 
                                   value="<?php echo $_POST['tags'] ?? ''; ?>">
                            <small class="text-muted">Separate tags with commas</small>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <h5>SEO Settings</h5>
                <div class="form-group">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" 
                           placeholder="SEO title (optional)" value="<?php echo $_POST['meta_title'] ?? ''; ?>">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" 
                              placeholder="SEO description (optional)"><?php echo $_POST['meta_description'] ?? ''; ?></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-save-line"></i> Save Blog Post
                    </button>
                    <a href="blog.php" class="btn btn-secondary ms-2">
                        <i class="ri-arrow-left-line"></i> Back to Blog
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const contentTextarea = document.getElementById('content');
        const wordCountEl = document.getElementById('wordCount');
        const charCountEl = document.getElementById('charCount');
        const markdownPreview = document.getElementById('markdownPreview');
        let previewMode = false;
        
        // Word and character counting
        function updateCounts() {
            const text = contentTextarea.value;
            const words = text.trim() ? text.trim().split(/\s+/).length : 0;
            const chars = text.length;
            
            wordCountEl.textContent = words;
            charCountEl.textContent = chars;
        }
        
        contentTextarea.addEventListener('input', updateCounts);
        
        // Initial count
        updateCounts();
        
        // Insert text at cursor position
        function insertText(before, after) {
            const textarea = contentTextarea;
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const selectedText = textarea.value.substring(start, end);
            
            const newText = before + selectedText + after;
            textarea.value = textarea.value.substring(0, start) + newText + textarea.value.substring(end);
            
            // Position cursor
            const newCursorPos = start + before.length + selectedText.length;
            textarea.focus();
            textarea.setSelectionRange(newCursorPos, newCursorPos);
            
            updateCounts();
        }
        
        // Simple markdown to HTML conversion for preview
        function markdownToHTML(markdown) {
            let html = markdown;
            
            // Headers
            html = html.replace(/^### (.*$)/gm, '<h3>$1</h3>');
            html = html.replace(/^## (.*$)/gm, '<h2>$1</h2>');
            html = html.replace(/^# (.*$)/gm, '<h1>$1</h1>');
            
            // Bold and italic
            html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
            
            // Strikethrough
            html = html.replace(/~~(.*?)~~/g, '<del>$1</del>');
            
            // Code
            html = html.replace(/`(.*?)`/g, '<code>$1</code>');
            
            // Links
            html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2">$1</a>');
            
            // Images
            html = html.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1" style="max-width: 100%;">');
            
            // Lists
            html = html.replace(/^\* (.*$)/gm, '<li>$1</li>');
            html = html.replace(/^- (.*$)/gm, '<li>$1</li>');
            html = html.replace(/^\d+\. (.*$)/gm, '<li>$1</li>');
            
            // Quotes
            html = html.replace(/^> (.*$)/gm, '<blockquote>$1</blockquote>');
            
            // Line breaks
            html = html.replace(/\n\n/g, '</p><p>');
            html = '<p>' + html + '</p>';
            
            return html;
        }
        
        // Toggle preview mode
        function togglePreview() {
            previewMode = !previewMode;
            
            if (previewMode) {
                markdownPreview.innerHTML = markdownToHTML(contentTextarea.value);
                markdownPreview.style.display = 'block';
                contentTextarea.style.display = 'none';
            } else {
                markdownPreview.style.display = 'none';
                contentTextarea.style.display = 'block';
            }
        }
        
        // Image preview functionality
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).innerHTML = 
                        '<img src="' + e.target.result + '" class="preview-image" alt="Preview">';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        document.getElementById('featured_image').addEventListener('change', function() {
            previewImage(this, 'featured_image_preview');
        });
        
        document.getElementById('author_avatar').addEventListener('change', function() {
            previewImage(this, 'author_avatar_preview');
        });
        
        // Auto-generate slug preview
        document.querySelector('input[name="title"]').addEventListener('input', function() {
            const title = this.value.toLowerCase();
            const slug = title.replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
            // You can display the slug preview here if needed
        });
        
        // Keyboard shortcuts
        contentTextarea.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch(e.key) {
                    case 'b':
                        e.preventDefault();
                        insertText('**', '**');
                        break;
                    case 'i':
                        e.preventDefault();
                        insertText('*', '*');
                        break;
                    case 'k':
                        e.preventDefault();
                        insertText('[', '](url)');
                        break;
                }
            }
        });
    </script>
</body>
</html>

<?php $conn->close(); ?>