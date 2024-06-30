<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class=" row col-4 card shadow p-3 mb-5 bg-body rounded" style="max-width: 600px;">
        <div class="card-body">
        <h2 class="card-title text-center mb-4">Register</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
         <?php if (isset($validation)): ?>
        <div class="validation-errors text-danger">
            <?= $validation->listErrors() ?>
        </div>
        <?php endif; ?>
        <form method="post" action="/register">
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="mt-3 text-center">
            <p>Already have an account? <a href="<?= base_url('/'); ?>">Login here</a></p>
        </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
</body>
</html>