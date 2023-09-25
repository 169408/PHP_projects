<?php
if(isset($_POST["title"])) {
    $news_id = $_POST["news_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $author = $_POST["author"];
    $this->update(["news_id" => $news_id, "title" => $title, "description" => $description, "author" => $author]);
}
?>
<?php require_once "parts/header.php"?>
<main class="content">
    <div class="container">
        <h1>Update the record</h1>
        <form action="" method="post">
            <p>New's Id: </p>
            <input type="text" name="news_id" value="<?php if(!empty($_POST["news_id"])) {echo $_POST["news_id"];} else {echo " ";} ?>" />
            <p>Title: </p>
            <input type="text" name="title" placeholder="title" />
            <p>Description: </p>
            <textarea name="description" cols="20" rows="10"></textarea>
            <p>Author: </p>
            <input type="text" name="author" />
            <button type="submit">Submit</button>
        </form>
        <div class="material">
            <h2>Some fun</h2>
            <img src="https://i.redd.it/4kjwakifycva1.jpg" alt="1" />
        </div>
    </div>
</main>
<?php require_once "parts/footer.php"?>
