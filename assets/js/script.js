const keywordInput = document.querySelector('.keyword');
const resultContainer = document.querySelector('.search-results');

keywordInput.addEventListener('keyup', function() {
    const keyword = keywordInput.value;

    if (keyword.length > 0) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                resultContainer.innerHTML = xhr.responseText;
            }
        };

        xhr.open('GET', 'ajax/search_ajax.php?keyword=' + encodeURIComponent(keyword), true);
        xhr.send();
    } else {
        resultContainer.innerHTML = ''; // Clear results when input is empty
    }
});
