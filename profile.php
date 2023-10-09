<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <h2>Profile Page</h2>
    <div class="row">
        <div class="col-lg-8 shadow p-3 round">
            <div class="card">
            <form action="../controller/profileUpdate.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="profile_img" style="width: 100%;" ><img class="profile_img" style="width: 200px; height: 220px; object-fit:cover;" 
                        src= "<?=isset($_SESSION['auth']['profile']) ? "../uploads/users/" . $_SESSION['auth']['profile'] : "https://api.dicebear.com/7.x/initials/svg?seed=" . $_SESSION['auth']['fname'] ?>" alt=""></label>
                        <input name="profile_img" type="file" id="profile_img" class="profile_selector d-none" >
                    </div>
                    <div class="col-lg-8">
                        <input name="fname" value="<?=$_SESSION['auth']['fname']?>" class="form-control my-3" type="text" placeholder="First Name">
                        <input name="lname" value="<?=$_SESSION['auth']['lname']?>" class="form-control my-3" type="text" placeholder="Last Name">
                        <input name="email" value="<?=$_SESSION['auth']['email']?>" class="form-control my-3" type="text" placeholder="Email address">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow p-3 round">
            <form action="../controller/updatePassword.php" method="post">
                <input name="oldpassword" class="form-control my-3" type="password" placeholder="Old Password">
                <span class="text-danger"><?= isset($_SESSION['password_errors']['oldpassword_error']) ? $_SESSION['password_errors']['oldpassword_error'] : ''?></span> 
                <input name="newpassword" class="form-control my-3" type="password" placeholder="New Password">
                <span class="text-danger"><?= isset($_SESSION['password_errors']['newpassword_error']) ? $_SESSION['password_errors']['newpassword_error'] : ''?></span>
                <input name="confirmpassword" class="form-control my-3" type="password" placeholder="confirm Password">
                <button class="btn btn-primary w-100" >Update</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php
include "./backend_inc/footer.php";
unset($_SESSION['password_errors']);
?>

<script>
    let profileInput = document.querySelector('.profile_selector')
    let profileImage = document.querySelector('.profile_img')

    function updateImage(event){
        let url = URL.createObjectURL(event.target.files[0]);
        profileImage.src = url
        console.log(url);
    }
    profileInput.addEventListener('change',updateImage) 
</script>