<style>
.judul {
    color: blue;
    font-weight: bold;
    margin-bottom: auto;
}
.author {
    color: gray;
    font-size: small;
    margin-bottom: auto;
}
.penerbit {
    color: black;
    margin-bottom: auto;
}
.sitasi {
    color: #2C7DC0;
    margin-bottom: auto;
}
</style>
<!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-searching="false" data-ordering="false">
                                    <thead style="display: none !important;">
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?= $hasil ?> hasil
                                        <?php 
                                        foreach($search as $q){
                                        ?>
                                        <tr>
                                        <td>
                                           <a class="judul" href="<?= $q->link ?>"><?= $q->title ?></a>
                                        <li class="nav-item" style="list-style-type: none;">
                                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#abstract<?=$q->id?>"
                                                aria-expanded="true" aria-controls="abstract<?=$q->id?>" style="padding-left: 0;">
                                                <span>Abstract</span></a>
                                                </a>
                                            <div id="abstract<?=$q->id?>" class="collapse"
                                                data-parent="#accordionSidebar" style="text-align: justify; padding-bottom:1rem">
                                                <span><?= $q->abstract?></span>
                                            </div>
                                        </li>
                                           <p class="author"><?= $q->authors_name ?></p>
                                           <p class="penerbit"><?= $q->source_title ?> | vol : <?= $q->volume ?> | issue: <?= $q->issue ?> | ISSN: <?= $q->issn ?> | ISBN: <?= $q->isbn ?> | <?= $q->year ?></p>
                                           <p class="sitasi">
                                            <?php if(is_null($q->cite)) : ?>     
                                            <?php else: ?>
                                               dirujuk <?= $q->cite ?> kali
                                            <?php endif;?> - <a data-toggle="modal" data-target="#cite<?=$q->id?>" href="#cite<?=$q->id?>">
                                            <img src="<?= base_url('assets/cite.png');?>" alt="cite" width="15" height="15"/> </a>
                                             - <a href="#" onclick="window.open('search/ris/<?= $q->id ?>');" data-toggle="modal" data-target="#infoModal">
                                            <img src="<?= base_url('assets/mendeley.png');?>" alt="mend" width="20" height="20"/> </a>
                                            <li class="nav-item" style="list-style-type: none;">
                                            <div id="manual<?=$q->id?>" class="collapse"
                                                data-parent="#accordionSidebar" style="text-align: justify; padding-bottom:1rem">
                                                <span><?= $q->abstract?></span>
                                            </div>
                                        </li>
                                            </p>
                                        </td>
                                        </tr>
                                        
                                                    <div class="modal fade" id="cite<?=$q->id?>" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: justify;">
                                                                    <span><?=$q->authors_name?> 
                                                                    "<?=$q->title?>" 
                                                                    <i><?=$q->source_title?>, </i>
                                                                    <?php if (($q->volume)!="0") : ?>
                                                                    vol. <?=$q->volume?>, 
                                                                    <?php endif; ?>
                                                                    <?php if (($q->issue)!="0") : ?>
                                                                    no. <?=$q->issue?>, 
                                                                    <?php endif; ?>
                                                                    <?=$q->year?>, 
                                                                    doi: <?=$q->doi?>
                                                                    </span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="button" data-dismiss="modal">OK</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                        }
                                        ?>
                                    </tbpdy>
                                </table>
                            </div>
                                        <div class="row">
                                            <div style="text-align:center; width:100%; padding:0;">
                                                <?php if ($previous == 0): ?>

                                                <?php else: 
                                                    $previous = $page-1?>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('search');?>">
                                                <input type='hidden' name="q" value="<?= $cari ?>">
                                                <input type='hidden' name="page" value="<?= $previous ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                <i class="fa fa-arrow-left"></i>
                                                </button>
                                                </form>
                                                <?php endif; ?>
                                                <button class="btn btn-primary" style="background:none; border:none"><span style="color: black; font-weight:bold"><?=$page?></span></button>
                                                <?php if ($next == 0): ?>
                                                    
                                                <?php else: 
                                                    $next = $page+1?>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('search');?>">
                                                <input type='hidden' name="q" value="<?= $cari ?>">
                                                <input type='hidden' name="page" value="<?= $next ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin melakukan Log Out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Log Out" apabila Anda ingin mengakhiri season.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('welcome/logout');?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cara import ke Mendelay</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    1. Pada bagian Mendeley Desktop Anda, silakan klik <b>File -> Import -> RIS - Research Information Systems (*.ris)</b>
                    <img style="margin-bottom: 10px;" src="<?= base_url('assets/mend1.png');?>" alt="mend1" width="100%" height="100%"/>
                    2. Kemudian carilah file RIS yang telah terunduh tadi <b>(mend.ris)</b>. Misalnya pada Laptop saya terunduh pada folder Downloads.
                    <img style="margin-bottom: 10px;" src="<?= base_url('assets/mend2.png');?>" alt="mend2" width="100%" height="100%"/>
                    3. Kemudian klik file <b>mend.ris</b> tadi dan klik tombol <b>Open</b> dan referensi akan tertambah pada akun mendeley anda.
                    <img src="<?= base_url('assets/mend3.png');?>" alt="mend3" width="100%" height="100%"/>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Universitas Diponegoro 2021</span></div>
            </div>
        </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {        
    $('#dataTable').DataTable({
        "paging":   false,
       "info":     false
    } );
      
  } );
</script>
<!-- <script type="text/javascript"> 
        $(document).ready(function(){
                $.ajax({
                    url:"<?php base_url('search/checkPrevious');?>",
                    method:"post",
                    data:{page:"<?=$page?>", search:"<?=$cari?>"},
                    dataType: 'json',
                    success:function(data){
                        if (data.cek=="1"){
                            $('#previous').addClass('btn btn-primary');
                        }
                        else{
                            console.log(data.cek);
                        }
                        
                    }
                });
            
            });
    </script> 
    <script type="text/javascript"> 
        $(document).ready(function(){
                cek();
            });
            function cek(){
            $.ajax({
                    
                    url:"<?php base_url('search/checkNext');?>",
                    method:"post",
                    data:{page:"<?=$page?>", search:"<?=$cari?>"},
                    dataType: 'json',
                    success:function(data){
                        console.log(data.cek);
                        console.log("data.ce");
                        if (data.cek=="1"){
                            $('#next').addClass('btn btn-primary');
                        }
                        else{
                            console.log(data.cek);
                        }
                        
                    }
                });
            }
    </script>  -->
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script> -->
    <script src="<?= base_url('assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/main/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/main/vendor/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/main/js/demo/datatables-demo.js');?>"></script>

</body>

</html>