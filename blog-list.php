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

// Get categories for filter
$categories_result = $conn->query("SELECT * FROM blog_categories ORDER BY name");
$categories = [];
if ($categories_result->num_rows > 0) {
    while ($row = $categories_result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Handle AJAX request for filtering
if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
    $category = $_GET['category'] ?? 'all';
    $search = $_GET['search'] ?? '';
    $sort = $_GET['sort'] ?? 'latest';
    
    // Build query
    $sql = "SELECT * FROM blogs WHERE status = 'published'";
    $params = [];
    $types = "";
    
    if ($category !== 'all') {
        $sql .= " AND category = ?";
        $params[] = $category;
        $types .= "s";
    }
    
    if (!empty($search)) {
        $sql .= " AND (title LIKE ? OR content LIKE ? OR tags LIKE ?)";
        $searchTerm = "%$search%";
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $types .= "sss";
    }
    
    // Sort
    switch ($sort) {
        case 'popular':
            $sql .= " ORDER BY views DESC";
            break;
        case 'oldest':
            $sql .= " ORDER BY created_at ASC";
            break;
        default:
            $sql .= " ORDER BY created_at DESC";
    }
    
    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    
    $blogs = [];
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
    
    header('Content-Type: application/json');
    echo json_encode($blogs);
    exit;
}
$current_page = 'blog-list';
// Get initial blogs
$blogs_result = $conn->query("SELECT * FROM blogs WHERE status = 'published' ORDER BY created_at DESC");
$blogs = [];
if ($blogs_result->num_rows > 0) {
    while ($row = $blogs_result->fetch_assoc()) {
        $blogs[] = $row;
    }
}

include "components/header.php";
?>

<!-- Hero Section -->
<section class="py-5 bg-gradient-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Tech Blog</h1>
                <p class="lead text-white-50 mb-4">Discover the latest insights, trends, and innovations in technology</p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search articles...">
                            <button class="btn btn-light" type="button" id="searchBtn">
                                <i class="ri-search-line"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="sortSelect">
                            <option value="latest">Latest</option>
                            <option value="popular">Most Popular</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="text-end">
                    <i class="ri-article-line text-white opacity-25" style="font-size: 8rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filters Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-primary btn-sm filter-btn active" data-category="all">All</button>
                    <?php foreach ($categories as $category): ?>
                        <button class="btn btn-outline-primary btn-sm filter-btn" data-category="<?php echo htmlspecialchars($category['name']); ?>">
                            <i class="<?php echo htmlspecialchars($category['icon']); ?>"></i>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Listing Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 mb-0">Latest Articles</h2>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm" id="gridView">
                            <i class="ri-grid-line"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm active" id="listView">
                            <i class="ri-list-check"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="text-center py-5 d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                
                <!-- Blog Grid -->
                <div id="blogsContainer" class="row g-4">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="col-lg-4 col-md-6 blog-item">
                            <div class="card h-100 shadow-sm border-0">
                                <?php if ($blog['featured_image']): ?>
                                    <img src="<?php echo htmlspecialchars($blog['featured_image']); ?>" 
                                         class="card-img-top" alt="<?php echo htmlspecialchars($blog['title']); ?>" 
                                         style="height: 200px; object-fit: cover;">
                                <?php endif; ?>
                                
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($blog['category']); ?></span>
                                        <?php if ($blog['is_featured']): ?>
                                            <span class="badge bg-warning text-dark rounded-pill">Featured</span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <h5 class="card-title fw-bold mb-3">
                                        <?php echo htmlspecialchars($blog['title']); ?>
                                    </h5>
                                    
                                    <p class="card-text text-muted mb-3">
                                        <?php echo htmlspecialchars(substr($blog['excerpt'], 0, 120)); ?>...
                                    </p>
                                    
                                    <div class="row text-muted small mb-3">
                                        <div class="col">
                                            <i class="ri-calendar-line"></i>
                                            <?php echo date('M j, Y', strtotime($blog['created_at'])); ?>
                                        </div>
                                        <div class="col text-end">
                                            <i class="ri-time-line"></i>
                                            <?php echo $blog['reading_time']; ?> min
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <?php if ($blog['author_avatar']): ?>
                                                <img src="<?php echo htmlspecialchars($blog['author_avatar']); ?>" 
                                                     class="rounded-circle me-2" width="32" height="32" 
                                                     alt="<?php echo htmlspecialchars($blog['author_name']); ?>">
                                            <?php endif; ?>
                                            <small class="text-muted"><?php echo htmlspecialchars($blog['author_name']); ?></small>
                                        </div>
                                        <small class="text-muted">
                                            <i class="ri-eye-line"></i> <?php echo number_format($blog['views']); ?>
                                        </small>
                                    </div>
                                </div>
                                
                                <div class="card-footer bg-transparent border-0 p-4 pt-0">
                                    <a href="blog-detail.php?slug=<?php echo htmlspecialchars($blog['slug']); ?>" 
                                       class="btn btn-primary btn-sm w-100">
                                        <i class="ri-arrow-right-line"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- No Results -->
                <div id="noResults" class="text-center py-5 d-none">
                    <i class="ri-search-line display-1 text-muted"></i>
                    <h4 class="mt-3">No articles found</h4>
                    <p class="text-muted">Try adjusting your search or filter criteria</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.filter-btn {
    transition: all 0.3s ease;
}

.filter-btn:hover {
    transform: translateY(-2px);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

.blog-item.list-view .card {
    flex-direction: row;
    max-width: 100%;
}

.blog-item.list-view .card-img-top {
    width: 200px;
    height: 150px;
    object-fit: cover;
}

.blog-item.list-view .card-body {
    flex: 1;
}

@media (max-width: 768px) {
    .blog-item.list-view .card {
        flex-direction: column;
    }
    
    .blog-item.list-view .card-img-top {
        width: 100%;
        height: 200px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('searchInput');
    const sortSelect = document.getElementById('sortSelect');
    const blogsContainer = document.getElementById('blogsContainer');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const noResults = document.getElementById('noResults');
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    
    let currentView = 'grid';
    
    // Filter functionality
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            loadBlogs();
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', debounce(loadBlogs, 300));
    
    // Sort functionality
    sortSelect.addEventListener('change', loadBlogs);
    
    // View toggle
    gridView.addEventListener('click', function() {
        currentView = 'grid';
        this.classList.add('active');
        listView.classList.remove('active');
        updateView();
    });
    
    listView.addEventListener('click', function() {
        currentView = 'list';
        this.classList.add('active');
        gridView.classList.remove('active');
        updateView();
    });
    
    function loadBlogs() {
        const category = document.querySelector('.filter-btn.active').dataset.category;
        const search = searchInput.value;
        const sort = sortSelect.value;
        
        // Show loading
        loadingSpinner.classList.remove('d-none');
        blogsContainer.classList.add('d-none');
        noResults.classList.add('d-none');
        
        // Make AJAX request
        fetch(`?ajax=1&category=${encodeURIComponent(category)}&search=${encodeURIComponent(search)}&sort=${encodeURIComponent(sort)}`)
            .then(response => response.json())
            .then(data => {
                loadingSpinner.classList.add('d-none');
                
                if (data.length === 0) {
                    noResults.classList.remove('d-none');
                    blogsContainer.innerHTML = '';
                } else {
                    blogsContainer.classList.remove('d-none');
                    renderBlogs(data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                loadingSpinner.classList.add('d-none');
                blogsContainer.classList.remove('d-none');
            });
    }
    
    function renderBlogs(blogs) {
        let html = '';
        
        blogs.forEach(blog => {
            const featuredImage = blog.featured_image ? `<img src="${blog.featured_image}" class="card-img-top" alt="${blog.title}" style="height: 200px; object-fit: cover;">` : '';
            const authorAvatar = blog.author_avatar ? `<img src="${blog.author_avatar}" class="rounded-circle me-2" width="32" height="32" alt="${blog.author_name}">` : '';
            const featuredBadge = blog.is_featured == 1 ? '<span class="badge bg-warning text-dark rounded-pill">Featured</span>' : '';
            
            html += `
                <div class="col-lg-4 col-md-6 blog-item">
                    <div class="card h-100 shadow-sm border-0">
                        ${featuredImage}
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-primary rounded-pill">${blog.category}</span>
                                ${featuredBadge}
                            </div>
                            <h5 class="card-title fw-bold mb-3">${blog.title}</h5>
                            <p class="card-text text-muted mb-3">${blog.excerpt.substring(0, 120)}...</p>
                            <div class="row text-muted small mb-3">
                                <div class="col">
                                    <i class="ri-calendar-line"></i>
                                    ${new Date(blog.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                                </div>
                                <div class="col text-end">
                                    <i class="ri-time-line"></i>
                                    ${blog.reading_time} min
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    ${authorAvatar}
                                    <small class="text-muted">${blog.author_name}</small>
                                </div>
                                <small class="text-muted">
                                    <i class="ri-eye-line"></i> ${blog.views.toLocaleString()}
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-4 pt-0">
                            <a href="blog-detail.php?slug=${blog.slug}" class="btn btn-primary btn-sm w-100">
                                <i class="ri-arrow-right-line"></i> Read More
                            </a>
                        </div>
                    </div>
                </div>
            `;
        });
        
        blogsContainer.innerHTML = html;
        updateView();
    }
    
    function updateView() {
        const blogItems = document.querySelectorAll('.blog-item');
        
        if (currentView === 'list') {
            blogItems.forEach(item => {
                item.classList.remove('col-lg-4', 'col-md-6');
                item.classList.add('col-12', 'list-view');
            });
        } else {
            blogItems.forEach(item => {
                item.classList.remove('col-12', 'list-view');
                item.classList.add('col-lg-4', 'col-md-6');
            });
        }
    }
    
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
});
</script>

<?php include "components/footer.php"; ?>

<?php $conn->close(); ?>