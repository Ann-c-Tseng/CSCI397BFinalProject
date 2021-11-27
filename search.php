<script>
    function showfilter() {
        document.getElementById("filter").style.display="block";
        document.getElementById("search").style.display="none";
        document.getElementById("cancel").style.display="block";
    }

    function hidefilter() {
        document.getElementById("filter").style.display="none";
        document.getElementById("search").style.display="block";
        document.getElementById("cancel").style.display="none";
    }
</script>

<?php
include 'connect.php';
$query ="SELECT category FROM posts";
$rows = $db->query($query);
    $count = 0;
    while($row = $rows->fetch(PDO::FETCH_ASSOC)){
        $count++;
        $category[] = $row;
        $categories= array_column($category, 'category');
    }
echo '
    <form method="post" action="searchcontrol.php" name="filter" id="filter" style="display:none;">
        <input type="text" id="keyword" name="keyword" placeholder="Search by keyword ..">
        <label for="filters" style="display:none">Select a Category: </label>
        <select id="filters"  name="filters">
        <option value="any">All categories</option>';
        for($i = 0; $i < count($categories); $i++) {
            echo '<option>'.$categories[$i].'</option>';
        }
        '</select>
        <button type="submit"/>Search</button>
    </form> <br>
';
?>