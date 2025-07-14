<?php 
 include "components/header.php";
?>

<!-- Blog Hero Section -->
<section class="blog-hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="blog-hero-content fade-in">
                    <h1 class="blog-hero-title">Tech Insights & Innovation</h1>
                    <p class="blog-hero-subtitle">Stay ahead with the latest trends, insights, and expert advice in technology, digital transformation, and business innovation.</p>
                    <div class="blog-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search articles, topics, or trends...">
                            <button class="btn search-btn" type="button">
                                <i class="ri-search-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-hero-image fade-in">
                    <div class="floating-elements">
                        <div class="floating-card card-1">
                            <i class="ri-code-s-slash-line"></i>
                            <span>Development</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="ri-rocket-line"></i>
                            <span>Innovation</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="ri-lightbulb-line"></i>
                            <span>Ideas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Posts Section -->
<section class="featured-posts-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title fade-in">Featured Articles</h2>
                <p class="section-subtitle fade-in">Discover our most popular and trending tech insights</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Main Featured Post -->
            <div class="col-lg-8">
                <article class="featured-post-main fade-in">
                    <div class="post-image">
                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="AI Revolution" class="img-fluid">
                        <div class="post-category">AI & Machine Learning</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span><i class="ri-calendar-line"></i> June 20, 2025</span>
                            <span><i class="ri-time-line"></i> 8 min read</span>
                            <span><i class="ri-user-line"></i> Tech Team</span>
                        </div>
                        <h3 class="post-title">The AI Revolution: How Artificial Intelligence is Transforming Business Operations in 2025</h3>
                        <p class="post-excerpt">Explore the latest AI trends and discover how businesses are leveraging artificial intelligence to streamline operations, enhance customer experiences, and drive unprecedented growth...</p>
                        <a href="#" class="read-more-btn">Read Full Article <i class="ri-arrow-right-line"></i></a>
                    </div>
                </article>
            </div>
            
            <!-- Side Featured Posts -->
            <div class="col-lg-4">
                <div class="featured-posts-sidebar">
                    <article class="featured-post-small fade-in">
                        <div class="post-image-small">
                            <img src="https://images.unsplash.com/photo-1563206767-5b18f218e8de?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Cybersecurity" class="img-fluid">
                            <div class="post-category-small">Security</div>
                        </div>
                        <div class="post-content-small">
                            <h4 class="post-title-small">Zero Trust Security: The Future of Cybersecurity</h4>
                            <div class="post-meta-small">
                                <span><i class="ri-calendar-line"></i> June 18, 2025</span>
                                <span><i class="ri-time-line"></i> 5 min</span>
                            </div>
                        </div>
                    </article>
                    
                    <article class="featured-post-small fade-in">
                        <div class="post-image-small">
                            <img src="https://images.unsplash.com/photo-1559028006-448665bd7c7f?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Web Development" class="img-fluid">
                            <div class="post-category-small">Development</div>
                        </div>
                        <div class="post-content-small">
                            <h4 class="post-title-small">Modern Web Development: React vs Next.js in 2025</h4>
                            <div class="post-meta-small">
                                <span><i class="ri-calendar-line"></i> June 15, 2025</span>
                                <span><i class="ri-time-line"></i> 7 min</span>
                            </div>
                        </div>
                    </article>
                    
                    <article class="featured-post-small fade-in">
                        <div class="post-image-small">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Digital Marketing" class="img-fluid">
                            <div class="post-category-small">Marketing</div>
                        </div>
                        <div class="post-content-small">
                            <h4 class="post-title-small">Digital Marketing Automation: Boost Your ROI by 300%</h4>
                            <div class="post-meta-small">
                                <span><i class="ri-calendar-line"></i> June 12, 2025</span>
                                <span><i class="ri-time-line"></i> 6 min</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title fade-in">Explore by Category</h2>
                <p class="section-subtitle fade-in">Find articles tailored to your interests</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card fade-in">
                    <div class="category-icon development">
                        <i class="ri-code-s-slash-line"></i>
                    </div>
                    <h4 class="category-title">Development</h4>
                    <p class="category-description">Web, Mobile & Software Development insights</p>
                    <div class="category-count">24 Articles</div>
                    <a href="#" class="category-link">Explore <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card fade-in">
                    <div class="category-icon marketing">
                        <i class="ri-line-chart-line"></i>
                    </div>
                    <h4 class="category-title">Digital Marketing</h4>
                    <p class="category-description">SEO, SEM, Social Media & Growth strategies</p>
                    <div class="category-count">18 Articles</div>
                    <a href="#" class="category-link">Explore <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card fade-in">
                    <div class="category-icon design">
                        <i class="ri-pen-nib-line"></i>
                    </div>
                    <h4 class="category-title">Design & UX</h4>
                    <p class="category-description">UI/UX Design trends and best practices</p>
                    <div class="category-count">15 Articles</div>
                    <a href="#" class="category-link">Explore <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card fade-in">
                    <div class="category-icon security">
                        <i class="ri-shield-line"></i>
                    </div>
                    <h4 class="category-title">Security</h4>
                    <p class="category-description">Cybersecurity & Data Protection guides</p>
                    <div class="category-count">12 Articles</div>
                    <a href="#" class="category-link">Explore <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Posts Section -->
