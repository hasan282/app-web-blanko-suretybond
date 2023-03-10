<?php $password_default = $this->db->get_where('reference', array('ref' => 'password'))->row();
$password_enkrip = self_md5($password_default->vals); ?>
<div class="mx-auto mw-900">
    <div class="card">
        <div class="card-body row">
            <div class="col-md"></div>
            <div class="col-md text-center text-md-right">
                <a href="<?= base_url('user/add'); ?>" class="btn btn-primary text-bold"><i class="fas fa-plus-square mr-3"></i>Tambah Data User</a>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th class="text-center border-right">No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th class="border-right">Office Agent</th>
                    <th class="text-center border-right">Role Access</th>
                    <th class="text-center">Active</th>
                    <th class="text-center"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userlist as $num => $ul) : ?>
                    <tr><?php $is_this_user = ($this->session->userdata('id') === $ul['id']); ?>
                        <td class="text-center text-bold border-right"><?= $num + 1; ?></td>
                        <td><?= $ul['username']; ?></td>
                        <td><?= $ul['nama']; ?></td>
                        <td class="border-right"><?= $ul['office']; ?></td>
                        <td class="text-center border-right"><?= $ul['role']; ?></td>
                        <td class="text-center py-0 align-middle">
                            <div class="form-group my-0">
                                <div class="custom-control custom-switch">
                                    <?php $active = ($ul['active'] == '1');
                                    $check = ($active) ? 'checked ' : '';
                                    $color = ($active) ? 'text-primary' : 'text-secondary';
                                    $text = ($active) ? 'Active' : 'Inactive'; ?>
                                    <input <?= ($is_this_user) ? 'disabled ' : ''; ?>type="checkbox" class="custom-control-input" <?= $check; ?>id="active_<?= $ul['username']; ?>">
                                    <label class="custom-control-label <?= $color; ?>" for="active_<?= $ul['username']; ?>"><?= $text; ?></label>
                                </div>
                            </div>
                        </td>
                        <td class="text-center py-0 align-middle">
                            <button <?= ($ul['password'] === $password_enkrip || $is_this_user) ? 'disabled ' : ''; ?>type="button" class="btn btn-secondary btn-sm">Reset Password</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>