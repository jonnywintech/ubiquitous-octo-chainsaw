<div class="container py-5">
  <form method="POST" action="/login">
    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="email" name="email" id="form1Example1" class="form-control" />
      <label class="form-label" for="form1Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="password" name="password" id="form1Example2" class="form-control" />
      <label class="form-label" for="form1Example2">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
          <input class="form-check-input" name="keep_logged_in" type="checkbox" value="" id="form1Example3" checked />
          <label class="form-check-label" for="form1Example3"> Remember me </label>
        </div>
      </div>

      <div class="col">
        <!-- Simple link -->
        <a href="#!">Forgot password?</a>
      </div>
    </div>

    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
  </form>
</div>