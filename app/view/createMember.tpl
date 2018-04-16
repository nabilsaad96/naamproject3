<div class="container">
  <div class="py-5 text-center">
    <svg height="128" class="octicon octicon-file" viewBox="0 0 12 16" version="1.1" width="96" aria-hidden="true">
      <path fill-rule="evenodd" d="M6 5H2V4h4v1zM2 8h7V7H2v1zm0 2h7V9H2v1zm0 2h7v-1H2v1zm10-7.5V14c0 .55-.45 1-1 1H1c-.55 0-1-.45-1-1V2c0-.55.45-1 1-1h7.5L12 4.5zM11 5L8 2H1v12h10V5z"></path>
    </svg>
    <h2>Article Creation Form</h2>
    <p class="lead">Create a new article by filling out both fields. The title should be less than 60 charcters.</p>
  </div>
  <div clas="row">
    <form action="<?= BASE_URL ?>/stories/add/process/" method="POST">
      <div class="mb-3">
        <label for="title-article">Title</label>
        <input name="title" type="text" class="form-control"  id="title-article" required>
      </div>
      <div class="mb-3">
        <label for="title-article">Description of Event</label>
        <textarea name="text" class="form-control" rows="10" cols="30" required style="width: 100%;"></textarea>
      </div>
      <div class="mb-3">
        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
