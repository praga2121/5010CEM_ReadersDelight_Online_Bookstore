function getBotResponse(input) {
    
    // // Simple responses
    if (input.includes("Hello")) {
        return "Hello, Thanks for your Interest in Readers' Delight Bookstore, What can I help you with about the Bookstore?";
    }
    else if (input.includes("hello")) {
        return "Hello, Thanks for your Interest in Readers' Delight Bookstore, What can I help you with about the Bookstore?";
    }
    else if(input.includes("Bye")){
        return "Thank you for visiting our site";
    }
    else if(input.includes("bye")){
        return "Thank you for visiting our site";
    }
    else if(input.includes("Find")){
        return "Search for a book by using the function above";
    }
    else if(input.includes("find")){
        return "Search for a book by using the function above";
    }
    else if(input.includes("Request")){
        return "Looking for a book? Contact us by clicking on the 'Contact Us' button above!";
    }
    else if(input.includes("request")){
        return "Looking for a book? Contact us by clicking on the 'Contact Us' button above!";
    }
    else {
        return "Try asking something else!";
    }
}