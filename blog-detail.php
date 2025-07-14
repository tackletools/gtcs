<?php
// Database connection
$host = "localhost";
$username = "u776627341_gtcscurrent";
$password = "Amit@Gusain@2000";
$database = "u776627341_gtcs_website";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get blog slug from URL
$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
    header("Location: blog-list.php");
    exit;
}

// Get blog details
$stmt = $conn->prepare("SELECT * FROM blogs WHERE slug = ? AND status = 'published'");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: blog-list.php");
    exit;
}

$blog = $result->fetch_assoc();

// Update view count
$updateViews = $conn->prepare("UPDATE blogs SET views = views + 1 WHERE id = ?");
$updateViews->bind_param("i", $blog['id']);
$updateViews->execute();

// Get related posts
$relatedStmt = $conn->prepare("SELECT * FROM blogs WHERE category = ? AND id != ? AND status = 'published' ORDER BY created_at DESC LIMIT 3");
$relatedStmt->bind_param("si", $blog['category'], $blog['id']);
$relatedStmt->execute();
$relatedResult = $relatedStmt->get_result();
$relatedPosts = [];
while ($row = $relatedResult->fetch_assoc()) {
    $relatedPosts[] = $row;
}

// Get tags array
$tags = !empty($blog['tags']) ? explode(',', $blog['tags']) : [];

include "components/header.php";
?>
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>

<!-- Blog Header -->
<section class="py-5 bg-gradient-primary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-white-50">
                        <li class="breadcrumb-item"><a href="index.php" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog-list.php" class="text-white-50">Blog</a></li>
                        <li class="breadcrumb-item active text-white"><?php echo htmlspecialchars($blog['category']); ?></li>
                    </ol>
                </nav>
                
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="badge bg-light text-dark rounded-pill mb-3">
                            <i class="ri-folder-line"></i> <?php echo htmlspecialchars($blog['category']); ?>
                        </span>
                        
                        <h1 class="display-5 fw-bold text-white mb-4">
                            <?php echo htmlspecialchars($blog['title']); ?>
                        </h1>
                        
                        <div class="row g-4 text-white-50">
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <?php if ($blog['author_avatar']): ?>
                                        <img src="<?php echo htmlspecialchars($blog['author_avatar']); ?>" 
                                             class="rounded-circle me-2" width="40" height="40" 
                                             alt="<?php echo htmlspecialchars($blog['author_name']); ?>">
                                    <?php endif; ?>
                                    <div>
                                        <small class="d-block text-white"><?php echo htmlspecialchars($blog['author_name']); ?></small>
                                        <small>Author</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-auto">
                                <div>
                                    <i class="ri-calendar-line me-1"></i>
                                    <small class="d-block text-white"><?php echo date('M j, Y', strtotime($blog['created_at'])); ?></small>
                                    <small>Published</small>
                                </div>
                            </div>
                            
                            <div class="col-auto">
                                <div>
                                    <i class="ri-time-line me-1"></i>
                                    <small class="d-block text-white"><?php echo $blog['reading_time']; ?> min</small>
                                    <small>Read time</small>
                                </div>
                            </div>
                            
                            <div class="col-auto">
                                <div>
                                    <i class="ri-eye-line me-1"></i>
                                    <small class="d-block text-white"><?php echo number_format($blog['views']); ?></small>
                                    <small>Views</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-outline-light btn-sm" onclick="shareArticle()">
                                    <i class="ri-share-line"></i> Share
                                </button>
                                <button class="btn btn-outline-light btn-sm" onclick="printArticle()">
                                    <i class="ri-printer-line"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Featured Image -->
                <?php if ($blog['featured_image']): ?>
                    <div class="mb-5">
                        <img src="<?php echo htmlspecialchars($blog['featured_image']); ?>" 
                             class="img-fluid rounded shadow" 
                             alt="<?php echo htmlspecialchars($blog['title']); ?>">
                    </div>
                <?php endif; ?>
                
                <!-- Article Content -->
                <div class="blog-content">
                    <div class="lead mb-4 text-muted">
                        <?php echo htmlspecialchars($blog['excerpt']); ?>
                    </div>
                    
                    <div class="content-body">
                        <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
                    </div>
                </div>
                
                <!-- Tags -->
                <?php if (!empty($tags)): ?>
                    <div class="mt-5 pt-4 border-top">
                        <h6 class="mb-3">Tags:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($tags as $tag): ?>
                                <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                    <i class="ri-price-tag-3-line"></i> <?php echo htmlspecialchars(trim($tag)); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Social Share -->
                <div class="mt-5 pt-4 border-top">
                    <h6 class="mb-3">Share this article:</h6>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="shareOnTwitter()">
                            <i class="ri-twitter-line"></i> Twitter
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="shareOnFacebook()">
                            <i class="ri-facebook-line"></i> Facebook
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="shareOnLinkedIn()">
                            <i class="ri-linkedin-line"></i> LinkedIn
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="copyLink()">
                            <i class="ri-link"></i> Copy Link
                        </button>
                    </div>
                </div>
                
                <!-- Author Info -->
                <div class="mt-5 pt-4 border-top">
                    <div class="card border-0 bg-light">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <?php if ($blog['author_avatar']): ?>
                                        <img src="<?php echo htmlspecialchars($blog['author_avatar']); ?>" 
                                             class="rounded-circle" width="80" height="80" 
                                             alt="<?php echo htmlspecialchars($blog['author_name']); ?>">
                                    <?php else: ?>
                                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 80px;">
                                            <i class="ri-user-line text-white fs-2"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($blog['author_name']); ?></h6>
                                    <p class="text-muted mb-0">
                                        Passionate about sharing knowledge and insights in technology and digital innovation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 2rem;">
                    <!-- Table of Contents -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 pb-0">
                            <h6 class="mb-0">
                                <i class="ri-list-unordered"></i> Table of Contents
                            </h6>
                        </div>
                        <div class="card-body pt-2">
                            <div id="tableOfContents">
                                <p class="text-muted small mb-0">Content navigation will be generated here</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Newsletter Signup -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h6 class="mb-3">
                                <i class="ri-mail-line"></i> Stay Updated
                            </h6>
                            <p class="text-muted small mb-3">Get the latest tech insights delivered to your inbox.</p>
                            <form>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Your email">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-send-plane-line"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h6 class="mb-3">
                                <i class="ri-bookmark-line"></i> Quick Actions
                            </h6>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary btn-sm" onclick="bookmarkArticle()">
                                    <i class="ri-bookmark-2-line"></i> Bookmark
                                </button>
                                <button class="btn btn-outline-primary btn-sm" onclick="printArticle()">
                                    <i class="ri-printer-line"></i> Print Article
                                </button>
                                <button class="btn btn-outline-primary btn-sm" onclick="reportIssue()">
                                    <i class="ri-flag-line"></i> Report Issue
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Related Posts -->
                    <?php if (!empty($relatedPosts)): ?>
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-transparent border-0 pb-0">
                                <h6 class="mb-0">
                                    <i class="ri-article-line"></i> Related Articles
                                </h6>
                            </div>
                            <div class="card-body pt-2">
                                <?php foreach ($relatedPosts as $related): ?>
                                    <div class="d-flex mb-3 <?php echo end($relatedPosts) === $related ? '' : 'pb-3 border-bottom'; ?>">
                                        <?php if ($related['featured_image']): ?>
                                            <img src="<?php echo htmlspecialchars($related['featured_image']); ?>" 
                                                 class="flex-shrink-0 me-3 rounded" 
                                                 width="60" height="60" 
                                                 alt="<?php echo htmlspecialchars($related['title']); ?>">
                                        <?php endif; ?>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">
                                                <a href="blog-detail.php?slug=<?php echo htmlspecialchars($related['slug']); ?>" 
                                                   class="text-decoration-none text-dark">
                                                    <?php echo htmlspecialchars($related['title']); ?>
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <?php echo date('M j, Y', strtotime($related['created_at'])); ?>
                                            </small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Popular Categories -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-0 pb-0">
                            <h6 class="mb-0">
                                <i class="ri-folder-line"></i> Popular Categories
                            </h6>
                        </div>
                        <div class="card-body pt-2">
                            <div class="d-flex flex-wrap gap-2">
                                <a href="blog-list.php?category=Technology" class="badge bg-primary text-decoration-none">Technology</a>
                                <a href="blog-list.php?category=Web%20Development" class="badge bg-success text-decoration-none">Web Development</a>
                                <a href="blog-list.php?category=Digital%20Marketing" class="badge bg-info text-decoration-none">Digital Marketing</a>
                                <a href="blog-list.php?category=Business" class="badge bg-warning text-decoration-none">Business</a>
                                <a href="blog-list.php?category=Design" class="badge bg-danger text-decoration-none">Design</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for functionality -->
