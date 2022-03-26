<?php
require_once '../../Config/Database.php';

try {
    $db = new Database();
    $conn = $db->connect();

}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
<?php
require_once '../../Components/header.php';
require_once '../../Components/navbar.php';


require_once '../../Components/footer.php';
