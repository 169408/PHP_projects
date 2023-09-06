<?php require_once "parts/header.php"?>
<main class="contant">
    <div class="container">
        <h1>Update the record</h1>
        <form action="" method="post">
            <p>Id: </p>
            <input type="text" name="id" value="<?php if(!empty($_POST["id"])) {echo $_POST["id"];} else {echo " ";} ?>">
            <p>Title: </p>
            <input type="text" name="name" placeholder="name" />
            <p>Description: </p>
            <input type="text" name="description" placeholder="something" />
            <button type="submit">Submit</button>
        </form>
    </div>
</main>
<?php require_once "parts/footer.php"?>