<section class="latest-posts-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="latest-posts-header">
                    <h2 class="section-title text-start fade-in">Latest Articles</h2>
                    <div class="filter-tabs fade-in">
                        <button class="filter-btn active" data-filter="all">All</button>
                        <button class="filter-btn" data-filter="development">Development</button>
                        <button class="filter-btn" data-filter="marketing">Marketing</button>
                        <button class="filter-btn" data-filter="design">Design</button>
                        <button class="filter-btn" data-filter="security">Security</button>
                    </div>
                </div>
                
                <div class="latest-posts-grid">
                    <!-- Post 1 -->
                    <article class="blog-post-card fade-in" data-category="development">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="JavaScript" class="img-fluid">
                            <div class="post-category">Development</div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><i class="ri-calendar-line"></i> June 22, 2025</span>
                                <span><i class="ri-time-line"></i> 6 min read</span>
                            </div>
                            <h3 class="post-title">JavaScript ES2025: New Features Every Developer Should Know</h3>
                            <p class="post-excerpt">Discover the latest JavaScript features that are revolutionizing web development and learn how to implement them in your projects...</p>
                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Author" class="author-avatar">
                                    <span class="author-name">Alex Johnson</span>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 2 -->
                    <article class="blog-post-card fade-in" data-category="marketing">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="SEO" class="img-fluid">
                            <div class="post-category">Marketing</div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><i class="ri-calendar-line"></i> June 21, 2025</span>
                                <span><i class="ri-time-line"></i> 8 min read</span>
                            </div>
                            <h3 class="post-title">SEO in 2025: The Complete Guide to Ranking Higher</h3>
                            <p class="post-excerpt">Master the latest SEO strategies and techniques that are driving organic traffic growth in 2025...</p>
                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Author" class="author-avatar">
                                    <span class="author-name">Sarah Chen</span>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 3 -->
                    <article class="blog-post-card fade-in" data-category="design">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="UI Design" class="img-fluid">
                            <div class="post-category">Design</div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><i class="ri-calendar-line"></i> June 20, 2025</span>
                                <span><i class="ri-time-line"></i> 5 min read</span>
                            </div>
                            <h3 class="post-title">Minimalist Design Trends: Less is More in 2025</h3>
                            <p class="post-excerpt">Explore how minimalist design principles are shaping user experiences and driving conversions...</p>
                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Author" class="author-avatar">
                                    <span class="author-name">Mike Torres</span>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 4 -->
                    <article class="blog-post-card fade-in" data-category="security">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Cloud Security" class="img-fluid">
                            <div class="post-category">Security</div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><i class="ri-calendar-line"></i> June 19, 2025</span>
                                <span><i class="ri-time-line"></i> 7 min read</span>
                            </div>
                            <h3 class="post-title">Cloud Security Best Practices for Remote Teams</h3>
                            <p class="post-excerpt">Secure your cloud infrastructure with these essential security measures and best practices...</p>
                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Author" class="author-avatar">
                                    <span class="author-name">Emma Davis</span>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 5 -->
                    <article class="blog-post-card fade-in" data-category="development">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Mobile App" class="img-fluid">
                            <div class="post-category">Development</div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><i class="ri-calendar-line"></i> June 18, 2025</span>
                                <span><i class="ri-time-line"></i> 9 min read</span>
                            </div>
                            <h3 class="post-title">Cross-Platform App Development: Flutter vs React Native</h3>
                            <p class="post-excerpt">Compare the two leading cross-platform frameworks and choose the right one for your next project...</p>
                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Author" class="author-avatar">
                                    <span class="author-name">David Kim</span>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 6 -->
                    <article class="blog-post-card fade-in" data-category="marketing">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Social Media" class="img-fluid">
                            <div class="post-category">Marketing</div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><i class="ri-calendar-line"></i> June 17, 2025</span>
                                <span><i class="ri-time-line"></i> 4 min read</span>
                            </div>
                            <h3 class="post-title">Social Media Marketing: Engaging Gen Z and Gen Alpha</h3>
                            <p class="post-excerpt">Learn how to create compelling social media content that resonates with the youngest generations...</p>
                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Author" class="author-avatar">
                                    <span class="author-name">Lisa Wong</span>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-wrapper fade-in">
                    <nav aria-label="Blog pagination">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="ri-arrow-left-line"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="ri-arrow-right-line"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Newsletter Signup -->
                    <div class="sidebar-widget newsletter-widget fade-in">
                        <h4 class="widget-title">Stay Updated</h4>
                        <p class="widget-description">Get the latest tech insights delivered to your inbox weekly.</p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <button class="btn newsletter-btn" type="submit">
                                    <i class="ri-send-plane-line"></i>
                                </button>
                            </div>
                        </form>
                        <div class="newsletter-benefits">
                            <div class="benefit-item">
                                <i class="ri-check-line"></i>
                                <span>Weekly tech insights</span>
                            </div>
                            <div class="benefit-item">
                                <i class="ri-check-line"></i>
                                <span>Industry trends</span>
                            </div>
                            <div class="benefit-item">
                                <i class="ri-check-line"></i>
                                <span>Expert tips & tricks</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Popular Posts -->
                    <div class="sidebar-widget popular-posts-widget fade-in">
                        <h4 class="widget-title">Popular This Week</h4>
                        <div class="popular-posts-list">
                            <div class="popular-post-item">
                                <div class="popular-post-number">1</div>
                                <div class="popular-post-content">
                                    <h5 class="popular-post-title">The Complete Guide to API Security in 2025</h5>
                                    <div class="popular-post-meta">
                                        <span><i class="ri-eye-line"></i> 12.5k views</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="popular-post-item">
                                <div class="popular-post-number">2</div>
                                <div class="popular-post-content">
                                    <h5 class="popular-post-title">Building Scalable Microservices Architecture</h5>
                                    <div class="popular-post-meta">
                                        <span><i class="ri-eye-line"></i> 9.8k views</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="popular-post-item">
                                <div class="popular-post-number">3</div>
                                <div class="popular-post-content">
                                    <h5 class="popular-post-title">Machine Learning for Business: A Practical Guide</h5>
                                    <div class="popular-post-meta">
                                        <span><i class="ri-eye-line"></i> 8.2k views</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="popular-post-item">
                                <div class="popular-post-number">4</div>
                                <div class="popular-post-content">
                                    <h5 class="popular-post-title">DevOps Best Practices for 2025</h5>
                                    <div class="popular-post-meta">
                                        <span><i class="ri-eye-line"></i> 7.6k views</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="popular-post-item">
                                <div class="popular-post-number">5</div>
                                <div class="popular-post-content">
                                    <h5 class="popular-post-title">Progressive Web Apps: The Future of Mobile</h5>
                                    <div class="popular-post-meta">
                                        <span><i class="ri-eye-line"></i> 6.9k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tags -->
                    <div class="sidebar-widget tags-widget fade-in">
                        <h4 class="widget-title">Popular Tags</h4>
                        <div class="tags-cloud">
                            <a href="#" class="tag-link">JavaScript</a>
                            <a href="#" class="tag-link">React</a>
                            <a href="#" class="tag-link">AI/ML</a>
                            <a href="#" class="tag-link">Cybersecurity</a>
                            <a href="#" class="tag-link">Cloud Computing</a>
                            <a href="#" class="tag-link">DevOps</a>
                            <a href="#" class="tag-link">UI/UX</a>
                            <a href="#" class="tag-link">SEO</a>
                            <a href="#" class="tag-link">Mobile Dev</a>
                            <a href="#" class="tag-link">API</a>
                            <a href="#" class="tag-link">Blockchain</a>
                            <a href="#" class="tag-link">IoT</a>
                        </div>
                    </div>
                    
                    <!-- CTA Widget -->
                    <div class="sidebar-widget cta-widget fade-in">
                        <div class="cta-content">
                            <h4 class="cta-title">Need Tech Consultation?</h4>
                            <p class="cta-description">Get expert advice tailored to your business needs.</p>
                            <a href="contact.php" class="cta-btn">
                                Get Free Consultation <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Blog-specific styles */
