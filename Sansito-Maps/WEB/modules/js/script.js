document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchText');
    const searchResults = document.getElementById('search-results');
    const products = document.querySelectorAll('.product');

    function filterProducts() {
    const searchTerm = searchInput.value.toLowerCase();

    products.forEach((product) => {
        const productName = product.querySelector('.product-name').textContent.toLowerCase();

        if (productName.includes(searchTerm)) {
        product.style.display = 'block';
        } else {
        product.style.display = 'none';
        }
    });
    }
    searchInput.addEventListener('keyup', filterProducts);
});