<?php include('header.php'); ?>

<div class="login">

    <form action="<?= ROOT_CLIENT ?>/process/login.php" method="POST">

        <h1 class="uk-text-center">Task manager</h1>
        <?php if(isset($message)){
            ?> <p> <?php echo $message ?> </p> <?php
        } ?>

        <div class="uk-margin">
            <label for="user">User</label>
            <input type="email" name="user" class="uk-input"/>
        </div>

        <div class="uk-margin">
            <label for="">Password</label>
            <input type="password" name="pass" class="uk-input" />
        </div>

        <button type="submit" class="uk-button uk-button-primary">Enviar</button>

    </form>

</div>


<?php include('footer.php'); ?>