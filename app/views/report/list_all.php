<div class="card">
    <div class="card-header">
        <h3 class="card-title">Blanko <?= $asuransi->nama; ?> Tanggal <span class="text-bold"><?= format_date($tanggal); ?></span></h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nomor Blanko</th>
                    <th class="text-center border-right">Status</th>
                    <th>Jenis Jaminan</th>
                    <th>Nomor Jaminan</th>
                    <th>Principal</th>
                    <th>Obligee</th>
                    <th class="text-right">Nilai Jaminan</th>
                    <th class="text-center">Tanggal Berlaku</th>
                    <th class="text-center">Tanggal Beakhir</th>
                    <th>Lama Berlaku</th>
                    <th class="text-center border-left"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recap['data'] as $key => $rc) : ?>
                    <tr>
                        <td class="text-center text-bold"><?= $pagination['offset'] + $key + 1; ?></td>
                        <td class="text-center"><span class="text-secondary"><?= $rc['prefix']; ?></span><span class="text-bold"><?= $rc['nomor']; ?></span></td>
                        <td class="text-center border-right text-bold text-<?= $rc['color']; ?>"><?= $rc['status']; ?></td>
                        <td class="border-right"><?= ($rc['tipe'] === null) ? '-' : $rc['tipe']; ?></td>
                        <td class="border-right"><?= ($rc['jaminan'] === null) ? '-' : $rc['jaminan']; ?></td>
                        <td class="border-right"><?= ($rc['principal'] === null) ? '-' : $rc['principal']; ?></td>
                        <td class="border-right"><?= ($rc['obligee'] === null) ? '-' : $rc['obligee']; ?></td>
                        <td class="text-right border-right"><?= ($rc['nilai'] === null) ? '-' : self_number_format($rc['nilai']); ?></td>
                        <td class="border-right text-center"><?= ($rc['tanggal'] === null) ? '-' : format_date($rc['tanggal'], 'DD2 MM2 YY2'); ?></td>
                        <td class="border-right text-center"><?= ($rc['tanggal'] === null || $rc['days'] === null) ? '-' : format_date(modify_days($rc['tanggal'], '+' . (intval($rc['days']) - 1)), 'DD2 MM2 YY2'); ?></td>
                        <td class="border-right"><?= ($rc['days'] === null) ? '-' : $rc['days'] . ' Hari'; ?></td>
                        <td class="text-center py-0 align-middle border-left"><a href="<?= base_url('blanko/detail/' . $rc['id']); ?>" class="btn btn-info text-bold btn-sm"><i class="fas fa-info-circle mr-2"></i>Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>