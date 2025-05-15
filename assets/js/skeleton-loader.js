document.addEventListener('DOMContentLoaded', function() {
    const skeletonLoader = document.getElementById('skeletonLoader');
    const mainContent = document.getElementById('mainContent');
    
    if (skeletonLoader && mainContent) {
        // Hide main content initially
        mainContent.style.opacity = '0';
        mainContent.style.visibility = 'hidden';
        
        // Function to remove skeleton loader and initialize AOS
        function removeSkeletonLoader() {
            // Add fade out class to skeleton
            skeletonLoader.classList.add('fade-out');
            
            // After skeleton fades out, show content and initialize AOS
            setTimeout(() => {
                // Hide skeleton completely
                skeletonLoader.style.display = 'none';
                
                // Show main content
                mainContent.style.visibility = 'visible';
                mainContent.style.opacity = '1';
                mainContent.style.transition = 'opacity 0.5s ease-in';
                
                // Initialize AOS with a slight delay to ensure content is visible
                setTimeout(() => {
                    AOS.init({
                        duration: 1000,
                        easing: 'ease-in-out',
                        once: true,
                        mirror: false,
                        offset: 50
                    });
                }, 100);
            }, 500);
        }

        // Start removing skeleton after content is loaded
        window.addEventListener('load', function() {
            // Add a delay to show skeleton animation
            setTimeout(removeSkeletonLoader, 1000);
        });

        // Fallback: Remove skeleton if loading takes too long
        setTimeout(removeSkeletonLoader, 3000);
    }
}); 