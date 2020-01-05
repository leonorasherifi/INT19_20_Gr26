// Kur perdoruesi shfaqe permbajtjen qe eshte 30 px nga fillimi shfaqet butoni
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
        document.getElementById("Btn").style.display = "block";
    } else {
        document.getElementById("Btn").style.display = "none";
    }
}

// Kur klikojme ne buton me na dergu ne fillim te dokumentit
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}