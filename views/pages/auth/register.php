<main role="main" class="container">
    <?php $this->load->view('layouts/_alert')?>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Formulir Registrasi
                    </div>
                    <div class="card-body">
                        <?= form_open ('register', ['method' => 'POST'])?>
                            <div class="form-group">
                                <label for="">Nama </label>
                                <?= form_input('nama', $input->nama, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                                <?= form_error ('nama') ?>
                            </div>
                            <form action="">
                                <div class="form-group">
                                    <label for="">Email </label>                                   
                                    <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan Alamat Email Aktif Anda', 'required' =>true]) ?>
                                    <?= form_error('email') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Password </label>                                  
                                    <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Password Minimal 8 Karakter', 'required'=> true]) ?>
                                    <?= form_error('password') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Konfrimasi Password </label>
                                    <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Masukan password yang sama', 'required' => true]) ?>
                                    <?= form_error('password_confirmation') ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </main>