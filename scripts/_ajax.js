window.addEventListener('load', ajaxCall, true);

function ajaxCall () {

    // alert ('JS is good :D');

    var pullNews = new XMLHttpRequest();

    getNews();

    function getNews() {
        // changeTitle();
        // headline.innerHTML = 'Termine werden geladen…';
        if (pullNews) {
            pullNews.onreadystatechange = listNews;
            pullNews.open("GET", "./", true);
            pullNews.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); // :D
            pullNews.send(null);
            // if (view == 'year') {
            //     calendar.style.display = 'none';
            // } 
            // organizer.style.display = 'none';
        };
    }    
    
    function listNews() {
        pullNews.readyState;
        if (pullNews.readyState == 4 && pullNews.status == 200) {
            // resultsTitle();
            var str = pullNews.responseText;            
            document.getElementById("newssection").innerHTML = (str);
            // if (view == 'year') {
            //     calendar.style.display = 'none';
            // } 
            // organizer.style.display = 'unset';
        };
    };        

}