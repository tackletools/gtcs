</div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5 footer" id="footer">
        <div class="container">
            <p class="mb-0">&copy; 2024 Global Tech Consultancy Service. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const footer = document.getElementById('footer');
            
            if (sidebar.classList.contains('sidebar-collapsed')) {
                sidebar.classList.remove('sidebar-collapsed');
                mainContent.classList.remove('main-content-expanded');
                footer.classList.remove('footer-expanded');
            } else {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-content-expanded');
                footer.classList.add('footer-expanded');
            }
        });

        // Add click handlers for table actions (if table exists)
        if (document.querySelectorAll('.table-actions button').length > 0) {
            document.querySelectorAll('.table-actions button').forEach(button => {
                button.addEventListener('click', function() {
                    const action = this.getAttribute('title');
                    const row = this.closest('tr');
                    const tableName = row.querySelector('td:first-child strong').textContent;
                    
                    alert(`${action} action for table: ${tableName}`);
                });
            });
        }
    </script>
</body>
</html>