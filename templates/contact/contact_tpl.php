<div class="w-clear">
    <div class="center">
        <div class="top-contact d-flex justify-content-between flex-wrap">
            <div class="r1-contact">
                <p class="text3-contact">Thông tin liên hệ</p>
                <form class="form-contact validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-contact col-sm-6">
                            <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                        </div>
                        <div class="input-contact col-sm-6">
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-contact col-sm-6">
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                        </div>
                        <div class="input-contact col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                            <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                        </div>
                    </div>
                    <div class="input-contact">
                        <textarea class="form-control" id="noidung" name="noidung" placeholder="<?= noidung ?>" required /></textarea>
                        <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                    </div>
                    <?php /*
            <div class="input-contact">
                <input type="file" class="custom-file-input" name="file">
                <label class="custom-file-label" for="file" title="<?=chon?>"><?=dinhkemtaptin?></label>
            </div>
            */ ?>
                    <input type="submit" class="btn btn-primary btn-primary-edit" name="submit-contact" value="Gửi thông tin" disabled />
                    <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                </form>
            </div>
            <div class="l1-contact">
                <h2>Hãy liên lạc với chúng tôi</h2>
                <div class="mota-contact"><?= htmlspecialchars_decode($lienhe['noidung']) ?></div>
            </div>
        </div>
        <div class="bottom-contact">
            <?= htmlspecialchars_decode($optsetting['toado_iframe']) ?>
        </div>
    </div>
</div>