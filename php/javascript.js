function mainNavmenuOpen(event) {
    document.getElementById("navmenu").style.visibility = "visible";
    event.stopPropagation(); // Stop the click event from propagating further

    // Add event listener to the document
    document.addEventListener('click', function(event) {
        var targetElement = event.target; // Get the clicked element

        // Check if the clicked element is not the target element or its descendant
        if (!targetElement.closest('#test')) {
            // If clicked outside the target element, hide it
            document.getElementById("test").style.visibility = "hidden";
        }
    });
}
