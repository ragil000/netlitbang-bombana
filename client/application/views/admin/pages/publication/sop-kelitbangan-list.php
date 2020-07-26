    <?php

    ?>
    <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">SOP Kelitbangan</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Isi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $value) {
                    ?>
                    <tr>
                        <td><?=!empty($value['headline']) ? $value['headline'] : '-'?></td>
                        <td><?=_limitText($value['content'], 60)?></td>
                        <td><?=_dateShortID($value['created_at'])?></td>
                        <td><?=_timestampToTime($value['created_at'])?></td>
                        <td class="text-right">
                            <a href="" class="btn btn-sm btn-primary" onclick="detailModal('<?=$value['id']?>')"><i class="ni ni-button-play"></i></a>
                            <a href="<?=base_url('admin/publication/edit/sop-kelitbangan/').$value['id']?>" class="btn btn-sm btn-warning"><i class="ni ni-caps-small"></i></a>
                        </td>
                    </tr>
                    <?php
                            }
                    ?>
                    <button type="button" id="button-detail-modal" data-toggle="modal" data-target="#detail-modal" hidden></button>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <?=$pagination?>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="detail-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detail-modal-label">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-y: scroll; height:400px;">
                        <h3 id="headlinem">adda dasdasd</h3>
                        <h6><span id="date"><i class="ni ni-watch-time"></i> 20 Jan 2020</span></h6>
                        <div id="content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
      </div>