.blog-hero-section {
    padding: 8rem 0 4rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.blog-hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,0 1000,200 1000,1000 0,800"/><circle fill="%23ffffff05" cx="200" cy="200" r="100"/><circle fill="%23ffffff05" cx="800" cy="600" r="150"/></svg>');
    pointer-events: none;
}

.blog-hero-title {
    font-size: clamp(2.5rem, 4vw, 3.5rem);
    font-weight: 700;
    color: white;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.blog-hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2.5rem;
    font-weight: 300;
    line-height: 1.6;
}

.blog-search-box {
    max-width: 500px;
}

.blog-search-box .form-control {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 50px;
    color: white;
    padding: 1rem 1.5rem;
    font-size: 1rem;
    backdrop-filter: blur(10px);
}

.blog-search-box .form-control:focus {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    color: white;
}

.blog-search-box .form-control::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-btn {
    background: var(--gradient-secondary);
    border: none;
    border-radius: 50px;
    padding: 1rem 1.5rem;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
}

.floating-elements {
    position: relative;
    height: 400px;
}

.floating-card {
    position: absolute;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    padding: 1.5rem;
    color: white;
    text-align: center;
    transition: all 0.3s ease;
    animation: float 6s ease-in-out infinite;
}

.floating-card i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    display: block;
}

