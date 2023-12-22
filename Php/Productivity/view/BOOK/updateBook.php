<form method="post" action="index.php?page=action/budget/updateBook">

    <br><br>
    <div class="form-group">
        <label for="title" class="form-label mt-4">title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="title">
    </div>
    <div class="form-group">
        <label for="finishedAt" class="form-label mt-4">fini le :</label>
        <input type="date" class="form-control" name="finishedAt" id="finishedAt"
               placeholder="fini le ">
    </div>
    <div class="form-group">
        <label for="status" class="form-label mt-4">status du livre</label>
        <input type="number" class="form-control" name="status" id="status"
               placeholder="status">
    </div>
    <br><br>
    <div class="form-group">
        <input type="submit">
    </div>

</form>
<button><a href="index.php?page=view/BOOK/books">revenir a la page précédente </a>
</button>
