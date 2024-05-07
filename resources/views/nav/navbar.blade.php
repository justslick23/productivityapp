<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
      <ul class="navbar-nav">
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text" id="greeting"></h1>
        <h3 class="welcome-sub-text">Your performance summary this week</h3>
    </li>
</ul>

       
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <script>  // Function to display the appropriate greeting message based on the time of the day
    function displayGreeting() {
        var date = new Date();
        var hour = date.getHours();
        var greetingElement = document.getElementById('greeting');
        var greetingMessage;

        if (hour >= 0 && hour < 12) {
            greetingMessage = 'Good Morning';
        } else if (hour >= 12 && hour < 18) {
            greetingMessage = 'Good Afternoon';
        } else {
            greetingMessage = 'Good Evening';
        }

        // Replace 'John Doe' with the actual user's name
        var userName = '{{ Auth::user()->name }}';
        greetingElement.innerHTML = `${greetingMessage}, <span class="text-black fw-bold">${userName}</span>`;
    }

    // Call the function to display the greeting message
    displayGreeting();
</script>