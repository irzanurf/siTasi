                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Platform Publikasi</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                        <div class="row text-center">
                                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 5px;">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal" data-target=".scopus" rel="tooltip" title="Scopus"><img src="https://pajak.apps.undip.ac.id/static/assets/images/scopus.png" width="150" height="50"></a>
                                    </div> 
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 5px;">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal" data-target=".sciencedirect" rel="tooltip" title="Sciencedirect"><img src="https://pajak.apps.undip.ac.id/static/assets/images/sciencedirect.png" width="150" height="50"></a>
                                    </div> 
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 5px;">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal" data-target=".scholar" rel="tooltip" title="Google Scholar"><img src="https://indochembull.com/public/site/images/arjunaoxygenius/kisspng-google-search-google-analytics-marketing-business-google-scholar-logo-5b4c8647e1f404.7173265615317417679255_.png" width="150" height="50"></a>
                                    </div> 
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 5px;">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal" data-target=".emerald" rel="tooltip" title="Emerald Insight"><img src="https://pajak.apps.undip.ac.id/static/assets/images/emerald.png" width="150" height="50"></a>
                                    </div> 
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 5px;">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal" data-target=".garuda" rel="tooltip" title="Garuda"><img src="https://garuda.ristekbrin.go.id/assets/img/garuda1.png" width="150" height="50"></a>
                                    </div> 
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4" style="padding: 5px;">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal" data-target=".springer" rel="tooltip" title="Springer Link"><img src="http://1.bp.blogspot.com/_uFezDwAbCgI/S8mSi71u7dI/AAAAAAAAAUE/bHHFjJ87pyg/s320/springerlink_basic_4c.jpg" width="150" height="50"></a>
                                    </div> 
                                </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<!-- Loading Modal-->
    <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" style="color: black; text-align:center" id="exampleModalLabel">Sedang meng-import, mohon tunggu!!</h5>
                </div>
                <div class="modal-body"><img id="loading_gif" src="<?= base_url('assets/loading.gif');?>" width="100%"/></div>
            </div>
        </div>
    </div>
<!-- Log-Out Modal-->
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
<!-- Scopus Modal-->
    <div class="modal fade scopus" id="scopus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://pajak.apps.undip.ac.id/static/assets/images/scopus.png" width="150" height="50">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form role="form" class="border-bottom-primary" style="padding-bottom: 10px;" method="get" action="<?= base_url('admin/data_publikasi') ?>">
                    <input type="hidden" name="source" value="scopus">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" style="background:none; border:none" class="text-center">
                    <img src="<?= base_url('assets/click.png') ?>" width="100%">
                    </button>
                </form>
                <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                <div class="modal-body">
                <h4>Import File CSV</h4>
                <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                <hr><input type='hidden' name="source" value="scopus">
                <label>File Csv</label><br>
                <input type="file" accept=".csv" name="file"><br>
                </div>
                <div class="text-center">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Sciencedirect Modal-->
    <div class="modal fade sciencedirect" id="sciencedirect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://pajak.apps.undip.ac.id/static/assets/images/sciencedirect.png" width="150" height="50">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form role="form" class="border-bottom-primary" style="padding-bottom: 10px;" method="get" action="<?= base_url('admin/data_publikasi') ?>">
                    <input type="hidden" name="source" value="sciencedirect">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" style="background:none; border:none" class="text-center">
                    <img src="<?= base_url('assets/click.png') ?>" width="100%">
                    </button>
                </form>
                <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                <div class="modal-body">
                <h4>Import File CSV</h4>
                <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                <hr><input type='hidden' name="source" value="sciencedirect">
                <label>File Csv</label><br>
                <input type="file" accept=".csv" name="file"><br>
                </div>
                <div class="text-center">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- GScholar Modal-->
    <div class="modal fade scholar" id="scholar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://indochembull.com/public/site/images/arjunaoxygenius/kisspng-google-search-google-analytics-marketing-business-google-scholar-logo-5b4c8647e1f404.7173265615317417679255_.png" width="150" height="50">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form role="form" class="border-bottom-primary" style="padding-bottom: 10px;" method="get" action="<?= base_url('admin/data_publikasi') ?>">
                    <input type="hidden" name="source" value="scholar">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" style="background:none; border:none" class="text-center">
                    <img src="<?= base_url('assets/click.png') ?>" width="100%">
                    </button>
                </form>
                <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                <div class="modal-body">
                <h4>Import File CSV</h4>
                <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                <hr><input type='hidden' name="source" value="scholar">
                <label>File Csv</label><br>
                <input type="file" accept=".csv" name="file"><br>
                </div>
                <div class="text-center">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Emerald Modal-->
    <div class="modal fade emerald" id="emerald" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://pajak.apps.undip.ac.id/static/assets/images/emerald.png" width="150" height="50">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form role="form" class="border-bottom-primary" style="padding-bottom: 10px;" method="get" action="<?= base_url('admin/data_publikasi') ?>">
                    <input type="hidden" name="source" value="emerald">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" style="background:none; border:none" class="text-center">
                    <img src="<?= base_url('assets/click.png') ?>" width="100%">
                    </button>
                </form>
                <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                <div class="modal-body">
                <h4>Import File CSV</h4>
                <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                <hr><input type='hidden' name="source" value="emerald">
                <label>File Csv</label><br>
                <input type="file" accept=".csv" name="file"><br>
                </div>
                <div class="text-center">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Garuda Modal-->
    <div class="modal fade garuda" id="garuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://garuda.ristekbrin.go.id/assets/img/garuda1.png" width="150" height="50">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form role="form" class="border-bottom-primary" style="padding-bottom: 10px;" method="get" action="<?= base_url('admin/data_publikasi') ?>">
                    <input type="hidden" name="source" value="garuda">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" style="background:none; border:none" class="text-center">
                    <img src="<?= base_url('assets/click.png') ?>" width="100%">
                    </button>
                </form>
                <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                <div class="modal-body">
                <h4>Import File CSV</h4>
                <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                <hr><input type='hidden' name="source" value="garuda">
                <label>File Csv</label><br>
                <input type="file" accept=".csv" name="file"><br>
                </div>
                <div class="text-center">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Springer Modal-->
    <div class="modal fade springer" id="springer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="http://1.bp.blogspot.com/_uFezDwAbCgI/S8mSi71u7dI/AAAAAAAAAUE/bHHFjJ87pyg/s320/springerlink_basic_4c.jpg" width="150" height="50">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form role="form" class="border-bottom-primary" style="padding-bottom: 10px;" method="get" action="<?= base_url('admin/data_publikasi') ?>">
                    <input type="hidden" name="source" value="springer">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" style="background:none; border:none" class="text-center">
                    <img src="<?= base_url('assets/click.png') ?>" width="100%">
                    </button>
                </form>
                <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                <div class="modal-body">
                <h4>Import File CSV</h4>
                <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                <hr><input type='hidden' name="source" value="springer">
                <label>File Csv</label><br>
                <input type="file" accept=".csv" name="file"><br>
                </div>
                <div class="text-center">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function(){
            $('#submit').click(function (e) {
        // e.preventDefault();
        $('#loading').modal('show');
        $('#scopus').modal('hide');
        $('#sciencedirect').modal('hide');
        $('#scholar').modal('hide');
        $('#emerald').modal('hide');
        $('#garuda').modal('hide');
        $('#springer').modal('hide');
        });
            });
    </script>   

<footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Universitas Diponegoro 2021</span></div>
            </div>
        </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script>
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