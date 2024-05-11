function fetchDataAndDisplay(Path, ElementId) {
    $.ajax( {
    
        // The URL for the request
        url: '{$sys.api.form}' + Path,
    
        // The data to send (will be converted to a query string)
    
        // Whether this is a POST or GET request
        type: "GET",
    
        // The type of data we expect back
        dataType : "text",
    } )
    // Code to run if the request succeeds (is done);
    // The response is passed to the function
    .done(function( json ) {
        console.log("Element to change: " + '#' + ElementId);
//        $( '#ch').html("<h1>Test</h1>");
        console.log(json);
        $( '#' + ElementId).html(json);
    } )
    // Code to run if the request fails; the raw request and
    // status codes are passed to the function
    .fail(function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    } )
    // Code to run regardless of success or failure;
    .always(function( xhr, status ) {
    // alert( "The request is complete!" );
    } );
}


function postDataAndDisplay(Path, ElementId, PostContent) {
    $.ajax({
        // The URL for the request
        url: '{$sys.api.form}' + Path,

        // The data to send (will be converted to a query string)
        data: PostContent,

        // Whether this is a POST or GET request
        type: "POST",

        // The type of data we expect back
        dataType: "text",
    } )
    // Code to run if the request succeeds (is done);
    // The response is passed to the function
    .done(function(json) {
        console.log("Element to change: " + '#' + ElementId);
        console.log(json);
        $('#' + ElementId).html(json);
    } )
    // Code to run if the request fails; the raw request and
    // status codes are passed to the function
    .fail(function(xhr, status, errorThrown) {
        alert("Sorry, there was a problem!");
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir(xhr);
    } )
    // Code to run regardless of success or failure;
    .always(function(xhr, status) {
        // alert( "The request is complete!" );
    } );
}

