<!-- Login Form:-->
<form method="POST" action="<?= BASE_URL ?>/signup/process/" class="form-signin text-center">
  <!-- Logo:-->
  <svg height="72" class="align-top mr-1" viewBox="0 0 16 16" version="1.1" width="72" aria-hidden="true">
    <path fill-rule="evenodd" d="M3 5h4v1H3V5zm0 3h4V7H3v1zm0 2h4V9H3v1zm11-5h-4v1h4V5zm0 2h-4v1h4V7zm0 2h-4v1h4V9zm2-6v9c0 .55-.45 1-1 1H9.5l-1 1-1-1H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h5.5l1 1 1-1H15c.55 0 1 .45 1 1zm-8 .5L7.5 3H2v9h6V3.5zm7-.5H9.5l-.5.5V12h6V3z"></path>
  </svg>
    <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
    <div class="input-group mb-3">
      <!-- Username input:-->
      <input type="text" name="username" class="form-control" placeholder="Username" value="">
    </div>
    <div class="input-group mb-3">
      <!-- Password input:-->
      <input type="password" name="pw" class="form-control" placeholder="Password">
    </div>
    <div class="input-group mb-3">
      <!-- Email input:-->
      <input type="text" name="email" class="form-control" placeholder="Email" value="">
    </div>
    <div class="input-group mb-3">
      <!-- First Name input:-->
      <input type="text" name="firstName" class="form-control" placeholder="First Name" value="">
    </div>
    <div class="input-group mb-3">
      <!-- Last Name input:-->
      <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="">
    </div>
    <div class="input-group mb-3">
      <!-- Birthday input:-->
      <input type="date" name="birthday" class="form-control" placeholder="Birthday" value="">
    </div>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Signup">
</form>