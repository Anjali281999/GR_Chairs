document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    // Perform login validation here, for simplicity, let's assume any username and password combination is valid
    if (username && password) {
      document.getElementById("login-form").reset();
      document.getElementById("login-form").style.display = "none";
      document.getElementById("admin-dashboard").style.display = "block";
    } else {
      alert("Invalid username or password!");
    }
  });
  
  document.getElementById("orders-btn").addEventListener("click", function() {
    alert("Redirect to Orders page");
  });
  
  document.getElementById("payment-status-btn").addEventListener("click", function() {
    alert("Redirect to Payment Status page");
  });
  
  document.getElementById("feedback-btn").addEventListener("click", function() {
    alert("Redirect to Feedback page");
  });
  
  document.getElementById("stock-update-btn").addEventListener("click", function() {
    alert("Redirect to Stock Update page");
  });
  