.floating-card span {
    font-weight: 600;
    font-size: 0.9rem;
}

.floating-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.25);
}

.card-1 {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.card-2 {
    top: 50%;
    right: 10%;
    animation-delay: 2s;
}

.card-3 {
    bottom: 20%;
    left: 30%;
    animation-delay: 4s;
}

/* Featured Posts Section */
.featured-posts-section {
    padding: 6rem 0;
    background: var(--light-color);
}

.featured-post-main {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.featured-post-main:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
}

.featured-post-main .post-image {
    position: relative;
    height: 300px;
    overflow: hidden;
}

.featured-post-main .post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-post-main:hover .post-image img {
    transform: scale(1.05);
}

.post-category {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--primary-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.featured-post-main .post-content {
    padding: 2rem;
}

.post-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: #6b7280;
}

.post-meta i {
    margin-right: 0.5rem;
}

.featured-post-main .post-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.post-excerpt {
    color: #6b7280;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    color: var(--primary-dark);
    transform: translateX(5px);
}

.read-more-btn i {
    margin-left: 0.5rem;
    transition: transform 0.3s ease;
}

.read-more-btn:hover i {
    transform: translateX(3px);
}

/* Featured Posts Sidebar */
.featured-posts-sidebar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    height: 100%;
}

.featured-post-small {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.featured-post-small:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.post-image-small {
    position: relative;
    width: 100px;
    height: 80px;
    flex-shrink: 0;
}

.post-image-small img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-category-small {
    position: absolute;
    top: 0.5rem;
    left: 0.5rem;
    background: var(--primary-color);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 10px;
    font-size: 0.7rem;
    font-weight: 600;
}

.post-content-small {
    padding: 1rem;
    flex: 1;
}

.post-title-small {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.post-meta-small {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: #6b7280;
}

.post-meta-small i {
    margin-right: 0.25rem;
}

/* Categories Section */
.categories-section {
    padding: 6rem 0;
    background: white;
}

.category-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
    height: 100%;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.category-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin: 0 auto 1.5rem;
}

.category-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.category-description {
    color: #6b7280;
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.category-count {
    background: var(--light-color);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1.5rem;
}

.category-link {
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.category-link:hover {
    color: var(--primary-dark);
    transform: translateX(5px);
}

.category-link i {
    margin-left: 0.5rem;
    transition: transform 0.3s ease;
}

.category-link:hover i {
    transform: translateX(3px);
}

/* Latest Posts Section */
.latest-posts-section {
    padding: 6rem 0;
    background: var(--light-color);
}

.latest-posts-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3rem;
    gap: 2rem;
}

.filter-tabs {
    display: flex;
    gap: 0.5rem;
    background: white;
    padding: 0.5rem;
    border-radius: 50px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.filter-btn {
    background: transparent;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 500;
    color: #6b7280;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-color);
    color: white;
}

.latest-posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.blog-post-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-post-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.blog-post-card .post-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.blog-post-card .post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-post-card:hover .post-image img {
    transform: scale(1.05);
}

.blog-post-card .post-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-post-card .post-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.blog-post-card .post-excerpt {
    color: #6b7280;
    margin-bottom: 1.5rem;
    line-height: 1.6;
    flex: 1;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.author-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
}

.author-name {
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--dark-color);
}

.read-more {
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: var(--primary-dark);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

.pagination {
    display: flex;
    gap: 0.5rem;
    margin: 0;
    padding: 0;
    list-style: none;
}

.page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border: 1px solid #e5e7eb;
    border-radius: 50%;
    color: #6b7280;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.page-link:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.page-item.active .page-link {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

.page-item.disabled .page-link:hover {
    background: transparent;
    color: #6b7280;
    border-color: #e5e7eb;
}

/* Blog Sidebar */
.blog-sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.sidebar-widget {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.widget-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1.5rem;
}

.widget-description {
    color: #6b7280;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

/* Newsletter Widget */
.newsletter-widget {
    background: var(--gradient-primary);
    color: white;
}

.newsletter-widget .widget-title {
    color: white;
}

.newsletter-widget .widget-description {
    color: rgba(255, 255, 255, 0.9);
}

.newsletter-form .form-control {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    color: white;
    padding: 0.75rem 1rem;
}

.newsletter-form .form-control:focus {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    color: white;
}

.newsletter-form .form-control::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.newsletter-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    color: white;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.newsletter-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

.newsletter-benefits {
    margin-top: 1.5rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
}

.benefit-item i {
    color: rgba(255, 255, 255, 0.8);
}

/* Popular Posts Widget */
.popular-posts-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.popular-post-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.popular-post-number {
    width: 30px;
    height: 30px;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.popular-post-content {
    flex: 1;
}

.popular-post-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.popular-post-meta {
    font-size: 0.8rem;
    color: #6b7280;
}

.popular-post-meta i {
    margin-right: 0.25rem;
}

/* Tags Widget */
.tags-cloud {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.tag-link {
    background: var(--light-color);
    color: #6b7280;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.tag-link:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

/* CTA Widget */
.cta-widget {
    background: var(--gradient-secondary);
    color: white;
    text-align: center;
}

.cta-widget .widget-title {
    color: white;
}

.cta-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.cta-description {
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 1.5rem;
}

.cta-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.cta-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    color: white;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 992px) {
    .latest-posts-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
    }
    
    .filter-tabs {
        order: -1;
        width: 100%;
        overflow-x: auto;
    }
    
    .latest-posts-grid {
        grid-template-columns: 1fr;
    }
    
    .featured-post-small {
        flex-direction: column;
        text-align: center;
    }
    
    .post-image-small {
        width: 100%;
        height: 150px;
    }
}

@media (max-width: 768px) {
    .blog-hero-section {
        padding: 6rem 0 3rem;
        text-align: center;
    }
    
    .floating-elements {
        display: none;
    }
    
    .featured-posts-section {
        padding: 4rem 0;
    }
    
    .categories-section,
    .latest-posts-section {
        padding: 4rem 0;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const blogPosts = document.querySelectorAll('.blog-post-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter posts
            blogPosts.forEach(post => {
                const category = post.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    post.style.display = 'block';
                    setTimeout(() => {
                        post.classList.add('fade-in', 'visible');
                    }, 100);
                } else {
                    post.style.display = 'none';
                    post.classList.remove('visible');
                }
            });
        });
    });
    
    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Thank you for subscribing! You will receive our latest updates.');
                this.reset();
            }
        });
    }
    
    // Search functionality
    const searchBox = document.querySelector('.blog-search-box input');
    if (searchBox) {
        searchBox.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value.toLowerCase();
                if (searchTerm) {
                    // In a real application, this would redirect to search results
                    alert(`Searching for: ${searchTerm}`);
                }
            }
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    // Observe all elements with fade-in class
    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });
    
    // Add loading animation to post cards
    blogPosts.forEach((post, index) => {
        post.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>

<?php 
 include "components/footer.php";
?>
