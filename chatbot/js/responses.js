function getBotResponse(input) {
    
    // // Simple responses
    if (input.includes("Hello")) {
        return "Hello there!";
    }
    else if (input.includes("hello")) {
        return "Hello there!";
    }
    else if(input.includes("Bye")){
        return "Bye!";
    }
    else if(input.includes("find")){
        return "Search for a book by using the function above";
    }
    else {
        return "Try asking something else!";
    }
}