
// Select the contact form
const contactForm = document.getElementById("contactForm");

// Listen for form submission
contactForm.addEventListener("submit", function(event) {

    // Prevent the page from refreshing
    event.preventDefault();

    // Get the visitor's information
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const subject = document.getElementById("subject").value;
    const message = document.getElementById("message").value;

    // Display a success message
    alert("Thank you, " + name + "! Your message has been received.");

    // Clear the form
    contactForm.reset();

});
