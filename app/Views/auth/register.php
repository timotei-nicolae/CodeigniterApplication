<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-4 offset-4">
                    <h4>
                        Sign Up
                    </h4>
                    <hr>
                    <?php
                        if(!empty(session()->getFlashdata('success'))){
                            ?>
                                <div class="alert alert-success">
                                    <?
                                        session()->getFlashdata('success')
                                    ?>
                                </div>
                            <?php
                        }else if(!empty(session()->getFlashdata('fail'))){
                            ?>
                                <div class="alert alert-danger">
                                    <?
                                        session()->getFlashdata('fail')
                                    ?>
                                </div>
                            <?php
                        }
                    ?>


                    <form action="<?= base_url('auth/registerUser') ?>" 
                          method="post"
                          class="form mb-3">
                        <?= csrf_field();?>

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" 
                                   class="form-control"
                                   name="name"
                                   value="<?= set_value('name')?>"
                                   placeholder="Name Here">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">E-mail</label>
                            <input type="text" 
                                   class="form-control"
                                   name="email"
                                   value="<?= set_value('email')?>"
                                   placeholder="Email Here">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" 
                                   class="form-control"
                                   name="password"
                                   value="<?= set_value('password')?>"
                                   placeholder="Password Here">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Confirm Password</label>
                            <input type="password" 
                                   class="form-control"
                                   name="passwordConf"
                                   value="<?= set_value('passwordConf')?>"
                                   placeholder="Confirm Password Here">
                        </div>

                        <div class="form-group mb-3">
                            <input type="submit" 
                                   class="btn btn-info"
                                   value="Sign Up">
                        </div>
                    </form>
                    <br>

                    <a href="<?= site_url('auth'); ?>">
                        I already have an account, login
                    </a>

                </div>
            </div>
        </div>
        
    </body>
</html>