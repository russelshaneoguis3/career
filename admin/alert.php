<!-- alert.php -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Delete Branch -->
<?php
        if(isset($_SESSION['deleteBranch']) && $_SESSION['deleteBranch'] !='')
        {
?>
        <script>
            swal({
            title: "<?php echo $_SESSION['deleteBranch'];?>",
            text: "Branch Deleted in the List SUCCESSFULLY",
            icon: "success",
            button: "Ok",
            });
</script>
<?php
    unset($_SESSION['deleteBranch']);
        }
?>