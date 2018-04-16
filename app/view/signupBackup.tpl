<div id="signup">
  <h1>Sign Up!</h1>

  <form method="POST" action="<?= BASE_URL ?>/signup/process/">
    <input type="text" name="username" placeholder="Username" value="">
    <input type="password" name="pw" placeholder="Password" value="">
    <input type="text" name="email" placeholder="E-mail" value="">
    <input type="text" name="firstName" placeholder="First Name" value="">
    <input type="text" name="lastName" placeholder="Last Name" value="">
    <input type="date" name="birthday" placeholder="Birth Date" value="">


    <input type="submit" name="submit" value="Signup">

  </form>
</div>
<hr class="clear">


