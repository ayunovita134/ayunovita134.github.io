var tombolMenu = $(".tombol-menu");
var menu = $("nav .menu ul");

function klikMenu() {
    tombolMenu.click(function() {
        menu.toggle();
    });
    menu.click(function () {
        menu.toggle();
    });
}

$(document).ready(function () {
    var width = $(window).width();
    if(width < 990) {
        klikMenu();
    }
})

$(window).resize(function(){
    var width = $(window).width();
    if(width > 989) {
        menu.css("display", "block");
    }else {
        menu.css("display", )
    }
    klikMenu();
})

$(document).ready(function () {
    var scroll_pos = 0;
    $(document).scroll(function () {
        scroll_pos = $(this).scrollTop();
        if (scroll_pos > 0) {
            $("nav").addClass("putih");
            $("nav img.hitam").show();
            $("nav img.putih").hide();
        } else {
            $("nav").removeClass("putih");
            $("nav img.hitam").hide();
            $("nav img.putih").show();
        }
    })
});

$(document).ready(function () {
    if (localStorage.getItem("dark-mode") === "enabled") {
        enableDarkMode();
    }

    $("#darkModeToggle").click(function () {
        if ($("body").hasClass("dark-mode")) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        $("body").addClass("dark-mode");
        $("#darkModeToggle").text("Light Mode");
        localStorage.setItem("dark-mode", "enabled");
    }

    function disableDarkMode() {
        $("body").removeClass("dark-mode");
        $("#darkModeToggle").text("Dark Mode");
        localStorage.setItem("dark-mode", "disabled");
    }
});

$(document).ready(function () {
    var scroll_pos = 0;
    $(document).scroll(function(){
        scroll_pos = $(this).scrolltop();
        if(scroll_pos > 0){
            $("nav").addclass("putih");
        } else {
            $("nav").removeclass("putih");
        }
    })
});

document.querySelector('.logout-btn').addEventListener('click', function(e) {
    if (!confirm('Apakah Anda yakin ingin logout?')) {
        e.preventDefault();
    }
});

setTimeout(function() {
    var welcomeMessage = document.getElementById('welcome-message');
    welcomeMessage.style.opacity = '0'; 
}, 5000); 

function searchContent() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const searchableElements = document.querySelectorAll('p, h3, h6');
    let found = false;

    document.querySelectorAll('.highlight').forEach(el => {
        el.classList.remove('highlight');
    });

    searchableElements.forEach(element => {
        const content = element.textContent.toLowerCase();
        if (content.includes(searchTerm)) {
            element.classList.add('highlight');
            found = true;
            element.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

    if (!found && searchTerm !== '') {
        alert('Tidak ditemukan hasil pencarian untuk: ' + searchTerm);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchContent();
            }
        });
    }
});

document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let searchValue = document.getElementById('search').value;

    fetch(`http://localhost/search.php?search=${searchValue}`)
        .then(response => response.json())
        .then(data => {
            let resultsDiv = document.getElementById('search-results');
            resultsDiv.innerHTML = '';
            if (data.length > 0) {
                data.forEach(function(item) {
                    resultsDiv.innerHTML += `
                        <div class="result-item">
                            <h3>${item.nama}</h3>
                            <p>Lokasi: ${item.lokasi}</p>
                            <p>Kategori: ${item.kategori}</p>
                            <p>Harga: ${item.harga}</p>
                            <p>Rating: ${item.rating}</p>
                            <img src="${item.gambar_url}" alt="${item.nama}" style="width: 200px; height: auto;" />
                        </div>
                    `;
                });
            } else {
                resultsDiv.innerHTML = '<p>Hasil tidak ditemukan</p>';
            }
        })
        .catch(error => console.error('Error:', error));
});

function searchContent() {
    const searchInput = document.getElementById('searchInput').value;

    if (searchInput.trim() === '') {
        document.getElementById('searchResults').innerHTML = '<p>Masukkan kata kunci pencarian!</p>';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `search_wisata.php?query=${searchInput}`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('searchResults').innerHTML = xhr.responseText;
        } else {
            document.getElementById('searchResults').innerHTML = '<p>Terjadi kesalahan. Silakan coba lagi!</p>';
        }
    };
    xhr.send();
}
