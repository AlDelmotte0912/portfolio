<template>
  <div class="m-5 d-flex flex-column align-items-center justify-content-center lenght-100%">
    <h3 class="text-success mb-4">Login</h3>
    <form action="">
      <div class="mb-3">
        <label for="Email" class="form-label">Email:</label>
        <input type="text" class="form-control" name="Email">
      </div>
      <div class="mb-3">
        <label for="Pwd" class="form-label">Password:</label>
        <input type="password" class="form-control" name="Pwd">
      </div>
      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
    <a href="./Form-Signin.vue">Pas encore de compte? Créer en un.</a>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>