
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');

    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Collect form data
      const formData = new FormData(form);

      // Send form data to server
      fetch('connect.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          alert('Form submitted successfully!');
          form.reset(); // Reset form after successful submission
        } else {
          alert('Form submission failed!');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Form submission failed!');
      });
    });
  });
