<?php
session_start();
session_destroy();
?>
<script language="javascript">
    alert("Anda telah logout!");
    document.location="../login.php";
</script>