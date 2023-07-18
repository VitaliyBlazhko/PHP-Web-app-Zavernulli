<?php require PARTS_DIR . '/header.php'; ?>
<section id="registration" style="padding-top: 64px;">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Create an account</h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="registration" />
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="<?= $_SESSION['register']['fields']['name'] ?? '' ?>" >
                            </div>
                            <?= formError($_SESSION['register']['errors']['name'] ?? null) ?>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                       value="<?= $_SESSION['register']['fields']['surname'] ?? '' ?>" >
                            </div>
                            <?= formError($_SESSION['register']['errors']['surname'] ?? null) ?>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       value="<?= $_SESSION['register']['fields']['email'] ?? '' ?>"
                                       name="email">
                            </div>
                            <?= formError($_SESSION['register']['errors']['email'] ?? null) ?>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <?= formError($_SESSION['register']['errors']['password'] ?? null) ?>
                            <div class="mb-3">
                                <label for="password_check" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control" id="password_check" name="password_check">
                            </div>
                            <?= formError($_SESSION['register']['errors']['password_check'] ?? null) ?>
                            <button type="submit" class="btn btn-primary">Create an account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require PARTS_DIR . '/footer.php'; ?>