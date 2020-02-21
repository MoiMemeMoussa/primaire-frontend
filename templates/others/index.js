function createSchoolClasses()
{
    let xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "localhost:8080/annees/1/classes", true);

    xhttp.onreadystatechange = function()
    {
    console.log(this.status);

        if (this.readyState == 4 && this.status == 200)
        {
            let schoolClasses = document.getElementById("school_classes");

            console.log(this.responseText);

            schoolClasses.innerHTML = this.responseText;
        }
    };

    xhttp.send();
}

function readYears()
{
    // Create a request variable and assign a new XMLHttpRequest object to it.
    let request = new XMLHttpRequest();

    // Open a new connection, using the GET request on the URL endpoint
    request.open("GET", "localhost:8080/annees/1/classes", true);

    request.onload = function()
    {
        // Begin accessing JSON data here
        var data = JSON.parse(this.response)

        if (request.status >= 200 && request.status < 400)
        {
            data.forEach(movie => {
                console.log(movie.title)
            })
        }
        else
        {
            console.log('error')
        }
        // Begin accessing JSON data here
    }

    // Send request
    request.send();
}
