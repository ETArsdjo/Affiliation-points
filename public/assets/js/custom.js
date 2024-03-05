// Import SweetAlert2
import Swal from 'sweetalert2';

// jQuery document ready
$(document).ready(function() {
    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var query = $('#query').val(); // Get the search query value

   
    
            console.log('Query:', query); // Check the value of 'query'

        // AJAX request to search endpoint
        $.ajax({
            type: 'GET',
            url: '{{ route("searchGallery") }}',
            data: { query: query },
            success: function(response) {
                $('#gallerySection .portfolio-page-items').html(response.html); // Update gallery section with search results
                $('#gallerySection .pagination').html(response.pagination); // Update pagination
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