<script>
// Share functions
function shareArticle() {
    if (navigator.share) {
        navigator.share({
            title: '<?php echo addslashes($blog['title']); ?>',
            text: '<?php echo addslashes($blog['excerpt']); ?>',
            url: window.location.href
        });
    } else {
        copyLink();
    }
}

function shareOnTwitter() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('<?php echo addslashes($blog['title']); ?>');
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
}

function shareOnFacebook() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
}

function shareOnLinkedIn() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent('<?php echo addslashes($blog['title']); ?>');
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}`, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link copied to clipboard!');
    });
}

function printArticle() {
    window.print();
}

function bookmarkArticle() {
    alert('Bookmark functionality would be implemented here');
}

function reportIssue() {
    alert('Report issue functionality would be implemented here');
}

// Generate table of contents
document.addEventListener('DOMContentLoaded', function() {
    const contentBody = document.querySelector('.content-body');
    const toc = document.getElementById('tableOfContents');
    
    if (contentBody && toc) {
        const headings = contentBody.querySelectorAll('h1, h2, h3, h4, h5, h6');
        
        if (headings.length > 0) {
            let tocHTML = '<ul class="list-unstyled">';
            headings.forEach((heading, index) => {
                const id = `heading-${index}`;
                heading.id = id;
                const level = parseInt(heading.tagName.charAt(1));
                const indent = level > 1 ? 'ms-3' : '';
                tocHTML += `<li class="${indent}"><a href="#${id}" class="text-decoration-none text-muted small">${heading.textContent}</a></li>`;
            });
            tocHTML += '</ul>';
            toc.innerHTML = tocHTML;
        }
    }
});
</script>

<?php
$conn->close();
include "components/footer.php";
?>